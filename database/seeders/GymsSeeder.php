<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gym;

class GymsSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 random gyms using the factory
        Gym::factory()->count(1)->create();

        // Or create a specific gym
        Gym::create([
            'name' => 'GoalFit Gym',
            'location' => 'Amman, Jordan',
            'phone' => '+962 7 1234 5678',
            'description' => 'A top-tier gym with all modern facilities.',
            'image' => 'goalfit-gym.jpg',
        ]);
    }
}
