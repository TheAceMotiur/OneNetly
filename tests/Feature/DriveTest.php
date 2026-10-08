<?php

use App\Models\DriveItem;
use App\Models\GoogleDriveAccount;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

test('authenticated user can view their drive dashboard with items', function () {
    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id, 'name' => 'Documents']);
    $file = DriveItem::factory()->create(['user_id' => $user->id, 'name' => 'Report.pdf']);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
});

test('user can create a folder', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('drive.folders.store'), [
        'name' => 'Invoices',
    ]);

    $response->assertRedirect();
    expect(DriveItem::where('user_id', $user->id)->where('name', 'Invoices')->where('type', 'folder')->exists())->toBeTrue();
});

test('folders are virtual and are not created in google drive', function () {
    $account = GoogleDriveAccount::factory()->create(['is_active' => true]);
    $user = User::factory()->create();
    $parent = DriveItem::factory()->folder()->create([
        'user_id' => $user->id,
    ]);

    $response = $this->actingAs($user)->post(route('drive.folders.store'), [
        'name' => 'Subfolder',
        'parent_id' => $parent->id,
    ]);

    $response->assertRedirect();
    $created = DriveItem::where('user_id', $user->id)->where('name', 'Subfolder')->first();
    expect($created)->not->toBeNull();
    expect($created->parent_id)->toBe($parent->id);
    expect($created->google_drive_file_id)->toBeNull();
    expect($created->google_drive_account_id)->toBeNull();
});

test('user can upload a file', function () {
    Storage::fake('local');
    $user = User::factory()->create();
    $file = UploadedFile::fake()->create('contract.pdf', 100);

    $response = $this->actingAs($user)->post(route('drive.upload'), [
        'files' => [$file],
    ]);

    $response->assertRedirect();
    $uploaded = DriveItem::where('user_id', $user->id)->where('name', 'contract.pdf')->first();
    expect($uploaded)->not->toBeNull();
    expect($uploaded->type)->toBe('file');
});

test('upload is rejected once the user exceeds their plan storage quota', function () {
    Storage::fake('local');

    SubscriptionPlan::factory()->free()->create(['storage_gb' => 1]);
    $user = User::factory()->create();
    DriveItem::factory()->create([
        'user_id' => $user->id,
        'size' => 1024 * 1024 * 1024 - 500, // just under 1 GB already used
    ]);

    $file = UploadedFile::fake()->create('too-big.pdf', 2048); // 2MB, pushes past the 1GB quota

    $response = $this->actingAs($user)->post(route('drive.upload'), [
        'files' => [$file],
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('error');
    expect(DriveItem::where('user_id', $user->id)->where('name', 'too-big.pdf')->exists())->toBeFalse();
});

test('user can upload file to google drive when active account exists', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/upload/drive/v3/files*' => Http::response([
            'id' => 'g_file_999',
            'name' => 'slide.pptx',
            'mimeType' => 'application/vnd.ms-powerpoint',
            'size' => 2048,
        ], 200),
    ]);

    GoogleDriveAccount::factory()->create(['is_active' => true]);
    $user = User::factory()->create();
    $file = UploadedFile::fake()->create('slide.pptx', 2048);

    $response = $this->actingAs($user)->post(route('drive.upload'), [
        'files' => [$file],
    ]);

    $response->assertRedirect();
    $uploaded = DriveItem::where('user_id', $user->id)->where('name', 'slide.pptx')->first();
    expect($uploaded)->not->toBeNull();
    expect($uploaded->google_drive_file_id)->toBe('g_file_999');
});

test('user can rename a drive item', function () {
    $user = User::factory()->create();
    $item = DriveItem::factory()->create(['user_id' => $user->id, 'name' => 'Old.pdf']);

    $response = $this->actingAs($user)->patch(route('drive.items.rename', $item), [
        'name' => 'NewName.pdf',
    ]);

    $response->assertRedirect();
    expect($item->fresh()->name)->toBe('NewName.pdf');
});

test('user cannot rename another user item', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $item = DriveItem::factory()->create(['user_id' => $user1->id, 'name' => 'Private.pdf']);

    $response = $this->actingAs($user2)->patch(route('drive.items.rename', $item), [
        'name' => 'Hacked.pdf',
    ]);

    $response->assertForbidden();
    expect($item->fresh()->name)->toBe('Private.pdf');
});

