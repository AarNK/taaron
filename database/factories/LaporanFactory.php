<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => Barang::factory(),
            'stokawal' => fake()->numberBetween(0, 100), // Angka stok awal acak
            'stoktambah' => fake()->numberBetween(0, 50), // Angka stok tambah acak
            'stokkurang' => fake()->numberBetween(0, 50), // Angka stok tambah acak
            'stokakhir' => fake()->numberBetween(0, 150), // Angka stok akhir acak (logis jika stokawal + stoktambah)
        ];
    }
}
