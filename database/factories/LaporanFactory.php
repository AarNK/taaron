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
        $stoktambah = fake()->numberBetween(20, 30);
        $stokkurang = fake()->numberBetween(1, 10);
        return [
            'barang_id' => Barang::factory(),
            'stokawal' => $stoktambah, // Angka stok awal acak
            'stoktambah' => $stoktambah, // Angka stok tambah acak
            'stokkurang' => $stokkurang, // Angka stok tambah acak
            'stokakhir' => $stoktambah - $stokkurang, // Angka stok akhir acak (logis jika stokawal + stoktambah)
            'created_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
