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

    public function destroy($id)
    {
        // Cari data buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Jika buku tersebut adalah E-Book atau Tesis dan memiliki file PDF
        if (in_array($book->jenis_koleksi, ['E-Book', 'Tesis']) && !empty($book->file_path)) {
            
            // Cek apakah file fisik PDF benar-benar ada di server, lalu hapus
            if (Storage::disk('public')->exists($book->file_path)) {
                Storage::disk('public')->delete($book->file_path);
            }
        }

        // Hapus data buku dari database
        $book->delete();

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Koleksi ' . $book->jenis_koleksi . ' dan file PDF berhasil dihapus permanen!');
    }

    public function viewPdf($id)
{
    $book = Book::findOrFail($id);

    $path = storage_path('app/public/' . $book->file_path);

    if (!file_exists($path)) {
        $path = storage_path('app/' . $book->file_path);
    }
    if (!file_exists($path)) {
        abort(404, 'File PDF tidak ditemukan di folder penyimpanan server.');
    }

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $book->judul . '.pdf"'
    ]);
}
}