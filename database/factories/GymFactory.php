<?php

namespace Database\Factories;

use App\Models\Gym;
use Illuminate\Database\Eloquent\Factories\Factory;

class GymFactory extends Factory
{
    protected $model = Gym::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'location' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(), // Fake image URL
        ];
    }
}
