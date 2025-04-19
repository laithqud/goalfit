<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodCategory;

class FoodCategorySeeder extends Seeder
{
    public function run()
    {
        FoodCategory::create(['name' => 'Fruits']);
        FoodCategory::create(['name' => 'Vegetables']);
        FoodCategory::create(['name' => 'Meat']);
        // Add other categories as needed
    }
}
