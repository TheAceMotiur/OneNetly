<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * An FCM push token registered by a user's device.
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property string $platform
 */
#[Fillable(['user_id', 'token', 'platform'])]
class DeviceToken extends Model
{
    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
