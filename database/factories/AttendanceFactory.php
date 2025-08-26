<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $session = \App\Models\CourseSession::inRandomOrder()->first();
        $student = \App\Models\User::where('role', 'student')->inRandomOrder()->first();

        return [
            'session_id' => $session->id,
            'user_id' => $student->id,
            'attendance_time' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'status' => $this->faker->randomElement(['hadir', 'tidak hadir', 'terlambat', 'izin']),
        ];
    }
}
