<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    /** @use HasFactory<\Database\Factories\BarangKeluarFactory> */
    use HasFactory;
    protected $table = 'barang_keluars';
    protected $fillable = ['barang_id','stokkurang'];

    public function barang()
    {
        return $this->belongsTo(Barang::class,  'barang_id', 'id');
        
    }
}
