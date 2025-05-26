<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTindakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kunjungan_id',
        'tindakan_id',
        'obat_id',
        'keterangan',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function pasien()
    {
        return $this->hasOneThrough(Pasien::class, Kunjungan::class, 'id', 'id', 'kunjungan_id', 'pasien_id');
    }
}
