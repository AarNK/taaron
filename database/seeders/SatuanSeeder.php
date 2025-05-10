<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Satuan::factory(10)->create();
        Satuan::insert([
            [
                'name' => 'Satuan 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Satuan 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); 
    }
}
