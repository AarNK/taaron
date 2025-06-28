<?php

namespace App\Imports;

use App\Models\Jasa;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JasaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Skip if required fields are empty
        if (empty($row['nama_jasa']) || empty($row['kategori']) || empty($row['satuan']) || empty($row['harga'])) {
            return null;
        }

        $name = $row['nama_jasa'] ?? null;
        $kategoriName = $row['kategori'] ?? null;
        $satuanName = $row['satuan'] ?? null;
        $harga = $row['harga'] ?? null;

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

        $jasa = new Jasa([
            'barang_id' => $barang->id,
            'harga' => $harga,
        ]);

        // Check if Laporan exists for this barang, if not create one
        $laporan = Laporan::where('barang_id', $jasa->barang_id)->orderBy('created_at', 'desc')->first();
        
        if (!$laporan) {
            // Create new Laporan record for new barang
            $laporan = Laporan::create([
                'barang_id' => $jasa->barang_id,
                'stokawal' => 0,
                'stoktambah' => 0,
                'stokkurang' => 0,
                'stokakhir' => $jasa->harga,
            ]);
        } else {
            // Update existing Laporan record
            $stokAkhirBaru = $laporan->stokakhir + $jasa->harga;
            $laporan->update([
                'stoktambah' => $laporan->stoktambah + $jasa->harga,
                'stokakhir' => $stokAkhirBaru
            ]);
        }

        return $jasa;
    }
}