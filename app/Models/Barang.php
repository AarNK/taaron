<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = ['name', 'satuan_id', 'kategori_id'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function barangmasuks()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangkeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
