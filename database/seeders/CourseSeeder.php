<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user (lecturer)
        $lecturer = \App\Models\User::first();

        \App\Models\Course::factory()->create([
            'user_id' => $lecturer->id,
            'name' => 'Web Programming',
            'code' => 'CS101',
            'description' => 'Introduction to web programming concepts.',
        ]);

        \App\Models\Course::factory()->create([
            'user_id' => $lecturer->id,
            'name' => 'Database Systems',
            'code' => 'CS102',
            'description' => 'Fundamentals of database design and management.',
        ]);
    }
}
