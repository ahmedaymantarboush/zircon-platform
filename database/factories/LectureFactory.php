<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecture>
 */
class LectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $price = $this->faker->numberBetween(0, 100);
        return [
            'title' => $this->faker->name(),
            'semester' => "الفصل الدراسي الأول",
            'short_description' => $this->faker->words(12, true),
            'description' => $this->faker->words(100, true),
            'published' => $this->faker->numberBetween(0, 1),
            'promotinal_video_url' => $this->faker->url(),
            'poster' => $this->faker->imageUrl(),
            'meta_keywords' => implode(',',$this->faker->words(10)),
            'meta_description' => $this->faker->words(50, true),
            'slug' => $this->faker->slug(),
            'price' => $price,
            'final_price' =>  $this->faker->numberBetween(0, $price),
            'discount_expiry_date' => $this->faker->dateTimeBetween('-1 year', '1 year'),
            'grade_id' => $this->faker->randomElement(\App\Models\Grade::all()->pluck('id')),
            'user_id' => $this->faker->randomElement(\App\Models\User::all()->pluck('id')),
        ];
    }
}
