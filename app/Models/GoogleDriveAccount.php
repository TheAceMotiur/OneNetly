<?php

namespace App\Models;

use Database\Factories\GoogleDriveAccountFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $client_id
 * @property string $client_secret
 * @property string $refresh_token
 * @property bool $is_active
 * @property int $priority
 * @property int|null $total_storage_bytes
 * @property int|null $used_storage_bytes
 * @property Carbon|null $last_synced_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'name',
    'email',
    'client_id',
    'client_secret',
    'refresh_token',
    'is_active',
    'priority',
    'total_storage_bytes',
    'used_storage_bytes',
    'last_synced_at',
])]
class GoogleDriveAccount extends Model
{
    /** @use HasFactory<GoogleDriveAccountFactory> */
    use HasFactory;

    /**
     * Get remaining available storage in bytes.
     */
    public function getAvailableStorage(): ?int
    {
        if ($this->total_storage_bytes === null) {
            return null; // Unlimited or unknown
        }

        $used = $this->used_storage_bytes ?? 0;

        return max(0, $this->total_storage_bytes - $used);
    }

    /**
     * Check if this account has enough available storage for a file size.
     */
    public function hasAvailableStorageFor(int $fileSizeBytes): bool
    {
        $available = $this->getAvailableStorage();

        if ($available === null) {
            return true;
        }

        // Leave 10MB safety margin
        return $available >= ($fileSizeBytes + 10485760);
    }

    /**
     * Test connection for this drive account and update cached quota.
     *
     * @return array<string, mixed>
     */
    public function testConnection(): array
    {
        $result = static::verifyCredentials(
            $this->client_id,
            $this->client_secret,
            $this->refresh_token
        );

        if ($result['success'] && isset($result['storage'])) {
            $this->update([
                'total_storage_bytes' => $result['storage']['limit'] ?? null,
                'used_storage_bytes' => $result['storage']['usage'] ?? null,
                'last_synced_at' => now(),
            ]);
        }

        return $result;
    }

    /**
     * Verify Google Drive OAuth credentials by requesting a fresh access token.
     *
     * @return array<string, mixed>
     */
    public static function verifyCredentials(string $clientId, string $clientSecret, string $refreshToken): array
    {
        try {
            $tokenResponse = Http::asForm()
                ->timeout(10)
                ->post('https://oauth2.googleapis.com/token', [
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'refresh_token' => $refreshToken,
                    'grant_type' => 'refresh_token',
                ]);

            if (! $tokenResponse->successful()) {
                $error = $tokenResponse->json('error_description')
                    ?? $tokenResponse->json('error')
                    ?? 'Invalid credentials or refresh token rejected by Google.';

                return [
                    'success' => false,
                    'message' => $error,
                ];
            }

            $accessToken = $tokenResponse->json('access_token');

            $aboutResponse = Http::withToken($accessToken)
                ->timeout(10)
                ->get('https://www.googleapis.com/drive/v3/about', [
                    'fields' => 'user,storageQuota',
                ]);

            if ($aboutResponse->successful()) {
                $data = $aboutResponse->json();
                $user = $data['user'] ?? [];
                $storage = $data['storageQuota'] ?? [];

                return [
                    'success' => true,
                    'message' => 'Connection established successfully!',
                    'account' => [
                        'name' => $user['displayName'] ?? null,
                        'email' => $user['emailAddress'] ?? null,
                        'photo' => $user['photoLink'] ?? null,
                    ],
                    'storage' => [
                        'limit' => isset($storage['limit']) ? (int) $storage['limit'] : null,
                        'usage' => isset($storage['usage']) ? (int) $storage['usage'] : null,
                        'usageInDrive' => isset($storage['usageInDrive']) ? (int) $storage['usageInDrive'] : null,
                    ],
                ];
            }

            return [
                'success' => true,
                'message' => 'OAuth token verified successfully.',
            ];
        } catch (Throwable $e) {
            return [
                'success' => false,
                'message' => 'Connection error: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'priority' => 'integer',
            'total_storage_bytes' => 'integer',
            'used_storage_bytes' => 'integer',
            'last_synced_at' => 'datetime',
            'client_secret' => 'encrypted',
            'refresh_token' => 'encrypted',
        ];
    }
}
