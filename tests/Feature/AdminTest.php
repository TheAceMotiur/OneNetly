<?php

use App\Models\AppSetting;
use App\Models\GoogleDriveAccount;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Support\Facades\Http;

test('guests are redirected to the login page when accessing admin dashboard', function () {
    $response = $this->get(route('admin.dashboard'));
    $response->assertRedirect(route('login'));
});

test('non-admin users receive forbidden status when accessing admin dashboard', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = $this->actingAs($user)->get(route('admin.dashboard'));
    $response->assertForbidden();
});

test('admin users can access the admin dashboard', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));
    $response->assertOk();
});

test('admin users can access the admin user management list', function () {
    $admin = User::factory()->admin()->create();
    User::factory()->count(3)->create();

    $response = $this->actingAs($admin)->get(route('admin.users.index'));
    $response->assertOk();
});

test('admin can promote a user to admin', function () {
    $admin = User::factory()->admin()->create();
    $user = User::factory()->create(['is_admin' => false]);

    $response = $this->actingAs($admin)->patch(route('admin.users.update-role', $user), [
        'is_admin' => true,
    ]);

    $response->assertRedirect();
    expect($user->fresh()->is_admin)->toBeTrue();
});

test('admin can demote another admin', function () {
    $admin1 = User::factory()->admin()->create();
    $admin2 = User::factory()->admin()->create();

    $response = $this->actingAs($admin1)->patch(route('admin.users.update-role', $admin2), [
        'is_admin' => false,
    ]);

    $response->assertRedirect();
    expect($admin2->fresh()->is_admin)->toBeFalse();
});

test('admin cannot demote their own account', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->patch(route('admin.users.update-role', $admin), [
        'is_admin' => false,
    ]);

    $response->assertRedirect();
    expect($admin->fresh()->is_admin)->toBeTrue();
    $response->assertSessionHas('error');
});

test('admin can delete a user', function () {
    $admin = User::factory()->admin()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $user));

    $response->assertRedirect();
    expect(User::find($user->id))->toBeNull();
});

test('admin cannot delete their own account via admin panel', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $admin));

    $response->assertRedirect();
    expect(User::find($admin->id))->not->toBeNull();
    $response->assertSessionHas('error');
});

test('regular users cannot update user roles or delete users', function () {
    $user1 = User::factory()->create(['is_admin' => false]);
    $user2 = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user1)
        ->patch(route('admin.users.update-role', $user2), ['is_admin' => true])
        ->assertForbidden();

    $this->actingAs($user1)
        ->delete(route('admin.users.destroy', $user2))
        ->assertForbidden();

    expect($user2->fresh()->is_admin)->toBeFalse();
    expect(User::find($user2->id))->not->toBeNull();
});

test('non-admin users cannot access drive accounts', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get(route('admin.drive-accounts.index'))
        ->assertForbidden();
});

test('admin can view drive accounts list', function () {
    $admin = User::factory()->admin()->create();
    GoogleDriveAccount::factory()->count(3)->create();

    $this->actingAs($admin)
        ->get(route('admin.drive-accounts.index'))
        ->assertOk();
});

test('admin can create a drive account', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->post(route('admin.drive-accounts.store'), [
        'name' => 'Main Production Drive',
        'email' => 'production@gmail.com',
        'client_id' => '123456.apps.googleusercontent.com',
        'client_secret' => 'GOCSPX-secret123',
        'refresh_token' => '1//refresh-token-xyz',
        'is_active' => true,
    ]);

    $response->assertRedirect();
    $account = GoogleDriveAccount::where('name', 'Main Production Drive')->first();
    expect($account)->not->toBeNull();
    expect($account->client_id)->toBe('123456.apps.googleusercontent.com');
    expect($account->client_secret)->toBe('GOCSPX-secret123');
    expect($account->refresh_token)->toBe('1//refresh-token-xyz');
});

