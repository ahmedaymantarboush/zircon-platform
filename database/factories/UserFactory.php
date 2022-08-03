<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_number' => '0'.rand(1000000000,1299999999),
            'parent_phone_number' => '0'.rand(1000000000,1299999999),
            'role_num' => $this->faker->numberBetween(1, 4),
            'grade_id' => $this->faker->numberBetween(1, 3),
            'governorate_id' => $this->faker->numberBetween(1, 10),
            'code' => Str::random(50),
            'center_id' => $this->faker->numberBetween(1, 6),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
