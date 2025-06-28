<?php

namespace App\Imports;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangMasukImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Skip if required fields are empty
        if (empty($row['nama_barang']) || empty($row['kategori']) || empty($row['satuan']) || empty($row['stok_tambah'])) {
            return null;
        }

        $name = $row['nama_barang'] ?? null;
        $kategoriName = $row['kategori'] ?? null;
        $satuanName = $row['satuan'] ?? null;
        $stokTambah = $row['stok_tambah'] ?? null;

        $kategori = Kategori::where('name', $kategoriName)->first();

        if (!$kategori) {
            $kategori = Kategori::create([
                'name' => $kategoriName,
            ]);
        }

        $satuan = Satuan::where('name', $satuanName)->first();

        if (!$satuan) {
            $satuan = Satuan::create([
                'name' => $satuanName,
            ]);
        }

        $barang = Barang::where('name', $name)->first();

        if (!$barang) {
            $barang = Barang::create([
                'name' => $name,
                'kategori_id' => $kategori->id,
                'satuan_id' => $satuan->id,
                'harga' => 0,
            ]);
        }

        $barangMasuk = new BarangMasuk([
            'barang_id' => $barang->id,
            'stoktambah' => $stokTambah,
        ]);

        // Check if Laporan exists for this barang, if not create one
        $laporan = Laporan::where('barang_id', $barangMasuk->barang_id)->orderBy('created_at', 'desc')->first();
        
        if (!$laporan) {
            // Create new Laporan record for new barang
            $laporan = Laporan::create([
                'barang_id' => $barangMasuk->barang_id,
                'stokawal' => 0,
                'stoktambah' => $barangMasuk->stoktambah,
                'stokkurang' => 0,
                'stokakhir' => $barangMasuk->stoktambah,
            ]);
        } else {
            // Update existing Laporan record
            $stokAkhirBaru = $laporan->stokakhir + $barangMasuk->stoktambah;
            $laporan->update([
                'stoktambah' => $laporan->stoktambah + $barangMasuk->stoktambah,
                'stokakhir' => $stokAkhirBaru
            ]);
        }

        return $barangMasuk;
    }
}