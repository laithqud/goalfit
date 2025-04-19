<?php

namespace Database\Seeders;

use App\Models\Gym;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: Create multiple random users
        // User::factory(10)->create();

        // Specific test user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed Admins table
        $this->call([
            AdminSeeder::class,
            UsersSeeder::class,
            GymsSeeder::class,
            VideoCategorySeeder::class,
            VideoSeeder::class,
            FoodCategorySeeder::class,
            FoodItemSeeder::class,
        ]);
        
    }
}
