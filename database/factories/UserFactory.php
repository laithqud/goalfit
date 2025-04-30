<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'height_cm' => $this->faker->randomFloat(2, 150, 200),
            'weight_kg' => $this->faker->randomFloat(2, 50, 100),
            'home_gym_id' => null, // Update if gyms are seeded first
            'profile_photo_path' => null,
            'is_active' => true,
        ];
    }
}
