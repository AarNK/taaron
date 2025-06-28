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
        // Skip if required fields are empty
        if (empty($row['nama_barang']) || empty($row['kategori']) || empty($row['satuan']) || empty($row['stok_kurang'])) {
            return null;
        }

        $name = $row['nama_barang'] ?? null;
        $kategoriName = $row['kategori'] ?? null;
        $satuanName = $row['satuan'] ?? null;
        $stokKurang = $row['stok_kurang'] ?? null;

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

        // Check if Laporan exists for this barang
        $laporan = Laporan::where('barang_id', $barang->id)->orderBy('created_at', 'desc')->first();
        
        // If no laporan exists, create one with initial stock of 0
        if (!$laporan) {
            $laporan = Laporan::create([
                'barang_id' => $barang->id,
                'stokawal' => 0,
                'stoktambah' => 0,
                'stokkurang' => 0,
                'stokakhir' => 0,
            ]);
        }

        // Check if there's enough stock
        if ($laporan->stokakhir < $stokKurang) {
            // Skip this row if not enough stock
            return null;
        }

        $barangKeluar = new BarangKeluar([
            'barang_id' => $barang->id,
            'stokkurang' => $stokKurang,
        ]);

        // Save the BarangKeluar record
        $barangKeluar->save();

        // Update Laporan record
        $stokAkhirBaru = $laporan->stokakhir - $stokKurang;
        $laporan->update([
            'stokkurang' => $laporan->stokkurang + $stokKurang,
            'stokakhir' => $stokAkhirBaru
        ]);

        return $barangKeluar;
    }
}