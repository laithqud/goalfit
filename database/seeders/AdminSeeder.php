<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    // Create 5 random admins
    Admin::factory()->count(1)->create();

    // Or one specific admin for login testing
    Admin::create([
        'name' => 'Super Admin',
        'email' => 'admin@goalfit.com',
        'password' => bcrypt('admin123'), // login for testing
    ]);
}

}
