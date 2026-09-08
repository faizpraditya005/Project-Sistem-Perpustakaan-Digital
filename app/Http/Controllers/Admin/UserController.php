<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; // TAMBAHKAN INI: Untuk fitur enkripsi password

class UserController extends Controller
{
    // Fungsi untuk menampilkan daftar semua akun bidang
    public function index()
    {
        // Mengambil semua user kecuali admin utama agar tidak terhapus/teredit tidak sengaja
        $users = User::where('email', '!=', 'admin.perpus@bkd.jatengprov.go.id')->get();
        return view('admin.users.index', compact('users'));
    }

    // Untuk menampilkan halaman form registrasi bidang
    public function create()
    {
        return view('admin.users.create'); 
    }

    public function store(Request $request)
    {
        // 1. Validasi data yang diinput oleh admin
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' akan otomatis mengecek input 'password_confirmation'
        ]);

        // 2. Simpan data ke tabel users, password otomatis dienkripsi
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Arahkan kembali ke halaman Daftar Akun dengan pesan sukses
        return redirect()->route('users.index')->with('sukses', 'Akun Bidang baru berhasil didaftarkan!');
    }
    
    // Fungsi untuk menampilkan halaman edit profil & reset password
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // PERUBAHAN DI SINI: Mengarah ke file editadmin.blade.php di dalam folder admin/users/
        return view('admin.users.editadmin', compact('user'));
    }

    // BARU: Fungsi untuk menyimpan perubahan Nama & Email
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            // Validasi email agar tidak bentrok, kecuali dengan emailnya sendiri
            'email' => 'required|string|email|max:255|unique:users,email,'.$id, 
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('sukses', 'Profil akun berhasil diperbarui!');
    }

    // BARU: Fungsi khusus untuk Reset Password oleh Admin
    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Enkripsi password baru dengan Bcrypt
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('sukses', 'Password akun ' . $user->name . ' berhasil direset!');
    }
}