<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VideoCategory;

class VideoCategorySeeder extends Seeder
{
    public function run()
    {
        VideoCategory::create(['name' => 'Tutorials']);
        VideoCategory::create(['name' => 'Workouts']);
        // Add other categories as needed
    }
}
