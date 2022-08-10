<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Lecture;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $examId = $this->faker->optional()->randomElement(Exam::all()->pluck('id'));
        $lectureId = $this->faker->randomElement(Lecture::all()->pluck('id'));
        return [
            'title'=>fake()->name(),
            'url'=>fake()->url().fake()->url(),
            'time'=>fake()->randomFloat(2,0,10) . ' ساعة',
            'type'=>fake()->randomElement(['video','pdf','audio']),
            'semester'=>fake()->randomElement(['الفصل الدراسي الأول','الفصل الدراسي الثاني']),
            'description'=>fake()->text(),
            'subject_id'=>1,
            'exam_id'=>$examId,
            'min_percentage'=>$examId ? fake()->randomFloat(2,0,10) : null,
            'part_id'=>fake()->randomElement(Part::all()->pluck('id')),
            'lecture_id'=>$lectureId,
            'grade_id'=> Lecture::find($lectureId)->grade->id,
        ];
    }
}
