<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rekomendasi>
 */
class RekomendasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori' => fake()->word(), // Menghasilkan kata acak
            'name' => fake()->words(2, true), // Menghasilkan nama barang acak (2 kata)
            'satuan' => fake()->randomElement(['pcs', 'kg', 'liter']), // Pilihan satuan umum
            'stokawal' => fake()->numberBetween(0, 100), // Angka stok awal acak
            'stokakhir' => fake()->numberBetween(0, 50), // Angka stok tambah acak
            'tipestok' => fake()->word(), // Angka stok tambah acak
            'rekom' => fake()->word(), // Angka stok akhir acak (logis jika stokawal + stoktambah)
        ];
    }
}
