<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Video::factory(1)->create(); // Generates 5 videos
    }
}
