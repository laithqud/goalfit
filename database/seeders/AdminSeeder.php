<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
{
    Admin::firstOrCreate(
        ['email' => 'admin@example.com'], // Check for existing
        [
            'name'     => 'Default Admin',
            'role'     => 'admin',
            'password' => Hash::make('password'), // Same as factory
        ]
    );
}
}