test('admin can update a drive account', function () {
    $admin = User::factory()->admin()->create();
    $account = GoogleDriveAccount::factory()->create([
        'name' => 'Old Drive Name',
    ]);

    $response = $this->actingAs($admin)->put(route('admin.drive-accounts.update', $account), [
        'name' => 'New Drive Name',
        'email' => 'new@gmail.com',
        'client_id' => 'updated-client-id.apps.googleusercontent.com',
        'client_secret' => 'updated-secret',
        'refresh_token' => 'updated-refresh',
        'is_active' => false,
    ]);

    $response->assertRedirect();
    $account->refresh();
    expect($account->name)->toBe('New Drive Name');
    expect($account->client_id)->toBe('updated-client-id.apps.googleusercontent.com');
    expect($account->client_secret)->toBe('updated-secret');
    expect($account->refresh_token)->toBe('updated-refresh');
    expect($account->is_active)->toBeFalse();
});

test('admin can toggle a drive account status', function () {
    $admin = User::factory()->admin()->create();
    $account = GoogleDriveAccount::factory()->create([
        'is_active' => true,
    ]);

    $response = $this->actingAs($admin)->patch(route('admin.drive-accounts.toggle', $account));
    $response->assertRedirect();
    expect($account->fresh()->is_active)->toBeFalse();

    $this->actingAs($admin)->patch(route('admin.drive-accounts.toggle', $account));
    expect($account->fresh()->is_active)->toBeTrue();
});

test('admin can delete a drive account', function () {
    $admin = User::factory()->admin()->create();
    $account = GoogleDriveAccount::factory()->create();

    $response = $this->actingAs($admin)->delete(route('admin.drive-accounts.destroy', $account));
    $response->assertRedirect();
    expect(GoogleDriveAccount::find($account->id))->toBeNull();
});

test('admin can test connection of an existing drive account', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response([
            'access_token' => 'mock_access_token',
            'expires_in' => 3600,
            'token_type' => 'Bearer',
        ], 200),
        'https://www.googleapis.com/drive/v3/about*' => Http::response([
            'user' => [
                'displayName' => 'Google User',
                'emailAddress' => 'user@gmail.com',
                'photoLink' => 'https://example.com/photo.jpg',
            ],
            'storageQuota' => [
                'limit' => '16106127360',
                'usage' => '5368709120',
                'usageInDrive' => '2147483648',
            ],
        ], 200),
    ]);

    $admin = User::factory()->admin()->create();
    $account = GoogleDriveAccount::factory()->create();

    $response = $this->actingAs($admin)->postJson(route('admin.drive-accounts.test', $account));

    $response->assertOk()
        ->assertJson([
            'success' => true,
            'account' => [
                'name' => 'Google User',
                'email' => 'user@gmail.com',
            ],
        ]);
});

test('admin receives error message when testing failed drive credentials', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response([
            'error' => 'invalid_grant',
            'error_description' => 'Token has been expired or revoked.',
        ], 400),
    ]);

    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->postJson(route('admin.drive-accounts.test-credentials'), [
        'client_id' => 'wrong_client_id',
        'client_secret' => 'wrong_client_secret',
        'refresh_token' => 'expired_refresh_token',
    ]);

    $response->assertOk()
        ->assertJson([
            'success' => false,
            'message' => 'Token has been expired or revoked.',
        ]);
});

test('admin can update account priority and sync quotas', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/drive/v3/about*' => Http::response([
            'storageQuota' => [
                'limit' => '16106127360',
                'usage' => '1073741824',
            ],
        ], 200),
    ]);

    $admin = User::factory()->admin()->create();
    $account = GoogleDriveAccount::factory()->create(['priority' => 1]);

    // Update Priority
    $this->actingAs($admin)->patch(route('admin.drive-accounts.priority', $account), [
        'priority' => 3,
    ])->assertRedirect();
    expect($account->fresh()->priority)->toBe(3);

    // Sync Quota
    $this->actingAs($admin)->post(route('admin.drive-accounts.sync', $account))->assertRedirect();
    expect($account->fresh()->total_storage_bytes)->toBe(16106127360);
    expect($account->fresh()->used_storage_bytes)->toBe(1073741824);
});

