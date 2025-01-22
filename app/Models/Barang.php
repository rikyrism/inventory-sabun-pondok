<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $fillable = [
        'unique_id',
        'nama_barang',
        'stok_minimum',
        'stok',
        'satuan'
    ];

    public function barang_masuks(): HasMany
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barang_keluars(): HasMany
    {
        return $this->hasMany(BarangKeluar::class);
    }

}
