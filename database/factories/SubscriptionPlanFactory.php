<?php

namespace Database\Factories;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SubscriptionPlan>
 */
class SubscriptionPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word().' '.fake()->word();

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'price' => fake()->randomElement([0, 4.99, 9.99, 49.99, 99.99]),
            'currency' => 'USD',
            'interval' => fake()->randomElement(['month', 'year']),
            'features' => ['Ad-free experience', 'Priority support'],
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 0,
            'storage_gb' => fake()->randomElement([5, 50, 100, 500]),
        ];
    }

    /**
     * Mark the plan as the free tier.
     */
    public function free(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Free',
            'slug' => 'free',
            'price' => 0,
            'interval' => 'month',
            'storage_gb' => 5,
        ]);
    }
}
