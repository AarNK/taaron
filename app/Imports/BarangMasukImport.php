<?php

namespace App\Imports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangMasukImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new BarangMasuk([
            'barang_id' => $row[0],
            'stoktambah' => $row[1],
        ]);
    }
} 