<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// --- UBAH BAGIAN INI AGAR MEMANGGIL CONTROLLER ---
Route::get('/dashboard', [BookController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');

Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit_admin');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::put('/admin/users/{id}/update-password', [UserController::class, 'updatePassword'])->name('users.update_password');

// Rute penghapusan
Route::delete('/admin/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// --- ROUTE BUKU ---
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

require __DIR__.'/auth.php';