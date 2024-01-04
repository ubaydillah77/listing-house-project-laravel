<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
            'name' => "Super Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('password'),
            'user_type' => "admin",

        ],
        [
            'name' => "John doe",
            'email' => "user@gmail.com",
            'password' => bcrypt('password'),
            'user_type' => "user",
        ]
        ]);
    }
}
