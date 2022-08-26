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
        $question = Question::find(fake()->randomElement(Question::all()->pluck('id')));
        $choice = count($question->answers) ? Choice::find(fake()->randomElement($question->answers->pluck('id'))) : null;
        $correct = count($question->answers) && $choice?  $choice->correct : fake()->boolean();
        return [
            "user_id" => fake()->randomElement(User::all()->pluck('id')),
            "question_id" => $question->id,
            "exam_id" => fake()->randomElement(Exam::all()->pluck('id')),
            "answer" => $choice ? null : fake()->text(),
            "choice_id" => $choice ? $choice->id : null,
            "correct" => $correct,
            'flagged'=>fake()->boolean(),
        ];
    }
}
