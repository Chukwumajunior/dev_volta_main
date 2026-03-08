<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Writer User',
            'email' => 'writer@example.com',
            'phone' => '0987654321',
            'role' => 'writer',
            'password' => Hash::make('password123'),
        ]);
    }
}
