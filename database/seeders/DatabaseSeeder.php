<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->create([
            'name' => 'Super Admin',
            'title' => 'سوبر ادمن',
            'number' => 1,
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'Admin',
            'title' => 'ادمن',
            'number' => 2,
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'Teacher',
            'title' => 'مدرس',
            'number' => 3,
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'Student',
            'title' => 'طالب',
            'number' => 4,
        ]);

        \App\Models\Grade::factory()->create([
            'name' => 'الصف الأول الثانوي',
        ]);
        \App\Models\Grade::factory()->create([
            'name' => 'الصف الثاني الثانوي',
        ]);
        \App\Models\Grade::factory()->create([
            'name' => 'الصف الثالث الثانوي',
        ]);

        \App\Models\Subject::factory()->create([
            'name' => 'الفيزياء',
        ]);

        \App\Models\Governorate::factory()->create([
            'name' => 'القاهرة',
        ]);
        \App\Models\Governorate::factory()->create([
            'name' => 'الشرقية',
        ]);
        \App\Models\Governorate::factory(22)->create();

        \App\Models\Center::factory()->create([
            'name' => 'المنصة',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'مجموعات خاصة',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الأول',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الثاني',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الثالث',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الرابع',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الخامس',
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);

        \App\Models\User::factory(50)->create();

        \App\Models\Lecture::factory(50)->create();

        \App\Models\Part::factory(20)->create();

        \App\Models\Exam::factory(50)->create();

        \App\Models\Question::factory(150)->create();

        \App\Models\Choice::factory(150)->create();

        \App\Models\ExamQuestion::factory(300)->create();

        \App\Models\Lesson::factory(50)->create();

        \App\Models\LecturePart::factory(100)->create();

        \App\Models\Section::factory(100)->create();

        \App\Models\SectionItem::factory(50)->create();

        \App\Models\Testimonial::factory(50)->create();

        \App\Models\LectureUser::factory(25)->create();

        \App\Models\DynamicExam::factory(500)->create();
    }
}
