<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MonthItem>
 */
class SectionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lessonId = $this->faker->optional()->randomElement(Lesson::all()->pluck('id'));
        return [
            "title"=>$this->faker->sentence,
            'order' => $this->faker->numberBetween(1, 10),
            'section_id' => $this->faker->randomElement(Section::all()->pluck('id')),
            'lesson_id' => $lessonId ,
            'exam_id' => $lessonId ? null : $this->faker->randomElement(Lesson::all()->pluck('id')),
        ];
    }
}
