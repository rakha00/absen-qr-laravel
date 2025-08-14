<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseSession>
 */
class CourseSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = \App\Models\Course::inRandomOrder()->first();

        return [
            'course_id' => $course->id,
            'session_name' => $this->faker->sentence(3), // Add a default session name
            'session_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'start_time' => $this->faker->time('H:i:s'),
            'end_time' => $this->faker->time('H:i:s'),
            'qr_code_data' => $this->faker->uuid,
            'is_active' => $this->faker->boolean,
        ];
    }
}
