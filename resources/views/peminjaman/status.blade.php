<x-app-layout>
    @php
        $user = Auth::user();
        $isAdmin = strtolower($user->role ?? '') === 'admin' || 
                   strtolower($user->role ?? '') === 'admin perpustakaan' || 
                   !empty($user->is_admin) || 
                   str_contains(strtolower($user->name ?? ''), 'admin');
    @endphp

    <div class="min-h-screen bg-slate-50/50 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-black text-slate-800">
                        {{ $isAdmin ? 'Kelola Status Peminjaman (Admin)' : 'Status Peminjaman Saya' }}
                    </h1>
                    <p class="text-sm font-medium text-slate-500">
                        {{ $isAdmin ? 'Verifikasi penyerahan dan pengembalian buku fisik pegawai BKD.' : 'Pantau peminjaman aktif dan batas waktu pengembalian Anda.' }}
                    </p>
                </div>
                
                @if($isAdmin)
                    <span class="px-4 py-2 bg-blue-100 text-blue-800 text-xs font-black rounded-xl border border-blue-200 self-start">
                        Mode Akses: Administrator Perpustakaan
                    </span>
                @endif
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-sm font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-wider">
                                <th class="p-4 pl-6">Peminjam</th>
                                <th class="p-4">Buku Fisik</th>
                                <th class="p-4">Tgl Ambil</th>
                                <th class="p-4">Tenggat Kembali</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 pr-6 text-center">Aksi / Catatan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                            @forelse($peminjamanAktif as $item)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    
                                    <td class="p-4 pl-6">
                                        <div class="font-bold text-slate-800">{{ $item->nama_peminjam }}</div>
                                        <div class="text-xs text-slate-400">{{ $item->bidang_peminjam }} • {{ $item->email_peminjam }}</div>
                                    </td>
                                    <td class="p-4 font-bold text-blue-900">
                                        {{ $item->bukuFisik->judul ?? 'Buku Fisik' }}
                                    </td>
                                    <td class="p-4">{{ \Carbon\Carbon::parse($item->tanggal_ambil)->format('d M Y') }}</td>
                                    <td class="p-4 font-bold text-amber-600">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}
                                    </td>
                                    <td class="p-4">
                                        @if($item->status == 'Pending')
                                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-black rounded-full">Menunggu Ambil</span>
                                        @else
                                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-black rounded-full">Sedang Dipinjam</span>
                                        @endif
                                    </td>

                                    <!-- TOMBOL AKSI BERDASARKAN HAK AKSES -->
                                    <td class="p-4 pr-6 text-center">
                                        @if($isAdmin)
                                            <!-- TAMPILAN UNTUK ADMIN PERPUSTAKAAN -->
                                            <div class="flex items-center justify-center gap-2">
                                                @if($item->status == 'Pending')
                                                    <form action="{{ route('peminjaman.serah', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black rounded-xl shadow-sm transition-all">
                                                            Serahkan Buku
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('peminjaman.kembalikan', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" onclick="return confirm('Konfirmasi bahwa fisik buku telah diterima?')" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black rounded-xl shadow-sm transition-all">
                                                            Konfirmasi Kembali
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        @else
                                            <!-- TAMPILAN UNTUK KARYAWAN / PEGAWAI -->
                                            <span class="text-xs text-slate-400 font-normal italic">
                                                {{ $item->status == 'Pending' ? 'Tunjukkan halaman ini ke petugas' : 'Bawa buku sebelum tenggat' }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-8 text-center text-slate-400 font-medium">Tidak ada transaksi peminjaman aktif.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>