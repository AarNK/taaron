<?php

namespace Database\Seeders;

use App\Models\Rekomendasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rekomendasi::factory(20)->create();
    }
}
