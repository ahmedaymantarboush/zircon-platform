<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Part;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DynamicExam>
 */
class DynamicExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exam_id'=>fake()->randomElement(Exam::where('dynamic', true)->get()->pluck('id')),
            'part_id'=>fake()->randomElement(Part::all()->pluck('id')),
            'count'=>fake()->numberBetween(1, 10),
            'level'=>fake()->randomElement(Question::all()->pluck('level')),
        ];
    }
}
