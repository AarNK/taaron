<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kategori::factory(10)->create();
        Kategori::insert([
            [
                'name' => 'Kategori 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kategori 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
