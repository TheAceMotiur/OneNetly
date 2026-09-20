<?php

use App\Models\AppSetting;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Support\Facades\Http;

test('pricing page lists active subscription plans', function () {
    SubscriptionPlan::factory()->create(['is_active' => true, 'name' => 'Pro Monthly']);
    SubscriptionPlan::factory()->create(['is_active' => false, 'name' => 'Hidden Plan']);

    $response = $this->get(route('subscriptions.index'));

    $response->assertOk();
});

test('guest is redirected to login when creating a paypal order', function () {
    $plan = SubscriptionPlan::factory()->create(['price' => 9.99]);

    $response = $this->post(route('subscriptions.orders.create', $plan));

    $response->assertRedirect(route('login'));
});

test('free plans cannot be checked out via paypal', function () {
    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->free()->create();

    $response = $this->actingAs($user)->post(route('subscriptions.orders.create', $plan));

    $response->assertStatus(422);
});

test('authenticated user can create and capture a paypal order to activate a subscription', function () {
    AppSetting::current()->update([
        'paypal_client_id' => 'test-client-id',
        'paypal_client_secret' => 'test-client-secret',
    ]);

    Http::fake([
        'https://api-m.sandbox.paypal.com/v1/oauth2/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://api-m.sandbox.paypal.com/v2/checkout/orders' => Http::response(['id' => 'ORDER123'], 201),
        'https://api-m.sandbox.paypal.com/v2/checkout/orders/ORDER123/capture' => Http::response([
            'status' => 'COMPLETED',
            'purchase_units' => [
                ['payments' => ['captures' => [['id' => 'CAPTURE123']]]],
            ],
        ], 200),
    ]);

    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create(['price' => 9.99, 'interval' => 'month']);

    $createResponse = $this->actingAs($user)->post(route('subscriptions.orders.create', $plan));
    $createResponse->assertOk();
    $createResponse->assertJson(['id' => 'ORDER123']);

    $captureResponse = $this->actingAs($user)->post(route('subscriptions.orders.capture', 'ORDER123'), [
        'plan_id' => $plan->id,
    ]);

    $captureResponse->assertOk();

    expect($user->fresh()->hasActiveSubscription())->toBeTrue();
    $subscription = Subscription::where('user_id', $user->id)->first();
    expect($subscription->status)->toBe('active');
    expect($subscription->metadata['paypal_capture_id'])->toBe('CAPTURE123');
});

test('user can cancel their active subscription', function () {
    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create();
    Subscription::factory()->for($user)->for($plan, 'plan')->create(['status' => 'active']);

    $response = $this->actingAs($user)->post(route('subscriptions.cancel'));

    $response->assertRedirect();
    expect($user->fresh()->hasActiveSubscription())->toBeFalse();
});

test('email-only paypal setup redirects to a standard checkout and creates a pending subscription', function () {
    AppSetting::current()->update([
        'paypal_client_id' => null,
        'paypal_client_secret' => null,
        'paypal_receiver_email' => 'owner@example.com',
    ]);

    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create(['price' => 9.99]);

    $response = $this->actingAs($user)->get(route('subscriptions.standard-checkout', $plan));

    $response->assertRedirect();
    expect($response->headers->get('Location'))->toContain('paypal.com/cgi-bin/webscr');

    $subscription = Subscription::where('user_id', $user->id)->where('subscription_plan_id', $plan->id)->first();
    expect($subscription)->not->toBeNull();
    expect($subscription->status)->toBe('pending');
});

test('paypal ipn activates a pending subscription once verified and completed', function () {
    AppSetting::current()->update([
        'paypal_client_id' => null,
        'paypal_client_secret' => null,
        'paypal_receiver_email' => 'owner@example.com',
    ]);

    Http::fake([
        'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr' => Http::response('VERIFIED', 200),
    ]);

    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create(['price' => 9.99, 'interval' => 'month']);
    $subscription = Subscription::factory()->for($user)->for($plan, 'plan')->create([
        'status' => 'pending',
        'provider' => 'paypal',
        'provider_subscription_id' => null,
    ]);

    $response = $this->post(route('webhooks.paypal-ipn'), [
        'custom' => $subscription->id,
        'business' => 'owner@example.com',
        'payment_status' => 'Completed',
        'txn_id' => 'TXN123',
        'mc_gross' => '9.99',
        'mc_currency' => 'USD',
        'payer_email' => 'payer@example.com',
    ]);

    $response->assertOk();
    expect($subscription->fresh()->status)->toBe('active');
    expect($subscription->fresh()->provider_subscription_id)->toBe('TXN123');
    expect($user->fresh()->hasActiveSubscription())->toBeTrue();
});

test('paypal ipn is rejected when verification fails', function () {
    AppSetting::current()->update([
        'paypal_client_id' => null,
        'paypal_client_secret' => null,
        'paypal_receiver_email' => 'owner@example.com',
    ]);

    Http::fake([
        'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr' => Http::response('INVALID', 200),
    ]);

    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create();
    $subscription = Subscription::factory()->for($user)->for($plan, 'plan')->create(['status' => 'pending']);

    $response = $this->post(route('webhooks.paypal-ipn'), [
        'custom' => $subscription->id,
        'business' => 'owner@example.com',
        'payment_status' => 'Completed',
    ]);

    $response->assertStatus(400);
    expect($subscription->fresh()->status)->toBe('pending');
});

test('subscribed users do not see ads while free users do when ads are enabled', function () {
    AppSetting::current()->update([
        'adsense_enabled' => true,
        'adsense_client_id' => 'ca-pub-12345',
    ]);

    $freeUser = User::factory()->create();
    $subscribedUser = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create();
    Subscription::factory()->for($subscribedUser)->for($plan, 'plan')->create(['status' => 'active']);

    $this->actingAs($freeUser)->get(route('dashboard'))->assertInertia(
        fn ($page) => $page->where('auth.hasActiveSubscription', false)
    );

    $this->actingAs($subscribedUser)->get(route('dashboard'))->assertInertia(
        fn ($page) => $page->where('auth.hasActiveSubscription', true)
    );
});
