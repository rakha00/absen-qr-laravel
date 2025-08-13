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
        $student = \App\Models\Student::inRandomOrder()->first();

        return [
            'session_id' => $session->id,
            'student_id' => $student->id,
            'attendance_time' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'status' => $this->faker->randomElement(['present', 'absent', 'late']),
        ];
    }
}
