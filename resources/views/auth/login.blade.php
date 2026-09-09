<x-guest-layout>
    <div class="min-h-screen relative flex flex-col lg:grid lg:grid-cols-12 bg-slate-950 overflow-hidden font-sans">

        <!-- Gambar Latar Belakang Perpustakaan (Transparansi Tipis untuk Seluruh Halaman) -->
        <div class="absolute inset-0 z-0 opacity-[0.08] bg-cover bg-center pointer-events-none select-none filter contrast-125 brightness-50"
            style="background-image: url('{{ asset('images/bg-perpus-4.jpeg') }}');">
        </div>

        <!-- Efek Lampu Berpendar Latar Belakang -->
        <div
            class="absolute top-12 left-12 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl z-0 pointer-events-none animate-pulse">
        </div>
        <div
            class="absolute bottom-12 right-12 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl z-0 pointer-events-none">
        </div>

        <!-- ==================== BAGIAN KIRI: PENGERTIAN BKD PROV JATENG ==================== -->
        <div
            class="relative z-10 lg:col-span-7 flex flex-col justify-center p-8 sm:p-12 lg:p-20 text-white border-b lg:border-b-0 lg:border-r border-white/5 bg-slate-950/40 backdrop-blur-sm overflow-hidden">

            <div class="absolute top-0 right-0 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none">
            </div>

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
                    animation: slideDownText 0.7s ease-out 0.1s both;
                }

                .anim-2 {
                    animation: slideDownText 0.7s ease-out 0.25s both;
                }

                .anim-3 {
                    animation: slideDownText 0.7s ease-out 0.4s both;
                }

                .anim-4 {
                    animation: slideDownText 0.7s ease-out 0.55s both;
                }

                .anim-5 {
                    animation: slideDownText 0.7s ease-out 0.7s both;
                }

                .anim-6 {
                    animation: slideDownText 0.7s ease-out 0.85s both;
                }
            </style>

            <div class="max-w-2xl space-y-6">

                <div
                    class="anim-1 inline-flex items-center gap-2 px-3 py-1.5 bg-blue-500/10 border border-blue-400/20 text-blue-300 text-xs font-black uppercase tracking-widest rounded-xl">
                    🏛️ Perpustakaan Digital BKD Prov. Jawa Tengah
                </div>

                <h1
                    class="anim-2 text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-none bg-gradient-to-r from-white via-slate-100 to-blue-200 bg-clip-text text-transparent transition-all duration-700 hover:scale-[1.01]">
                    Badan Kepegawaian Daerah <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">Provinsi
                        Jawa Tengah</span>
                </h1>

                <div
                    class="anim-3 w-20 h-1.5 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full shadow-lg shadow-amber-500/30">
                </div>

                <p class="anim-4 text-slate-300 text-sm sm:text-base leading-relaxed font-medium">
                    Badan Kepegawaian Daerah (BKD) Provinsi Jawa Tengah adalah instansi yang berfokus pada manajemen,
                    pengembangan kompetensi, serta pembinaan karier ASN di lingkungan Pemprov Jateng.
                </p>

                <p class="anim-5 text-slate-400 text-xs sm:text-sm leading-relaxed">
                    Melalui platform <span class="text-amber-400 font-bold">Perpustakaan Digital</span> ini, BKD Prov. Jateng
                    berkomitmen membangun budaya kerja berbasis pengetahuan (Knowledge Management). Platform ini
                    menyediakan akses cepat ke berbagai regulasi kepegawaian, modul teknis, tesis, hingga hasil riset
                    aparatur. Semua fasilitas ini didedikasikan untuk mewujudkan pelayanan publik yang makin prima,
                    sejalan dengan semangat <span class="italic text-white">Mboten Korupsi, Mboten Ngapusi</span>.
                </p>

                <div class="anim-6 grid grid-cols-3 gap-4 pt-6 border-t border-white/5">
                    <div
                        class="p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="text-xl sm:text-2xl font-black text-amber-400">Regulasi</div>
                        <div class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 mt-1">Tata
                            Negara</div>
                    </div>
                    <div
                        class="p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="text-xl sm:text-2xl font-black text-blue-400">Modul</div>
                        <div class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 mt-1">
                            Kompetensi</div>
                    </div>
                    <div
                        class="p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="text-xl sm:text-2xl font-black text-emerald-400">Riset</div>
                        <div class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 mt-1">Karya
                            Ilmiah</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== BAGIAN KANAN: HALAMAN FORM LOGIN ==================== -->
        <div
            class="relative z-10 lg:col-span-5 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-slate-900/50 backdrop-blur-md">

            <div class="absolute top-0 right-0 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none">
            </div>

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

                .anim-right {
                    animation: slideDownCard 0.8s ease-out 0.35s both;
                }
            </style>

            <div
                class="anim-right max-w-md w-full space-y-8 bg-white/10 backdrop-blur-xl border border-white/20 p-8 sm:p-10 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] hover:border-white/30 transition-all duration-500 group">

                <div class="text-center">
                    <h2 class="text-2xl font-black tracking-tight text-white drop-shadow-sm">
                        Selamat Datang Kembali
                    </h2>
                    <p class="mt-2 text-xs text-blue-200/80 font-medium">
                        Silakan masuk menggunakan akun kepegawaian Anda.
                    </p>
                </div>

                <!-- Tampilkan Error Validasi jika ada -->
                @if ($errors->any())
                    <div class="p-4 bg-red-500/20 border border-red-500/30 rounded-2xl backdrop-blur-sm">
                        <ul class="list-disc list-inside text-xs text-red-200 font-medium space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORMULIR INPUT -->
                <form class="mt-6 space-y-5" action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- INPUT 1: EMAIL -->
                    <div class="space-y-2">
                        <label for="email"
                            class="block text-[10px] font-black text-blue-200 uppercase tracking-wider">
                            Alamat Email Resmi
                        </label>
                        <div class="relative group/input">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within/input:text-amber-400 transition-colors"></span>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}" placeholder="nama.bidang@bkd.jatengprov.go.id"
                                class="w-full pl-5 pr-4 py-3.5 bg-white/95 text-gray-900 placeholder-gray-400 rounded-2xl border-2 border-transparent shadow-md focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 focus:scale-[1.01] text-sm font-medium transition-all duration-300">
                        </div>
                    </div>

                    <!-- INPUT 2: KATA SANDI -->
                    <div class="space-y-2" x-data="{ showPassword: false }">
                        <div class="flex justify-between items-center">
                            <label for="password"
                                class="block text-[10px] font-black text-blue-200 uppercase tracking-wider">
                                Kata Sandi
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-[11px] font-bold text-amber-400 hover:text-amber-300 transition-colors drop-shadow-sm">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>

                        <div class="relative group/input">

                            <input id="password" name="password" :type="showPassword ? 'text' : 'password'"
                                autocomplete="current-password" required placeholder="••••••••••••"
                                class="w-full pl-5 pr-12 py-3.5 bg-white/95 text-gray-900 placeholder-gray-400 rounded-2xl border-2 border-transparent shadow-md focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 focus:scale-[1.01] text-sm font-medium transition-all duration-300">

                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-amber-500 focus:outline-none transition-colors">

                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>

                                <svg x-show="showPassword" style="display: none;" class="w-5 h-5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-amber-500 focus:ring-amber-500 border-white/20 rounded bg-white/10 transition-colors cursor-pointer">
                        <label for="remember_me"
                            class="ml-2 block text-xs font-bold text-blue-100 select-none cursor-pointer">
                            Ingat akun saya di perangkat ini
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-3.5 px-4 bg-gradient-to-r from-amber-400 to-orange-500 hover:from-amber-500 hover:to-orange-600 hover:scale-[1.02] hover:shadow-[0_0_25px_rgba(245,158,11,0.4)] text-slate-950 text-sm font-black rounded-2xl shadow-md transition-all duration-300 transform active:scale-95">
                            Masuk ke Portal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
