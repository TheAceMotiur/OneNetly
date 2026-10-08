<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DriveItem;
use App\Models\User;
use App\Notifications\StorageLimitWarning;
use App\Services\GoogleDriveService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;
use ZipArchive;

class DriveController extends Controller
{
    public function __construct(
        protected GoogleDriveService $driveService
    ) {}

    /**
     * List folders/files for the mobile app (mirrors the web dashboard's filters).
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $folderId = $request->integer('folder_id') ?: null;
        $search = $request->string('search')->trim()->toString();
        $filter = $request->string('filter', 'all')->toString();

        $query = DriveItem::query()->where('user_id', $user->id);

        if ($filter === 'trash') {
            $query->where('is_trashed', true);
        } else {
            $query->where('is_trashed', false);

            if ($filter === 'starred') {
                $query->where('is_starred', true);
            } elseif ($filter === 'recent') {
                $query->where('type', 'file')->latest()->limit(50);
            } elseif ($filter === 'backup') {
                $query->where('is_backup', true);
            } elseif ($search !== '') {
                $query->where('name', 'like', "%{$search}%");
            } else {
                $query->where('parent_id', $folderId);
            }
        }

        $items = $query
            ->orderByRaw("type = 'folder' desc")
            ->orderBy('name')
            ->get()
            ->map(fn (DriveItem $item) => $this->itemPayload($item));

        return response()->json([
            'folders' => $items->where('type', 'folder')->values(),
            'files' => $items->where('type', 'file')->values(),
        ]);
    }

    /**
     * Create a folder.
     */
    public function createFolder(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'integer', 'exists:drive_items,id'],
        ]);

        $parentFolder = null;
        if (! empty($validated['parent_id'])) {
            $parentFolder = DriveItem::where('user_id', $user->id)
                ->where('id', $validated['parent_id'])
                ->where('type', 'folder')
                ->firstOrFail();
        }

        $folder = DriveItem::create([
            'user_id' => $user->id,
            'parent_id' => $parentFolder?->id,
            'name' => $validated['name'],
            'type' => 'folder',
            'size' => 0,
        ]);

        return response()->json(['item' => $this->itemPayload($folder)], 201);
    }

    /**
     * Upload one or more files from the app's file/document picker.
     */
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'files' => ['required', 'array', 'min:1'],
            'files.*' => ['required', 'file', 'max:512000'],
            'parent_id' => ['nullable', 'integer', 'exists:drive_items,id'],
        ]);

        $items = $this->storeFiles(
            $request->user(),
            $request->file('files'),
            $request->input('parent_id') ?: null,
        );

        return response()->json(['items' => $items->map(fn (DriveItem $i) => $this->itemPayload($i))]);
    }

    /**
     * Auto-backup upload for a single photo/video from the device's camera roll.
     *
     * Idempotent: if this device asset was already backed up, the existing item is
     * returned instead of creating a duplicate, so the client can safely retry.
     */
    public function backupUpload(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'file' => ['required', 'file', 'max:512000'],
            'device_asset_id' => ['required', 'string', 'max:191'],
            'content_hash' => ['nullable', 'string', 'max:64'],
            'taken_at' => ['nullable', 'date'],
        ]);

        $existing = DriveItem::where('user_id', $user->id)
            ->where('device_asset_id', $validated['device_asset_id'])
            ->first();

        if ($existing) {
            return response()->json(['item' => $this->itemPayload($existing), 'duplicate' => true]);
        }

        $backupFolder = $this->backupFolder($user->id);

        $items = $this->storeFiles($user, [$request->file('file')], $backupFolder->id, [
            'device_asset_id' => $validated['device_asset_id'],
            'content_hash' => $validated['content_hash'] ?? null,
            'is_backup' => true,
        ]);

        return response()->json(['item' => $this->itemPayload($items->first()), 'duplicate' => false], 201);
    }

    /**
     * Return the device_asset_ids already backed up, so the app can skip re-uploading
     * without making a network round-trip per asset.
     */
    public function backupStatus(Request $request): JsonResponse
    {
        $ids = DriveItem::where('user_id', $request->user()->id)
            ->where('is_backup', true)
            ->whereNotNull('device_asset_id')
            ->pluck('device_asset_id');

        return response()->json(['backed_up_asset_ids' => $ids]);
    }

    /**
     * Download a file's content.
     */
    public function download(Request $request, DriveItem $item)
    {
        $this->authorizeItem($request, $item);

        if ($item->isFolder()) {
            return response()->json(['message' => 'Folders cannot be downloaded directly.'], 422);
        }

        return $this->streamItemContent($item);
    }

    public function toggleStar(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $item->update(['is_starred' => ! $item->is_starred]);

        return response()->json(['item' => $this->itemPayload($item)]);
    }

    public function rename(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $validated = $request->validate(['name' => ['required', 'string', 'max:255']]);

        if ($item->googleDriveAccount && $item->google_drive_file_id) {
            $this->driveService->renameFile($item->googleDriveAccount, $item->google_drive_file_id, $validated['name']);
        }

        $item->update(['name' => $validated['name']]);

        return response()->json(['item' => $this->itemPayload($item)]);
    }

    public function move(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $validated = $request->validate(['parent_id' => ['nullable', 'integer', 'exists:drive_items,id']]);

        $item->update(['parent_id' => $validated['parent_id'] ?? null]);

        return response()->json(['item' => $this->itemPayload($item)]);
    }

    public function restore(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $item->update(['is_trashed' => false]);

        return response()->json(['item' => $this->itemPayload($item)]);
    }

    /**
     * Duplicate / copy a file.
     */
    public function duplicate(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        if ($item->isFolder()) {
            return response()->json(['message' => 'Folder duplication is not supported.'], 422);
        }

        $extension = pathinfo($item->name, PATHINFO_EXTENSION);
        $basename = pathinfo($item->name, PATHINFO_FILENAME);
        $newName = $extension ? "Copy of {$basename}.{$extension}" : "Copy of {$basename}";

        $newGoogleFileId = null;

        if ($item->googleDriveAccount && $item->google_drive_file_id) {
            try {
                $copied = $this->driveService->copyFile($item->googleDriveAccount, $item->google_drive_file_id, $newName);
                $newGoogleFileId = $copied['id'];
            } catch (Throwable $e) {
                return response()->json(['message' => 'Failed to copy in Google Drive: '.$e->getMessage()], 502);
            }
        }

        $newStoragePath = null;
        if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
            $newStoragePath = "drive_uploads/{$item->user_id}/".Str::random(40).($extension ? ".{$extension}" : '');
            Storage::disk('local')->copy($item->storage_path, $newStoragePath);
        }

        $copy = DriveItem::create([
            'user_id' => $item->user_id,
            'parent_id' => $item->parent_id,
            'google_drive_account_id' => $item->google_drive_account_id,
            'google_drive_file_id' => $newGoogleFileId,
            'name' => $newName,
            'type' => 'file',
            'mime_type' => $item->mime_type,
            'size' => $item->size,
            'storage_path' => $newStoragePath,
        ]);

        return response()->json(['item' => $this->itemPayload($copy)], 201);
    }

    /**
     * Flat list of every non-trashed folder, for the mobile "move to" picker.
     */
    public function allFolders(Request $request): JsonResponse
    {
        $folders = DriveItem::where('user_id', $request->user()->id)
            ->where('type', 'folder')
            ->where('is_trashed', false)
            ->orderBy('name')
            ->get(['id', 'parent_id', 'name']);

        return response()->json(['folders' => $folders]);
    }

    /**
     * Create (or reuse) a public share link for a file.
     */
    public function share(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        if ($item->isFolder()) {
            return response()->json(['message' => 'Folders cannot be shared.'], 422);
        }

        if (! $item->share_token) {
            $item->update(['share_token' => Str::random(32)]);
        }

        return response()->json([
            'share_token' => $item->share_token,
            'share_url' => route('drive.public.show', ['token' => $item->share_token]),
        ]);
    }

    /**
     * Revoke a file's public share link.
     */
    public function unshare(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $item->update(['share_token' => null]);

        return response()->json(['success' => true]);
    }

    /**
     * Create (or reuse) public share links for multiple files at once.
     */
    public function bulkShare(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'item_ids' => ['required', 'array', 'min:1'],
            'item_ids.*' => ['integer', 'exists:drive_items,id'],
        ]);

        $items = DriveItem::where('user_id', $user->id)
            ->whereIn('id', $validated['item_ids'])
            ->where('type', 'file')
            ->get();

        $links = $items->map(function (DriveItem $item) {
            if (! $item->share_token) {
                $item->update(['share_token' => Str::random(32)]);
            }

            return [
                'item_id' => $item->id,
                'name' => $item->name,
                'share_url' => route('drive.public.show', ['token' => $item->share_token]),
            ];
        });

        return response()->json(['links' => $links->values()]);
    }

    /**
     * Download multiple files as a single zip archive.
     */
    public function downloadZip(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'item_ids' => ['required', 'array', 'min:1'],
            'item_ids.*' => ['integer', 'exists:drive_items,id'],
        ]);

        $items = DriveItem::where('user_id', $user->id)
            ->whereIn('id', $validated['item_ids'])
            ->where('type', 'file')
            ->get();

        if ($items->isEmpty()) {
            return response()->json(['message' => 'No downloadable files in the selection.'], 422);
        }

        $zipPath = tempnam(sys_get_temp_dir(), 'onenetly_zip_').'.zip';
        $zip = new ZipArchive;
        $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $usedNames = [];
        foreach ($items as $item) {
            $bytes = $this->fetchFileBytes($item);
            if ($bytes === null) {
                continue;
            }

            $name = $item->name;
            $count = $usedNames[$item->name] ?? 0;
            if ($count > 0) {
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $basename = pathinfo($name, PATHINFO_FILENAME);
                $name = $extension ? "{$basename} ({$count}).{$extension}" : "{$basename} ({$count})";
            }
            $usedNames[$item->name] = $count + 1;

            $zip->addFromString($name, $bytes);
        }

        $zip->close();

        return response()->download($zipPath, 'OneNetly-files.zip')->deleteFileAfterSend(true);
    }

    public function destroy(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $permanent = $request->boolean('permanent') || $item->is_trashed;

        if ($permanent) {
            if ($item->googleDriveAccount && $item->google_drive_file_id) {
                $this->driveService->deleteFile($item->googleDriveAccount, $item->google_drive_file_id);
            }

            if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
                Storage::disk('local')->delete($item->storage_path);
            }

            $item->delete();

            return response()->json(['success' => true, 'permanent' => true]);
        }

        $item->update(['is_trashed' => true]);

        return response()->json(['success' => true, 'permanent' => false]);
    }

    /**
     * Storage usage summary for the account/settings screen.
     */
    public function storage(Request $request): JsonResponse
    {
        $user = $request->user();

        $used = (int) DriveItem::where('user_id', $user->id)->where('is_trashed', false)->sum('size');

        return response()->json([
            'used_bytes' => $used,
            'limit_bytes' => $user->storageLimitBytes(),
        ]);
    }

    /**
     * Persist uploaded files via Google Drive failover (or local disk fallback).
     *
     * @param  array<int, UploadedFile>  $files
     * @param  array<string, mixed>  $extraAttributes
     * @return Collection<int, DriveItem>
     */
    protected function storeFiles(User $user, array $files, ?int $parentId, array $extraAttributes = []): Collection
    {
        $storageLimit = $user->storageLimitBytes();
        $usedBytes = null;

        if ($storageLimit !== null) {
            $usedBytes = (int) DriveItem::where('user_id', $user->id)->where('is_trashed', false)->sum('size');
            $incomingBytes = array_sum(array_map(fn ($file) => $file->getSize(), $files));

            if ($usedBytes + $incomingBytes > $storageLimit) {
                abort(422, 'Storage limit reached. Upgrade your plan or free up space to upload more files.');
            }
        }

        $created = collect();

        foreach ($files as $file) {
            $originalName = $file->getClientOriginalName();
            $mimeType = $file->getClientMimeType() ?: 'application/octet-stream';
            $size = $file->getSize();

            $googleFileId = null;
            $accountId = null;
            $storagePath = null;

            try {
                $uploadResult = $this->driveService->uploadWithFailover($file);
                $googleFileId = $uploadResult['id'];
                $accountId = $uploadResult['account_id'];
                $size = $uploadResult['size'] ?: $size;
            } catch (Throwable) {
                $storagePath = $file->store("drive_uploads/{$user->id}", 'local');
            }

            $created->push(DriveItem::create(array_merge([
                'user_id' => $user->id,
                'parent_id' => $parentId,
                'google_drive_account_id' => $accountId,
                'google_drive_file_id' => $googleFileId,
                'name' => $originalName,
                'type' => 'file',
                'mime_type' => $mimeType,
                'size' => $size,
                'storage_path' => $storagePath,
            ], $extraAttributes)));
        }

        if ($storageLimit !== null) {
            $this->maybeWarnStorageLimit($user, $usedBytes + $created->sum('size'), $storageLimit);
        }

        return $created;
    }

    /**
     * Notify the user once their usage crosses 90% of their plan's storage limit,
     * skipping if they were already warned in the last day to avoid spam.
     */
    protected function maybeWarnStorageLimit(User $user, int $usedBytes, int $storageLimit): void
    {
        if ($usedBytes / $storageLimit < 0.9) {
            return;
        }

        $recentlyWarned = $user->notifications()
            ->where('type', StorageLimitWarning::class)
            ->where('created_at', '>=', now()->subDay())
            ->exists();

        if (! $recentlyWarned) {
            $user->notify(new StorageLimitWarning($usedBytes, $storageLimit));
        }
    }

    /**
     * Find or create the hidden "Camera Backup" folder used for auto-backed-up media.
     */
    protected function backupFolder(int $userId): DriveItem
    {
        return DriveItem::firstOrCreate(
            ['user_id' => $userId, 'parent_id' => null, 'type' => 'folder', 'name' => 'Camera Backup'],
            ['size' => 0],
        );
    }

    /**
     * Stream a file's content as an attachment download.
     */
    protected function streamItemContent(DriveItem $item)
    {
        if ($item->googleDriveAccount && $item->google_drive_file_id) {
            try {
                $response = $this->driveService->downloadFile($item->googleDriveAccount, $item->google_drive_file_id);

                return response($response->body(), 200, [
                    'Content-Type' => $item->mime_type ?: 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="'.addslashes($item->name).'"',
                ]);
            } catch (Throwable $e) {
                return response()->json(['message' => 'Failed streaming file from Google Drive: '.$e->getMessage()], 502);
            }
        }

        if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
            return Storage::disk('local')->download($item->storage_path, $item->name, [
                'Content-Type' => $item->mime_type ?: 'application/octet-stream',
            ]);
        }

        return response()->json(['message' => 'File content could not be located.'], 404);
    }

    /**
     * Fetch a file's raw bytes for zipping, from Google Drive or local disk.
     */
    protected function fetchFileBytes(DriveItem $item): ?string
    {
        if ($item->googleDriveAccount && $item->google_drive_file_id) {
            try {
                return $this->driveService->downloadFile($item->googleDriveAccount, $item->google_drive_file_id)->body();
            } catch (Throwable) {
                return null;
            }
        }

        if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
            return Storage::disk('local')->get($item->storage_path);
        }

        return null;
    }

    /**
     * @return array<string, mixed>
     */
    protected function itemPayload(DriveItem $item): array
    {
        return [
            'id' => $item->id,
            'parent_id' => $item->parent_id,
            'name' => $item->name,
            'type' => $item->type,
            'mime_type' => $item->mime_type,
            'size' => $item->size,
            'is_starred' => $item->is_starred,
            'is_trashed' => $item->is_trashed,
            'is_backup' => $item->is_backup,
            'device_asset_id' => $item->device_asset_id,
            'has_google_drive' => ! empty($item->google_drive_file_id),
            'share_token' => $item->share_token,
            'created_at' => $item->created_at?->toISOString(),
            'updated_at' => $item->updated_at?->toISOString(),
        ];
    }

    protected function authorizeItem(Request $request, DriveItem $item): void
    {
        if ($item->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized access to this file or folder.');
        }
    }
}
