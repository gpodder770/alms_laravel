<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

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

        // To Create Employee
        // \App\Models\Employee::create([
        //     'employee_id' => 'g-0001',
        //     'name' => 'Gourab',
        //     'email' => 'aa@gmail.com',
        //     'password' => Hash::make('admin12345'),
        //     'personal_phone' => 'sss',
        //     'personal_email' => 'sss',
        // ]);
    }
}
