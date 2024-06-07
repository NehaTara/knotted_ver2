<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Client User',
            'email' => 'client@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'client',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Wedding Planner User',
            'email' => 'wedding_planner@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'wedding_planner',
        ]);
    }
}
