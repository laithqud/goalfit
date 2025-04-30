<?php

namespace Database\Factories;

use App\Models\WorkoutCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutCategoryFactory extends Factory
{
    protected $model = WorkoutCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'image_url' => $this->faker->imageUrl(640, 480, 'fitness', true),
        ];
    }
}
