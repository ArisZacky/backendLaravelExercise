<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'id' => Str::uuid(), // Generates a UUID for the 'id' field
            'name' => 'Admin User',
            'username' => 'admin',
            'phone' => '1234567890',
            'email' => 'admin@example.com',
            'password' => Hash::make('pastibisa'), // Hash the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
