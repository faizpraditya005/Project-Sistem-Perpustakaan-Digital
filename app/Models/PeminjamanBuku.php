<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;

    // Mengizinkan seluruh kolom diisi secara massal
    protected $guarded = [];

    // Relasi balik ke model BukuFisik
    public function bukuFisik()
    {
        return $this->belongsTo(BukuFisik::class, 'buku_fisik_id');
    }
}