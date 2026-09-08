<x-app-layout>
    <style>
        @keyframes dashboardSlideDown {
            0% {
                opacity: 0;
                margin-top: -30px;
            }

            100% {
                opacity: 1;
                margin-top: 0;
            }
        }

        .dash-anim-1 {
            animation: dashboardSlideDown 0.7s ease-out 0.1s both;
        }

        .dash-anim-2 {
            animation: dashboardSlideDown 0.7s ease-out 0.25s both;
        }

        .dash-anim-3 {
            animation: dashboardSlideDown 0.7s ease-out 0.4s both;
        }

        .dash-anim-4 {
            animation: dashboardSlideDown 0.7s ease-out 0.55s both;
        }
    </style>
    <x-slot name="header">
        <div class="dash-anim-1 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div
                class="px-5 py-2.5 bg-slate-900/40 backdrop-blur-md border border-white/15 rounded-full shadow-sm hover:border-amber-400/40 transition duration-200">
                <span class="text-sm font-extrabold text-amber-400 tracking-wide drop-shadow-sm">
                    Perpustakaan Digital BKD Prov. Jateng
                </span>
            </div>

            <!-- Tambah Koleksi & Tambah Akun Bidang -->
            <div class="flex flex-wrap gap-2">
                @if (auth()->user()->email === 'admin.perpus@bkd.jatengprov.go.id')
                    <a href="{{ route('users.index') }}"
                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-white to-white hover:from-gray-300 hover:to-gray-300 text-black text-sm font-black rounded-xl border border-gray-300/30 shadow-lg shadow-white-500/40 hover:shadow-[0_0_30px_rgba(59,130,246,0.5)] hover:scale-105 transition-all duration-300">
                        Kelola Akun Bidang
                    </a>
                @endif
                <a href="{{ route('books.create') }}"
                    class="inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 hover:scale-105 hover:shadow-[0_0_20px_rgba(79,70,229,0.5)] text-white text-xs font-bold rounded-xl shadow-sm transition-all duration-300 transform active:scale-95">
                    Tambah Koleksi Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-24 bg-slate-950 min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 z-0 bg-cover bg-center pointer-events-none select-none filter contrast-140 brightness-90 opacity-[0.35]"
            style="background-image: url('{{ asset('images/bg-perpus-4.jpeg') }}');">
        </div>
        <div
            class="absolute top-0 left-0 w-[30rem] h-[30rem] bg-blue-600/10 rounded-full blur-3xl pointer-events-none animate-pulse">
        </div>
        <div
            class="absolute bottom-0 right-0 w-[40rem] h-[40rem] bg-cyan-500/10 rounded-full blur-3xl pointer-events-none">
        </div>
        <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition.duration.500ms
                    class="mb-6 p-4 bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-sm font-semibold rounded-2xl shadow-sm flex items-center justify-between backdrop-blur-sm">
                    <span> {{ session('success') }}</span>
                    <button @click="show = false"
                        class="text-emerald-400 hover:text-emerald-200 font-bold text-lg leading-none">&times;</button>
                </div>
            @endif

            <!-- banner selamat datang -->
            <div
                class="dash-anim-3 relative overflow-hidden bg-slate-900/60 backdrop-blur-xl border border-white/10 p-8 mb-10 text-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] -translate-y-1 hover:-translate-y-2 transition-all duration-300 ease-out group">
                <div
                    class="absolute -right-20 -bottom-20 w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl group-hover:bg-indigo-600/30 transition-all duration-500">
                </div>
                <div class="absolute -left-20 -top-20 w-48 h-48 bg-blue-500/10 rounded-full blur-2xl"></div>

                <!-- Teks Utama -->
                <div class="relative z-10">
                    <h3
                        class="text-2xl font-black mb-2 tracking-tight text-white drop-shadow-sm flex items-center gap-2">
                        Selamat Datang, <span class="text-amber-400 font-extrabold">{{ Auth::user()->name }}</span>!
                    </h3>
                    <p class="text-slate-250 text-sm font-semibold max-w-2xl leading-relaxed drop-shadow-sm mb-6">
                        Akses pusat data manajemen pengetahuan internal BKD Provinsi Jawa Tengah. Cari regulasi tata
                        negara, panduan teknis, dan hasil riset pegawai.
                    </p>

                    <!-- Kolom Pencarian -->
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full">
                        <div
                            class="max-w-xl relative shadow-md rounded-2xl overflow-hidden transition-all duration-300 transform border border-white/5 hover:border-amber-400/40 hover:scale-[1.02] focus-within:scale-[1.03] focus-within:max-w-2xl focus-within:ring-4 focus-within:ring-amber-500/30 group/input">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within/input:text-amber-500 group-hover/input:text-amber-400 transition-colors z-20">🔍
                            </span>
                            <input type="text" id="search-input" name="search" value="{{ request('search') }}"
                                onkeyup="filterPencarian()"
                                placeholder="Cari judul dokumen, keputusan, nama penulis tesis..."
                                class="w-full pl-11 pr-4 py-3.5 bg-white/80 text-slate-900 placeholder-slate-400 rounded-2xl border-none focus:bg-white focus:outline-none focus:ring-0 text-sm font-bold transition-all duration-300 relative z-10">
                        </div>
                    </form>
                </div>
            </div>

            <!-- TIGA KOTAK -->
            <div id="section-tiga-kotak" class="dash-anim-4 grid grid-cols-1 lg:grid-cols-3 gap-6 mb-44 items-start">

                <!-- ==================== KOTAK 1: BUKU FISIK ==================== -->
                <a href="{{ route('books.index', ['type' => 'buku-fisik']) }}" id="btn-buku-fisik"
                    class="h-fit tab-button block text-left group bg-slate-900/60 backdrop-blur-xl rounded-3xl p-6 border border-white/10 hover:border-amber-400/50 hover:shadow-[0_0_30px_rgba(245,158,11,0.2)] hover:scale-[1.02] hover:-translate-y-1 transition-all duration-300 relative overflow-hidden cursor-pointer">

                    <!-- Header Kotak & Badge -->
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-amber-400 to-amber-600 text-white rounded-2xl text-xl shadow-md">
                            📚
                        </div>
                        <span
                            class="bg-amber-500/20 border border-amber-500/30 text-amber-300 text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            Sirkulasi Offline
                        </span>
                    </div>

                    <!-- Judul & Deskripsi -->
                    <h4 class="text-lg font-black text-white mb-1 group-hover:text-amber-400 transition-colors">
                        Buku Fisik Cetak
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed font-medium mb-4">
                        Cari buku administrasi, catat kode rak, lalu pinjam fisik di ruang baca BKD Jateng.
                    </p>

                    <!-- Jumlah Koleksi -->
                    <div
                        class="text-[11px] font-bold text-amber-300 bg-amber-500/20 border border-amber-500/20 px-2.5 py-1 rounded-xl inline-block mb-4">
                        {{ isset($bukuFisik) ? $bukuFisik->count() : 0 }} Koleksi
                    </div>

                    <!-- Daftar buku -->
                    <div id="konten-buku-fisik"
                        class="tab-koleksi block border-t border-white/10 pt-4 mt-2 max-h-60 overflow-y-auto custom-scrollbar">
                        @if (!isset($bukuFisik) || $bukuFisik->isEmpty())
                            <p class="text-slate-500 text-xs py-4 text-center italic">Belum ada koleksi buku fisik.</p>
                        @else
                            <div class="space-y-2">
                                @foreach ($bukuFisik->take(3) as $buku)
                                    <div class="book-item p-2.5 bg-slate-800/50 border border-white/5 rounded-xl flex justify-between items-center hover:bg-slate-800 hover:border-amber-500/30 transition-colors"
                                        data-title="{{ $buku->judul }}">
                                        <div class="truncate pr-2">
                                            <p class="text-xs font-bold text-slate-200 truncate">{{ $buku->judul }}
                                            </p>
                                            <p class="text-[10px] text-slate-400 font-medium">Rak:
                                                {{ $buku->shelf_code ?? '-' }}</p>
                                        </div>
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-400 bg-emerald-500/20 border border-emerald-500/30 px-2 py-0.5 rounded-md shrink-0">
                                            Ready
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>

                <!-- ==================== KOTAK 2: E-BOOK ==================== -->
                <a href="{{ route('books.index', ['type' => 'ebook']) }}" id="btn-e-book"
                    class="h-fit tab-button block text-left group bg-slate-900/60 backdrop-blur-xl rounded-3xl p-6 border border-white/10 hover:border-blue-400/50 hover:shadow-[0_0_30px_rgba(59,130,246,0.2)] hover:scale-[1.02] hover:-translate-y-1 transition-all duration-300 relative overflow-hidden cursor-pointer">

                    <!-- Header Kotak & Badge -->
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-2xl text-xl shadow-md">
                            💾
                        </div>
                        <span
                            class="bg-blue-500/20 border border-blue-500/30 text-blue-300 text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            Akses Langsung
                        </span>
                    </div>

                    <!-- Judul & Deskripsi -->
                    <h4 class="text-lg font-black text-white mb-1 group-hover:text-blue-400 transition-colors">
                        E-Book Regulasi
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed font-medium mb-4">
                        Akses modul pengembangan kompetensi teknis dan surat edaran via PDF secure viewer.
                    </p>

                    <!-- Jumlah Koleksi -->
                    <div
                        class="text-[11px] font-bold text-blue-300 bg-blue-500/20 border border-blue-500/20 px-2.5 py-1 rounded-xl inline-block mb-4">
                        {{ isset($eBook) ? $eBook->count() : 0 }} Dokumen
                    </div>

                    <!-- Daftar e-book -->
                    <div id="konten-e-book"
                        class="tab-koleksi block border-t border-white/10 pt-4 mt-2 max-h-60 overflow-y-auto custom-scrollbar">
                        @if (!isset($eBook) || $eBook->isEmpty())
                            <p class="text-slate-500 text-xs py-4 text-center italic">Belum ada dokumen e-book.</p>
                        @else
                            <div class="space-y-2">
                                @foreach ($eBook->take(3) as $ebook)
                                    <div class="book-item p-2.5 bg-slate-800/50 border border-white/5 rounded-xl flex justify-between items-center hover:bg-slate-800 hover:border-blue-500/30 transition-colors"
                                        data-title="{{ $ebook->judul }}">
                                        <div class="truncate pr-2">
                                            <p class="text-xs font-bold text-slate-200 truncate">{{ $ebook->judul }}
                                            </p>
                                            <p class="text-[10px] text-slate-400">PDF Secure</p>
                                        </div>
                                        <span
                                            class="text-[10px] font-extrabold text-blue-400 bg-blue-500/20 border border-blue-500/30 px-2 py-1 rounded-md shrink-0">
                                            PDF
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>

                <!-- ==================== KOTAK 3: TESIS & RISET ==================== -->
                <a href="{{ route('books.index', ['type' => 'tesis']) }}" id="btn-tesis"
                    class="h-fit tab-button block text-left group bg-slate-900/60 backdrop-blur-xl rounded-3xl p-6 border border-white/10 hover:border-emerald-400/50 hover:shadow-[0_0_30px_rgba(16,185,129,0.2)] hover:scale-[1.02] hover:-translate-y-1 transition-all duration-300 relative overflow-hidden cursor-pointer">

                    <!-- Header Kotak & Badge -->
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-gradient-to-br from-emerald-400 to-emerald-600 text-white rounded-2xl text-xl shadow-md">
                            🎓
                        </div>
                        <span
                            class="bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            Karya Ilmiah
                        </span>
                    </div>

                    <!-- Judul & Deskripsi -->
                    <h4 class="text-lg font-black text-white mb-1 group-hover:text-emerald-400 transition-colors">
                        Tesis & Riset Pegawai
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed font-medium mb-4">
                        Eksplorasi data riset akademis, tesis, dan disertasi yang diajukan oleh jajaran aparatur.
                    </p>

                    <!-- Jumlah Koleksi -->
                    <div
                        class="text-[11px] font-bold text-emerald-300 bg-emerald-500/20 border border-emerald-500/20 px-2.5 py-1 rounded-xl inline-block mb-4">
                        {{ isset($tesis) ? $tesis->count() : 0 }} Berkas
                    </div>

                    <!-- DAFTAR TESIS -->
                    <div id="konten-tesis"
                        class="tab-koleksi block border-t border-white/10 pt-4 mt-2 max-h-60 overflow-y-auto custom-scrollbar">
                        @if (!isset($tesis) || $tesis->isEmpty())
                            <p class="text-slate-500 text-xs py-4 text-center italic">Belum ada dokumen tesis/riset.</p>
                        @else
                            <div class="space-y-2">
                                @foreach ($tesis->take(3) as $karya)
                                    <div class="book-item p-2.5 bg-slate-800/50 border border-white/5 rounded-xl flex justify-between items-center hover:bg-slate-800 hover:border-emerald-500/30 transition-colors"
                                        data-title="{{ $karya->judul }}">
                                        <div class="truncate pr-2">
                                            <p class="text-xs font-bold text-slate-200 truncate">{{ $karya->judul }}
                                            </p>
                                            <p class="text-[10px] text-slate-400">PDF Document</p>
                                        </div>
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-400 bg-emerald-500/20 border border-emerald-500/30 px-2 py-1 rounded-md shrink-0">
                                            Buka
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>

                <!-- === LOGIKA === -->
                <script>
                    // 1. Fungsi Membuka Kategori Kotak
                    function bukaKategori(namaId) {
                        const semuaTab = document.querySelectorAll('.tab-koleksi');
                        semuaTab.forEach(tab => {
                            tab.classList.add('hidden');
                            tab.classList.remove('block');
                        });

                        const targetTab = document.getElementById('konten-' + namaId);
                        targetTab.classList.remove('hidden');
                        targetTab.classList.add('block');

                        const semuaTombol = document.querySelectorAll('.tab-button');
                        semuaTombol.forEach(btn => {
                            btn.classList.remove('ring-4', 'bg-amber-50/20', 'bg-blue-50/20', 'bg-emerald-50/20',
                                'ring-amber-500/20', 'ring-blue-500/20', 'ring-emerald-500/20', 'border-amber-300',
                                'border-blue-300', 'border-emerald-300');
                        });

                        const tombolAktif = document.getElementById('btn-' + namaId);
                        if (tombolAktif) {
                            if (namaId === 'buku-fisik') {
                                tombolAktif.classList.add('ring-4', 'ring-amber-500/20', 'bg-amber-50/20', 'border-amber-300');
                            } else if (namaId === 'e-book') {
                                tombolAktif.classList.add('ring-4', 'ring-blue-500/20', 'bg-blue-50/20', 'border-blue-300');
                            } else if (namaId === 'tesis') {
                                tombolAktif.classList.add('ring-4', 'ring-emerald-500/20', 'bg-emerald-50/20', 'border-emerald-300');
                            }
                        }

                        targetTab.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }

                    // 2. Fitur Pencarian Real-Time (Search Bar) untuk Seluruh Tabel Kategori
                    function filterPencarian() {
                        const input = document.getElementById('search-input').value.toLowerCase();
                        const barisBuku = document.querySelectorAll('.item-buku');

                        barisBuku.forEach(row => {
                            const teksJudul = row.querySelector('.nama-judul').textContent.toLowerCase();
                            if (teksJudul.includes(input)) {
                                row.style.display = "";
                            } else {
                                row.style.display = "none";
                            }
                        });
                    }
                    document.addEventListener('keydown', function(event) {
                        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
                            event.preventDefault();
                            document.getElementById('search-input').focus();
                        }
                    });
                </script>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const urlParams = new URLSearchParams(window.location.search);
                const searchQuery = urlParams.get('search');

                if (searchQuery) {
                    const searchTerm = searchQuery.toLowerCase();
                    const bookItems = document.querySelectorAll('.book-item'); // Membaca class book-item di tiap list
                    let isFound = false;

                    bookItems.forEach(item => {
                        const titleAttr = item.getAttribute('data-title');

                        // Jika judul buku cocok dengan pencarian
                        if (titleAttr && titleAttr.toLowerCase().includes(searchTerm)) {

                            // 1. scroll tepat ke buku tersebut
                            if (!isFound) {
                                item.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                                isFound = true;
                            }

                            // 2. Tambahkan efek warna emas dan perbesar
                            item.classList.remove('bg-gray-50');
                            item.classList.add('ring-2', 'ring-amber-500', 'bg-amber-50',
                                'shadow-[0_0_20px_rgba(245,158,11,0.6)]', 'scale-[1.02]', 'z-10', 'relative'
                            );

                            // 3. Matikan efek Glow setelah 4 detik
                            setTimeout(() => {
                                item.classList.remove('ring-2', 'ring-amber-500', 'bg-amber-50',
                                    'shadow-[0_0_20px_rgba(245,158,11,0.6)]', 'scale-[1.02]',
                                    'z-10', 'relative');
                                item.classList.add('bg-gray-50');
                            }, 4000);
                        }
                    });
                }
            });
        </script>
