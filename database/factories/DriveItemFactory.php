<?php

namespace Database\Factories;

use App\Models\DriveItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DriveItem>
 */
class DriveItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'parent_id' => null,
            'google_drive_account_id' => null,
            'google_drive_file_id' => null,
            'name' => fake()->word().'.pdf',
            'type' => 'file',
            'mime_type' => 'application/pdf',
            'size' => fake()->numberBetween(1024, 10485760),
            'storage_path' => null,
            'is_starred' => false,
            'is_trashed' => false,
        ];
    }

    /**
     * Indicate that the item is a folder.
     */
    public function folder(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => fake()->words(2, true),
            'type' => 'folder',
            'mime_type' => null,
            'size' => 0,
        ]);
    }
}
