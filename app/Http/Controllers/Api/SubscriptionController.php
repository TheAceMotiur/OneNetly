<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\SubscriptionPlan;
use App\Services\PayPalSubscriptionService;
use Carbon\CarbonInterval;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(protected PayPalSubscriptionService $payPal) {}

    /**
     * List active plans, the user's current subscription, and which PayPal
     * checkout method (api or standard) the app should use.
     */
    public function index(Request $request): JsonResponse
    {
        $plans = SubscriptionPlan::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $settings = AppSetting::current();

        return response()->json([
            'plans' => $plans,
            'active_subscription' => $request->user()->activeSubscription()?->load('plan'),
            'paypal_configured' => $settings->paypalIsConfigured(),
            'paypal_method' => $settings->paypalMethod(),
        ]);
    }

    /**
     * Create a PayPal order for the given plan (PayPal API checkout method).
     * The app opens the returned "approve" link in a WebView.
     */
    public function createOrder(SubscriptionPlan $plan): JsonResponse
    {
        if ($plan->isFree()) {
            return response()->json(['message' => 'Free plans do not require checkout.'], 422);
        }

        $order = $this->payPal->createOrder(
            $plan,
            route('subscriptions.mobile-return'),
            route('subscriptions.mobile-cancel'),
        );

        return response()->json($order);
    }

    /**
     * Capture a previously approved PayPal order and activate the subscription.
     */
    public function captureOrder(Request $request, string $orderId): JsonResponse
    {
        $validated = $request->validate([
            'plan_id' => ['required', 'integer', 'exists:subscription_plans,id'],
        ]);

        $plan = SubscriptionPlan::query()->whereKey($validated['plan_id'])->firstOrFail();

        $capture = $this->payPal->captureOrder($orderId);

        if (($capture['status'] ?? null) !== 'COMPLETED') {
            return response()->json(['message' => 'Payment could not be completed.'], 422);
        }

        $captureUnit = $capture['purchase_units'][0]['payments']['captures'][0] ?? [];

        $startsAt = now();
        $endsAt = $startsAt->copy()->add(CarbonInterval::fromString(
            $plan->interval === 'year' ? '1 year' : '1 month'
        ));

        $subscription = $request->user()->subscriptions()->create([
            'subscription_plan_id' => $plan->id,
            'provider' => 'paypal',
            'provider_subscription_id' => $orderId,
            'status' => 'active',
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'metadata' => [
                'paypal_capture_id' => $captureUnit['id'] ?? null,
                'amount_paid' => (float) $plan->price,
                'currency' => $plan->currency,
            ],
        ]);

        return response()->json(['subscription' => $subscription->load('plan')]);
    }

    /**
     * Create a pending subscription and return a PayPal Payments Standard
     * (email-only) checkout URL for the app to open in a WebView. Activation
     * happens asynchronously via the PayPal IPN webhook.
     */
    public function standardCheckout(Request $request, SubscriptionPlan $plan): JsonResponse
    {
        if ($plan->isFree()) {
            return response()->json(['message' => 'Free plans do not require checkout.'], 422);
        }

        $settings = AppSetting::current();

        if ($settings->paypalMethod() !== 'standard') {
            return response()->json(['message' => 'PayPal Standard checkout is not configured.'], 422);
        }

        $subscription = $request->user()->subscriptions()->create([
            'subscription_plan_id' => $plan->id,
            'provider' => 'paypal',
            'status' => 'pending',
            'metadata' => ['method' => 'standard'],
        ]);

        return response()->json([
            'checkout_url' => $this->payPal->standardCheckoutUrl($plan, $subscription),
        ]);
    }

    /**
     * Cancel the user's active subscription immediately.
     */
    public function cancel(Request $request): JsonResponse
    {
        $subscription = $request->user()->activeSubscription();

        if ($subscription === null) {
            return response()->json(['message' => 'You do not have an active subscription to cancel.'], 422);
        }

        $subscription->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}
