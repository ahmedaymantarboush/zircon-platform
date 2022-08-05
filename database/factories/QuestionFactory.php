<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $choices = $this->faker->sentence.';'.$this->faker->sentence.';'.$this->faker->sentence.';'.$this->faker->sentence;
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl,
            'video' => $this->faker->url,
            'audio' => $this->faker->url,
            'type' => $this->faker->randomElement(['MCQ','Written']),
            'answer' => $this->faker->randomElement(explode(';',$choices)),
            'explanation' => $this->faker->text(),
            'choices' => $choices,
            'level' => $this->faker->numberBetween(1,10),
            'grade_id' => $this->faker->randomElement(\App\Models\Grade::all()->pluck('id')),
            'part_id' => $this->faker->randomElement(\App\Models\Part::all()->pluck('id')),
            'user_id' => $this->faker->randomElement(\App\Models\User::all()->pluck('id')),
        ];
    }
}
