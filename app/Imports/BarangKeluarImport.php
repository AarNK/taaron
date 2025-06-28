<?php

namespace App\Imports;

use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangKeluarImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Skip jika field penting kosong
        if (empty($row['nama_barang']) || empty($row['kategori']) || empty($row['satuan']) || empty($row['stok_keluar'])) {
            return null;
        }

        $name = $row['nama_barang'] ?? null;
        $kategoriName = $row['kategori'] ?? null;
        $satuanName = $row['satuan'] ?? null;
        $stokKeluar = $row['stok_keluar'] ?? null;

        // Cari atau buat kategori
        $kategori = Kategori::firstOrCreate(['name' => $kategoriName]);

        // Cari atau buat satuan
        $satuan = Satuan::firstOrCreate(['name' => $satuanName]);

        // Cari atau buat barang
        $barang = Barang::where('name', $name)->first();

        if (!$barang) {
            $barang = Barang::create([
                'name' => $name,
                'kategori_id' => $kategori->id,
                'satuan_id' => $satuan->id,
                'harga' => 0,
            ]);
        }

        // Buat data BarangKeluar
        $barangKeluar = new BarangKeluar([
            'barang_id' => $barang->id,
            'stokkurang' => $stokKeluar,
        ]);

        // Ambil laporan terbaru
        $laporan = Laporan::where('barang_id', $barang->id)->orderBy('created_at', 'desc')->first();

        if (!$laporan) {
            // Kalau belum ada laporan sama sekali, buat laporan awal stok keluar
            $laporan = Laporan::create([
                'barang_id' => $barang->id,
                'stokawal' => 0,
                'stoktambah' => 0,
                'stokkurang' => $stokKeluar,
                'stokakhir' => -$stokKeluar, // Karena stok keluar duluan
            ]);
        } else {
            // Update laporan: tambah stok keluar dan kurangi stok akhir
            $stokAkhirBaru = $laporan->stokakhir - $stokKeluar;

            $laporan->update([
                'stokkurang' => $laporan->stokkurang + $stokKeluar,
                'stokakhir' => $stokAkhirBaru
            ]);
        }

        return $barangKeluar;
    }
}
