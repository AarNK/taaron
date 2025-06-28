<?php

namespace App\Imports;

use App\Models\Jasa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JasaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Skip jika nama atau harga kosong
        if (empty($row['nama']) || empty($row['harga'])) {
            return null;
        }

        return new Jasa([
            'name' => $row['nama'],
            'harga' => $row['harga'],
        ]);
    }
}
