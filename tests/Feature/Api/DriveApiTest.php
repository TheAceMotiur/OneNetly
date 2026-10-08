<?php

use App\Models\DriveItem;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('a user can register and receive an api token', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'device_name' => 'Pixel 8',
    ]);

    $response->assertCreated()->assertJsonStructure(['token', 'user' => ['id', 'name', 'email']]);
    expect(User::where('email', 'jane@example.com')->exists())->toBeTrue();
});

test('a user can log in with valid credentials and receive an api token', function () {
    $user = User::factory()->create(['password' => bcrypt('password123')]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password123',
        'device_name' => 'Pixel 8',
    ]);

    $response->assertOk()->assertJsonStructure(['token', 'user' => ['id', 'name', 'email']]);
});

test('login fails with invalid credentials', function () {
    $user = User::factory()->create(['password' => bcrypt('password123')]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
        'device_name' => 'Pixel 8',
    ]);

    $response->assertUnprocessable()->assertJsonValidationErrors('email');
});

test('drive endpoints require authentication', function () {
    $this->getJson('/api/drive')->assertUnauthorized();
});

test('an authenticated user can list their drive items via the api', function () {
    $user = User::factory()->create();
    DriveItem::factory()->folder()->create(['user_id' => $user->id, 'name' => 'Documents']);
    DriveItem::factory()->create(['user_id' => $user->id, 'name' => 'Report.pdf']);

    $response = $this->actingAs($user, 'sanctum')->getJson('/api/drive');

    $response->assertOk()
        ->assertJsonCount(1, 'folders')
        ->assertJsonCount(1, 'files');
});

test('an authenticated user can upload a file via the api', function () {
    Storage::fake('local');
    $user = User::factory()->create();
    $file = UploadedFile::fake()->create('contract.pdf', 100);

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/drive/upload', [
        'files' => [$file],
    ]);

    $response->assertOk()->assertJsonCount(1, 'items');
    expect(DriveItem::where('user_id', $user->id)->where('name', 'contract.pdf')->exists())->toBeTrue();
});

test('auto-backup upload creates a file in a camera backup folder keyed by device asset id', function () {
    Storage::fake('local');
    $user = User::factory()->create();
    $photo = UploadedFile::fake()->image('IMG_0001.jpg');

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/drive/backup-upload', [
        'file' => $photo,
        'device_asset_id' => 'device-asset-1',
    ]);

    $response->assertCreated()->assertJsonPath('duplicate', false);

    $item = DriveItem::where('user_id', $user->id)->where('device_asset_id', 'device-asset-1')->first();
    expect($item)->not->toBeNull();
    expect($item->is_backup)->toBeTrue();
    expect($item->parent->name)->toBe('Camera Backup');
});

test('re-uploading the same device asset id does not create a duplicate backup file', function () {
    Storage::fake('local');
    $user = User::factory()->create();

    $this->actingAs($user, 'sanctum')->postJson('/api/drive/backup-upload', [
        'file' => UploadedFile::fake()->image('IMG_0002.jpg'),
        'device_asset_id' => 'device-asset-2',
    ])->assertCreated();

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/drive/backup-upload', [
        'file' => UploadedFile::fake()->image('IMG_0002.jpg'),
        'device_asset_id' => 'device-asset-2',
    ]);

    $response->assertOk()->assertJsonPath('duplicate', true);
    expect(DriveItem::where('user_id', $user->id)->where('device_asset_id', 'device-asset-2')->count())->toBe(1);
});

test('backup status returns the device asset ids already backed up', function () {
    $user = User::factory()->create();
    DriveItem::factory()->create([
        'user_id' => $user->id,
        'is_backup' => true,
        'device_asset_id' => 'already-backed-up',
    ]);

    $response = $this->actingAs($user, 'sanctum')->getJson('/api/drive/backup-status');

    $response->assertOk()->assertJson(['backed_up_asset_ids' => ['already-backed-up']]);
});

test('a user cannot download or delete another users file via the api', function () {
    $owner = User::factory()->create();
    $intruder = User::factory()->create();
    $file = DriveItem::factory()->create(['user_id' => $owner->id]);

    $this->actingAs($intruder, 'sanctum')->getJson("/api/drive/items/{$file->id}/download")->assertForbidden();
    $this->actingAs($intruder, 'sanctum')->deleteJson("/api/drive/items/{$file->id}")->assertForbidden();
});

test('a user can trash and then permanently delete their file via the api', function () {
    Storage::fake('local');
    $user = User::factory()->create();
    $file = DriveItem::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user, 'sanctum')->deleteJson("/api/drive/items/{$file->id}")
        ->assertOk()->assertJson(['permanent' => false]);
    expect($file->fresh()->is_trashed)->toBeTrue();

    $this->actingAs($user, 'sanctum')->deleteJson("/api/drive/items/{$file->id}")
        ->assertOk()->assertJson(['permanent' => true]);
    expect(DriveItem::find($file->id))->toBeNull();
});

test('a user can move a file into another folder via the api', function () {
    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id]);
    $file = DriveItem::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user, 'sanctum')->patchJson("/api/drive/items/{$file->id}/move", [
        'parent_id' => $folder->id,
    ]);

    $response->assertOk()->assertJsonPath('item.parent_id', $folder->id);
    expect($file->fresh()->parent_id)->toBe($folder->id);
});

test('a user can list all their folders flat via the api', function () {
    $user = User::factory()->create();
    $parent = DriveItem::factory()->folder()->create(['user_id' => $user->id, 'name' => 'Parent']);
    DriveItem::factory()->folder()->create(['user_id' => $user->id, 'parent_id' => $parent->id, 'name' => 'Child']);
    DriveItem::factory()->folder()->create(['user_id' => $user->id, 'is_trashed' => true, 'name' => 'Trashed']);

    $response = $this->actingAs($user, 'sanctum')->getJson('/api/drive/folders');

    $response->assertOk()->assertJsonCount(2, 'folders');
});

test('a user can create and revoke a share link for a file via the api', function () {
    $user = User::factory()->create();
    $file = DriveItem::factory()->create(['user_id' => $user->id]);

    $shareResponse = $this->actingAs($user, 'sanctum')->postJson("/api/drive/items/{$file->id}/share");
    $shareResponse->assertOk()->assertJsonStructure(['share_token', 'share_url']);
    expect($file->fresh()->share_token)->not->toBeNull();

    $unshareResponse = $this->actingAs($user, 'sanctum')->deleteJson("/api/drive/items/{$file->id}/share");
    $unshareResponse->assertOk()->assertJson(['success' => true]);
    expect($file->fresh()->share_token)->toBeNull();
});

test('a folder cannot be shared via the api', function () {
    $user = User::factory()->create();
    $folder = DriveItem::factory()->folder()->create(['user_id' => $user->id]);

    $this->actingAs($user, 'sanctum')->postJson("/api/drive/items/{$folder->id}/share")
        ->assertStatus(422);
});
