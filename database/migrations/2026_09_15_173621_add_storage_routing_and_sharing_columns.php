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
        Schema::table('google_drive_accounts', function (Blueprint $table) {
            $table->integer('priority')->default(1)->after('is_active');
            $table->unsignedBigInteger('total_storage_bytes')->nullable()->after('priority');
            $table->unsignedBigInteger('used_storage_bytes')->nullable()->after('total_storage_bytes');
            $table->timestamp('last_synced_at')->nullable()->after('used_storage_bytes');
        });

        Schema::table('drive_items', function (Blueprint $table) {
            $table->string('share_token', 64)->nullable()->unique()->after('is_trashed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('google_drive_accounts', function (Blueprint $table) {
            $table->dropColumn(['priority', 'total_storage_bytes', 'used_storage_bytes', 'last_synced_at']);
        });

        Schema::table('drive_items', function (Blueprint $table) {
            $table->dropColumn('share_token');
        });
    }
};