test('scheduled command auto-syncs quotas for all active drive accounts', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/drive/v3/about*' => Http::response([
            'storageQuota' => [
                'limit' => '16106127360',
                'usage' => '1073741824',
            ],
        ], 200),
    ]);

    $active = GoogleDriveAccount::factory()->create(['is_active' => true, 'total_storage_bytes' => null]);
    $inactive = GoogleDriveAccount::factory()->create(['is_active' => false, 'total_storage_bytes' => null]);

    $this->artisan('drive:sync-quotas')->assertSuccessful();

    expect($active->fresh()->total_storage_bytes)->toBe(16106127360);
    expect($inactive->fresh()->total_storage_bytes)->toBeNull();
});

test('admin can create, update, toggle, and delete subscription plans', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)->get(route('admin.subscription-plans.index'))->assertOk();

    $this->actingAs($admin)->post(route('admin.subscription-plans.store'), [
        'name' => 'Pro Monthly',
        'price' => 4.99,
        'currency' => 'USD',
        'interval' => 'month',
        'features' => ['Ad-free', 'Priority support'],
        'is_active' => true,
        'is_featured' => false,
        'sort_order' => 1,
        'storage_gb' => 100,
    ])->assertRedirect();

    $plan = SubscriptionPlan::where('name', 'Pro Monthly')->firstOrFail();
    expect($plan->slug)->toBe('pro-monthly');
    expect($plan->storage_gb)->toBe(100);

    $this->actingAs($admin)->put(route('admin.subscription-plans.update', $plan), [
        'name' => 'Pro Monthly',
        'price' => 6.99,
        'currency' => 'USD',
        'interval' => 'month',
        'is_active' => true,
        'is_featured' => true,
        'sort_order' => 1,
    ])->assertRedirect();
    expect($plan->fresh()->price)->toEqual(6.99);

    $this->actingAs($admin)->patch(route('admin.subscription-plans.toggle', $plan))->assertRedirect();
    expect($plan->fresh()->is_active)->toBeFalse();

    $this->actingAs($admin)->delete(route('admin.subscription-plans.destroy', $plan))->assertRedirect();
    expect(SubscriptionPlan::find($plan->id))->toBeNull();
});

test('admin cannot delete a plan with active subscribers', function () {
    $admin = User::factory()->admin()->create();
    $plan = SubscriptionPlan::factory()->create();
    Subscription::factory()->for($plan, 'plan')->create(['status' => 'active']);

    $this->actingAs($admin)->delete(route('admin.subscription-plans.destroy', $plan))->assertRedirect();

    expect(SubscriptionPlan::find($plan->id))->not->toBeNull();
});

test('admin can view and cancel subscriptions', function () {
    $admin = User::factory()->admin()->create();
    $plan = SubscriptionPlan::factory()->create();
    $subscription = Subscription::factory()->for($plan, 'plan')->create(['status' => 'active']);

    $this->actingAs($admin)->get(route('admin.subscriptions.index'))->assertOk();

    $this->actingAs($admin)->patch(route('admin.subscriptions.cancel', $subscription))->assertRedirect();
    expect($subscription->fresh()->status)->toBe('cancelled');
});

test('admin can update paypal and adsense monetization settings', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)->get(route('admin.settings.monetization.edit'))->assertOk();

    $this->actingAs($admin)->put(route('admin.settings.monetization.paypal'), [
        'paypal_mode' => 'live',
        'paypal_client_id' => 'live-client-id',
        'paypal_client_secret' => 'live-secret',
        'paypal_receiver_email' => 'owner@example.com',
    ])->assertRedirect();

    $settings = AppSetting::current();
    expect($settings->paypal_mode)->toBe('live');
    expect($settings->paypal_client_id)->toBe('live-client-id');

    $this->actingAs($admin)->put(route('admin.settings.monetization.adsense'), [
        'adsense_client_id' => 'ca-pub-999',
        'adsense_enabled' => true,
        'adsense_auto_ads' => false,
        'adsense_slot_header' => '111',
        'adsense_slot_infeed' => '222',
    ])->assertRedirect();

    expect(AppSetting::current()->adsense_enabled)->toBeTrue();
    expect(AppSetting::current()->adsense_client_id)->toBe('ca-pub-999');
});
