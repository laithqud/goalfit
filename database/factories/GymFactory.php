<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GymFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Planet Gym',
            'description' => 'nothing much actually, just a gym',
            'address' => 'Amman',
            'location' => "Jordan-maps",
            'phone' => '0798123456',
            'opening_hours' => (object)[
                'monday' => (object)['open' => '08:00', 'close' => '22:00', 'is_24h' => false],
                'tuesday' => (object)['open' => '06:00', 'close' => '23:00', 'is_24h' => false],
            ],
            'facilities' => [
                (object)['name' => 'parking', 'available' => true, 'description' => 'Free for members'],
                (object)['name' => 'pool', 'available' => true, 'requires_booking' => true],
            ],
            'pricing' => (object)['monthly' => 49.99, 'yearly' => 139.99],
            'media' => (object)[
                '1' =>"image1.png",
                '2' => "image2.png",
            ],
            'is_active' => true,
        ];
    }
}