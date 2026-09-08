<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- TAMBAHKAN BARIS INI DI ATAS
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory; // Trait ini membutuhkan import di atas

    protected $fillable = [
        'judul',
        'penulis',
        'jenis_koleksi',
        'status_akses',
        'jumlah_copy',
        'file_path',
        'lokasi_rak',
    ];
}