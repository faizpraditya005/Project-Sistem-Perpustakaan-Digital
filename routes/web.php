<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\BidangLoginController;

// 1. ROUTE PUBLIC / UMUM
Route::get('/', function () {
    return view('welcome');
});

Route::post('/login-bidang', [BidangLoginController::class, 'login'])->name('login.bidang');

// 2. DASHBOARD (Wajib Login & Verified)
Route::get('/dashboard', [BookController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. ROUTE APLIKASI (Wajib Login)
Route::middleware(['auth'])->group(function () {
    
    // Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Katalog Buku Fisik
    Route::get('/katalog-buku', [KatalogController::class, 'index'])->name('katalog.index');
    Route::get('/katalog-buku/tambah', [KatalogController::class, 'create'])->name('katalog.create');
    Route::post('/katalog-buku', [KatalogController::class, 'store'])->name('katalog.store');

    // Transaksi Peminjaman & Status (Menggunakan PeminjamanBukuController)
    Route::post('/peminjaman-buku/ajukan', [PeminjamanBukuController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/status', [PeminjamanBukuController::class, 'status'])->name('peminjaman.status');
    Route::get('/peminjaman/riwayat', [PeminjamanBukuController::class, 'riwayat'])->name('peminjaman.riwayat');

    // Aksi Khusus Admin Perpustakaan (Menggunakan PeminjamanBukuController)
    Route::post('/peminjaman/{id}/serah', [PeminjamanBukuController::class, 'konfirmasiSerah'])->name('peminjaman.serah');
    Route::post('/peminjaman/{id}/kembalikan', [PeminjamanBukuController::class, 'kembalikan'])->name('peminjaman.kembalikan');

    // Manajemen User (Admin)
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit_admin');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::put('/admin/users/{id}/update-password', [UserController::class, 'updatePassword'])->name('users.update_password');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Manajemen Buku
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::delete('/admin/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

require __DIR__.'/auth.php';