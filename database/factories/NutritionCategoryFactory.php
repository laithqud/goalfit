<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NutritionCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' Meals',
            'description' => $this->faker->sentence(),
            'image_url' => 'nutrition/categories/sample.jpg',
            'calories' => $this->faker->numberBetween(100, 800),
            'protien' => $this->faker->randomFloat(1, 5, 50),
            'carbs' => $this->faker->randomFloat(1, 10, 100),
            'fat' => $this->faker->randomFloat(1, 1, 40),
            'nutrients' => json_encode([
                'calories' => 300,
                'macros' => [
                    'protein' => 25.0,
                    'carbs' => 35.0,
                    'fats' => 10.0,
                    'fiber' => 5.0
                ],
                'micronutrients' => [
                    'vitamin_c' => '15%',
                    'iron' => '10%'
                ]
            ]),
        ];
    }
}
