<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'miya@gmail.com',
                'avatar' => 'icon-user.png',
                'name' => 'Miyako',
                'password' => Hash::make('123'),
                'role' => 'SuperAdministrator',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'karry@gmail.com',
                'avatar' => 'icon-user.png',
                'name' => 'Karry',
                'password' => Hash::make('12345678'),
                'role' => 'Administrator',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
