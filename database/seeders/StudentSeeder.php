<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::factory()->create([
            'name' => 'Student One',
            'nim' => '202200001',
            'email' => 'student1@example.com',
        ]);

        \App\Models\Student::factory()->create([
            'name' => 'Student Two',
            'nim' => '202200002',
            'email' => 'student2@example.com',
        ]);
    }
}
