<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PassedExam>
 */
class PassedExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => fake()->randomElement(User::all()->pluck('id')),
            "exam_id" => fake()->randomElement(Exam::all()->pluck('id')),
            "percentage" => fake()->numberBetween(0,100),
            "started_at" => fake()->dateTimeBetween('-1 year','-1 month'),
            "ended_at" => fake()->dateTimeBetween('-1 year','-1 month'),
            "finished" => fake()->randomElement([true,false]),
        ];
    }
}
