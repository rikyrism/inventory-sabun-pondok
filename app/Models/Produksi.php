<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produksi extends Model
{
    protected $fillable = [
        'unique_id',
        'barang_id',
        'nama_barang',
        'satuan',
        'tanggal',
        'jumlah',
        'status',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
