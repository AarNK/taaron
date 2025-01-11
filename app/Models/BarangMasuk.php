<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    /** @use HasFactory<\Database\Factories\BarangMasukFactory> */
    use HasFactory;

    protected $table = 'barang_masuks';
    protected $fillable = ['barang_id','stokawal','stoktambah','stokakhir'];

    public function barang()
    {
        return $this->belongsTo(Barang::class,  'barang_id', 'id');
        
    }
}
