<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            CourseSeeder::class,
            CourseSessionSeeder::class,
            AttendanceSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Lecturer One',
            'email' => 'admin@gamil.com',
            'password' => \Hash::make('admin'),
            'nip' => '1234567890',
        ]);
    }
}
