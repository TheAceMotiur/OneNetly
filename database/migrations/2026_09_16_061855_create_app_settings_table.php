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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('paypal_mode')->default('sandbox');
            $table->string('paypal_client_id')->nullable();
            $table->text('paypal_client_secret')->nullable();
            $table->string('paypal_receiver_email')->nullable();
            $table->string('adsense_client_id')->nullable();
            $table->boolean('adsense_enabled')->default(false);
            $table->boolean('adsense_auto_ads')->default(true);
            $table->string('adsense_slot_header')->nullable();
            $table->string('adsense_slot_infeed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
