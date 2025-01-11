<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanFactory> */
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = ['name','kategori','satuan','stokawal','stoktambah','stokkeluar','stokakhir'];
}
