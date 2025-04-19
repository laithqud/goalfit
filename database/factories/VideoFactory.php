<?php

namespace Database\Factories;

use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'video_url' => $this->faker->url,
            'video_category_id' => VideoCategory::inRandomOrder()->first()->id,
        ];
    }
}
