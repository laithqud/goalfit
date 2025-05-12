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
            'name' => 'Full Body Workout',
            'description' => 'A comprehensive workout routine that targets all major muscle groups, promoting overall strength and fitness.',
            'image_url' => 'fullbody.jpg'
         ];
    }
}
