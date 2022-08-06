<?php

namespace Database\Factories;

use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'order' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->paragraph,
            'duration' => $this->faker->numberBetween(1, 10),
            'lecture_id' => $this->faker->randomElement(Lecture::all()->pluck('id')),
        ];
    }
}
