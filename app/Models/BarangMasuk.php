<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\BarangMasuk\BarangMasukObserver;

use App\Models\Barang;

#[ObservedBy([BarangMasukObserver::class])]
class BarangMasuk extends Model
{
    protected $table = 'tbl_barang_masuk';
    protected $primaryKey = 'id_masuk';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_masuk',
        'barang',
        'tanggal',
        'jumlah',
        'penerima_masuk',
    ];

    public function barangTable(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang', 'id_barang');
    }
}
