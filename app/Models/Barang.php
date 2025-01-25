<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'stok_minimum',
        'stok',
        'satuan'
    ];

    public function barang_masuks(): HasMany
    {
        return $this->hasMany(BarangMasuk::class, 'barang', 'id_barang');
    }

    public function barang_keluars(): HasMany
    {
        return $this->hasMany(BarangKeluar::class, 'barang', 'id_barang');
    }

}
