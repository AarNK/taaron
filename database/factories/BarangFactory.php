<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Satuan;
use App\Models\Kategori;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'satuan_id' => Satuan::factory(),
            'kategori_id' => Kategori::factory(),
            'harga' => fake()->randomFloat(2, 1, 1000),
        ];
    }
}
