<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lecturer = \App\Models\User::where('nip', '!=', null)->inRandomOrder()->first();

        return [
            'user_id' => $lecturer->id,
            'name' => $this->faker->sentence(3),
            'code' => $this->faker->unique()->word() . $this->faker->randomNumber(3),
            'description' => $this->faker->paragraph,
        ];
    }
}
