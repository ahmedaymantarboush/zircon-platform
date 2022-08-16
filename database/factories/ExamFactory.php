<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Lecture;
use App\Models\Part;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'title'=>fake()->name(),
            'dynamic'=>fake()->randomElement([true, false]),
            'description'=>fake()->text(),
            'questions_count'=>rand(10,20),
            'questions_hardness'=>rand(1,5),
            'time'=>fake()->numberBetween(60,600),
            'user_id'=>fake()->randomElement(User::all()->pluck('id')),
            'grade_id'=>fake()->randomElement(Grade::all()->pluck('id')),
            'subject_id'=>1,
            'lecture_id'=>fake()->randomElement(Lecture::all()->pluck('id')),
        ];
    }
}
