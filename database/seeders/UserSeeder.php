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
            'email' => 'dosen1@gmail.com',
            'password' => \Hash::make('dosen1'),
            'role' => 'lecturer',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Dosen Satu',
            'email' => 'dosen2@gmail.com',
            'password' => \Hash::make('dosen2'),
            'role' => 'lecturer',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mahasiswa Satu',
            'email' => 'mahasiswa@gmail.com',
            'password' => \Hash::make('mahasiswa'),
            'role' => 'student',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('admin'),
            'role' => 'admin',
        ]);
    }
}
