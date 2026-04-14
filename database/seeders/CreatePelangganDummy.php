<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat instance faker
        $faker = Faker::create();

        // Loop untuk membuat 1000 data dummy
        foreach (range(1, 1000) as $index) {
            DB::table('pelanggan')->insert([
                'first_name' => $faker->firstname,
                'last_name' => $faker->lastname,
                'birthday' => $faker->date(),
                'gender' => $faker->randomElement(['Laki-Laki','Perempuan']),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
