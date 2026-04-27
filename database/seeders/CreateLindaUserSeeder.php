<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateLindaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'linda23si@mahasiswa.pcr.ac.id',
        ], [
            'avatar' => 'icon-user.png',
            'name' => 'Linda',
            'password' => Hash::make('12345678'),
            'role' => 'Administrator',
            'email_verified_at' => now(),
        ]);
    }
}
