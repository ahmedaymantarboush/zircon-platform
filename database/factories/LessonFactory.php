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
        $urls = [
            'https://www.youtube.com/watch?v=5hzsa633ZCI'
        ];
        $examId = $this->faker->optional()->randomElement(Exam::all()->pluck('id'));
        $lectureId = $this->faker->randomElement(Lecture::all()->pluck('id'));
        return [
            'title'=>fake()->name(),
            'url'=>getEmbedVideoUrl(fake()->randomElement($urls)),
            'time'=>rand(500,5000),
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
