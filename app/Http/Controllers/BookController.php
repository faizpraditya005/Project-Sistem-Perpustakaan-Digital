<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // 1. Menampilkan data statistik & pencarian untuk Halaman Dashboard
    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $bukuFisik = Book::where('jenis_koleksi', 'Buku Fisik')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%");
            })->get();

        $eBook = Book::where('jenis_koleksi', 'E-Book')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%");
            })->get();

        $tesis = Book::where('jenis_koleksi', 'Tesis')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%");
            })->get();

        return view('dashboard', compact('bukuFisik', 'eBook', 'tesis', 'search'));
    }

    // 2. Menampilkan daftar buku berdasarkan kategori/filter (untuk halaman /books?type=...)
    public function index(Request $request)
    {
        $type = $request->query('type');

        $jenisKoleksi = match($type) {
            'buku-fisik' => 'Buku Fisik',
            'ebook'      => 'E-Book',
            'tesis'      => 'Tesis',
            default      => null,
        };

        $books = Book::when($jenisKoleksi, function ($query, $jenisKoleksi) {
            return $query->where('jenis_koleksi', $jenisKoleksi);
        })->get();

        return view('books.index', compact('books', 'type'));
    }

    // 3. Menampilkan form upload referensi baru
    public function create()
    {
        return view('books.create');
    }

    // 4. Memproses penyimpanan data dan file PDF ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:150',
            'jenis_koleksi' => 'required|in:Buku Fisik,E-Book,Tesis',
            'status_akses'  => 'required|in:Publik,Internal',
            'jumlah_copy'   => 'required|integer|min:1',
            'file_path'     => 'required_if:jenis_koleksi,E-Book|required_if:jenis_koleksi,Tesis|nullable|mimes:pdf|max:20480',
            'lokasi_rak'    => 'required_if:jenis_koleksi,Buku Fisik|nullable|string|max:50',
        ]);

        $filePath = null;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filePath = $file->store('documents', 'public');
        }

        Book::create([
            'judul'         => $request->judul,
            'penulis'       => $request->penulis,
            'jenis_koleksi' => $request->jenis_koleksi,
            'status_akses'  => $request->status_akses,
            'jumlah_copy'   => $request->jumlah_copy,
            'file_path'     => $filePath,
            'lokasi_rak'    => $request->jenis_koleksi === 'Buku Fisik' ? $request->lokasi_rak : null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Koleksi referensi baru berhasil ditambahkan!');
    }

    // 5. Fungsi admin untuk men-take down koleksi
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->file_path && Storage::disk('public')->exists($book->file_path)) {
            Storage::disk('public')->delete($book->file_path);
        }

        $book->delete();

        return redirect()->route('dashboard')->with('success', 'Koleksi berhasil di-take down dari sistem!');
    }
}