<x-app-layout>
    <style>
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim-fade-up {
            animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>

    <div x-data="katalogBuku()" class="min-h-screen bg-slate-50/50 py-10 relative overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Notifikasi Berhasil -->
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-emerald-700 text-sm font-bold shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- 1. BANNER HEADER & PENCARIAN -->
            <!-- 1. HEADER & PENCARIAN KATALOG BUKU FISIK -->
            <div class="mb-10 anim-fade-up" style="animation-delay: 0.1s;">
                <div
                    class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 rounded-[2rem] p-8 sm:p-10 shadow-2xl shadow-blue-900/20 relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-6">

                    <!-- Dekorasi Kaca -->
                    <div
                        class="absolute -right-20 -top-20 w-64 h-64 bg-white/10 blur-2xl rounded-full pointer-events-none">
                    </div>

                    <!-- Judul & Subtitle -->
                    <div class="relative z-10 lg:w-6/12 text-center lg:text-left">
                        <h1 class="text-2xl sm:text-3xl font-black text-white mb-2 tracking-tight">Katalog Buku Fisik BKD
                        </h1>
                        <p class="text-blue-200 text-xs sm:text-sm font-medium leading-relaxed">
                            Klik pada kotak buku fisik di bawah untuk mengajukan peminjaman. Sertakan identitas dan
                            batas tanggal pinjam untuk pencatatan keamanan aset.
                        </p>
                    </div>

                    <!-- Kolom Pencarian & Tombol Aksi -->
                    <div class="relative z-10 w-full lg:w-6/12 shrink-0 space-y-3">
                        <!-- Input Pencarian -->
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="text" x-model="searchQuery"
                                placeholder="Cari judul buku, penulis, atau kategori..."
                                class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white/95 border-none focus:ring-4 focus:ring-amber-400/30 text-slate-900 font-semibold placeholder-slate-400 shadow-inner text-sm transition-all">
                        </div>

                        <!-- Deretan Tombol Pintas di Bawah Pencarian -->
                        <!-- Deretan Tombol Pintas di Bawah Pencarian -->
                        <div class="flex flex-wrap items-center justify-start lg:justify-end gap-2 pt-1">
                            <!-- Tombol Status Peminjaman (Semua User) -->
                            <a href="{{ route('peminjaman.status') }}"
                                class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-amber-400 hover:bg-amber-300 text-slate-950 font-black text-xs rounded-xl shadow-md transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status Peminjaman
                            </a>

                            <!-- Tombol Tambah Buku (Menyesuaikan Berbagai Format Akun Admin) -->
                            @if (strtolower(Auth::user()->role ?? '') === 'admin' ||
                                    strtolower(Auth::user()->role ?? '') === 'admin perpustakaan' ||
                                    Auth::user()->is_admin ||
                                    str_contains(strtolower(Auth::user()->name ?? ''), 'admin'))
                                <a href="{{ route('katalog.create') }}"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-600 hover:bg-blue-500 text-white font-black text-xs rounded-xl shadow-md shadow-blue-600/30 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah Koleksi Baru
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <!-- 2. DAFTAR KOLEKSI BUKU FISIK (Dapat Diklik Langsung) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 anim-fade-up"
                style="animation-delay: 0.2s;">

                @foreach ($bukuList as $buku)
                    <!-- KOTAK BUKU: Seluruh area kotak bisa diklik -->
                    <div @click="bukaModal({{ json_encode($buku) }})"
                        x-show="matchesSearch('{{ strtolower($buku->judul) }}', '{{ strtolower($buku->penulis) }}', '{{ strtolower($buku->kategori) }}')"
                        class="group bg-white rounded-2xl p-5 shadow-sm hover:shadow-2xl hover:border-blue-300 border border-slate-100 transition-all duration-300 flex flex-col h-full cursor-pointer transform hover:-translate-y-1 relative overflow-hidden">

                        <!-- Sampul Buku Minimalis -->
                        <div
                            class="w-full h-48 rounded-xl bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-900 flex flex-col items-center justify-center mb-4 text-white p-4 text-center shadow-inner group-hover:scale-[1.02] transition-transform duration-300">
                            <svg class="w-10 h-10 text-amber-400 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span class="text-[10px] font-black tracking-widest text-blue-200 uppercase">Perpustakaan
                                BKD</span>
                        </div>

                        <!-- Info Buku -->
                        <div class="flex-grow flex flex-col">
                            <span
                                class="text-[10px] font-bold text-amber-500 uppercase tracking-wider mb-1">{{ $buku->kategori }}</span>
                            <h3
                                class="text-base font-black text-slate-800 leading-snug mb-1 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                {{ $buku->judul }}</h3>
                            <p class="text-xs font-semibold text-slate-500 mb-4">{{ $buku->penulis }} •
                                {{ $buku->tahun }}</p>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                @if ($buku->stok > 0)
                                    <span class="text-xs font-bold text-emerald-600">
                                        Stok: {{ $buku->stok }} Eks
                                    </span>

                                    <button type="button"
                                        @click="openModal = true; selectedBuku = {{ json_encode($buku) }}"
                                        class="text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors flex items-center gap-1">
                                        Pinjam ➔
                                    </button>
                                @else
                                    <span class="text-xs font-bold text-rose-600">
                                        Stok: 0 Eks
                                    </span>

                                    <button type="button" disabled
                                        class="px-3 py-1 bg-slate-100 text-slate-400 text-xs font-black rounded-lg border border-slate-200 cursor-not-allowed select-none opacity-70">
                                        Stok Habis
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- 3. MODAL POP-UP FORMULIR IDENTITAS PEMINJAM -->
        <div x-show="modalTerbuka" style="display: none;"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" @click="tutupModal()"></div>

            <div
                class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden border border-slate-100 z-10 max-h-[90vh] overflow-y-auto">
                <div
                    class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50 sticky top-0 bg-white/95 backdrop-blur-md z-20">
                    <div>
                        <h3 class="text-lg font-black text-slate-800">Formulir Peminjaman Buku</h3>
                        <p class="text-xs font-semibold text-slate-500">Lengkapi data identitas dan masa pinjam.</p>
                    </div>
                    <button @click="tutupModal()" class="text-slate-400 hover:text-rose-500 font-bold p-1">✕</button>
                </div>

                <form action="{{ route('peminjaman.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <input type="hidden" name="buku_fisik_id" :value="bukuPilihan?.id">

                    <!-- Detail Buku Terpilih -->
                    <div class="p-4 rounded-2xl bg-blue-50 border border-blue-100">
                        <p class="text-[10px] font-black text-blue-600 uppercase tracking-wider mb-1">Buku Yang Dipilih:
                        </p>
                        <h4 class="text-base font-black text-slate-800" x-text="bukuPilihan?.judul"></h4>
                        <p class="text-xs font-semibold text-slate-500 mt-0.5" x-text="bukuPilihan?.penulis"></p>
                    </div>

                    <!-- Input Identitas Peminjam -->
                    <div class="space-y-3">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1">Nama
                                Lengkap</label>
                            <input type="text" name="nama_peminjam" value="{{ Auth::user()->name ?? '' }}" required
                                placeholder="Masukkan nama lengkap..."
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1">Bidang
                                    / Subbag</label>
                                <input type="text" name="bidang_peminjam"
                                    value="{{ Auth::user()->bidang ?? '' }}" required
                                    placeholder="Contoh: Sekretariat"
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">
                            </div>
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1">Email
                                    Aktif</label>
                                <input type="email" name="email_peminjam" value="{{ Auth::user()->email ?? '' }}"
                                    required placeholder="email@jatengprov.go.id"
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">
                            </div>
                        </div>

                        <!-- Jangka Waktu Peminjaman -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1">Tanggal
                                    Ambil</label>
                                <input type="date" name="tanggal_ambil" value="{{ date('Y-m-d') }}" required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-800 outline-none">
                            </div>
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1">Pinjam
                                    Sampai Tanggal</label>
                                <input type="date" name="tanggal_kembali" required
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-800 outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <button type="button" @click="tutupModal()"
                            class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-xl transition-colors">Batal</button>
                        <button type="submit"
                            class="flex-1 px-4 py-3 bg-blue-900 hover:bg-blue-800 text-white text-sm font-bold rounded-xl shadow-lg transition-all">Konfirmasi
                            Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function katalogBuku() {
            return {
                searchQuery: '',
                modalTerbuka: false,
                bukuPilihan: null,

                matchesSearch(judul, penulis, kategori) {
                    if (this.searchQuery === '') return true;
                    const q = this.searchQuery.toLowerCase();
                    return judul.includes(q) || penulis.includes(q) || kategori.includes(q);
                },

                bukaModal(buku) {
                    this.bukuPilihan = buku;
                    this.modalTerbuka = true;
                },

                tutupModal() {
                    this.modalTerbuka = false;
                    setTimeout(() => {
                        this.bukuPilihan = null;
                    }, 300);
                }
            }
        }
    </script>
</x-app-layout>
