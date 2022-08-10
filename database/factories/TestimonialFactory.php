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
            'student_name'=>fake()->name(),
            'image'=>'http://127.0.0.1:8000/imgs/h-t-img.jpeg',
            'degree'=>fake()->numberBetween(330,410),
            'content'=>fake()->text(100),
        ];
    }
}
