<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodItem;
use App\Models\NutritionCategory;

class FoodItemSeeder extends Seeder
{
    public function run()
    {
        // You can first create some categories
        $category = NutritionCategory::factory()->create();

        // Create a food item under this category
        FoodItem::factory()->create([
            'category_id' => $category->id,
        ]);
    }
}
