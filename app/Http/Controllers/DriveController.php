<?php

namespace App\Http\Controllers;

use App\Models\DriveItem;
use App\Services\GoogleDriveService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class DriveController extends Controller
{
    public function __construct(
        protected GoogleDriveService $driveService
    ) {}

    /**
     * Display the Google Drive-like user dashboard.
     */
    public function index(Request $request): Response
    {
        $user = $request->user();
        $folderId = $request->integer('folder_id') ?: null;
        $search = $request->string('search')->trim()->toString();
        $filter = $request->string('filter', 'all')->toString(); // all, starred, trash, recent

        $currentFolder = null;
        $breadcrumbs = [
            ['id' => null, 'name' => 'My Drive'],
        ];

        if ($folderId && $filter === 'all' && $search === '') {
            $currentFolder = DriveItem::where('user_id', $user->id)
                ->where('id', $folderId)
                ->where('type', 'folder')
                ->where('is_trashed', false)
                ->firstOrFail();

            $breadcrumbs = array_merge($breadcrumbs, $currentFolder->getBreadcrumbs());
        }

        $baseQuery = DriveItem::query()
            ->where('user_id', $user->id);

        if ($filter === 'trash') {
            $baseQuery->where('is_trashed', true);
        } else {
            $baseQuery->where('is_trashed', false);

            if ($filter === 'starred') {
                $baseQuery->where('is_starred', true);
            } elseif ($filter === 'recent') {
                $baseQuery->where('type', 'file')->latest()->limit(50);
            } elseif ($search !== '') {
                $baseQuery->where('name', 'like', "%{$search}%");
            } else {
                $baseQuery->where('parent_id', $folderId);
            }
        }

        // Fetch folders and files
        $items = $baseQuery
            ->with('googleDriveAccount:id,name,email')
            ->orderByRaw("type = 'folder' DESC")
            ->orderBy('name', 'asc')
            ->get()
            ->map(fn (DriveItem $item) => [
                'id' => $item->id,
                'parent_id' => $item->parent_id,
                'name' => $item->name,
                'type' => $item->type,
                'mime_type' => $item->mime_type,
                'size' => $item->size,
                'is_starred' => $item->is_starred,
                'is_trashed' => $item->is_trashed,
                'share_token' => $item->share_token,
                'share_url' => $item->share_token ? route('drive.public.show', ['token' => $item->share_token]) : null,
                'google_drive_account' => $item->googleDriveAccount?->name,
                'google_drive_account_id' => $item->google_drive_account_id,
                'has_google_drive' => ! empty($item->google_drive_file_id),
                'updated_at' => $item->updated_at?->toISOString(),
                'created_at' => $item->created_at?->toISOString(),
            ]);

        $folders = $items->where('type', 'folder')->values();
        $files = $items->where('type', 'file')->values();

        // Total personal storage used
        $totalPersonalUsage = (int) DriveItem::where('user_id', $user->id)
            ->where('is_trashed', false)
            ->sum('size');

        // Flat folder list for Move dialog
        $allUserFolders = DriveItem::where('user_id', $user->id)
            ->where('type', 'folder')
            ->where('is_trashed', false)
            ->orderBy('name')
            ->get(['id', 'parent_id', 'name']);

        // Aggregate Multi-Account Storage Pool
        $poolStorage = $this->driveService->getAggregatePoolStorage();
        $activeAccount = $this->driveService->getActiveAccount();

        return Inertia::render('Dashboard', [
            'folders' => $folders,
            'files' => $files,
            'currentFolder' => $currentFolder ? [
                'id' => $currentFolder->id,
                'name' => $currentFolder->name,
                'parent_id' => $currentFolder->parent_id,
            ] : null,
            'breadcrumbs' => $breadcrumbs,
            'allFolders' => $allUserFolders,
            'filters' => [
                'folder_id' => $folderId,
                'search' => $search,
                'filter' => $filter,
            ],
            'storage' => [
                'used' => $totalPersonalUsage,
                'limit' => $user->storageLimitBytes(),
                'pool' => $poolStorage,
                'activeGoogleDrive' => $activeAccount ? [
                    'id' => $activeAccount->id,
                    'name' => $activeAccount->name,
                    'email' => $activeAccount->email,
                ] : null,
            ],
        ]);
    }

    /**
     * Create a new folder.
     */
    public function createFolder(Request $request): RedirectResponse
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

        // Folders are virtual (tracked only via parent_id in this table); Google
        // Drive is used purely as flat root storage for file content, so no
        // matching folder is created there.
        DriveItem::create([
            'user_id' => $user->id,
            'parent_id' => $parentFolder?->id,
            'name' => $validated['name'],
            'type' => 'folder',
            'size' => 0,
        ]);

        return back()->with('status', "Folder '{$validated['name']}' created successfully.");
    }

    /**
     * Upload one or multiple files using smart multi-account quota routing & failover.
     */
    public function upload(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'files' => ['required', 'array', 'min:1'],
            'files.*' => ['required', 'file', 'max:512000'], // 500MB max per file
            'parent_id' => ['nullable', 'integer', 'exists:drive_items,id'],
        ]);

        $parentId = $request->input('parent_id') ?: null;
        $parentFolder = null;

        if ($parentId) {
            $parentFolder = DriveItem::where('user_id', $user->id)
                ->where('id', $parentId)
                ->where('type', 'folder')
                ->firstOrFail();
        }

        $storageLimit = $user->storageLimitBytes();

        if ($storageLimit !== null) {
            $usedBytes = (int) DriveItem::where('user_id', $user->id)->where('is_trashed', false)->sum('size');
            $incomingBytes = array_sum(array_map(fn ($file) => $file->getSize(), $request->file('files')));

            if ($usedBytes + $incomingBytes > $storageLimit) {
                $limitGb = round($storageLimit / 1024 / 1024 / 1024, 1);

                return back()->with('error', "Storage limit reached. Your plan allows up to {$limitGb} GB. Upgrade your plan or free up space to upload more files.");
            }
        }

        $uploadedCount = 0;
        $usedAccounts = [];
        $errors = [];

        foreach ($request->file('files') as $file) {
            $originalName = $file->getClientOriginalName();
            $mimeType = $file->getClientMimeType() ?: 'application/octet-stream';
            $size = $file->getSize();

            $googleFileId = null;
            $accountId = null;
            $storagePath = null;

            try {
                // Smart Multi-Account Routing: checks 1st account, if full/fails uses 2nd, then 3rd...
                // Files always upload to the Drive account's root; folders are purely
                // virtual (tracked via parent_id), so failover isn't constrained to
                // whichever account happens to "own" the folder.
                $uploadResult = $this->driveService->uploadWithFailover($file);

                $googleFileId = $uploadResult['id'];
                $accountId = $uploadResult['account_id'];
                $size = $uploadResult['size'] ?: $size;
                $usedAccounts[$uploadResult['account_name']] = true;
            } catch (Throwable $e) {
                // If all Google Drive accounts failed or none connected, store locally
                $errors[] = "Google Drive upload failed for '{$originalName}': {$e->getMessage()} (saved locally)";
                $storagePath = $file->store("drive_uploads/{$user->id}", 'local');
            }

            DriveItem::create([
                'user_id' => $user->id,
                'parent_id' => $parentFolder?->id,
                'google_drive_account_id' => $accountId,
                'google_drive_file_id' => $googleFileId,
                'name' => $originalName,
                'type' => 'file',
                'mime_type' => $mimeType,
                'size' => $size,
                'storage_path' => $storagePath,
            ]);

            $uploadedCount++;
        }

        $msg = "{$uploadedCount} ".($uploadedCount === 1 ? 'file' : 'files').' uploaded successfully.';
        if (! empty($usedAccounts)) {
            $msg .= ' Stored in: '.implode(', ', array_keys($usedAccounts)).'.';
        }

        return back()->with('status', $msg);
    }

    /**
     * Rename an item.
     */
    public function rename(Request $request, DriveItem $item): RedirectResponse
    {
        $this->authorizeItem($request, $item);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($item->googleDriveAccount && $item->google_drive_file_id) {
            $this->driveService->renameFile(
                $item->googleDriveAccount,
                $item->google_drive_file_id,
                $validated['name']
            );
        }

        $item->update([
            'name' => $validated['name'],
        ]);

        return back()->with('status', "Renamed to '{$validated['name']}'.");
    }

    /**
     * Duplicate / Copy a file.
     */
    public function duplicate(Request $request, DriveItem $item): RedirectResponse
    {
        $this->authorizeItem($request, $item);

        if ($item->isFolder()) {
            return back()->with('error', 'Folder duplication is not supported.');
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
                return back()->with('error', 'Failed to copy in Google Drive: '.$e->getMessage());
            }
        }

        $newStoragePath = null;
        if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
            $newStoragePath = "drive_uploads/{$item->user_id}/".Str::random(40).($extension ? ".{$extension}" : '');
            Storage::disk('local')->copy($item->storage_path, $newStoragePath);
        }

        DriveItem::create([
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

        return back()->with('status', "Duplicated '{$item->name}'.");
    }

    /**
     * Move an item to another folder.
     */
    public function move(Request $request, DriveItem $item): RedirectResponse
    {
        $this->authorizeItem($request, $item);

        $validated = $request->validate([
            'parent_id' => ['nullable', 'integer', 'exists:drive_items,id'],
        ]);

        $targetParentId = $validated['parent_id'] ?? null;

        if ($item->isFolder()) {
            if ($targetParentId === $item->id) {
                return back()->with('error', 'Cannot move a folder into itself.');
            }

            if ($targetParentId) {
                $target = DriveItem::where('user_id', $request->user()->id)->find($targetParentId);
                $curr = $target;
                while ($curr) {
                    if ($curr->id === $item->id) {
                        return back()->with('error', 'Cannot move a folder into one of its subfolders.');
                    }
                    $curr = $curr->parent;
                }
            }
        }

        $targetParent = $targetParentId
            ? DriveItem::where('user_id', $request->user()->id)->where('id', $targetParentId)->first()
            : null;

        if ($item->googleDriveAccount && $item->google_drive_file_id && $targetParent?->google_drive_file_id) {
            $this->driveService->moveFile(
                $item->googleDriveAccount,
                $item->google_drive_file_id,
                $targetParent->google_drive_file_id,
                $item->parent?->google_drive_file_id
            );
        }

        $item->update([
            'parent_id' => $targetParentId,
        ]);

        $destinationName = $targetParent ? "'{$targetParent->name}'" : 'My Drive';

        return back()->with('status', "Moved '{$item->name}' to {$destinationName}.");
    }

    /**
     * Bulk actions on multiple items (bulk delete, bulk move, bulk star).
     */
    public function bulkAction(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'action' => ['required', 'string', 'in:star,unstar,trash,delete,move,restore'],
            'item_ids' => ['required', 'array', 'min:1'],
            'item_ids.*' => ['integer', 'exists:drive_items,id'],
            'target_parent_id' => ['nullable', 'integer', 'exists:drive_items,id'],
        ]);

        $items = DriveItem::where('user_id', $request->user()->id)
            ->whereIn('id', $validated['item_ids'])
            ->get();

        $count = $items->count();

        switch ($validated['action']) {
            case 'star':
                DriveItem::whereIn('id', $items->pluck('id'))->update(['is_starred' => true]);

                return back()->with('status', "{$count} items starred.");

            case 'unstar':
                DriveItem::whereIn('id', $items->pluck('id'))->update(['is_starred' => false]);

                return back()->with('status', "{$count} items unstarred.");

            case 'trash':
                DriveItem::whereIn('id', $items->pluck('id'))->update(['is_trashed' => true]);

                return back()->with('status', "{$count} items moved to Trash.");

            case 'restore':
                DriveItem::whereIn('id', $items->pluck('id'))->update(['is_trashed' => false]);

                return back()->with('status', "{$count} items restored.");

            case 'move':
                $targetParentId = $validated['target_parent_id'] ?? null;
                foreach ($items as $item) {
                    if ($item->isFolder() && $targetParentId === $item->id) {
                        continue;
                    }
                    $item->update(['parent_id' => $targetParentId]);
                }

                return back()->with('status', "{$count} items moved.");

            case 'delete':
                foreach ($items as $item) {
                    if ($item->googleDriveAccount && $item->google_drive_file_id) {
                        $this->driveService->deleteFile($item->googleDriveAccount, $item->google_drive_file_id);
                    }
                    if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
                        Storage::disk('local')->delete($item->storage_path);
                    }
                    $item->delete();
                }

                return back()->with('status', "{$count} items permanently deleted.");
        }

        return back();
    }

    /**
     * Create or toggle a public share link for a file.
     */
    public function share(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        if (! $item->share_token) {
            $item->update([
                'share_token' => Str::random(32),
            ]);
        }

        $shareUrl = route('drive.public.show', ['token' => $item->share_token]);

        return response()->json([
            'success' => true,
            'share_token' => $item->share_token,
            'share_url' => $shareUrl,
        ]);
    }

    /**
     * Remove public share link for a file.
     */
    public function unshare(Request $request, DriveItem $item): JsonResponse
    {
        $this->authorizeItem($request, $item);

        $item->update([
            'share_token' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Share link revoked.',
        ]);
    }

    /**
     * Toggle starred status on an item.
     */
    public function toggleStar(Request $request, DriveItem $item): RedirectResponse
    {
        $this->authorizeItem($request, $item);

        $item->update([
            'is_starred' => ! $item->is_starred,
        ]);

        $status = $item->is_starred ? 'starred' : 'unstarred';

        return back()->with('status', "Item {$status}.");
    }

    /**
     * Move item to trash or delete permanently.
     */
    public function destroy(Request $request, DriveItem $item): RedirectResponse
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

            return back()->with('status', "Permanently deleted '{$item->name}'.");
        }

        $item->update([
            'is_trashed' => true,
        ]);

        return back()->with('status', "Moved '{$item->name}' to Trash.");
    }

    /**
     * Restore item from trash.
     */
    public function restore(Request $request, DriveItem $item): RedirectResponse
    {
        $this->authorizeItem($request, $item);

        $item->update([
            'is_trashed' => false,
        ]);

        return back()->with('status', "Restored '{$item->name}'.");
    }

    /**
     * Preview / stream file content inline.
     */
    public function preview(Request $request, DriveItem $item)
    {
        $this->authorizeItem($request, $item);

        if ($item->isFolder()) {
            abort(400, 'Cannot preview a folder.');
        }

        return $this->streamItemContent($item, 'inline');
    }

    /**
     * Download or stream a file from Google Drive / storage.
     */
    public function download(Request $request, DriveItem $item)
    {
        $this->authorizeItem($request, $item);

        if ($item->isFolder()) {
            return back()->with('error', 'Folders cannot be downloaded directly.');
        }

        return $this->streamItemContent($item, 'attachment');
    }

    /**
     * Public landing page showing details for a shared file, with a download button.
     */
    public function publicShow(string $token): Response
    {
        $item = DriveItem::where('share_token', $token)
            ->where('is_trashed', false)
            ->where('type', 'file')
            ->firstOrFail();

        return Inertia::render('PublicShare', [
            'file' => [
                'name' => $item->name,
                'mime_type' => $item->mime_type,
                'size' => $item->size,
                'created_at' => $item->created_at?->toISOString(),
                'token' => $token,
            ],
        ]);
    }

    /**
     * Public download or view for files with a valid share token.
     */
    public function publicDownload(string $token)
    {
        $item = DriveItem::where('share_token', $token)
            ->where('is_trashed', false)
            ->firstOrFail();

        return $this->streamItemContent($item, 'attachment');
    }

    /**
     * Public inline preview (image/video/audio/pdf) for a shared file.
     */
    public function publicPreview(string $token)
    {
        $item = DriveItem::where('share_token', $token)
            ->where('is_trashed', false)
            ->where('type', 'file')
            ->firstOrFail();

        return $this->streamItemContent($item, 'inline');
    }

    /**
     * Stream file content with proper disposition.
     */
    protected function streamItemContent(DriveItem $item, string $disposition = 'attachment')
    {
        if ($item->googleDriveAccount && $item->google_drive_file_id) {
            try {
                $response = $this->driveService->downloadFile(
                    $item->googleDriveAccount,
                    $item->google_drive_file_id
                );

                $headers = [
                    'Content-Type' => $item->mime_type ?: 'application/octet-stream',
                    'Content-Disposition' => $disposition.'; filename="'.addslashes($item->name).'"',
                ];

                if ($disposition === 'inline') {
                    return response($response->body(), 200, $headers);
                }

                return response()->stream(
                    static function () use ($response): void {
                        echo $response->body();
                    },
                    200,
                    $headers,
                );
            } catch (Throwable $e) {
                return back()->with('error', 'Failed streaming file from Google Drive: '.$e->getMessage());
            }
        }

        if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
            if ($disposition === 'inline') {
                return response()->file(Storage::disk('local')->path($item->storage_path), [
                    'Content-Type' => $item->mime_type ?: 'application/octet-stream',
                ]);
            }

            return Storage::disk('local')->download($item->storage_path, $item->name, [
                'Content-Type' => $item->mime_type ?: 'application/octet-stream',
            ]);
        }

        return back()->with('error', 'File content could not be located.');
    }

    /**
     * Authorize that the current authenticated user owns this drive item.
     */
    protected function authorizeItem(Request $request, DriveItem $item): void
    {
        if ($item->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized access to this file or folder.');
        }
    }
}
