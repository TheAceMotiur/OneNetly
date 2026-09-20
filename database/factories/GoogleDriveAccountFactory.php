<?php

namespace Database\Factories;

use App\Models\GoogleDriveAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GoogleDriveAccount>
 */
class GoogleDriveAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true).' Drive',
            'email' => fake()->safeEmail(),
            'client_id' => fake()->uuid().'.apps.googleusercontent.com',
            'client_secret' => 'GOCSPX-'.fake()->sha1(),
            'refresh_token' => '1//'.fake()->sha256(),
            'is_active' => true,
        ];
    }
}
