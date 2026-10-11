<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '628123456789',
            'password' => Hash::make('password123'),
        ]);

        $this->command->info('Test user created successfully!');
        $this->command->info('Phone: 628123456789');
        $this->command->info('Password: password123');
    }
}
