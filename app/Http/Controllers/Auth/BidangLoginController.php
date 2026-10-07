<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BidangLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input dari tombol yang diklik
        $request->validate([
            'bidang_id' => 'required|string'
        ]);

        // Mapping ID bidang ke email (atau username) yang ada di Database Users Anda
        // Sesuaikan email ini dengan data email yang Anda buat di database (seeder/manual)
        $emailBidang = [
            'sekretariat' => 'sekretariat@bkd.jatengprov.go.id',
            'bangkom'     => 'bangkom@bkd.jatengprov.go.id',
            'mutasi'      => 'mutasi@bkd.jatengprov.go.id',
            'pembinaan'   => 'pembinaan@bkd.jatengprov.go.id',
            'pengadaan'   => 'pengadaan@bkd.jatengprov.go.id',
        ];

        $emailTujuan = $emailBidang[$request->bidang_id] ?? null;

        if ($emailTujuan) {
            // Cari user di database berdasarkan email bidang tersebut
            $user = User::where('email', $emailTujuan)->first();

            if ($user) {
                // Lakukan LOGIN PAKSA (tanpa mengecek password)
                Auth::login($user);
                
                // Arahkan langsung ke dashboard
                return redirect()->route('dashboard')->with('success', 'Berhasil masuk sebagai ' . $user->name);
            }
        }

        // Jika user bidang belum didaftarkan di database, kembalikan dengan pesan error
        return back()->with('error', 'Akses bidang ini belum dikonfigurasi di sistem.');
    }
}