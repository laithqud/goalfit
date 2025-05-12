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
            'name' => 'chest press',
            'instructions' => '1. Lie on a flat bench with a dumbbell in each hand, arms extended above your chest., 2. Lower the dumbbells to your chest, keeping your elbows at a 45-degree angle., 3. Press the dumbbells back up to the starting position, squeezing your chest muscles at the top.',
            'video' => 'Bicep.mp4',
            'difficulty' => 'intermediate',
            'recommended_reps' => 12,
            'recommended_sets' => 3,
            'equipment_needed' => (object)['dumbbells', 'yoga_mat', 'resistance_bands'],
            'target_muscles' => (object)[
                'primary' => ['chest', 'triceps'],
                'secondary' => ['shoulders']
            ],
            'durations_in_minutes' => (object)[
                'warmup' => 5,
                'exercise' => 30,
                'cooldown' => 5
            ],
            'category_id' => 1,
            'created_by' => User::factory(),
            'is_premium' => false,
        ];
    }
}
