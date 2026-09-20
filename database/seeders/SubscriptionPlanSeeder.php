<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Seed the default subscription plans.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Free',
                'slug' => 'free',
                'description' => 'Get started with the essentials, supported by ads.',
                'price' => 0,
                'currency' => 'USD',
                'interval' => 'month',
                'features' => [
                    '5 GB of cloud storage',
                    'Upload, organize, and share files',
                    'Supported by ads',
                ],
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 1,
                'storage_gb' => 5,
            ],
            [
                'name' => 'Pro Monthly',
                'slug' => 'pro-monthly',
                'description' => 'Go ad-free with more storage and priority support.',
                'price' => 4.99,
                'currency' => 'USD',
                'interval' => 'month',
                'features' => [
                    'Ad-free experience',
                    'Expanded cloud storage',
                    'Priority support',
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'storage_gb' => 100,
            ],
            [
                'name' => 'Pro Yearly',
                'slug' => 'pro-yearly',
                'description' => 'The best value for going ad-free all year round.',
                'price' => 49.99,
                'currency' => 'USD',
                'interval' => 'year',
                'features' => [
                    'Ad-free experience',
                    'Expanded cloud storage',
                    'Priority support',
                    '2 months free vs. monthly billing',
                ],
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 3,
                'storage_gb' => 100,
            ],
        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::query()->updateOrCreate(['slug' => $plan['slug']], $plan);
        }
    }
}