</x-app-layout>

<!-- === FOOTER INFORMASI === -->
<footer
    class="relative mt-20 border-t border-white/50 bg-slate-950/80 backdrop-blur-xl pt-16 pb-8 overflow-hidden z-10">
    <div
        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-[40rem] h-[10rem] bg-blue-600/10 blur-[100px] pointer-events-none rounded-full">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row justify-between gap-12 lg:gap-16 mb-12">

            <!-- ===== BAGIAN KIRI INFORMASI BKD ===== -->
            <div class="w-full lg:w-3/4 grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- Profil & Branding -->
                <div class="space-y-5">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center font-black text-blue-900 text-lg shadow-[0_0_15px_rgba(255,255,255,0.2)]">
                            BKD
                        </div>
                        <div>
                            <h3 class="text-white font-black tracking-wide text-lg">BKD PROV. JATENG</h3>
                            <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Pemerintah
                                Provinsi Jawa Tengah</p>
                        </div>
                    </div>
                    <p class="text-slate-400 text-xs leading-relaxed font-medium">
                        Badan Kepegawaian Daerah Provinsi Jawa Tengah berkomitmen mewujudkan manajemen ASN yang
                        profesional, berintegritas, dan berbasis digital menuju <span
                            class="text-amber-400 font-bold italic">Jateng Gayeng!</span>
                    </p>
                </div>

                <!-- Alamat -->
                <div>
                    <h4 class="text-white font-black mb-5 text-sm uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-white"></span> Alamat Kantor
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed font-medium mb-3">
                        Jl. Stadion Selatan No. 1, <br>
                        Karangkidul, Kec. Semarang Tengah, <br>
                        Kota Semarang, Jawa Tengah 50136
                    </p>
                    <a href="https://maps.app.goo.gl/kH6JdUmaNYo8YM2r8" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-400 hover:text-blue-300 transition-colors group">
                        Lihat Google Maps <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>

                <div>
                    <h4 class="text-white font-black mb-5 text-sm uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-white"></span> Sosial Media Resmi
                    </h4>

                    <!-- Sosial Media Resmi BKD Jateng -->
                    <div class="flex gap-3">

                        <a href="https://www.bkd.jatengprov.go.id/" target="_blank" rel="noopener noreferrer"
                            title="Website Resmi BKD Jateng"
                            class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-zinc-800/50 hover:border-white-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg>
                        </a>

                        <a href="https://www.instagram.com/bkdprovjateng?igsi=MTV2emV1Yzlpd2J0Mw%3D%3D"
                            target="_blank" rel="noopener noreferrer" title="Instagram BKD Jateng"
                            class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-zinc-800/80 hover:border-zinc-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </a>

                        <a href="https://www.tiktok.com/@bkdprovjateng?_r=1&_t=ZS-99PbZfNHXIW" target="_blank"
                            rel="noopener noreferrer" title="TikTok BKD Jateng"
                            class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-zinc-800/80 hover:border-zinc-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512">
                                <path
                                    d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                            </svg>
                        </a>

                        <a href="https://www.facebook.com/people/Badan-Kepegawaian-Daerah-Provinsi-Jawa-Tengah/100070455214016/" target="_blank" rel="noopener noreferrer"
                            title="Facebook BKD Jateng"
                            class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-zinc-800/80 hover:border-zinc-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="w-full lg:w-1/4 lg:pl-10 lg:border-l-2 border-white/10 pt-10 lg:pt-0 border-t lg:border-t-0 mt-4 lg:mt-0 flex flex-col justify-center">

                <!-- Tombol halaman utama -->
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;"
                    class="group relative w-full flex items-center justify-between p-4 bg-gradient-to-r from-blue-600/20 to-indigo-600/20 hover:from-blue-600/40 hover:to-indigo-600/40 border-2 border-blue-400/30 hover:border-blue-400 rounded-2xl transition-all duration-300 shadow-lg shadow-blue-900/20 cursor-pointer overflow-hidden text-left">

                    <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="flex items-center gap-3.5 relative z-10">
                        <div
                            class="w-8 h-8 rounded-xl bg-blue-500/20 border border-blue-400/30 flex items-center justify-center text-blue-400 group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5 transform group-hover:-translate-y-0.5 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-xs font-black text-white uppercase tracking-wider">Halaman
                                Utama
                            </span>
                            <span class="block text-[10px] text-blue-300/80 font-bold mt-0.5">Kembali ke atas
                                otomatis
                            </span>
                        </div>
                    </div>

                    <span
                        class="text-blue-400 group-hover:-translate-y-1 transition-transform relative z-10 font-bold text-base pr-1">
                        ↑
                    </span>
                </button>
            </div>
        </div>

        <div class="pt-6 border-t border-white/60 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 text-[11px] font-medium text-center md:text-left">
                © 2026 Perpustakaan Digital BKD Jateng. Dikembangkan oleh Tim Pengembang Magang.
            </p>
            <div
                class="px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-slate-400 text-[10px] font-bold tracking-widest">
                VERSI APLIKASI 1.0.1
            </div>
        </div>
    </div>
</footer>