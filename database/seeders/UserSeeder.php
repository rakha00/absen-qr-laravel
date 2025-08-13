<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Lecturer One',
            'email' => 'lecturer@example.com',
            'password' => \Hash::make('password'),
            'nip' => '1234567890',
        ]);
    }
}
