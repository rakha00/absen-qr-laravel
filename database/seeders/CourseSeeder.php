<?php

namespace Database\Seeders;

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
            'name' => 'Pemrograman Web',
            'code' => 'CS101',
            'description' => 'Pengantar konsep pemrograman web.',
        ]);

        \App\Models\Course::factory()->create([
            'user_id' => $lecturer->id,
            'name' => 'Sistem Basis Data',
            'code' => 'CS102',
            'description' => 'Dasar-dasar desain dan manajemen basis data.',
        ]);
    }
}
