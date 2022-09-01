<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\User;
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
            'image'=>asset('imgs/h-t-img.webp'),
            'degree'=>fake()->numberBetween(330,410),
            'content'=>fake()->text(100),
            'subject_degree'=>fake()->numberBetween(40,60),
            'subject_id'=>1,
            'grade_id'=>fake()->randomElement(Grade::all()->pluck('id')),
            'teacher_id'=>fake()->randomElement(User::where('role_num',3)->pluck('id')),
            'student_id'=>fake()->randomElement(User::where('role_num','>=',4)->pluck('id')),
        ];
    }
}
