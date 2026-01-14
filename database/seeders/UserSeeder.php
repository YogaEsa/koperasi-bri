<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Superadmin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@koperasibri.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        // Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@koperasibri.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Regular User (optional)
        User::create([
            'name' => 'User Demo',
            'email' => 'user@koperasibri.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
