<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CreateSuperAdminUser;
use Database\Seeders\CreateLindaUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CreateSuperAdminUser::class);
        $this->call(CreateLindaUserSeeder::class);
    }
}
