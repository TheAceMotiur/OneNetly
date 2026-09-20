<?php

namespace App\Services;

use App\Models\GoogleDriveAccount;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Throwable;

class GoogleDriveService
{
    /**
     * Get all active Google Drive accounts ordered by priority.
     *
     * @return Collection<int, GoogleDriveAccount>
     */
    public function getActiveAccounts(): Collection
    {
        return GoogleDriveAccount::where('is_active', true)
            ->orderBy('priority', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Get the default or first available active Google Drive account.
     */
    public function getActiveAccount(?int $accountId = null): ?GoogleDriveAccount
    {
        if ($accountId) {
            return GoogleDriveAccount::where('id', $accountId)->where('is_active', true)->first();
        }

        return GoogleDriveAccount::where('is_active', true)
            ->orderBy('priority', 'asc')
            ->orderBy('id', 'asc')
            ->first();
    }

    /**
     * Find the best Google Drive account with available storage space for the given file size.
     * Checks accounts in order of priority (1st account -> 2nd account -> 3rd account).
     */
    public function findEligibleAccount(int $fileSizeBytes = 0, ?int $preferredAccountId = null): ?GoogleDriveAccount
    {
        if ($preferredAccountId) {
            $preferred = GoogleDriveAccount::where('id', $preferredAccountId)
                ->where('is_active', true)
                ->first();

            if ($preferred && $preferred->hasAvailableStorageFor($fileSizeBytes)) {
                return $preferred;
            }
        }

        $accounts = $this->getActiveAccounts();

        foreach ($accounts as $account) {
            // Check if storage was synced recently (within 6 hours) or sync if empty
            if ($account->total_storage_bytes === null || ! $account->last_synced_at || $account->last_synced_at->diffInHours(now()) > 6) {
                try {
                    $this->syncAccountQuota($account);
                    $account->refresh();
                } catch (Throwable) {
                    // Continue with current data if sync fails
                }
            }

            if ($account->hasAvailableStorageFor($fileSizeBytes)) {
                return $account;
            }
        }

        // If no account strictly has space, return first active account as fallback
        return $accounts->first();
    }

    /**
     * Synchronize storage quota info from Google API for an account.
     *
     * @return array{limit: int|null, usage: int|null}
     */
    public function syncAccountQuota(GoogleDriveAccount $account): array
    {
        $token = $this->getAccessToken($account);

        $response = Http::withToken($token)
            ->timeout(12)
            ->get('https://www.googleapis.com/drive/v3/about', [
                'fields' => 'storageQuota,user',
            ]);

        if ($response->successful()) {
            $data = $response->json();
            $storage = $data['storageQuota'] ?? [];
            $limit = isset($storage['limit']) ? (int) $storage['limit'] : null;
            $usage = isset($storage['usage']) ? (int) $storage['usage'] : null;

            $account->update([
                'total_storage_bytes' => $limit,
                'used_storage_bytes' => $usage,
                'last_synced_at' => now(),
            ]);

            return [
                'limit' => $limit,
                'usage' => $usage,
            ];
        }

        return [
            'limit' => $account->total_storage_bytes,
            'usage' => $account->used_storage_bytes,
        ];
    }

    /**
     * Get aggregate storage pool statistics across all active connected Google Drive accounts.
     *
     * @return array{total_bytes: int, used_bytes: int, available_bytes: int, active_accounts_count: int, accounts: array<int, array<string, mixed>>}
     */
    public function getAggregatePoolStorage(): array
    {
        $accounts = $this->getActiveAccounts();

        $totalBytes = 0;
        $usedBytes = 0;
        $accountsList = [];

        foreach ($accounts as $account) {
            $total = $account->total_storage_bytes ?? 0;
            $used = $account->used_storage_bytes ?? 0;

            $totalBytes += $total;
            $usedBytes += $used;

            $accountsList[] = [
                'id' => $account->id,
                'name' => $account->name,
                'email' => $account->email,
                'priority' => $account->priority,
                'total_bytes' => $total,
                'used_bytes' => $used,
                'available_bytes' => max(0, $total - $used),
                'percent' => $total > 0 ? min(100, round(($used / $total) * 100)) : 0,
            ];
        }

        return [
            'total_bytes' => $totalBytes,
            'used_bytes' => $usedBytes,
            'available_bytes' => max(0, $totalBytes - $usedBytes),
            'active_accounts_count' => $accounts->count(),
            'accounts' => $accountsList,
        ];
    }

    /**
     * Upload an uploaded file to Google Drive using multi-account failover.
     * Attempts 1st account, if full/fails proceeds to 2nd, then 3rd, etc.
     *
     * @return array{id: string, name: string, mimeType: string, size: int, account_id: int, account_name: string}
     */
    public function uploadWithFailover(UploadedFile $file, ?string $parentGoogleId = null): array
    {
        $accounts = $this->getActiveAccounts();

        if ($accounts->isEmpty()) {
            throw new RuntimeException('No active Google Drive account is configured.');
        }

        $fileSize = $file->getSize() ?: 0;
        $errors = [];

        // Sort: eligible accounts first based on priority, then others
        $sortedAccounts = $accounts->sortBy(function (GoogleDriveAccount $account) use ($fileSize) {
            return $account->hasAvailableStorageFor($fileSize) ? $account->priority : ($account->priority + 1000);
        });

        foreach ($sortedAccounts as $account) {
            try {
                $result = $this->uploadFile($account, $file, $parentGoogleId);

                // Update used storage
                if ($account->used_storage_bytes !== null) {
                    $account->increment('used_storage_bytes', $result['size']);
                }

                return [
                    ...$result,
                    'account_id' => $account->id,
                    'account_name' => $account->name,
                ];
            } catch (Throwable $e) {
                $errors[] = "Account '{$account->name}': {$e->getMessage()}";

                continue;
            }
        }

        throw new RuntimeException('All Google Drive accounts failed to upload. '.implode('; ', $errors));
    }

    /**
     * Get a valid access token for the given account.
     */
    public function getAccessToken(GoogleDriveAccount $account): string
    {
        $cacheKey = "gdrive_access_token_{$account->id}";

        return Cache::remember($cacheKey, 3000, function () use ($account) {
            $response = Http::asForm()
                ->timeout(15)
                ->post('https://oauth2.googleapis.com/token', [
                    'client_id' => $account->client_id,
                    'client_secret' => $account->client_secret,
                    'refresh_token' => $account->refresh_token,
                    'grant_type' => 'refresh_token',
                ]);

            if (! $response->successful()) {
                $error = $response->json('error_description') ?? $response->json('error') ?? 'Failed to refresh Google Drive token.';
                throw new RuntimeException($error);
            }

            return (string) $response->json('access_token');
        });
    }

    /**
     * Create a folder in Google Drive.
     *
     * @return array{id: string, name: string}
     */
    public function createFolder(GoogleDriveAccount $account, string $name, ?string $parentGoogleId = null): array
    {
        $token = $this->getAccessToken($account);

        $payload = [
            'name' => $name,
            'mimeType' => 'application/vnd.google-apps.folder',
        ];

        if ($parentGoogleId) {
            $payload['parents'] = [$parentGoogleId];
        }

        $response = Http::withToken($token)
            ->timeout(20)
            ->post('https://www.googleapis.com/drive/v3/files', $payload);

        if (! $response->successful()) {
            throw new RuntimeException('Failed to create folder on Google Drive: '.$response->body());
        }

        return [
            'id' => (string) $response->json('id'),
            'name' => (string) $response->json('name'),
        ];
    }

    /**
     * Upload an uploaded file to Google Drive using multipart upload.
     *
     * @return array{id: string, name: string, mimeType: string, size: int}
     */
    public function uploadFile(GoogleDriveAccount $account, UploadedFile $file, ?string $parentGoogleId = null): array
    {
        $token = $this->getAccessToken($account);
        $fileName = $file->getClientOriginalName();
        $mimeType = $file->getClientMimeType() ?: 'application/octet-stream';
        $fileContent = file_get_contents($file->getRealPath());

        $metadata = [
            'name' => $fileName,
        ];

        if ($parentGoogleId) {
            $metadata['parents'] = [$parentGoogleId];
        }

        $boundary = '-------314159265358979323846';
        $delimiter = "\r\n--".$boundary."\r\n";
        $closeDelimiter = "\r\n--".$boundary.'--';

        $multipartBody = $delimiter
            ."Content-Type: application/json; charset=UTF-8\r\n\r\n"
            .json_encode($metadata)
            .$delimiter
            .'Content-Type: '.$mimeType."\r\n\r\n"
            .$fileContent
            .$closeDelimiter;

        $response = Http::withToken($token)
            ->timeout(120)
            ->withHeaders([
                'Content-Type' => 'multipart/related; boundary='.$boundary,
                'Content-Length' => strlen($multipartBody),
            ])
            ->send('POST', 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart&fields=id,name,mimeType,size', [
                'body' => $multipartBody,
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Failed to upload file to Google Drive: '.$response->body());
        }

        $data = $response->json();

        return [
            'id' => (string) $data['id'],
            'name' => (string) $data['name'],
            'mimeType' => (string) ($data['mimeType'] ?? $mimeType),
            'size' => (int) ($data['size'] ?? $file->getSize()),
        ];
    }

    /**
     * Duplicate or copy a file in Google Drive.
     *
     * @return array{id: string, name: string}
     */
    public function copyFile(GoogleDriveAccount $account, string $googleFileId, string $newName): array
    {
        $token = $this->getAccessToken($account);

        $response = Http::withToken($token)
            ->timeout(20)
            ->post("https://www.googleapis.com/drive/v3/files/{$googleFileId}/copy", [
                'name' => $newName,
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Failed to copy file on Google Drive: '.$response->body());
        }

        return [
            'id' => (string) $response->json('id'),
            'name' => (string) $response->json('name'),
        ];
    }

    /**
     * Download or stream file content from Google Drive.
     */
    public function downloadFile(GoogleDriveAccount $account, string $googleFileId): Response
    {
        $token = $this->getAccessToken($account);

        $response = Http::withToken($token)
            ->timeout(120)
            ->get("https://www.googleapis.com/drive/v3/files/{$googleFileId}", [
                'alt' => 'media',
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Failed to download file from Google Drive: '.$response->body());
        }

        return $response;
    }

    /**
     * Delete a file or folder from Google Drive.
     */
    public function deleteFile(GoogleDriveAccount $account, string $googleFileId): bool
    {
        try {
            $token = $this->getAccessToken($account);

            $response = Http::withToken($token)
                ->timeout(20)
                ->delete("https://www.googleapis.com/drive/v3/files/{$googleFileId}");

            return $response->successful() || $response->status() === 404;
        } catch (Throwable) {
            return false;
        }
    }

    /**
     * Move a file or folder in Google Drive.
     */
    public function moveFile(
        GoogleDriveAccount $account,
        string $googleFileId,
        string $newParentGoogleId,
        ?string $oldParentGoogleId = null
    ): bool {
        try {
            $token = $this->getAccessToken($account);

            $params = [
                'addParents' => $newParentGoogleId,
            ];

            if ($oldParentGoogleId) {
                $params['removeParents'] = $oldParentGoogleId;
            }

            $response = Http::withToken($token)
                ->timeout(20)
                ->patch("https://www.googleapis.com/drive/v3/files/{$googleFileId}?".http_build_query($params));

            return $response->successful();
        } catch (Throwable) {
            return false;
        }
    }

    /**
     * Rename a file or folder in Google Drive.
     */
    public function renameFile(GoogleDriveAccount $account, string $googleFileId, string $newName): bool
    {
        try {
            $token = $this->getAccessToken($account);

            $response = Http::withToken($token)
                ->timeout(20)
                ->patch("https://www.googleapis.com/drive/v3/files/{$googleFileId}", [
                    'name' => $newName,
                ]);

            return $response->successful();
        } catch (Throwable) {
            return false;
        }
    }
}
