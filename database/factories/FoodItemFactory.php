<?php

namespace Database\Factories;

use App\Models\FoodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'calories' => $this->faker->numberBetween(50, 500),
            'description' => $this->faker->sentence,
            'food_category_id' => FoodCategory::inRandomOrder()->first()?->id ?? FoodCategory::factory()->create()->id,
        ];
    }
}
