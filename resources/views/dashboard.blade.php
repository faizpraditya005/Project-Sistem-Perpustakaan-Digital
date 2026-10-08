<x-app-layout>
    <style>
        @keyframes dashboardSlideDown {
            0% {
                opacity: 0;
                transform: translateY(-25px) scale(0.98);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .dash-anim-1 {
            animation: dashboardSlideDown 0.9s cubic-bezier(0.23, 1, 0.32, 1) 0.1s both;
        }

        .dash-anim-2 {
            animation: dashboardSlideDown 0.9s cubic-bezier(0.23, 1, 0.32, 1) 0.25s both;
        }

        .dash-anim-3 {
            animation: dashboardSlideDown 0.9s cubic-bezier(0.23, 1, 0.32, 1) 0.4s both;
        }

        .dash-anim-4 {
            animation: dashboardSlideDown 0.9s cubic-bezier(0.23, 1, 0.32, 1) 0.55s both;
        }

        @keyframes liquidMove {
            0% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
                transform: translate(0px, 0px) scale(1) rotate(0deg);
            }

            33% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
                transform: translate(40px, -50px) scale(1.1) rotate(10deg);
            }

            66% {
                border-radius: 50% 50% 30% 70% / 40% 70% 60% 30%;
                transform: translate(-30px, 30px) scale(0.9) rotate(-10deg);
            }

            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
                transform: translate(0px, 0px) scale(1) rotate(0deg);
            }
        }

        .anim-liquid {
            animation: liquidMove 15s ease-in-out infinite alternate;
        }

        .liquid-glass-panel {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
        }

        .liquid-glass-inner {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }
    </style>

    <x-slot name="header">
        <div class="dash-anim-1 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">

            <div
                class="px-5 py-2.5 bg-blue-50/80 border border-blue-200/60 rounded-full shadow-sm hover:bg-blue-100 transition duration-300">
                <span class="text-sm font-extrabold text-blue-800 tracking-wide flex items-center gap-2">
                    🏛️ SIKURA BKD Prov. Jateng
                </span>
            </div>

            <div class="flex flex-wrap gap-3">
                @if (auth()->user()->email === 'admin.perpus@bkd.jatengprov.go.id')
                    <a href="{{ route('users.index') }}"
                        class="inline-flex items-center gap-1.5 px-5 py-2 bg-gradient-to-r from-violet-600 to-purple-700 hover:from-violet-500 hover:to-purple-600 text-white text-sm font-black rounded-xl border border-violet-400/30 shadow-lg shadow-purple-500/25 hover:shadow-[0_0_20px_rgba(147,51,235,0.4)] hover:scale-105 transition-all duration-300">
                        ⚙️ Kelola Akun Bidang
                    </a>
                @endif
                <a href="{{ route('books.create') }}"
                    class="inline-flex items-center gap-1.5 px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-500 hover:to-indigo-600 hover:scale-105 hover:shadow-[0_0_20px_rgba(79,70,229,0.3)] text-white text-xs font-bold rounded-xl shadow-md transition-all duration-300 transform active:scale-95">
                    + Tambah Koleksi Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-24 bg-slate-50 min-h-screen relative overflow-hidden">

        <div class="absolute inset-0 z-0 bg-cover bg-center pointer-events-none select-none filter contrast-100 opacity-[0.04]"
            style="background-image: url('{{ asset('images/bg-perpus-4.jpeg') }}');">
        </div>

        <div class="absolute -top-32 -left-32 w-[40rem] h-[40rem] bg-indigo-300/40 mix-blend-multiply filter blur-3xl opacity-70 anim-liquid z-0 pointer-events-none"
            style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-0 w-[45rem] h-[45rem] bg-amber-200/50 mix-blend-multiply filter blur-3xl opacity-70 anim-liquid z-0 pointer-events-none"
            style="animation-delay: -5s;"></div>
        <div class="absolute -bottom-32 left-1/3 w-[35rem] h-[35rem] bg-blue-300/40 mix-blend-multiply filter blur-3xl opacity-70 anim-liquid z-0 pointer-events-none"
            style="animation-delay: -10s;"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition.duration.500ms
                    class="mb-6 p-4 liquid-glass-panel text-emerald-700 text-sm font-bold rounded-2xl flex items-center justify-between">
                    <span class="flex items-center gap-2">✅ {{ session('success') }}</span>
                    <button @click="show = false"
                        class="text-emerald-500 hover:text-emerald-700 font-black text-lg leading-none">&times;</button>
                </div>
            @endif

            <!-- ======= banner selamat datang ======= -->
            <div
                class="dash-anim-3 liquid-glass-panel p-8 sm:p-10 mb-10 rounded-[2rem] transform hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_-15px_rgba(59,130,246,0.3)] hover:border-blue-300 hover:ring-4 hover:ring-blue-400/20 transition-all duration-500 ease-out group relative overflow-hidden cursor-default">

                <div
                    class="absolute top-0 -left-[100%] w-1/2 h-full bg-gradient-to-r from-transparent via-white/70 to-transparent transform -skew-x-12 group-hover:left-[200%] transition-all duration-[1.5s] ease-in-out z-0 pointer-events-none">
                </div>

                <div
                    class="absolute -right-10 -top-10 w-96 h-96 bg-gradient-to-br from-amber-400/60 to-orange-500/40 blur-[80px] pointer-events-none opacity-0 group-hover:opacity-100 group-hover:scale-125 group-hover:translate-y-10 group-hover:-translate-x-10 transition-all duration-700 ease-out z-0">
                </div>

                <div
                    class="absolute -left-10 -bottom-10 w-96 h-96 bg-gradient-to-tr from-blue-500/60 to-indigo-600/40 blur-[80px] pointer-events-none opacity-0 group-hover:opacity-100 group-hover:scale-125 group-hover:-translate-y-10 group-hover:translate-x-10 transition-all duration-700 ease-out z-0">
                </div>

                <!-- Teks Utama -->
                <div class="relative z-10">
                    <h3
                        class="text-3xl font-black mb-2 tracking-tight text-slate-800 flex items-center gap-2 group-hover:text-blue-950 transition-colors duration-500">
                        Selamat Datang, <span
                            class="text-amber-500 font-extrabold group-hover:text-amber-600 group-hover:drop-shadow-md transition-all duration-500">{{ Auth::user()->name }}</span>!
                    </h3>
                    <p
                        class="text-slate-600 text-sm font-semibold max-w-2xl leading-relaxed mb-8 group-hover:text-slate-800 transition-colors duration-500">
                        Akses portal SIKURA untuk pusat data manajemen pengetahuan internal BKD Provinsi Jawa Tengah.
                    </p>

                    <!-- Kolom Pencarian -->
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full">
                        <div
                            class="max-w-xl relative shadow-sm rounded-2xl overflow-hidden transition-all duration-500 transform liquid-glass-inner group-hover:shadow-xl group-hover:shadow-blue-500/15 group-hover:border-blue-200 group-hover:-translate-y-1 focus-within:bg-white focus-within:scale-[1.02] focus-within:max-w-2xl focus-within:ring-4 focus-within:ring-amber-500/20 focus-within:!shadow-2xl focus-within:!shadow-amber-500/15 group/input">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-5 text-slate-400 group-focus-within/input:text-amber-500 group-hover/input:text-blue-600 group-hover/input:scale-110 transition-all duration-300 z-20">🔍</span>
                            <input type="text" id="search-input" name="search" value="{{ request('search') }}"
                                onkeyup="filterPencarian()"
                                placeholder="Cari judul dokumen, keputusan, nama penulis tesis..."
                                class="w-full pl-12 pr-4 py-4 bg-transparent text-slate-900 placeholder-slate-500 border-none focus:outline-none focus:ring-0 text-sm font-bold transition-all duration-300 relative z-10 outline-none">
                        </div>
                    </form>
                </div>
            </div>

            <!-- ======== tiga kotak koleksi ========= -->
            <div id="section-tiga-kotak" class="dash-anim-4 grid grid-cols-1 lg:grid-cols-3 gap-8 mb-44 items-start">

                <!-- KOTAK 1: BUKU FISIK -->
                <a href="{{ route('books.index', ['type' => 'buku-fisik']) }}" id="btn-buku-fisik"
                    class="h-fit tab-button block text-left group liquid-glass-panel rounded-3xl p-7 hover:border-amber-300 hover:shadow-[0_15px_40px_rgba(245,158,11,0.15)] hover:scale-[1.02] hover:-translate-y-2 transition-all duration-500 relative cursor-pointer overflow-hidden">

                    <div
                        class="absolute -right-10 -top-10 w-32 h-32 bg-amber-300/20 blur-3xl rounded-full pointer-events-none group-hover:bg-amber-300/40 transition-colors duration-500">
                    </div>

                    <div class="flex items-center justify-between mb-5 relative z-10">
                        <div
                            class="w-14 h-14 rounded-2xl bg-amber-500 flex items-center justify-center text-white shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="liquid-glass-inner text-amber-600 text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            Sirkulasi Offline
                        </span>
                    </div>

                    <h4
                        class="text-xl font-black text-slate-900 mb-2 group-hover:text-amber-600 transition-colors relative z-10">
                        Buku Fisik Cetak</h4>
                    <p class="text-slate-600 text-xs leading-relaxed font-semibold mb-5 relative z-10">
                        Cari buku administrasi, catat kode rak, lalu pinjam fisik di ruang baca BKD Jateng.
                    </p>
                    <div
                        class="text-[11px] font-bold text-amber-700 liquid-glass-inner px-3 py-1.5 rounded-xl inline-block mb-4 shadow-sm relative z-10">
                        {{ isset($bukuFisik) ? $bukuFisik->count() : 0 }} Koleksi
                    </div>

                    <div id="konten-buku-fisik"
                        class="tab-koleksi block border-t border-slate-200/50 pt-5 mt-2 max-h-60 overflow-y-auto custom-scrollbar relative z-10">
                        @if (!isset($bukuFisik) || $bukuFisik->isEmpty())
                            <p class="text-slate-500 text-xs py-4 text-center italic font-medium">Belum ada koleksi buku
                                fisik.</p>
                        @else
                            <div class="space-y-3">
                                @foreach ($bukuFisik->take(3) as $buku)
                                    <div class="book-item item-buku p-3 liquid-glass-inner rounded-xl flex justify-between items-center hover:bg-white/80 hover:border-amber-300 hover:shadow-sm transition-all"
                                        data-title="{{ $buku->judul }}">
                                        <div class="truncate pr-3">
                                            <p class="nama-judul text-xs font-bold text-slate-800 truncate">
                                                {{ $buku->judul }}</p>
                                            <p class="text-[10px] text-slate-500 font-semibold mt-0.5">Rak:
                                                {{ $buku->shelf_code ?? '-' }}</p>
                                        </div>
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-700 bg-emerald-100/80 border border-emerald-200 px-2 py-1 rounded-md shrink-0">Ready</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>

                <!-- KOTAK 2: E-BOOK -->
                <a href="{{ route('books.index', ['type' => 'ebook']) }}" id="btn-e-book"
                    class="h-fit tab-button block text-left group liquid-glass-panel rounded-3xl p-7 hover:border-blue-300 hover:shadow-[0_15px_40px_rgba(59,130,246,0.15)] hover:scale-[1.02] hover:-translate-y-2 transition-all duration-500 relative cursor-pointer overflow-hidden">

                    <div
                        class="absolute -right-10 -top-10 w-32 h-32 bg-blue-300/20 blur-3xl rounded-full pointer-events-none group-hover:bg-blue-300/40 transition-colors duration-500">
                    </div>

                    <div class="flex items-center justify-between mb-5 relative z-10">
                        <div
                            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="liquid-glass-inner text-blue-600 text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            Akses Langsung
                        </span>
                    </div>

                    <h4
                        class="text-xl font-black text-slate-900 mb-2 group-hover:text-blue-600 transition-colors relative z-10">
                        E-Book Regulasi</h4>
                    <p class="text-slate-600 text-xs leading-relaxed font-semibold mb-5 relative z-10">
                        Akses modul pengembangan kompetensi teknis dan surat edaran via PDF secure viewer.
                    </p>
                    <div
                        class="text-[11px] font-bold text-blue-700 liquid-glass-inner px-3 py-1.5 rounded-xl inline-block mb-4 shadow-sm relative z-10">
                        {{ isset($eBook) ? $eBook->count() : 0 }} Dokumen
                    </div>

                    <div id="konten-e-book"
                        class="tab-koleksi block border-t border-slate-200/50 pt-5 mt-2 max-h-60 overflow-y-auto custom-scrollbar relative z-10">
                        @if (!isset($eBook) || $eBook->isEmpty())
                            <p class="text-slate-500 text-xs py-4 text-center italic font-medium">Belum ada dokumen
                                e-book.</p>
                        @else
                            <div class="space-y-3">
                                @foreach ($eBook->take(3) as $ebook)
                                    <div class="book-item item-buku p-3 liquid-glass-inner rounded-xl flex justify-between items-center hover:bg-white/80 hover:border-blue-300 hover:shadow-sm transition-all"
                                        data-title="{{ $ebook->judul }}">
                                        <div class="truncate pr-3">
                                            <p class="nama-judul text-xs font-bold text-slate-800 truncate">
                                                {{ $ebook->judul }}</p>
                                            <p class="text-[10px] text-slate-500 font-semibold mt-0.5">PDF Secure</p>
                                        </div>
                                        <span
                                            class="text-[10px] font-extrabold text-blue-700 bg-blue-100/80 border border-blue-200 px-2.5 py-1 rounded-md shrink-0">PDF</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>

                <!-- KOTAK 3: TESIS & RISET -->
                <a href="{{ route('books.index', ['type' => 'tesis']) }}" id="btn-tesis"
                    class="h-fit tab-button block text-left group liquid-glass-panel rounded-3xl p-7 hover:border-emerald-300 hover:shadow-[0_15px_40px_rgba(16,185,129,0.15)] hover:scale-[1.02] hover:-translate-y-2 transition-all duration-500 relative cursor-pointer overflow-hidden">

                    <div
                        class="absolute -right-10 -top-10 w-32 h-32 bg-emerald-300/20 blur-3xl rounded-full pointer-events-none group-hover:bg-emerald-300/40 transition-colors duration-500">
                    </div>

                    <div class="flex items-center justify-between mb-5 relative z-10">
                        <div
                            class="w-14 h-14 rounded-2xl bg-emerald-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="liquid-glass-inner text-emerald-600 text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            Karya Ilmiah
                        </span>
                    </div>

                    <h4
                        class="text-xl font-black text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors relative z-10">
                        Tesis & Riset Pegawai</h4>
                    <p class="text-slate-600 text-xs leading-relaxed font-semibold mb-5 relative z-10">
                        Eksplorasi data riset akademis, tesis, dan disertasi yang diajukan oleh jajaran aparatur.
                    </p>
                    <div
                        class="text-[11px] font-bold text-emerald-700 liquid-glass-inner px-3 py-1.5 rounded-xl inline-block mb-4 shadow-sm relative z-10">
                        {{ isset($tesis) ? $tesis->count() : 0 }} Berkas
                    </div>

                    <div id="konten-tesis"
                        class="tab-koleksi block border-t border-slate-200/50 pt-5 mt-2 max-h-60 overflow-y-auto custom-scrollbar relative z-10">
                        @if (!isset($tesis) || $tesis->isEmpty())
                            <p class="text-slate-500 text-xs py-4 text-center italic font-medium">Belum ada dokumen
                                tesis/riset.</p>
                        @else
                            <div class="space-y-3">
                                @foreach ($tesis->take(3) as $karya)
                                    <div class="book-item item-buku p-3 liquid-glass-inner rounded-xl flex justify-between items-center hover:bg-white/80 hover:border-emerald-300 hover:shadow-sm transition-all"
                                        data-title="{{ $karya->judul }}">
                                        <div class="truncate pr-3">
                                            <p class="nama-judul text-xs font-bold text-slate-800 truncate">
                                                {{ $karya->judul }}</p>
                                            <p class="text-[10px] text-slate-500 font-semibold mt-0.5">PDF Document</p>
                                        </div>
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-700 bg-emerald-100/80 border border-emerald-200 px-2.5 py-1 rounded-md shrink-0">Buka</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>

                <!-- === SCRIPT LOGIKA === -->
                <script>
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
                            btn.classList.remove('ring-4', 'border-amber-300', 'border-blue-300', 'border-emerald-300');
                        });

                        const tombolAktif = document.getElementById('btn-' + namaId);
                        if (tombolAktif) {
                            if (namaId === 'buku-fisik') tombolAktif.classList.add('ring-4', 'ring-amber-500/20', 'border-amber-300');
                            else if (namaId === 'e-book') tombolAktif.classList.add('ring-4', 'ring-blue-500/20', 'border-blue-300');
                            else if (namaId === 'tesis') tombolAktif.classList.add('ring-4', 'ring-emerald-500/20',
                                'border-emerald-300');
                        }

                        targetTab.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }

                    function filterPencarian() {
                        const input = document.getElementById('search-input').value.toLowerCase();
                        const barisBuku = document.querySelectorAll('.item-buku');

                        barisBuku.forEach(row => {
                            const teksJudul = row.querySelector('.nama-judul').textContent.toLowerCase();
                            if (teksJudul.includes(input)) row.style.display = "";
                            else row.style.display = "none";
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
            // Efek Highlight Buku yang Dicari via Parameter URL
            document.addEventListener("DOMContentLoaded", function() {
                const urlParams = new URLSearchParams(window.location.search);
                const searchQuery = urlParams.get('search');

                if (searchQuery) {
                    const searchTerm = searchQuery.toLowerCase();
                    const bookItems = document.querySelectorAll('.book-item');
                    let isFound = false;

                    bookItems.forEach(item => {
                        const titleAttr = item.getAttribute('data-title');

                        if (titleAttr && titleAttr.toLowerCase().includes(searchTerm)) {
                            if (!isFound) {
                                item.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                                isFound = true;
                            }

                            item.classList.remove('liquid-glass-inner');
                            item.classList.add('ring-2', 'ring-amber-400', 'bg-amber-50/90', 'border-amber-300',
                                'shadow-[0_0_20px_rgba(245,158,11,0.2)]', 'scale-[1.02]', 'z-10', 'relative'
                            );

                            setTimeout(() => {
                                item.classList.remove('ring-2', 'ring-amber-400', 'bg-amber-50/90',
                                    'border-amber-300',
                                    'shadow-[0_0_20px_rgba(245,158,11,0.2)]', 'scale-[1.02]',
                                    'z-10', 'relative');
                                item.classList.add('liquid-glass-inner');
                            }, 4000);
                        }
                    });
                }
            });
        </script>
</x-app-layout>

<!-- === footer informasi === -->
<footer
    class="relative mt-20 border-t border-slate-200/80 bg-white/70 backdrop-blur-2xl pt-16 pb-8 overflow-hidden z-10 shadow-[0_-10px_40px_rgba(0,0,0,0.02)]">

    <div
        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-[40rem] h-[10rem] bg-blue-400/15 blur-[120px] pointer-events-none rounded-full">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row justify-between gap-12 lg:gap-16 mb-12">

            <!-- ===== kiri ===== -->
            <div class="w-full lg:w-3/4 grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- Profil & Branding -->
                <div class="space-y-5">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl flex items-center justify-center font-black text-white text-lg shadow-md shadow-blue-500/20">
                            BKD
                        </div>
                        <div>
                            <h3 class="text-slate-900 font-black tracking-wide text-lg">BKD PROV. JATENG</h3>
                            <p class="text-slate-500 text-[10px] uppercase font-extrabold tracking-wider">Pemerintah
                                Provinsi Jawa Tengah</p>
                        </div>
                    </div>
                    <p class="text-slate-600 text-xs leading-relaxed font-semibold">
                        Badan Kepegawaian Daerah Provinsi Jawa Tengah berkomitmen mewujudkan manajemen ASN yang
                        profesional, berintegritas, dan berbasis digital menuju <span
                            class="text-amber-600 font-extrabold italic">Jateng Gayeng!</span>
                    </p>
                </div>

                <!-- Alamat -->
                <div>
                    <h4
                        class="text-slate-900 font-black mb-5 text-sm uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span> Alamat Kantor
                    </h4>
                    <p class="text-slate-600 text-xs leading-relaxed font-semibold mb-3">
                        Jl. Stadion Selatan No. 1, <br>
                        Karangkidul, Kec. Semarang Tengah, <br>
                        Kota Semarang, Jawa Tengah 50136
                    </p>
                    <a href="https://maps.app.goo.gl/kH6JdUmaNYo8YM2r8" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700 transition-colors group">
                        Lihat Google Maps <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>

                <!-- Sosial Media Resmi -->
                <div>
                    <h4
                        class="text-slate-900 font-black mb-5 text-sm uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span> Sosial Media Resmi
                    </h4>

                    <!-- Ikon Sosial Media -->
                    <div class="flex gap-3">
                        <!-- Website -->
                        <a href="https://www.bkd.jatengprov.go.id/" target="_blank" rel="noopener noreferrer"
                            title="Website Resmi BKD Jateng"
                            class="w-9 h-9 rounded-full bg-white/80 border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/bkdprovjateng?igsi=MTV2emV1Yzlpd2J0Mw%3D%3D"
                            target="_blank" rel="noopener noreferrer" title="Instagram BKD Jateng"
                            class="w-9 h-9 rounded-full bg-white/80 border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>

                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@bkdprovjateng?_r=1&_t=ZS-99PbZfNHXIW" target="_blank"
                            rel="noopener noreferrer" title="TikTok BKD Jateng"
                            class="w-9 h-9 rounded-full bg-white/80 border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                                <path
                                    d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                            </svg>
                        </a>

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/people/Badan-Kepegawaian-Daerah-Provinsi-Jawa-Tengah/100070455214016/"
                            target="_blank" rel="noopener noreferrer" title="Facebook BKD Jateng"
                            class="w-9 h-9 rounded-full bg-white/80 border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300 transform hover:scale-110 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ===== kanan = tombol kembali ===== -->
            <div
                class="w-full lg:w-1/4 lg:pl-10 lg:border-l border-slate-200 pt-8 lg:pt-0 border-t lg:border-t-0 flex flex-col justify-center">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;"
                    class="group relative w-full flex items-center justify-between p-4 bg-white/80 backdrop-blur-xl hover:bg-white border border-slate-200 hover:border-blue-300 rounded-2xl transition-all duration-300 shadow-sm hover:shadow-md cursor-pointer overflow-hidden text-left">

                    <div class="flex items-center gap-3.5 relative z-10">
                        <div
                            class="w-9 h-9 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center text-blue-600 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4 transform group-hover:-translate-y-0.5 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-xs font-black text-slate-900 uppercase tracking-wider">Halaman
                                Utama</span>
                            <span class="block text-[10px] text-slate-500 font-bold mt-0.5">Kembali ke atas
                                otomatis</span>
                        </div>
                    </div>

                    <span
                        class="text-blue-600 group-hover:-translate-y-1 transition-transform relative z-10 font-bold text-base pr-1">
                        ↑
                    </span>
                </button>
            </div>
        </div>

        <div
            class="mt-4 px-6 py-5 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 rounded-2xl flex flex-col md:flex-row justify-between items-center gap-4 shadow-lg shadow-blue-900/20 border border-blue-800">
            <p class="text-blue-100 text-[11px] font-medium text-center md:text-left tracking-wide">
                © 2026 SIKURA - Badan Kepegawaian Daerah Provinsi Jawa Tengah. Dikembangkan oleh Tim Pengembang Magang.
            </p>

            <div
                class="px-3 py-1.5 bg-white/10 border border-white/20 rounded-xl text-white text-[10px] font-black tracking-widest shadow-sm flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                VERSI APLIKASI 1.0.1
            </div>
        </div>
    </div>
</footer>
