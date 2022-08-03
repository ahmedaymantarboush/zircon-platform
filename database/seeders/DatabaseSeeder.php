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

        \App\Models\Governorate::factory(50)->create();
        \App\Models\Governorate::factory()->create([
            'name' => 'القاهرة',
        ]);
        \App\Models\Governorate::factory()->create([
            'name' => 'الشرقية',
        ]);

        \App\Models\User::factory(50)->create();

        \App\Models\Month::factory(50)->create();

        \App\Models\Center::factory()->create([
            'name' => 'المركز الأول',
            'image'=>fake()->imageUrl(),
            'governorate_id'=>fake()->numberBetween(1,50),
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الثاني',
            'image'=>fake()->imageUrl(),
            'governorate_id'=>fake()->numberBetween(1,50),
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الثالث',
            'image'=>fake()->imageUrl(),
            'governorate_id'=>fake()->numberBetween(1,50),
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الرابع',
            'image'=>fake()->imageUrl(),
            'governorate_id'=>fake()->numberBetween(1,50),
        ]);
        \App\Models\Center::factory()->create([
            'name' => 'المركز الخامس',
            'image'=>fake()->imageUrl(),
            'governorate_id'=>fake()->numberBetween(1,50),
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
