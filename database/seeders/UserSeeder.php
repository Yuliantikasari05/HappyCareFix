<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah admin sudah ada
        $existingAdmin = User::where('email', 'admin@happycare.com')->first();
        
        if (!$existingAdmin) {
            // Create admin user
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@happycare.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '+62-21-1234567',
                'address' => 'Jakarta, Indonesia',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
        }

        // Create regular users
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '+1234567890',
                'address' => '123 Main St, New York, USA',
                'status' => 'active',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '+1234567891',
                'address' => '456 Oak Ave, Los Angeles, USA',
                'status' => 'active',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '+1234567892',
                'address' => '789 Pine St, Chicago, USA',
                'status' => 'active',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Sarah Wilson',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '+1234567893',
                'address' => '321 Elm St, Houston, USA',
                'status' => 'active',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '+1234567894',
                'address' => '654 Maple Dr, Phoenix, USA',
                'status' => 'inactive',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            // Cek apakah user sudah ada berdasarkan email
            $existingUser = User::where('email', $userData['email'])->first();
            if (!$existingUser) {
                User::create($userData);
            }
        }
    }
}