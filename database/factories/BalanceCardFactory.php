<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BalanceCard>
 */
class BalanceCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = fake()->optional()->randomElement(User::all()->pluck('id')) ?? null;
        return [
            'code'=>Str::random(10),
            'value'=>fake()->numberBetween(1,100),
            'expiry_date'=>fake()->dateTimeBetween('-1 year', '+1 year'),
            'user_id'=>$user,
            'used_at'=> $user ? fake()->dateTimeBetween('-1 year', '+1 year') : null,
        ];
    }
}
