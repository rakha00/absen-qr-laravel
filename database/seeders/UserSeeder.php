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
            'name' => 'Lecturer One',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('admin'),
            'nip' => '1234567890',
        ]);
    }
}
