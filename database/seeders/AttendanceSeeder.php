<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = \App\Models\CourseSession::first();
        $student = \App\Models\Student::first();

        // Check if session and student exist before creating attendance
        if ($session && $student) {
            \App\Models\Attendance::factory()->create([
                'session_id' => $session->id,
                'student_id' => $student->id,
                'attendance_time' => now(),
                'status' => 'present',
            ]);
        }
    }
}
