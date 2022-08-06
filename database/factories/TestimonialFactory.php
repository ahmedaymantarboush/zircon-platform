<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'studen_name'=>fake()->name(),
            'image'=>fake()->imageUrl(),
            'degree'=>fake()->numberBetween(330,410),
            'content'=>fake()->text(100),
        ];
    }
}
