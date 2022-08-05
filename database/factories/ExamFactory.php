<?php

namespace Database\Factories;

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
        if (fake()->randomElement([true, false])):
            $dynamicQuestions = rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10).';'.rand(1,10).','.rand(1,10);
        else:
            $dynamicQuestions = null;
        endif;
        return [
            'title'=>fake()->name(),
            'user_id'=>fake()->randomElement(User::all()->pluck('id')),
            'part_id'=>fake()->randomElement(Part::all()->pluck('id')),
            'lecture_id'=>fake()->randomElement(Lecture::all()->pluck('id')),
            'dynamic_questions'=>$dynamicQuestions ,
        ];
    }
}
