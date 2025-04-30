<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GymSubscription;

class GymSubscriptionSeeder extends Seeder
{
    public function run()
    {
        GymSubscription::factory()->create(); // Creates one gym subscription
    }
}
