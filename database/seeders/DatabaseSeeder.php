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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>bcrypt('admin'),// Change to secure password
            'number'=>'9016410956',
            'role' => 'admin',
            'location' => 'Head Office',
            
            'description' => 'Admin of the portal',
            'profile_photo' => null,
            'skill' => null,
            'education' => null
        ]);

         
    }
}
