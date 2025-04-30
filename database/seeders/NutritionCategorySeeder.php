<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NutritionCategory;

class NutritionCategorySeeder extends Seeder
{
    public function run(): void
    {
        NutritionCategory::factory()->create([
            'name' => 'High Protein Meals',
        ]);
    }
}
