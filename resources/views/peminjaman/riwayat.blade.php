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
                        {{ $isAdmin ? 'Arsip Riwayat Pengembalian (Seluruh Pegawai)' : 'Riwayat Peminjaman Saya' }}
                    </h1>
                    <p class="text-sm font-medium text-slate-500">Daftar transaksi buku fisik yang telah selesai dikembalikan.</p>
                </div>

                @if($isAdmin)
                    <button onclick="window.print()" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold rounded-xl shadow-md transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Cetak Laporan Arsip
                    </button>
                @endif
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-wider">
                                <th class="p-4 pl-6">Peminjam</th>
                                <th class="p-4">Buku Fisik</th>
                                <th class="p-4">Tgl Pinjam</th>
                                <th class="p-4">Tgl Dikembalikan</th>
                                <th class="p-4 pr-6 text-center">Status Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                            @forelse($riwayatSelesai as $item)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="p-4 pl-6">
                                        <div class="font-bold text-slate-800">{{ $item->nama_peminjam }}</div>
                                        <div class="text-xs text-slate-400">{{ $item->bidang_peminjam }}</div>
                                    </td>
                                    <td class="p-4 font-bold text-slate-800">
                                        {{ $item->bukuFisik->judul ?? 'Buku Fisik' }}
                                    </td>
                                    <td class="p-4 text-xs text-slate-500">{{ \Carbon\Carbon::parse($item->tanggal_ambil)->format('d M Y') }}</td>
                                    <td class="p-4 text-xs text-slate-500">{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y, H:i') }}</td>
                                    <td class="p-4 pr-6 text-center">
                                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-black rounded-full">
                                            ✓ Selesai
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-slate-400 font-medium">Belum ada riwayat pengembalian buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>