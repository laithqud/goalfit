<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GymFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Gym',
            'description' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'location' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'opening_hours' => json_encode([
                'monday' => ['open' => '08:00', 'close' => '22:00', 'is_24h' => false],
                'tuesday' => ['open' => '06:00', 'close' => '23:00', 'is_24h' => false],
            ]),
            'facilities' => json_encode([
                ['name' => 'parking', 'available' => true, 'description' => 'Free for members'],
                ['name' => 'pool', 'available' => true, 'requires_booking' => true],
            ]),
            'pricing' => json_encode([
                'plans' => [
                    'basic' => ['monthly' => 39.99, 'annual' => 399.99],
                    'premium' => ['monthly' => 59.99, 'annual' => 599.99],
                ],
                'day_pass' => 15.00,
                'currency' => 'USD',
            ]),
            'media' => json_encode([
                'images' => [
                    ['url' => 'gyms/1/main.jpg', 'caption' => 'Main Entrance', 'is_featured' => true],
                    ['url' => 'gyms/1/equipment.jpg', 'caption' => 'Weight Area'],
                ],
                'videos' => [
                    ['url' => 'gyms/1/tour.mp4', 'thumbnail' => 'gyms/1/video-thumb.jpg'],
                ]
            ]),
            'is_active' => true,
        ];
    }
}
