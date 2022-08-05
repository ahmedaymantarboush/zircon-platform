<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LectureUser>
 */
class LectureUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lecture_id'=>$this->faker->randomElement(Lecture::all()->pluck('id')),
            'user_id'=>$this->faker->randomElement(User::all()->pluck('id')),
        ];
    }
}
