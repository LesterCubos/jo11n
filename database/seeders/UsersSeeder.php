<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            //Admin
           [
            'name' => 'Admin',
            'email' => 'inventory_admin@mail.com', 
            'contact_number' => '09876543211', 
            'password' => Hash::make('admin123.'),
            'role' => 'admin', 
            'department' => 'Inventory Manager',
           ],
        ]);
    }
}
