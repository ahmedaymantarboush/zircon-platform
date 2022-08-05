<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LecturePart>
 */
class LecturePartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'part_id' => $this->faker->randomElement(Part::all()->pluck('id')),
            'lecture_id' => $this->faker->randomElement(Lecture::all()->pluck('id')),
        ];
    }
}
