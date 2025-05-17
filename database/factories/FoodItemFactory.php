<?php

namespace Database\Factories;

use App\Models\FoodItem;
use App\Models\NutritionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodItemFactory extends Factory
{
    protected $model = FoodItem::class;

    public function definition(): array
    {
        return [
            'name' => 'eggs',
            'description' => 'This is a sample description for the food item.',
            'image_url' => 'eggs.jpg',
            'is_featured' => '1',
            'category_id' => 1,  // Assuming you want to link a food category
        ];
    }
}
