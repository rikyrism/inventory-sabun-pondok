<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];

    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class, 'kategori', 'id_kategori');
    }
}
