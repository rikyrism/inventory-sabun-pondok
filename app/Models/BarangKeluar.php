<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\BarangKeluar\BarangKeluarObserver;

#[ObservedBy([BarangKeluarObserver::class])]
class BarangKeluar extends Model
{
    protected $fillable = [
        'unique_id',
        'barang_id',
        'tanggal',
        'jumlah',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
