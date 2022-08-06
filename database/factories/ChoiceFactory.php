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
        $name = $this->faker->optional()->sentence();
        $image = $name ? null : $this->faker->optional()->imageUrl();
        $video = $image ? null : $this->faker->optional()->url();
        $audio = $video ? null : $this->faker->optional()->url();
        return [
            'question_id' => $this->faker->randomElement(\App\Models\Question::all()->pluck('id')),
            'name' => $name,
            'image' => $image,
            'video' => $video,
            'audio' => $audio,
            'correct' => $this->faker->randomElement([true, false]),
        ];
    }
}
