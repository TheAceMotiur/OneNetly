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
        Schema::table('subscriptions', function (Blueprint $table) {
            if (! Schema::hasColumn('subscriptions', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
            }
            if (! Schema::hasColumn('subscriptions', 'subscription_plan_id')) {
                $table->foreignId('subscription_plan_id')->after('user_id')->constrained()->cascadeOnDelete();
            }
            if (! Schema::hasColumn('subscriptions', 'provider')) {
                $table->string('provider')->default('paypal')->after('subscription_plan_id');
            }
            if (! Schema::hasColumn('subscriptions', 'provider_subscription_id')) {
                $table->string('provider_subscription_id')->nullable()->unique()->after('provider');
            }
            if (! Schema::hasColumn('subscriptions', 'status')) {
                $table->string('status')->default('pending')->index()->after('provider_subscription_id');
            }
            if (! Schema::hasColumn('subscriptions', 'starts_at')) {
                $table->timestamp('starts_at')->nullable()->after('status');
            }
            if (! Schema::hasColumn('subscriptions', 'ends_at')) {
                $table->timestamp('ends_at')->nullable()->after('starts_at');
            }
            if (! Schema::hasColumn('subscriptions', 'cancelled_at')) {
                $table->timestamp('cancelled_at')->nullable()->after('ends_at');
            }
            if (! Schema::hasColumn('subscriptions', 'metadata')) {
                $table->json('metadata')->nullable()->after('cancelled_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['subscription_plan_id']);
            $table->dropColumn([
                'user_id',
                'subscription_plan_id',
                'provider',
                'provider_subscription_id',
                'status',
                'starts_at',
                'ends_at',
                'cancelled_at',
                'metadata',
            ]);
        });
    }
};
