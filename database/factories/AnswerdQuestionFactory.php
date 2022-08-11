<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnswerdQuestion>
 */
class AnswerdQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $answerId = fake()->randomElement(Choice::all()->pluck('id'));
        $choice = Choice::find($answerId);
        return [
            "user_id" => fake()->randomElement(User::all()->pluck('id')),
            "question_id" => fake()->randomElement(Question::all()->pluck('id')),
            "exam_id" => fake()->randomElement(Exam::all()->pluck('id')),
            "answer" => $answerId,
            "correct" => $choice->correct
        ];
    }
}
