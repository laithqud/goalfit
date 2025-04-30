<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gym;

class GymSeeder extends Seeder
{
    public function run(): void
    {
        Gym::factory()->create([
            'name' => 'Victory Fitness Center',
        ]);
    }
}
