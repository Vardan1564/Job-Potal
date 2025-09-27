<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>'admin', // Change to secure password
            'role' => 'admin',
            'location' => 'Head Office',
            'resume' => null,
            'discretion' => 'Admin of the portal',
            'profile_photo' => null,
            'skill' => null,
            'education' => null
        ]);
    }
}
