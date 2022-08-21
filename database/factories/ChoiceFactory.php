<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Choices>
 */
class ChoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $text = $this->faker->optional()->sentence();
        $image = $text ? null : $this->faker->optional()->imageUrl();
        $video = $text || $image ? null : $this->faker->optional()->url();
        $audio = $text || $image || $video ? null : $this->faker->optional()->url();
        return [
            'question_id' => $this->faker->randomElement(\App\Models\Question::all()->pluck('id')),
            'text' => $text,
            'image' => $image,
            'video' => $video,
            'audio' => $audio,
            'correct' => $this->faker->randomElement([true, false]),
        ];
    }
}
