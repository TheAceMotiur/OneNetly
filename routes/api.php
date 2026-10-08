<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeviceTokenController;
use App\Http\Controllers\Api\DriveController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);

    Route::patch('account/profile', [AccountController::class, 'updateProfile']);
    Route::put('account/password', [AccountController::class, 'updatePassword']);
    Route::delete('account', [AccountController::class, 'destroy']);

    Route::get('notifications', [NotificationController::class, 'index']);
    Route::get('notifications/unread-count', [NotificationController::class, 'unreadCount']);
    Route::post('notifications/{id}/read', [NotificationController::class, 'markRead']);
    Route::post('notifications/read-all', [NotificationController::class, 'markAllRead']);

    Route::post('device-tokens', [DeviceTokenController::class, 'store']);
    Route::delete('device-tokens', [DeviceTokenController::class, 'destroy']);

    Route::get('drive', [DriveController::class, 'index']);
    Route::get('drive/storage', [DriveController::class, 'storage']);
    Route::get('drive/folders', [DriveController::class, 'allFolders']);
    Route::post('drive/folders', [DriveController::class, 'createFolder']);
    Route::post('drive/upload', [DriveController::class, 'upload']);
    Route::post('drive/backup-upload', [DriveController::class, 'backupUpload']);
    Route::get('drive/backup-status', [DriveController::class, 'backupStatus']);
    Route::get('drive/items/{item}/download', [DriveController::class, 'download']);
    Route::patch('drive/items/{item}/star', [DriveController::class, 'toggleStar']);
    Route::patch('drive/items/{item}/rename', [DriveController::class, 'rename']);
    Route::patch('drive/items/{item}/move', [DriveController::class, 'move']);
    Route::patch('drive/items/{item}/restore', [DriveController::class, 'restore']);
    Route::post('drive/items/{item}/duplicate', [DriveController::class, 'duplicate']);
    Route::post('drive/items/{item}/share', [DriveController::class, 'share']);
    Route::delete('drive/items/{item}/share', [DriveController::class, 'unshare']);
    Route::delete('drive/items/{item}', [DriveController::class, 'destroy']);
    Route::post('drive/bulk-share', [DriveController::class, 'bulkShare']);
    Route::post('drive/download-zip', [DriveController::class, 'downloadZip']);

    Route::get('subscriptions/plans', [SubscriptionController::class, 'index']);
    Route::post('subscriptions/{plan}/orders', [SubscriptionController::class, 'createOrder']);
    Route::post('subscriptions/orders/{orderId}/capture', [SubscriptionController::class, 'captureOrder']);
    Route::post('subscriptions/{plan}/standard-checkout', [SubscriptionController::class, 'standardCheckout']);
    Route::post('subscriptions/cancel', [SubscriptionController::class, 'cancel']);
});
