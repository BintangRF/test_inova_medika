<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nik', 'alamat', 'no_telepon'];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
