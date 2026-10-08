<?php

namespace App\Models;

use Database\Factories\DriveItemFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int|null $parent_id
 * @property int|null $google_drive_account_id
 * @property string|null $google_drive_file_id
 * @property string $name
 * @property string $type
 * @property string|null $mime_type
 * @property int $size
 * @property string|null $storage_path
 * @property bool $is_starred
 * @property bool $is_trashed
 * @property string|null $share_token
 * @property string|null $device_asset_id
 * @property string|null $content_hash
 * @property bool $is_backup
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'user_id',
    'parent_id',
    'google_drive_account_id',
    'google_drive_file_id',
    'name',
    'type',
    'mime_type',
    'size',
    'storage_path',
    'is_starred',
    'is_trashed',
    'share_token',
    'device_asset_id',
    'content_hash',
    'is_backup',
])]
class DriveItem extends Model
{
    /** @use HasFactory<DriveItemFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'size' => 'integer',
            'is_starred' => 'boolean',
            'is_trashed' => 'boolean',
            'is_backup' => 'boolean',
        ];
    }

    /**
     * The owner of this drive item.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The parent folder of this item.
     *
     * @return BelongsTo<DriveItem, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(DriveItem::class, 'parent_id');
    }

    /**
     * Children items inside this folder.
     *
     * @return HasMany<DriveItem, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(DriveItem::class, 'parent_id');
    }

    /**
     * Associated Google Drive account.
     *
     * @return BelongsTo<GoogleDriveAccount, $this>
     */
    public function googleDriveAccount(): BelongsTo
    {
        return $this->belongsTo(GoogleDriveAccount::class);
    }

    /**
     * Check if item is a folder.
     */
    public function isFolder(): bool
    {
        return $this->type === 'folder';
    }

    /**
     * Check if item is a file.
     */
    public function isFile(): bool
    {
        return $this->type === 'file';
    }

    /**
     * Generate breadcrumbs trail array from root to this item.
     *
     * @return array<int, array{id: int, name: string}>
     */
    public function getBreadcrumbs(): array
    {
        $trail = [];
        $current = $this;

        while ($current) {
            array_unshift($trail, [
                'id' => $current->id,
                'name' => $current->name,
            ]);
            $current = $current->parent;
        }

        return $trail;
    }
}
