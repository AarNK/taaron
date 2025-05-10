<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Barang::factory(10)->create();
        Barang::insert([
            [
                'name' => 'Barang 1',
                'satuan_id' => 1,
                'kategori_id' => 1,
                'harga' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Barang 2',
                'satuan_id' => 2,
                'kategori_id' => 2,
                'harga' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
