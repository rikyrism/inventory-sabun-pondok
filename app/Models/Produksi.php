<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Barang;

class Produksi extends Model
{
    protected $table = 'tbl_produksi';
    protected $primaryKey = 'id_produksi';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_produksi',
        'id_barang',
        'nama_barang',
        'satuan',
        'tanggal',
        'jumlah',
        'status',
    ];

    public function barangTable(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
