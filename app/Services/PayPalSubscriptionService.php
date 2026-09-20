<?php

namespace App\Services;

use App\Models\AppSetting;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class PayPalSubscriptionService
{
    protected AppSetting $settings;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->settings = AppSetting::current();
    }

    /**
     * Get the PayPal API base URI for the configured mode.
     */
    protected function baseUri(): string
    {
        return $this->settings->paypal_mode === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';
    }

    /**
     * Get a cached OAuth2 access token for the PayPal REST API.
     */
    public function getAccessToken(): string
    {
        if (! $this->settings->paypalIsConfigured()) {
            throw new RuntimeException('PayPal is not configured yet. Add your client ID and secret in the admin panel.');
        }

        return Cache::remember('paypal.access_token.'.$this->settings->paypal_mode, 3000, function () {
            $response = Http::asForm()
                ->withBasicAuth($this->settings->paypal_client_id, $this->settings->paypal_client_secret)
                ->post("{$this->baseUri()}/v1/oauth2/token", [
                    'grant_type' => 'client_credentials',
                ])
                ->throw();

            return $response->json('access_token');
        });
    }

    /**
     * Create a PayPal order for the given subscription plan.
     *
     * @return array<string, mixed>
     */
    public function createOrder(SubscriptionPlan $plan): array
    {
        $response = Http::withToken($this->getAccessToken())
            ->post("{$this->baseUri()}/v2/checkout/orders", [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'description' => "OneNetly {$plan->name} subscription",
                        'custom_id' => (string) $plan->id,
                        'amount' => [
                            'currency_code' => $plan->currency,
                            'value' => number_format((float) $plan->price, 2, '.', ''),
                        ],
                    ],
                ],
            ])
            ->throw();

        return $response->json();
    }

    /**
     * Capture a previously approved PayPal order.
     *
     * @return array<string, mixed>
     */
    public function captureOrder(string $orderId): array
    {
        $response = Http::withToken($this->getAccessToken())
            ->post("{$this->baseUri()}/v2/checkout/orders/{$orderId}/capture")
            ->throw();

        return $response->json();
    }

    /**
     * Verify a client ID / secret pair by requesting an access token.
     */
    public function verifyCredentials(string $clientId, string $clientSecret, string $mode): bool
    {
        $baseUri = $mode === 'live' ? 'https://api-m.paypal.com' : 'https://api-m.sandbox.paypal.com';

        $response = Http::asForm()
            ->withBasicAuth($clientId, $clientSecret)
            ->post("{$baseUri}/v1/oauth2/token", [
                'grant_type' => 'client_credentials',
            ]);

        return $response->successful();
    }

    /**
     * Build a PayPal Payments Standard (email-only, no API credentials) checkout
     * redirect URL for the given plan and pending subscription.
     */
    public function standardCheckoutUrl(SubscriptionPlan $plan, Subscription $subscription): string
    {
        $host = $this->settings->paypal_mode === 'live'
            ? 'https://www.paypal.com/cgi-bin/webscr'
            : 'https://www.sandbox.paypal.com/cgi-bin/webscr';

        $params = [
            'cmd' => '_xclick',
            'business' => $this->settings->paypal_receiver_email,
            'item_name' => config('app.name')." - {$plan->name} subscription",
            'item_number' => $subscription->id,
            'custom' => $subscription->id,
            'amount' => number_format((float) $plan->price, 2, '.', ''),
            'currency_code' => $plan->currency,
            'no_shipping' => '1',
            'no_note' => '1',
            'notify_url' => route('webhooks.paypal-ipn'),
            'return' => route('subscriptions.index', ['checkout' => 'success']),
            'cancel_return' => route('subscriptions.index', ['checkout' => 'cancelled']),
        ];

        return $host.'?'.http_build_query($params);
    }

    /**
     * Verify an incoming PayPal Instant Payment Notification by posting it back
     * to PayPal, per the Payments Standard IPN protocol.
     *
     * @param  array<string, mixed>  $payload
     */
    public function verifyIpn(array $payload): bool
    {
        $host = $this->settings->paypal_mode === 'live'
            ? 'https://ipnpb.paypal.com/cgi-bin/webscr'
            : 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr';

        $response = Http::asForm()->post($host, ['cmd' => '_notify-validate', ...$payload]);

        return $response->successful() && trim($response->body()) === 'VERIFIED';
    }
}
