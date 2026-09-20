<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Singleton settings row for PayPal and AdSense configuration.
 *
 * @property int $id
 * @property string $paypal_mode
 * @property string|null $paypal_client_id
 * @property string|null $paypal_client_secret
 * @property string|null $paypal_receiver_email
 * @property string|null $adsense_client_id
 * @property bool $adsense_enabled
 * @property bool $adsense_auto_ads
 * @property string|null $adsense_slot_header
 * @property string|null $adsense_slot_infeed
 */
#[Fillable([
    'paypal_mode',
    'paypal_client_id',
    'paypal_client_secret',
    'paypal_receiver_email',
    'adsense_client_id',
    'adsense_enabled',
    'adsense_auto_ads',
    'adsense_slot_header',
    'adsense_slot_infeed',
])]
class AppSetting extends Model
{
    protected const CACHE_KEY = 'app_settings.current';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'paypal_client_secret' => 'encrypted',
            'adsense_enabled' => 'boolean',
            'adsense_auto_ads' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }

    /**
     * Get the singleton settings row, creating it with defaults from config if missing.
     */
    public static function current(): self
    {
        $id = Cache::rememberForever(self::CACHE_KEY, function () {
            return static::query()->firstOrCreate([], [
                'paypal_mode' => config('services.paypal.mode', 'sandbox'),
                'paypal_client_id' => config('services.paypal.client_id'),
                'paypal_client_secret' => config('services.paypal.client_secret'),
                'adsense_client_id' => config('services.adsense.client_id'),
            ])->id;
        });

        return static::query()->find($id) ?? static::query()->firstOrCreate([]);
    }

    /**
     * Determine whether PayPal is configured and ready to accept payments.
     */
    public function paypalIsConfigured(): bool
    {
        return $this->paypalMethod() !== 'none';
    }

    /**
     * Determine which PayPal checkout method is available: the REST "api" flow
     * (client ID + secret), the email-only "standard" redirect flow, or "none".
     */
    public function paypalMethod(): string
    {
        if (filled($this->paypal_client_id) && filled($this->paypal_client_secret)) {
            return 'api';
        }

        if (filled($this->paypal_receiver_email)) {
            return 'standard';
        }

        return 'none';
    }
}
