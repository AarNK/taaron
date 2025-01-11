<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
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
            'stokakhir' => fake()->numberBetween(0, 150), // Angka stok akhir acak (logis jika stokawal + stoktambah)
        ];
    }
}
