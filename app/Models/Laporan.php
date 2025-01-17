<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanFactory> */
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = ['barang_id','stokawal','stoktambah','stokkurang','stokakhir'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
