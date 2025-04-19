<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // default password: 'password'
            'remember_token' => Str::random(1),
            // Add optional custom fields if you have them:
            // 'birth_date' => $this->faker->date(),
            // 'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
