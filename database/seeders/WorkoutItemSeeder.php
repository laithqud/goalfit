<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkoutCategory;
use App\Models\WorkoutItem;

class WorkoutItemSeeder extends Seeder
{
    public function run()
    {
        // Create a Workout Category
        $category = WorkoutCategory::factory()->create();

        // Create a Workout Item and associate it with the category
        WorkoutItem::factory()->create([
            'category_id' => $category->id,
        ]);
    }
}
