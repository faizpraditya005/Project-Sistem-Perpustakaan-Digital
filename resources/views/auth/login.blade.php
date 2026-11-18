<x-guest-layout>
    <div class="min-h-screen relative flex flex-col lg:grid lg:grid-cols-12 bg-slate-50 overflow-hidden font-sans">

        <div class="absolute inset-0 z-0 opacity-[0.05] bg-cover bg-center pointer-events-none select-none filter contrast-100"
            style="background-image: url('{{ asset('images/bg-perpus-4.jpeg') }}');">
        </div>

        <style>
            @keyframes blob {
                0% {
                    transform: translate(0px, 0px) scale(1);
                }

                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }

                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }

                100% {
                    transform: translate(0px, 0px) scale(1);
                }
            }

            .animate-blob {
                animation: blob 10s infinite alternate cubic-bezier(0.45, 0.05, 0.55, 0.95);
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>

        <div
            class="absolute top-0 -left-4 w-96 h-96 bg-blue-300/30 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob z-0 pointer-events-none">
        </div>
        <div
            class="absolute top-0 -right-4 w-96 h-96 bg-amber-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000 z-0 pointer-events-none">
        </div>
        <div
            class="absolute -bottom-8 left-20 w-96 h-96 bg-indigo-300/30 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000 z-0 pointer-events-none">
        </div>


        <!-- ==================== BAGIAN KIRI: PENGERTIAN BKD PROV JATENG ==================== -->
        <div
            class="relative z-10 lg:col-span-7 flex flex-col justify-center p-8 sm:p-12 lg:p-20 text-slate-900 border-b lg:border-b-0 lg:border-r border-white/60 bg-gradient-to-br from-white/70 to-white/30 backdrop-blur-xl overflow-hidden shadow-[20px_0_50px_rgba(0,0,0,0.02)]">

            <style>
                @keyframes slideDownText {
                    0% {
                        opacity: 0;
                        transform: translateY(-35px);
                    }

                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .anim-1 {
                    animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both;
                }

                .anim-2 {
                    animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.25s both;
                }

                .anim-3 {
                    animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both;
                }

                .anim-4 {
                    animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.55s both;
                }

                .anim-5 {
                    animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.7s both;
                }

                .anim-6 {
                    animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.85s both;
                }
            </style>

            <div class="max-w-2xl space-y-6 relative z-10">

                <!-- Judul Utama -->
                <h1
                    class="anim-2 text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-none text-slate-900 transition-all duration-700">
                    SIKURA <br>
                    <span
                        class="bg-gradient-to-r from-blue-600 to-indigo-500 bg-clip-text text-transparent drop-shadow-sm"> BKD Provinsi
                        Jawa Tengah</span>
                </h1>
                <div
                    class="anim-3 w-24 h-2 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.4)]">
                </div>

                <!-- Deskripsi 1 -->
                <p class="anim-4 text-slate-600 text-sm sm:text-base leading-relaxed font-medium">
                    <strong class="text-slate-900">Badan Kepegawaian Daerah (BKD) Provinsi Jawa Tengah</strong> adalah
                    instansi yang berfokus pada manajemen,
                    pengembangan kompetensi, serta pembinaan karier ASN di lingkungan Pemprov Jateng.
                </p>

                <!-- Deskripsi 2 -->
                <p class="anim-5 text-slate-500 text-xs sm:text-sm leading-relaxed">
                    Melalui platform <span class="text-amber-500 font-bold">SIKURA (Sistem Informasi Koleksi dan Ruang
                        Baca)</span> ini, BKD Prov.
                    Jateng
                    berkomitmen membangun budaya kerja berbasis pengetahuan (Knowledge Management). Platform ini
                    menyediakan akses cepat ke berbagai regulasi kepegawaian, modul teknis, tesis, hingga hasil riset
                    aparatur. Semua fasilitas ini didedikasikan untuk mewujudkan pelayanan publik yang makin prima,
                    sejalan dengan semangat <span class="italic text-slate-800 font-bold">Mboten Korupsi, Mboten
                        Ngapusi</span>.
                </p>

                <!-- Floating Cards -->
                <div class="anim-6 grid grid-cols-3 gap-4 pt-8">
                    <div
                        class="p-5 bg-white/70 backdrop-blur-md rounded-2xl border border-white shadow-sm hover:shadow-[0_10px_30px_rgba(245,158,11,0.15)] hover:border-amber-200 transition-all duration-500 transform hover:-translate-y-2 group cursor-default">
                        <div
                            class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-amber-500 font-black text-sm">R</span>
                        </div>
                        <div
                            class="text-xl sm:text-xl font-black text-slate-800 group-hover:text-amber-500 transition-colors">
                            Regulasi</div>
                        <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-1">Tata Negara
                        </div>
                    </div>

                    <div
                        class="p-5 bg-white/70 backdrop-blur-md rounded-2xl border border-white shadow-sm hover:shadow-[0_10px_30px_rgba(59,130,246,0.15)] hover:border-blue-200 transition-all duration-500 transform hover:-translate-y-2 group cursor-default">
                        <div
                            class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-blue-500 font-black text-sm">M</span>
                        </div>
                        <div
                            class="text-xl sm:text-xl font-black text-slate-800 group-hover:text-blue-500 transition-colors">
                            Modul</div>
                        <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-1">Kompetensi</div>
                    </div>

                    <div
                        class="p-5 bg-white/70 backdrop-blur-md rounded-2xl border border-white shadow-sm hover:shadow-[0_10px_30px_rgba(16,185,129,0.15)] hover:border-emerald-200 transition-all duration-500 transform hover:-translate-y-2 group cursor-default">
                        <div
                            class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-emerald-500 font-black text-sm">K</span>
                        </div>
                        <div
                            class="text-xl sm:text-xl font-black text-slate-800 group-hover:text-emerald-500 transition-colors">
                            Riset</div>
                        <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-1">Karya Ilmiah
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== KOLOM KANAN ========= -->
        <div
            class="relative z-10 lg:col-span-5 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-transparent overflow-hidden">

            <style>
                @keyframes slideDownCard {
                    0% {
                        opacity: 0;
                        transform: translateY(-35px);
                    }

                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes fadeInScale {
                    0% {
                        opacity: 0;
                        transform: scale(0.95);
                    }

                    100% {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                .anim-right {
                    animation: slideDownCard 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.35s both;
                }

                .anim-fade-in {
                    animation: fadeInScale 0.4s ease-out both;
                }
            </style>

            <!-- ========== TAMPILAN 1: BIDANG ========== -->
            <div id="view-bidang"
                class="anim-right max-w-md w-full bg-white/80 backdrop-blur-2xl border border-white p-8 sm:p-10 rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] relative">

                <div class="text-center mb-8 relative z-10">
                    <h2 class="text-2xl font-black tracking-tight text-slate-900">
                        Silahkan klik tombol untuk masuk ke dalam portal SIKURA
                    </h2>
                </div>

                @if (session('error'))
                    <div class="mb-4 p-3 bg-rose-50 border border-rose-200 rounded-xl text-center">
                        <span class="text-xs text-rose-600 font-bold">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="space-y-3 relative z-10">
                    @php
                        $bidangList = [
                            [
                                'id' => 'Masuk',
                                'nama' => 'Masuk',
                                'color' => 'blue',
                                'icon' =>
                                    '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H8.25" />',
                            ],
                        ];
                    @endphp

                    @foreach ($bidangList as $bidang)
                        <form action="{{ route('login.bidang') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="bidang_id" value="{{ $bidang['id'] }}">
                            <button type="submit"
                                class="w-full text-left group p-4 bg-slate-50/50 hover:bg-white border border-slate-200 hover:border-{{ $bidang['color'] }}-300 rounded-2xl shadow-[inset_0_2px_4px_rgba(0,0,0,0.01)] hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-4">

                                <!-- Container Ikon Masuk -->
                                <div
                                    class="w-12 h-12 rounded-xl bg-{{ $bidang['color'] }}-100/60 border border-{{ $bidang['color'] }}-200 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shrink-0 text-{{ $bidang['color'] }}-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        {!! $bidang['icon'] !!}
                                    </svg>
                                </div>

                                <div>
                                    <span
                                        class="block text-xl font-black text-slate-800 group-hover:text-{{ $bidang['color'] }}-600 transition-colors leading-tight pr-2">
                                        {{ $bidang['nama'] }}
                                    </span>
                                </div>

                                <!-- Ikon Panah Kanan -->
                                <div
                                    class="ml-auto text-slate-300 group-hover:text-{{ $bidang['color'] }}-500 group-hover:translate-x-1 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </button>
                        </form>
                    @endforeach
                </div>

                <!-- Tombol Pindah ke Form Admin -->
                <div class="mt-6 pt-5 border-t border-slate-200 text-center relative z-10">
                    <p class="text-[10px] font-bold text-slate-400 mb-2">Akses Khusus Pengelola</p>
                    <button type="button" onclick="switchView('view-admin')"
                        class="inline-flex items-center gap-1.5 text-xs font-black text-slate-500 hover:text-blue-600 transition-colors cursor-pointer">
                        🔒 Login Admin Utama
                    </button>
                </div>
            </div>


            <!-- ===== TAMPILAN 2: FORM LOGIN ADMIN ======== -->
            <div id="view-admin"
                class="hidden max-w-md w-full bg-white/80 backdrop-blur-2xl border border-white p-8 sm:p-10 rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] relative">

                <div class="text-center mb-8 relative z-10">
                    <h2 class="text-2xl font-black tracking-tight text-slate-900">
                        Admin Utama
                    </h2>
                    <p class="mt-2 text-xs text-slate-500 font-semibold tracking-wide">
                        Gunakan email dan kata sandi Anda untuk masuk ke panel pengelola.
                    </p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-5 relative z-10">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-2">Alamat
                            Email</label>
                        <input type="email" name="email" required placeholder="admin@bkd.jatengprov.go.id"
                            class="w-full px-4 py-3.5 rounded-xl bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm font-bold text-slate-800 placeholder-slate-400 outline-none">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-2">Kata
                            Sandi</label>
                        <input type="password" name="password" required placeholder="••••••••"
                            class="w-full px-4 py-3.5 rounded-xl bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm font-bold text-slate-800 placeholder-slate-400 outline-none">
                    </div>

                    <!-- Tombol Submit Admin -->
                    <button type="submit"
                        class="w-full py-4 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 hover:from-blue-900 hover:to-blue-700 text-white rounded-xl font-black text-sm tracking-wide shadow-lg shadow-blue-900/20 transform hover:-translate-y-1 transition-all duration-300 flex justify-center items-center gap-2">
                        Masuk ke Panel Admin
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>

                <div class="mt-6 pt-5 border-t border-slate-200 text-center relative z-10">
                    <button type="button" onclick="switchView('view-bidang')"
                        class="inline-flex items-center gap-1.5 text-xs font-black text-slate-500 hover:text-amber-600 transition-colors cursor-pointer">
                        ⬅️ Kembali ke Awal
                    </button>
                </div>

            </div>

            <!-- Script Javascript untuk Sistem Pertukaran Tampilan -->
            <script>
                function switchView(targetViewId) {
                    const viewBidang = document.getElementById('view-bidang');
                    const viewAdmin = document.getElementById('view-admin');

                    if (targetViewId === 'view-admin') {
                        viewBidang.classList.add('hidden');
                        viewBidang.classList.remove('anim-fade-in');

                        viewAdmin.classList.remove('hidden');
                        viewAdmin.classList.add('anim-fade-in');
                    } else {
                        viewAdmin.classList.add('hidden');
                        viewAdmin.classList.remove('anim-fade-in');

                        viewBidang.classList.remove('hidden');
                        viewBidang.classList.add('anim-fade-in');
                    }
                }
                window.addEventListener('pageshow', function(event) {
                    if (event.persisted) {
                        window.location.reload();
                    }
                });
            </script>
        </div>
    </div>
</x-guest-layout>
