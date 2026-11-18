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
        // Validasi input dari tombol
        $request->validate([
            'bidang_id' => 'required|string'
        ]);

        // 1. KONDISI KHUSUS UNTUK TOMBOL "Masuk"
        if ($request->bidang_id === 'Masuk') {
            $user = User::firstOrCreate(
                ['email' => 'tamu@bkd.jatengprov.go.id'],
                [
                    'name'     => 'Tamu',
                    'password' => bcrypt('password123'),
                    'role'     => 'user'
                ]
            );

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Berhasil masuk ke SIKURA BKD');
        }

        // 2. KONDISI UNTUK BIDANG LAINNYA
        $emailBidang = [
            'sekretariat' => 'sekretariat@bkd.jatengprov.go.id',
            'bangkom'     => 'bangkom@bkd.jatengprov.go.id',
            'pembinaan'   => 'pembinaan@bkd.jatengprov.go.id',
            'pengadaan'   => 'pengadaan@bkd.jatengprov.go.id',
        ];

        $emailTujuan = $emailBidang[$request->bidang_id] ?? null;

        if ($emailTujuan) {
            $user = User::where('email', $emailTujuan)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', 'Berhasil masuk sebagai ' . $user->name);
            }
        }

        return back()->with('error', 'Akses bidang ini belum dikonfigurasi di sistem.');
    }
}