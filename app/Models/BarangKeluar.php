<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\BarangKeluar\BarangKeluarObserver;

use App\Models\Barang;

#[ObservedBy([BarangKeluarObserver::class])]
class BarangKeluar extends Model
{
    protected $table = 'tbl_barang_keluar';
    protected $primaryKey = 'id_keluar';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_keluar',
        'barang',
        'tanggal',
        'jumlah',
    ];

    public function barangTable(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang', 'id_barang');
    }
}
