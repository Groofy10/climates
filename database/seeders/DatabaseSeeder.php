<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'google_id' => null,
            'google_token' => null,
            'google_refresh_token' => null,
            'username' => 'User',
            'email' => 'User@gmail.com',
            'password' => bcrypt('user123'),
            'dob' => '2000-01-01',
            'address' => 'Binus University',
            'role' => 'User',
            'verifStatus' => 'Not Verified',
            'userKTP' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'google_id' => null,
            'google_token' => null,
            'google_refresh_token' => null,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'dob' => '2000-01-01',
            'address' => 'Binus University',
            'role' => 'admin',
            'verifStatus' => 'Not Verified',
            'userKTP' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
