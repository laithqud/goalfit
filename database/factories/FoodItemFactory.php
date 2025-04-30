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
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
            'is_featured' => $this->faker->boolean(),
            'category_id' => NutritionCategory::factory(),  // Assuming you want to link a food category
        ];
    }
}
