<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('judul', 255);
        $table->string('penulis', 150)->nullable(); // Tambahan untuk penulis tesis/buku
        // Mengubah kategori sesuai kebutuhan Anda:
        $table->enum('jenis_koleksi', ['Buku Fisik', 'E-Book', 'Tesis'])->default('E-Book');
        $table->string('file_path', 255)->nullable(); // Nullable karena Buku Fisik tidak punya file PDF
        $table->string('lokasi_rak', 50)->nullable(); // Khusus Buku Fisik untuk petunjuk di perpustakaan BKD
        $table->integer('jumlah_copy')->default(1); 
        $table->enum('status_akses', ['Publik', 'Internal'])->default('Internal'); // Publik = semua orang, Internal = khusus ASN BKD
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
