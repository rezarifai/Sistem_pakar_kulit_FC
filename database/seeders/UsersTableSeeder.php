<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.coms',
                'password' => Hash::make('123123123'),
                'is_admin' => 1
            ],
            [
                'name' => 'Pasien',
                'email' => 'pasien@gmail.com',
                'password' => Hash::make('123123123'),
                'is_admin' => 0
            ],
        ];

        // Insert data into the users table
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
