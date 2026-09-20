<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Subscription;
use App\Services\PayPalSubscriptionService;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PayPalIpnController extends Controller
{
    /**
     * Handle an incoming PayPal Payments Standard IPN notification.
     */
    public function handle(Request $request, PayPalSubscriptionService $payPal): Response
    {
        $payload = $request->all();

        if (! $payPal->verifyIpn($payload)) {
            Log::warning('PayPal IPN verification failed.', ['payload' => $payload]);

            return response('Invalid IPN', 400);
        }

        $subscriptionId = (int) ($payload['custom'] ?? $payload['item_number'] ?? 0);
        $subscription = Subscription::query()->whereKey($subscriptionId)->first();

        if (! $subscription || $subscription->provider !== 'paypal') {
            return response('Subscription not found', 404);
        }

        $settings = AppSetting::current();
        $receiverEmail = $payload['business'] ?? $payload['receiver_email'] ?? null;

        if ($receiverEmail !== $settings->paypal_receiver_email) {
            Log::warning('PayPal IPN receiver email mismatch.', ['payload' => $payload]);

            return response('Receiver mismatch', 400);
        }

        if (($payload['payment_status'] ?? null) !== 'Completed') {
            return response('Ignored', 200);
        }

        $plan = $subscription->plan;
        $startsAt = now();
        $endsAt = $startsAt->copy()->add(CarbonInterval::fromString(
            $plan->interval === 'year' ? '1 year' : '1 month'
        ));

        $subscription->update([
            'status' => 'active',
            'provider_subscription_id' => $payload['txn_id'] ?? null,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'metadata' => [
                'method' => 'standard',
                'amount_paid' => $payload['mc_gross'] ?? null,
                'currency' => $payload['mc_currency'] ?? null,
                'payer_email' => $payload['payer_email'] ?? null,
            ],
        ]);

        return response('OK', 200);
    }
}
