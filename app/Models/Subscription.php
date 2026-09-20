<?php

namespace App\Models;

use Database\Factories\SubscriptionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int $subscription_plan_id
 * @property string $provider
 * @property string|null $provider_subscription_id
 * @property string $status
 * @property Carbon|null $starts_at
 * @property Carbon|null $ends_at
 * @property Carbon|null $cancelled_at
 * @property array<string, mixed>|null $metadata
 */
#[Fillable([
    'user_id',
    'subscription_plan_id',
    'provider',
    'provider_subscription_id',
    'status',
    'starts_at',
    'ends_at',
    'cancelled_at',
    'metadata',
])]
class Subscription extends Model
{
    /** @use HasFactory<SubscriptionFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'metadata' => 'array',
        ];
    }

    /**
     * Determine if this subscription is currently active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active'
            && $this->cancelled_at === null
            && ($this->ends_at === null || $this->ends_at->isFuture());
    }

    /**
     * Get the amount paid, as stored in metadata.
     */
    public function amountPaid(): ?float
    {
        return isset($this->metadata['amount_paid']) ? (float) $this->metadata['amount_paid'] : null;
    }

    /**
     * Get the payment currency, as stored in metadata.
     */
    public function currency(): ?string
    {
        return $this->metadata['currency'] ?? null;
    }

    /**
     * Get the PayPal capture ID, as stored in metadata.
     */
    public function paypalCaptureId(): ?string
    {
        return $this->metadata['paypal_capture_id'] ?? null;
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<SubscriptionPlan, $this>
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }
}