test('user can move an item into another folder', function () {
    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id]);
    $file = DriveItem::factory()->create(['user_id' => $user->id, 'parent_id' => null]);

    $response = $this->actingAs($user)->patch(route('drive.items.move', $file), [
        'parent_id' => $folder->id,
    ]);

    $response->assertRedirect();
    expect($file->fresh()->parent_id)->toBe($folder->id);
});

test('user cannot move a folder into itself', function () {
    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->patch(route('drive.items.move', $folder), [
        'parent_id' => $folder->id,
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('error');
    expect($folder->fresh()->parent_id)->toBeNull();
});

test('user can toggle star on an item', function () {
    $user = User::factory()->create();
    $file = DriveItem::factory()->create(['user_id' => $user->id, 'is_starred' => false]);

    $response = $this->actingAs($user)->patch(route('drive.items.star', $file));
    $response->assertRedirect();
    expect($file->fresh()->is_starred)->toBeTrue();

    $this->actingAs($user)->patch(route('drive.items.star', $file));
    expect($file->fresh()->is_starred)->toBeFalse();
});

test('user can trash, restore and permanently delete a file', function () {
    $user = User::factory()->create();
    $file = DriveItem::factory()->create(['user_id' => $user->id, 'is_trashed' => false]);

    // Trash
    $this->actingAs($user)->delete(route('drive.items.destroy', $file));
    expect($file->fresh()->is_trashed)->toBeTrue();

    // Restore
    $this->actingAs($user)->patch(route('drive.items.restore', $file));
    expect($file->fresh()->is_trashed)->toBeFalse();

    // Permanent delete
    $this->actingAs($user)->delete(route('drive.items.destroy', $file), ['permanent' => true]);
    expect(DriveItem::find($file->id))->toBeNull();
});

test('user can download a file stored on google drive', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/drive/v3/files/g_file_download?alt=media' => Http::response('file content bytes', 200),
    ]);

    $account = GoogleDriveAccount::factory()->create(['is_active' => true]);
    $user = User::factory()->create();
    $file = DriveItem::factory()->create([
        'user_id' => $user->id,
        'google_drive_account_id' => $account->id,
        'google_drive_file_id' => 'g_file_download',
        'name' => 'download.txt',
        'mime_type' => 'text/plain',
        'size' => 18,
    ]);

    $response = $this->actingAs($user)->get(route('drive.items.download', $file));

    $response->assertOk();
});

test('uploads route to second account if first account is full', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/upload/drive/v3/files*' => Http::response([
            'id' => 'g_file_acc2',
            'name' => 'large_video.mp4',
            'mimeType' => 'video/mp4',
            'size' => 50000000,
        ], 200),
    ]);

    // Account 1: Priority 1, but full (15GB total, 14.995GB used)
    $account1 = GoogleDriveAccount::factory()->create([
        'priority' => 1,
        'total_storage_bytes' => 16106127360,
        'used_storage_bytes' => 16100000000,
        'last_synced_at' => now(),
        'is_active' => true,
    ]);

    // Account 2: Priority 2, with plenty of space (15GB total, 2GB used)
    $account2 = GoogleDriveAccount::factory()->create([
        'priority' => 2,
        'total_storage_bytes' => 16106127360,
        'used_storage_bytes' => 2147483648,
        'last_synced_at' => now(),
        'is_active' => true,
    ]);

    $user = User::factory()->create();
    $file = UploadedFile::fake()->create('large_video.mp4', 50000); // 50MB

    $response = $this->actingAs($user)->post(route('drive.upload'), [
        'files' => [$file],
    ]);

    $response->assertRedirect();
    $uploaded = DriveItem::where('user_id', $user->id)->where('name', 'large_video.mp4')->first();
    expect($uploaded)->not->toBeNull();
    // Account 2 should be selected because Account 1 did not have enough space!
    expect($uploaded->google_drive_account_id)->toBe($account2->id);
});

