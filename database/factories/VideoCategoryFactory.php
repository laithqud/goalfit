<?php

namespace Database\Factories;

use App\Models\VideoCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoCategoryFactory extends Factory
{
    protected $model = VideoCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Example: Tutorials, Workouts
        ];
    }
}
