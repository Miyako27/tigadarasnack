<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateMitraDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat instance Faker
        $faker = Faker::create();

        // Loop untuk membuat 1000 data dummy
        foreach (range(1, 1000) as $index) {
            DB::table('mitra')->insert([
                'nama_mitra' => $faker->company, // Nama perusahaan
                'alamat' => $faker->address, // Alamat mitra
                'email' => $faker->unique()->companyEmail, // Email unik
                'nomor_hp' => $faker->unique()->phoneNumber, // Nomor telepon
                'jenis_kemitraan' => $faker->randomElement(['Platinum', 'Gold', 'Silver']), // Pilihan dari ENUM
                'tanggal_bergabung' => $faker->date(), // Tanggal bergabung
                'created_at' => now(), // Timestamp saat ini
                'updated_at' => now(), // Timestamp saat ini
            ]);
        }
    }
}
