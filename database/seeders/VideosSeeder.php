<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideosSeeder extends Seeder
{
    public function run()
    {
        Video::factory(1)->create();  // Adjust the number as needed
    }
}
