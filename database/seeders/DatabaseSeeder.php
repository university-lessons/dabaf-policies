<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roleTeacher = Role::create(['name' => 'Teacher']);
        $roleStudent = Role::create(['name' => 'Student']);

        User::factory()
            ->hasAttached($roleTeacher)
            ->create([
                "email" => "teacher@example.com", 
                "name" => "Teacher",
                "password" => Hash::make('12345678')
            ]);

        User::factory()
            ->hasAttached($roleStudent)
            ->create([
                "email" => "student@example.com", 
                "name" => "Student",
                "password" => Hash::make('12345678')
            ]);
    }
}
