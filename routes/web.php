<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDriveAccountController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\MonetizationSettingsController;
use App\Http\Controllers\Admin\SubscriptionController as AdminSubscriptionController;
use App\Http\Controllers\Admin\SubscriptionPlanController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\PayPalIpnController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('terms', 'legal/Terms')->name('legal.terms');
Route::inertia('privacy', 'legal/Privacy')->name('legal.privacy');
Route::inertia('dmca', 'legal/Dmca')->name('legal.dmca');
Route::inertia('acceptable-use', 'legal/AcceptableUse')->name('legal.acceptable-use');
Route::inertia('contact', 'legal/Contact')->name('legal.contact');

Route::get('pricing', [SubscriptionController::class, 'index'])->name('subscriptions.index');

// Lightweight static pages the mobile app's WebView watches for during PayPal
// checkout, so it knows when to close the browser and finish the purchase.
Route::view('subscriptions/mobile-return', 'subscriptions.mobile-return')->name('subscriptions.mobile-return');
Route::view('subscriptions/mobile-cancel', 'subscriptions.mobile-cancel')->name('subscriptions.mobile-cancel');

// Public shared file routes (no auth required)
Route::get('drive/s/{token}', [DriveController::class, 'publicShow'])->name('drive.public.show');
Route::get('drive/public/{token}', [DriveController::class, 'publicDownload'])->name('drive.public.download');
Route::get('drive/public/{token}/preview', [DriveController::class, 'publicPreview'])->name('drive.public.preview');

// Public PayPal IPN webhook (no auth, CSRF-exempt, see bootstrap/app.php)
Route::post('webhooks/paypal/ipn', [PayPalIpnController::class, 'handle'])->name('webhooks.paypal-ipn');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DriveController::class, 'index'])->name('dashboard');

    Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
        Route::post('{plan}/orders', [SubscriptionController::class, 'createOrder'])->name('orders.create');
        Route::post('orders/{orderId}/capture', [SubscriptionController::class, 'captureOrder'])->name('orders.capture');
        Route::get('{plan}/paypal-standard', [SubscriptionController::class, 'standardCheckout'])->name('standard-checkout');
        Route::post('cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
    });

    Route::prefix('drive')->name('drive.')->group(function () {

        Route::post('folders', [DriveController::class, 'createFolder'])->name('folders.store');
        Route::post('upload', [DriveController::class, 'upload'])->name('upload');
        Route::post('bulk', [DriveController::class, 'bulkAction'])->name('bulk');
        Route::patch('items/{item}/rename', [DriveController::class, 'rename'])->name('items.rename');
        Route::patch('items/{item}/move', [DriveController::class, 'move'])->name('items.move');
        Route::patch('items/{item}/star', [DriveController::class, 'toggleStar'])->name('items.star');
        Route::patch('items/{item}/restore', [DriveController::class, 'restore'])->name('items.restore');
        Route::post('items/{item}/duplicate', [DriveController::class, 'duplicate'])->name('items.duplicate');
        Route::post('items/{item}/share', [DriveController::class, 'share'])->name('items.share');
        Route::delete('items/{item}/unshare', [DriveController::class, 'unshare'])->name('items.unshare');
        Route::delete('items/{item}', [DriveController::class, 'destroy'])->name('items.destroy');
        Route::get('items/{item}/preview', [DriveController::class, 'preview'])->name('items.preview');
        Route::get('items/{item}/download', [DriveController::class, 'download'])->name('items.download');
    });
});

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::redirect('/', '/admin/dashboard');
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
        Route::patch('users/{user}/role', [AdminUserController::class, 'updateRole'])->name('users.update-role');
        Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

        Route::get('drive-accounts', [AdminDriveAccountController::class, 'index'])->name('drive-accounts.index');
        Route::post('drive-accounts', [AdminDriveAccountController::class, 'store'])->name('drive-accounts.store');
        Route::post('drive-accounts/sync-all', [AdminDriveAccountController::class, 'syncAllQuotas'])->name('drive-accounts.sync-all');
        Route::post('drive-accounts/test-credentials', [AdminDriveAccountController::class, 'testCredentials'])->name('drive-accounts.test-credentials');
        Route::post('drive-accounts/{driveAccount}/test', [AdminDriveAccountController::class, 'test'])->name('drive-accounts.test');
        Route::post('drive-accounts/{driveAccount}/sync', [AdminDriveAccountController::class, 'syncQuota'])->name('drive-accounts.sync');
        Route::patch('drive-accounts/{driveAccount}/priority', [AdminDriveAccountController::class, 'updatePriority'])->name('drive-accounts.priority');
        Route::put('drive-accounts/{driveAccount}', [AdminDriveAccountController::class, 'update'])->name('drive-accounts.update');
        Route::patch('drive-accounts/{driveAccount}/toggle', [AdminDriveAccountController::class, 'toggleStatus'])->name('drive-accounts.toggle');
        Route::delete('drive-accounts/{driveAccount}', [AdminDriveAccountController::class, 'destroy'])->name('drive-accounts.destroy');

        Route::get('subscription-plans', [SubscriptionPlanController::class, 'index'])->name('subscription-plans.index');
        Route::post('subscription-plans', [SubscriptionPlanController::class, 'store'])->name('subscription-plans.store');
        Route::put('subscription-plans/{subscriptionPlan}', [SubscriptionPlanController::class, 'update'])->name('subscription-plans.update');
        Route::patch('subscription-plans/{subscriptionPlan}/toggle', [SubscriptionPlanController::class, 'toggleStatus'])->name('subscription-plans.toggle');
        Route::delete('subscription-plans/{subscriptionPlan}', [SubscriptionPlanController::class, 'destroy'])->name('subscription-plans.destroy');

        Route::get('subscriptions', [AdminSubscriptionController::class, 'index'])->name('subscriptions.index');
        Route::patch('subscriptions/{subscription}/cancel', [AdminSubscriptionController::class, 'cancel'])->name('subscriptions.cancel');

        Route::get('notifications', [AdminNotificationController::class, 'index'])->name('notifications.index');
        Route::post('notifications/broadcast', [AdminNotificationController::class, 'broadcast'])->name('notifications.broadcast');

        Route::get('settings/monetization', [MonetizationSettingsController::class, 'edit'])->name('settings.monetization.edit');
        Route::put('settings/monetization/paypal', [MonetizationSettingsController::class, 'updatePaypal'])->name('settings.monetization.paypal');
        Route::put('settings/monetization/adsense', [MonetizationSettingsController::class, 'updateAdsense'])->name('settings.monetization.adsense');
        Route::post('settings/monetization/paypal/test', [MonetizationSettingsController::class, 'testPaypal'])->name('settings.monetization.paypal-test');
    });

require __DIR__.'/settings.php';
