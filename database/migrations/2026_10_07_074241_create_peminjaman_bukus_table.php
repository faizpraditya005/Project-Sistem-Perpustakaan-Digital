<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukusTable extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_fisik_id')->constrained('buku_fisiks')->onDelete('cascade');
            
            // Identitas Peminjam ditarik otomatis dari sistem (Aman & Tidak bisa dipalsukan)
            $table->string('nama_peminjam');
            $table->string('email_peminjam');
            $table->string('bidang_peminjam')->nullable();
            
            $table->date('tanggal_ambil');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['Pending', 'Dipinjam', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
}