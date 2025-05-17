<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NutritionCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'protien',
            'description' => 'This is a sample description for the nutrition category.',
            'image_url' => 'protien.jpg',
            'calories' => 150,
            'protien' => 30,
            'carbs' => 20,
            'fat' => 35,
            'nutrients'=> (object)[
                'protien' => 30,
                'carbs' => 20,
                'fat' => 35,
                'fiber' => 5.0,
                'vitamin_c' => '15%',
                'iron' => '10%'
            ],
        ];
    }
}
