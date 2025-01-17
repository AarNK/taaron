<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangKeluar>
 */
class BarangKeluarFactory extends Factory
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
            'stokkurang' => fake()->numberBetween(0, 50), // Angka stok tambah acak
            'created_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
