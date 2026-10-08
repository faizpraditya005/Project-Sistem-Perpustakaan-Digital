<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBuku;
use App\Models\BukuFisik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanBukuController extends Controller
{
    // 1. Simpan Pengajuan Peminjaman Baru (Pegawai)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_fisik_id'   => 'required|exists:buku_fisiks,id',
            'nama_peminjam'   => 'required|string|max:255',
            'email_peminjam'  => 'required|email|max:255',
            'bidang_peminjam' => 'nullable|string|max:255',
            'tanggal_ambil'   => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_ambil',
        ]);

        // Cek stok buku
        $buku = BukuFisik::findOrFail($request->buku_fisik_id);
        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku fisik sedang habis.');
        }

        // Simpan data peminjaman
        PeminjamanBuku::create([
            'buku_fisik_id'   => $request->buku_fisik_id,
            'nama_peminjam'   => $request->nama_peminjam,
            'email_peminjam'  => $request->email_peminjam,
            'bidang_peminjam' => $request->bidang_peminjam,
            'tanggal_ambil'   => $request->tanggal_ambil,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status'          => 'Pending',
        ]);

        // Kurangi stok buku 1
        $buku->decrement('stok');

        return redirect()->route('peminjaman.status')->with('success', 'Pengajuan peminjaman buku berhasil dibuat!');
    }

    // 2. Halaman Status Peminjaman Aktif
    public function status()
    {
        $user = Auth::user();

        // Cek apakah user adalah Admin
        $isAdmin = strtolower($user->role ?? '') === 'admin' || 
                   strtolower($user->role ?? '') === 'admin perpustakaan' || 
                   $user->is_admin || 
                   str_contains(strtolower($user->name ?? ''), 'admin');

        if ($isAdmin) {
            // Admin: Melihat seluruh transaksi peminjaman aktif
            $peminjamanAktif = PeminjamanBuku::with('bukuFisik')
                ->whereIn('status', ['Pending', 'Dipinjam'])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Pegawai: Melihat peminjaman milik sendiri
            $peminjamanAktif = PeminjamanBuku::with('bukuFisik')
                ->where('email_peminjam', $user->email)
                ->whereIn('status', ['Pending', 'Dipinjam'])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('peminjaman.status', compact('peminjamanAktif'));
    }

    // 3. Halaman Riwayat Pengembalian (Selesai)
    public function riwayat()
    {
        $user = Auth::user();

        $isAdmin = strtolower($user->role ?? '') === 'admin' || 
                   strtolower($user->role ?? '') === 'admin perpustakaan' || 
                   $user->is_admin || 
                   str_contains(strtolower($user->name ?? ''), 'admin');

        if ($isAdmin) {
            $riwayatSelesai = PeminjamanBuku::with('bukuFisik')
                ->where('status', 'Selesai')
                ->orderBy('updated_at', 'desc')
                ->get();
        } else {
            $riwayatSelesai = PeminjamanBuku::with('bukuFisik')
                ->where('email_peminjam', $user->email)
                ->where('status', 'Selesai')
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        return view('peminjaman.riwayat', compact('riwayatSelesai'));
    }

    // 4. Aksi Admin: Serahkan Buku (Pending -> Dipinjam)
    public function konfirmasiSerah($id)
    {
        $peminjaman = PeminjamanBuku::findOrFail($id);
        $peminjaman->update(['status' => 'Dipinjam']);

        return redirect()->back()->with('success', 'Buku berhasil diserahkan kepada peminjam.');
    }

    // 5. Aksi Admin: Konfirmasi Kembalikan Buku (Dipinjam -> Selesai & Tambah Stok)
    public function kembalikan($id)
    {
        $peminjaman = PeminjamanBuku::findOrFail($id);
        $peminjaman->update([
            'status' => 'Selesai',
            'tanggal_kembali' => now(),
        ]);

        // Stok buku bertambah kembali 1
        $buku = BukuFisik::find($peminjaman->buku_fisik_id);
        if ($buku) {
            $buku->increment('stok');
        }

        return redirect()->back()->with('success', 'Buku telah dikembalikan dan stok diperbarui!');
    }
}