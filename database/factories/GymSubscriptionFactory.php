<?php

namespace Database\Factories;

use App\Models\GymSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class GymSubscriptionFactory extends Factory
{
    protected $model = GymSubscription::class;

    public function definition(): array
    {
        return [
            'gym_id' => \App\Models\Gym::factory(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['active', 'expired', 'cancelled']),
        ];
    }
}
