<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;

    protected $table = 'kategoris';
    protected $fillable = ['name'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
        
    }
}
