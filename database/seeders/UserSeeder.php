<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Dosen Satu',
            'email' => 'dosen@gmail.com',
            'password' => \Hash::make('dosen'),
            'role' => 'lecturer',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mahasiswa Satu',
            'email' => 'mahasiswa@gmail.com',
            'password' => \Hash::make('mahasiswa'),
            'role' => 'student',
        ]);
    }
}
