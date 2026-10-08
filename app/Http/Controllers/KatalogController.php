<?php

namespace App\Http\Controllers;

use App\Models\BukuFisik;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $bukuList = BukuFisik::all();
        return view('katalog.index', compact('bukuList'));
    }

    public function create()
    {
        return view('katalog.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'kode_buku' => 'required|unique:buku_fisiks,kode_buku',
        'judul'     => 'required|string|max:255',
        'penulis'   => 'required|string|max:255',
        'kategori'  => 'required|string',
        'tahun'     => 'required|digits:4',
        'stok'      => 'required|integer|min:1',
    ]);

    // Hanya ambil data yang sudah divalidasi (tanpa _token)
    BukuFisik::create($validated);

    return redirect()->route('katalog.index')->with('success', 'Koleksi buku fisik BKD berhasil ditambahkan!');
}
}