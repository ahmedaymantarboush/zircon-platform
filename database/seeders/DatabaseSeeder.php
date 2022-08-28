<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

@include __DIR__ . '/../../app/helper.php';
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $governorates = ['القاهرة', 'الجيزة', 'الأسكندرية', 'الدقهلية', 'البحر الأحمر', 'البحيرة', 'الفيوم', 'الغربية', 'الإسماعلية', 'المنوفية', 'المنيا', 'القليوبية', 'الوادي الجديد', 'السويس', 'اسوان', 'اسيوط', 'بني سويف', 'بورسعيد', 'دمياط', 'الشرقية', 'جنوب سيناء', 'كفر الشيخ', 'مطروح', 'الأقصر', 'قنا', 'شمال سيناء', 'سوهاج'];
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
            'title' => 'مساعد',
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

        foreach ($governorates as $governorate) :
            \App\Models\Governorate::factory()->create([
                'name' => $governorate,
            ]);
        endforeach;
        // \App\Models\Governorate::factory()->create([
        //     'name' => 'الشرقية',
        // ]);
        // \App\Models\Governorate::factory(22)->create();

        \App\Models\Center::factory()->create([
            'name' => 'المنصة',
            'url' => config('app.url'),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'مجموعات خاصة',
            'url' => config('app.url'),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);

        \App\Models\Center::factory()->create([
            'name' => 'المركز الأول',
            'url' => fake()->url(),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الثاني',
            'url' => fake()->url(),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الثالث',
            'url' => fake()->url(),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الرابع',
            'url' => fake()->url(),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الخامس',
            'url' => fake()->url(),
            'image' => asset('imgs/center1.png'),
            'governorate_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'role_num' => 1,
            'email' => 'ahmedaymantarboush@gmail.com',
            'name' => 'Ahmed Tarboush',
            'password' => Hash::make('123456789'),
            'center_id' => 2,
        ]);

        \App\Models\UserSubject::factory()->create(['user_id' => 1, 'subject_id' => 1]);

        // \App\Models\User::factory(50)->create();

        // \App\Models\Lecture::factory(50)->create(['user_id' => 1]);

        // \App\Models\Part::factory(20)->create(['user_id' => 1]);

        // \App\Models\Exam::factory(50)->create(['user_id' => 1]);

        // \App\Models\Question::factory(150)->create(['user_id' => 1]);

        // \App\Models\Choice::factory(150)->create();

        // \App\Models\ExamQuestion::factory(300)->create();

        // \App\Models\PassedExam::factory(50)->create();

        // \App\Models\AnswerdQuestion::factory(300)->create();

        // \App\Models\Lesson::factory(50)->create();

        // \App\Models\LecturePart::factory(100)->create();

        // \App\Models\Section::factory(100)->create();

        // \App\Models\SectionItem::factory(50)->create();

        // \App\Models\Testimonial::factory(50)->create(['teacher_id' => 1]);

        // \App\Models\LectureUser::factory(25)->create();

        // \App\Models\DynamicQuestion::factory(500)->create();

        // \App\Models\BalanceCard::factory(100)->create();
    }
}
