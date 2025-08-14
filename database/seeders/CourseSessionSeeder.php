<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = \App\Models\Course::first();

        // Check if a course exists before creating sessions
        if ($course) {
            \App\Models\CourseSession::factory()->create([
                'course_id' => $course->id,
                'session_name' => 'Session 1 for ' . $course->name,
                'session_date' => now()->addDays(7)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'qr_code_data' => \Illuminate\Support\Str::uuid(),
                'qr_code_path' => 'qrcodes/' . \Illuminate\Support\Str::uuid() . '.png', // Placeholder path
                'is_active' => true,
            ]);

            \App\Models\CourseSession::factory()->create([
                'course_id' => $course->id,
                'session_name' => 'Session 2 for ' . $course->name,
                'session_date' => now()->addDays(14)->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'qr_code_data' => \Illuminate\Support\Str::uuid(),
                'qr_code_path' => 'qrcodes/' . \Illuminate\Support\Str::uuid() . '.png', // Placeholder path
                'is_active' => false,
            ]);
        }
    }
}
