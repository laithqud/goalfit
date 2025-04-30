<?php

namespace Database\Factories;

use App\Models\WorkoutItem;
use App\Models\WorkoutCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutItemFactory extends Factory
{
    protected $model = WorkoutItem::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'instructions' => $this->faker->sentence(),
            'video_url' => $this->faker->url(),
            'difficulty' => $this->faker->randomElement(['beginner', 'intermediate', 'advanced']),
            'recommended_reps' => $this->faker->numberBetween(5, 15),
            'recommended_sets' => $this->faker->numberBetween(3, 5),
            'equipment_needed' => $this->faker->randomElement([json_encode(["dumbbells", "resistance_bands"]), json_encode(["yoga_mat", "dumbbells"])]),
            'target_muscles' => json_encode([
                'primary' => ['chest', 'triceps'],
                'secondary' => ['shoulders']
            ]),
            'durations_in_minutes' => json_encode([
                'warmup' => 5,
                'exercise' => 20,
                'cooldown' => 5
            ]),
            'category_id' => WorkoutCategory::factory(),
            'created_by' => User::factory(),
            'is_premium' => $this->faker->boolean(),
        ];
    }
}
