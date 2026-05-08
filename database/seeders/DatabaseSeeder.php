<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => 'student'
        ]);
        User::factory()->create([
            'name' => 'Nurse User',
            'email' => 'nurse@example.com',
            'password' => bcrypt('password'),
            'role' => 'nurse'
        ]);
    }
}
