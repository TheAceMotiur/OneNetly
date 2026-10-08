<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('drive_items', function (Blueprint $table) {
            $table->string('device_asset_id', 191)->nullable()->after('share_token');
            $table->string('content_hash', 64)->nullable()->after('device_asset_id');
            $table->boolean('is_backup')->default(false)->after('content_hash');

            $table->index(['user_id', 'device_asset_id']);
            $table->index(['user_id', 'content_hash']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drive_items', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'device_asset_id']);
            $table->dropIndex(['user_id', 'content_hash']);
            $table->dropColumn(['device_asset_id', 'content_hash', 'is_backup']);
        });
    }
};
