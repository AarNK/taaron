<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(KategoriSeeder::class);
        $this->call(SatuanSeeder::class);
        $this->call(BarangSeeder::class);
        // $this->call(BarangMasukSeeder::class);
        // $this->call(BarangKeluarSeeder::class);
        // $this->call(LaporanSeeder::class);
        $this->call(UserSeeder::class);
    }
}