test('uploading into a virtual folder still fails over to another account when the first is full', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/upload/drive/v3/files*' => Http::response([
            'id' => 'g_file_in_folder',
            'name' => 'report.pdf',
            'mimeType' => 'application/pdf',
            'size' => 5000,
        ], 200),
    ]);

    $account1 = GoogleDriveAccount::factory()->create([
        'priority' => 1,
        'total_storage_bytes' => 16106127360,
        'used_storage_bytes' => 16100000000,
        'last_synced_at' => now(),
        'is_active' => true,
    ]);

    $account2 = GoogleDriveAccount::factory()->create([
        'priority' => 2,
        'total_storage_bytes' => 16106127360,
        'used_storage_bytes' => 2147483648,
        'last_synced_at' => now(),
        'is_active' => true,
    ]);

    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id, 'name' => 'Example']);
    $file = UploadedFile::fake()->create('report.pdf', 5);

    $response = $this->actingAs($user)->post(route('drive.upload'), [
        'files' => [$file],
        'parent_id' => $folder->id,
    ]);

    $response->assertRedirect();
    $uploaded = DriveItem::where('user_id', $user->id)->where('name', 'report.pdf')->first();
    expect($uploaded)->not->toBeNull();
    expect($uploaded->parent_id)->toBe($folder->id);
    expect($uploaded->google_drive_account_id)->toBe($account2->id);
});

test('user can duplicate a file', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/drive/v3/files/g_orig/copy' => Http::response([
            'id' => 'g_copy_123',
            'name' => 'Copy of presentation.pdf',
        ], 200),
    ]);

    $account = GoogleDriveAccount::factory()->create(['is_active' => true]);
    $user = User::factory()->create();
    $file = DriveItem::factory()->create([
        'user_id' => $user->id,
        'google_drive_account_id' => $account->id,
        'google_drive_file_id' => 'g_orig',
        'name' => 'presentation.pdf',
    ]);

    $response = $this->actingAs($user)->post(route('drive.items.duplicate', $file));
    $response->assertRedirect();

    $copy = DriveItem::where('user_id', $user->id)->where('name', 'Copy of presentation.pdf')->first();
    expect($copy)->not->toBeNull();
    expect($copy->google_drive_file_id)->toBe('g_copy_123');
});

test('user can create and revoke share link and public guest can download', function () {
    Http::fake([
        'https://oauth2.googleapis.com/token' => Http::response(['access_token' => 'mock_token'], 200),
        'https://www.googleapis.com/drive/v3/files/g_shared_file?alt=media' => Http::response('public shared content', 200),
    ]);

    $account = GoogleDriveAccount::factory()->create(['is_active' => true]);
    $user = User::factory()->create();
    $file = DriveItem::factory()->create([
        'user_id' => $user->id,
        'google_drive_account_id' => $account->id,
        'google_drive_file_id' => 'g_shared_file',
        'name' => 'public_file.txt',
    ]);

    // Generate share link
    $shareResponse = $this->actingAs($user)->postJson(route('drive.items.share', $file));
    $shareResponse->assertOk()->assertJson(['success' => true]);
    $token = $file->fresh()->share_token;
    expect($token)->not->toBeNull();

    // Public download without authentication
    $publicResponse = $this->get(route('drive.public.download', ['token' => $token]));
    $publicResponse->assertOk()
        ->assertHeader('Content-Disposition', 'attachment; filename="public_file.txt"');
    expect($publicResponse->streamedContent())->toBe('public shared content');

    // Revoke share link
    $unshareResponse = $this->actingAs($user)->deleteJson(route('drive.items.unshare', $file));
    $unshareResponse->assertOk();
    expect($file->fresh()->share_token)->toBeNull();
});

test('user can perform bulk actions on drive items', function () {
    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id]);
    $items = DriveItem::factory()->count(3)->create(['user_id' => $user->id, 'parent_id' => null, 'is_starred' => false]);
    $itemIds = $items->pluck('id')->toArray();

    // Bulk Star
    $this->actingAs($user)->post(route('drive.bulk'), [
        'action' => 'star',
        'item_ids' => $itemIds,
    ])->assertRedirect();
    expect(DriveItem::whereIn('id', $itemIds)->where('is_starred', true)->count())->toBe(3);

    // Bulk Move
    $this->actingAs($user)->post(route('drive.bulk'), [
        'action' => 'move',
        'item_ids' => $itemIds,
        'target_parent_id' => $folder->id,
    ])->assertRedirect();
    expect(DriveItem::whereIn('id', $itemIds)->where('parent_id', $folder->id)->count())->toBe(3);

    // Bulk Trash
    $this->actingAs($user)->post(route('drive.bulk'), [
        'action' => 'trash',
        'item_ids' => $itemIds,
    ])->assertRedirect();
    expect(DriveItem::whereIn('id', $itemIds)->where('is_trashed', true)->count())->toBe(3);
});
