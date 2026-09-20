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
        Schema::table('subscription_plans', function (Blueprint $table) {
            if (! Schema::hasColumn('subscription_plans', 'name')) {
                $table->string('name')->after('id');
            }
            if (! Schema::hasColumn('subscription_plans', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
            if (! Schema::hasColumn('subscription_plans', 'description')) {
                $table->text('description')->nullable()->after('slug');
            }
            if (! Schema::hasColumn('subscription_plans', 'price')) {
                $table->decimal('price', 10, 2)->default(0)->after('description');
            }
            if (! Schema::hasColumn('subscription_plans', 'currency')) {
                $table->string('currency', 3)->default('USD')->after('price');
            }
            if (! Schema::hasColumn('subscription_plans', 'interval')) {
                $table->string('interval', 20)->default('month')->after('currency');
            }
            if (! Schema::hasColumn('subscription_plans', 'paypal_plan_id')) {
                $table->string('paypal_plan_id')->nullable()->index()->after('interval');
            }
            if (! Schema::hasColumn('subscription_plans', 'features')) {
                $table->json('features')->nullable()->after('paypal_plan_id');
            }
            if (! Schema::hasColumn('subscription_plans', 'is_active')) {
                $table->boolean('is_active')->default(true)->index()->after('features');
            }
            if (! Schema::hasColumn('subscription_plans', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'slug',
                'description',
                'price',
                'currency',
                'interval',
                'paypal_plan_id',
                'features',
                'is_active',
                'sort_order',
            ]);
        });
    }
};
