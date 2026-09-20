<?php

namespace App\Models;

use Database\Factories\SubscriptionPlanFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property float $price
 * @property string $currency
 * @property string $interval
 * @property string|null $paypal_plan_id
 * @property array<int, string>|null $features
 * @property bool $is_active
 * @property bool $is_featured
 * @property int $sort_order
 * @property int|null $storage_gb
 */
#[Fillable([
    'name',
    'slug',
    'description',
    'price',
    'currency',
    'interval',
    'paypal_plan_id',
    'features',
    'is_active',
    'is_featured',
    'sort_order',
    'storage_gb',
])]
class SubscriptionPlan extends Model
{
    /** @use HasFactory<SubscriptionPlanFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'features' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'storage_gb' => 'integer',
        ];
    }

    /**
     * Determine whether the plan is the free tier.
     */
    public function isFree(): bool
    {
        return (float) $this->price <= 0;
    }

    /**
     * Get the plan's storage quota in bytes, or null when unlimited.
     */
    public function storageBytes(): ?int
    {
        return $this->storage_gb === null ? null : $this->storage_gb * 1024 * 1024 * 1024;
    }

    /**
     * Get the subscriptions for this plan.
     *
     * @return HasMany<Subscription, $this>
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
