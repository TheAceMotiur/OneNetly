<?php

use App\Models\AppSetting;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Support\Facades\Http;

test('subscription endpoints require authentication', function () {
    $this->getJson('/api/subscriptions/plans')->assertUnauthorized();
});

test('a user can list active plans and their current subscription via the api', function () {
    $user = User::factory()->create();
    SubscriptionPlan::factory()->create(['is_active' => true, 'name' => 'Pro Monthly']);
    SubscriptionPlan::factory()->create(['is_active' => false, 'name' => 'Hidden Plan']);

    $response = $this->actingAs($user, 'sanctum')->getJson('/api/subscriptions/plans');

    $response->assertOk()
        ->assertJsonCount(1, 'plans')
        ->assertJsonPath('plans.0.name', 'Pro Monthly')
        ->assertJsonPath('active_subscription', null);
});

test('free plans cannot be checked out via the api', function () {
    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->free()->create();

    $this->actingAs($user, 'sanctum')->postJson("/api/subscriptions/{$plan->id}/orders")
        ->assertStatus(422);
});

test('a user can create and capture a paypal order via the api to activate a subscription', function () {
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

    $createResponse = $this->actingAs($user, 'sanctum')->postJson("/api/subscriptions/{$plan->id}/orders");
    $createResponse->assertOk()->assertJson(['id' => 'ORDER123']);

    $captureResponse = $this->actingAs($user, 'sanctum')->postJson('/api/subscriptions/orders/ORDER123/capture', [
        'plan_id' => $plan->id,
    ]);
    $captureResponse->assertOk()->assertJsonPath('subscription.status', 'active');

    expect($user->fresh()->hasActiveSubscription())->toBeTrue();
    $subscription = Subscription::where('user_id', $user->id)->first();
    expect($subscription->metadata['paypal_capture_id'])->toBe('CAPTURE123');
});

test('a user can cancel their active subscription via the api', function () {
    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create();
    Subscription::factory()->for($user)->for($plan, 'plan')->create(['status' => 'active']);

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/subscriptions/cancel');

    $response->assertOk()->assertJson(['success' => true]);
    expect($user->fresh()->hasActiveSubscription())->toBeFalse();
});

test('cancelling with no active subscription returns an error via the api', function () {
    $user = User::factory()->create();

    $this->actingAs($user, 'sanctum')->postJson('/api/subscriptions/cancel')
        ->assertStatus(422);
});

test('standard checkout via the api creates a pending subscription and returns a checkout url', function () {
    AppSetting::current()->update([
        'paypal_client_id' => null,
        'paypal_client_secret' => null,
        'paypal_receiver_email' => 'owner@example.com',
    ]);

    $user = User::factory()->create();
    $plan = SubscriptionPlan::factory()->create(['price' => 9.99]);

    $response = $this->actingAs($user, 'sanctum')->postJson("/api/subscriptions/{$plan->id}/standard-checkout");

    $response->assertOk();
    expect($response->json('checkout_url'))->toContain('paypal.com/cgi-bin/webscr');

    $subscription = Subscription::where('user_id', $user->id)->where('subscription_plan_id', $plan->id)->first();
    expect($subscription)->not->toBeNull();
    expect($subscription->status)->toBe('pending');
});
