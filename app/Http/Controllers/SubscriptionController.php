<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Services\PayPalSubscriptionService;
use Carbon\CarbonInterval;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SubscriptionController extends Controller
{
    public function __construct(protected PayPalSubscriptionService $payPal) {}

    /**
     * Display the pricing / subscription page.
     */
    public function index(Request $request): Response
    {
        $plans = SubscriptionPlan::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $settings = AppSetting::current();

        return Inertia::render('Pricing', [
            'plans' => $plans,
            'activeSubscription' => $request->user()?->activeSubscription()?->load('plan'),
            'paypalClientId' => $settings->paypal_client_id,
            'paypalConfigured' => $settings->paypalIsConfigured(),
            'paypalMethod' => $settings->paypalMethod(),
        ]);
    }

    /**
     * Redirect the user to a PayPal Payments Standard checkout (email-only,
     * no API credentials required) for the given plan.
     */
    public function standardCheckout(Request $request, SubscriptionPlan $plan): RedirectResponse
    {
        if ($plan->isFree()) {
            return redirect()->route('subscriptions.index')->with('error', 'Free plans do not require checkout.');
        }

        $settings = AppSetting::current();

        if ($settings->paypalMethod() !== 'standard') {
            return redirect()->route('subscriptions.index')->with('error', 'PayPal Standard checkout is not configured.');
        }

        $subscription = $request->user()->subscriptions()->create([
            'subscription_plan_id' => $plan->id,
            'provider' => 'paypal',
            'status' => 'pending',
            'metadata' => ['method' => 'standard'],
        ]);

        return redirect()->away($this->payPal->standardCheckoutUrl($plan, $subscription));
    }

    /**
     * Create a PayPal order for the given plan.
     */
    public function createOrder(SubscriptionPlan $plan): JsonResponse
    {
        if ($plan->isFree()) {
            return response()->json(['message' => 'Free plans do not require checkout.'], 422);
        }

        $order = $this->payPal->createOrder($plan);

        return response()->json(['id' => $order['id']]);
    }

    /**
     * Capture a PayPal order and activate the user's subscription.
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
     * Cancel the user's active subscription immediately.
     */
    public function cancel(Request $request): RedirectResponse
    {
        $subscription = $request->user()->activeSubscription();

        if ($subscription === null) {
            return back()->with('error', 'You do not have an active subscription to cancel.');
        }

        $subscription->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return back()->with('status', 'Your subscription has been cancelled.');
    }
}
