<x-app-layout>
    @php
        $theme = [
            'icon_bg' => 'bg-slate-500/20 text-slate-400 border-slate-500/30',
            'focus_ring' => 'focus:ring-slate-500 focus:border-slate-500',
            'card_hover' => 'hover:shadow-[0_0_25px_rgba(100,116,139,0.15)] hover:border-slate-700/50',
            'icon_hover' => 'group-hover:text-slate-500/20',
            'text_hover' => 'group-hover:text-slate-400',
            'btn_pdf' => 'bg-slate-600/20 hover:bg-slate-600 text-slate-400 hover:text-white border-slate-500/30',
        ];

        if ($type == 'buku-fisik') {
            $theme = [
                'icon_bg' => 'bg-amber-500/20 text-amber-400 border-amber-800/100',
                'focus_ring' => 'focus:ring-amber-500 focus:border-amber-500',
                'card_hover' => 'hover:shadow-[0_0_25px_rgba(245,158,11,0.15)] hover:border-amber-900/500',
                'icon_hover' => 'group-hover:text-amber-500/20',
                'text_hover' => 'group-hover:text-amber-400',
                'btn_pdf' => '', // Buku fisik tidak pakai tombol PDF
            ];
        } elseif ($type == 'ebook') {
            $theme = [
                'icon_bg' => 'bg-blue-500/20 text-blue-400 border-blue-800/100',
                'focus_ring' => 'focus:ring-blue-500 focus:border-blue-500',
                'card_hover' => 'hover:shadow-[0_0_25px_rgba(59,130,246,0.15)] hover:border-blue-900/500',
                'icon_hover' => 'group-hover:text-blue-500/20',
                'text_hover' => 'group-hover:text-blue-400',
                'btn_pdf' => 'bg-blue-600/20 hover:bg-blue-600 text-blue-400 hover:text-white border-blue-500/30',
            ];
        } elseif ($type == 'tesis') {
            $theme = [
                'icon_bg' => 'bg-emerald-500/20 text-emerald-400 border-emerald-800/100',
                'focus_ring' => 'focus:ring-emerald-500 focus:border-emerald-500',
                'card_hover' => 'hover:shadow-[0_0_25px_rgba(16,185,129,0.15)] hover:border-emerald-900/500',
                'icon_hover' => 'group-hover:text-emerald-500/20',
                'text_hover' => 'group-hover:text-emerald-400',
                'btn_pdf' => 'bg-emerald-600/20 hover:bg-emerald-600 text-emerald-400 hover:text-white border-emerald-500/30',
            ];
        }
    @endphp

    <!-- HEADER -->
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2.5 rounded-xl border {{ $theme['icon_bg'] }}">
                    @if($type == 'buku-fisik') 📚
                    @elseif($type == 'ebook') 💾
                    @elseif($type == 'tesis') 🎓
                    @else 🗂️
                    @endif
                </div>
                <h2 class="font-bold text-xl text-white tracking-wide">
                    @if($type == 'buku-fisik') Daftar Koleksi: Buku Fisik
                    @elseif($type == 'ebook') Daftar Koleksi: E-Book
                    @elseif($type == 'tesis') Daftar Koleksi: Tesis & Riset Pegawai
                    @else Semua Koleksi Perpustakaan
                    @endif
                </h2>
            </div>
            
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-sm font-medium rounded-xl border border-slate-700 shadow-sm transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <!-- KONTEN UTAMA -->
    <div class="py-8 bg-slate-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- SEARCH & FILTER BAR -->
            <div class="flex flex-col md:flex-row gap-4 justify-between items-center bg-slate-900 p-4 rounded-2xl shadow-lg border border-slate-800/60">
                <div class="w-full md:w-1/2 relative">
                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" placeholder="Cari judul buku, penulis, atau kata kunci..." class="w-full pl-10 pr-4 py-2 bg-slate-950 border border-slate-800 text-slate-200 placeholder-slate-500 rounded-xl text-sm transition-shadow {{ $theme['focus_ring'] }}">
                </div>
                <div class="w-full md:w-auto flex gap-3">
                    <select class="w-full md:w-auto bg-slate-950 border border-slate-800 text-slate-300 text-sm rounded-xl px-4 py-2 cursor-pointer {{ $theme['focus_ring'] }}">
                        <option>Terbaru Ditambahkan</option>
                        <option>Abjad A - Z</option>
                        <option>Abjad Z - A</option>
                    </select>
                </div>
            </div>

            <!-- EMPTY STATE (JIKA DATA KOSONG) -->
            @if($books->isEmpty())
                <div class="bg-slate-900/50 backdrop-blur-xl rounded-3xl border border-slate-800/60 p-12 flex flex-col items-center justify-center text-center shadow-2xl relative overflow-hidden h-[400px]">
                    <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: repeating-linear-gradient(45deg, #1e293b 25%, transparent 25%, transparent 75%, #1e293b 75%, #1e293b), repeating-linear-gradient(45deg, #1e293b 25%, #0f172a 25%, #0f172a 75%, #1e293b 75%, #1e293b); background-size: 40px 40px;"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="text-7xl mb-6 drop-shadow-[0_0_15px_rgba(255,255,255,0.1)]">📭</div>
                        <h3 class="text-2xl font-black text-slate-200 mb-3 tracking-wide">Rak Perpustakaan Masih Kosong</h3>
                        <p class="text-slate-400 max-w-md mx-auto text-sm leading-relaxed">
                            Koleksi untuk kategori ini belum tersedia. Silakan tambahkan koleksi referensi baru melalui menu di halaman Dashboard Admin.
                        </p>
                    </div>
                </div>

            <!-- GRID KOLEKSI (JIKA ADA DATA) -->
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($books as $book)
                        <div class="bg-slate-900 rounded-2xl border border-slate-800 overflow-hidden group flex flex-col h-full transition-all duration-300 hover:-translate-y-1 {{ $theme['card_hover'] }}">
                            
                            <!-- Bagian Cover / Visual Atas Card -->
                            <div class="h-28 bg-gradient-to-br from-slate-800 to-slate-950 relative border-b border-slate-800/50 flex items-center justify-center">
                                <svg class="w-16 h-16 text-slate-700/30 group-hover:scale-110 transition-all duration-500 {{ $theme['icon_hover'] }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                </svg>

                                <div class="absolute bottom-3 left-4">
                                    <span class="px-2.5 py-1 bg-slate-950/80 backdrop-blur-md rounded-md text-[10px] font-bold text-slate-300 tracking-widest uppercase border border-slate-700/50">
                                        {{ $book->jenis_koleksi }}
                                    </span>
                                </div>
                            </div>

                            <!-- Detail Buku -->
                            <div class="p-5 flex-1 flex flex-col">
                                <h3 class="text-base font-bold text-slate-100 mb-1.5 line-clamp-2 transition-colors leading-tight {{ $theme['text_hover'] }}" title="{{ $book->judul }}">
                                    {{ $book->judul }}
                                </h3>
                                <p class="text-xs text-slate-500 font-medium mb-4 line-clamp-1">
                                    Oleh: <span class="text-slate-400">{{ $book->penulis }}</span>
                                </p>

                                <div class="mt-auto pt-4 border-t border-slate-800/60 w-full">
                                    
                                    <!-- LOGIKA TAMPILAN BERDASARKAN JENIS KOLEKSI -->
                                    @if($book->jenis_koleksi == 'E-Book' || $book->jenis_koleksi == 'Tesis')
                                        <!-- Tombol Khusus Berkas Digital -->
                                        @if($book->file_path)
                                            <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-4 py-2 border hover:border-transparent rounded-xl transition-all duration-300 text-sm font-bold group/btn {{ $theme['btn_pdf'] }}">
                                                <svg class="w-4 h-4 group-hover/btn:animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                                                Buka PDF
                                            </a>
                                        @else
                                            <div class="w-full text-center px-4 py-2 bg-slate-800 text-slate-500 rounded-xl text-xs font-bold border border-slate-700">
                                                File Tidak Tersedia
                                            </div>
                                        @endif

                                    @else
                                        <!-- Info Khusus Buku Fisik -->
                                        <div class="flex justify-between items-end">
                                            <div>
                                                <p class="text-[9px] text-slate-500 uppercase tracking-wider mb-1">Tersedia</p>
                                                <p class="text-sm font-bold text-emerald-400">{{ $book->jumlah_copy }} <span class="text-xs font-medium text-emerald-600">Copy</span></p>
                                            </div>
                                            
                                            @if($book->lokasi_rak)
                                                <div class="text-right">
                                                    <p class="text-[9px] text-slate-500 uppercase tracking-wider mb-1">Lokasi Rak</p>
                                                    <p class="text-sm font-bold text-amber-400">{{ $book->lokasi_rak }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>