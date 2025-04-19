<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodItem;

class FoodItemSeeder extends Seeder
{
    public function run()
    {
        \App\Models\FoodItem::factory(1)->create(); // Generates 10 food items
    }
}
