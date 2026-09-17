<x-guest-layout>
    <div class="min-h-screen relative flex flex-col lg:grid lg:grid-cols-12 bg-slate-50 overflow-hidden font-sans">

        <div class="absolute inset-0 z-0 opacity-[0.05] bg-cover bg-center pointer-events-none select-none filter contrast-100"
            style="background-image: url('{{ asset('images/bg-perpus-4.jpeg') }}');">
        </div>

        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob { animation: blob 10s infinite alternate cubic-bezier(0.45, 0.05, 0.55, 0.95); }
            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
        </style>

        <div class="absolute top-0 -left-4 w-96 h-96 bg-blue-300/30 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob z-0 pointer-events-none"></div>
        <div class="absolute top-0 -right-4 w-96 h-96 bg-amber-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000 z-0 pointer-events-none"></div>
        <div class="absolute -bottom-8 left-20 w-96 h-96 bg-indigo-300/30 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000 z-0 pointer-events-none"></div>


        <!-- ==================== BAGIAN KIRI: PENGERTIAN BKD PROV JATENG ==================== -->
        <div
            class="relative z-10 lg:col-span-7 flex flex-col justify-center p-8 sm:p-12 lg:p-20 text-slate-900 border-b lg:border-b-0 lg:border-r border-white/60 bg-gradient-to-br from-white/70 to-white/30 backdrop-blur-xl overflow-hidden shadow-[20px_0_50px_rgba(0,0,0,0.02)]">

            <style>
                @keyframes slideDownText {
                    0% { opacity: 0; transform: translateY(-35px); }
                    100% { opacity: 1; transform: translateY(0); }
                }
                .anim-1 { animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both; }
                .anim-2 { animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.25s both; }
                .anim-3 { animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both; }
                .anim-4 { animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.55s both; }
                .anim-5 { animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.7s both; }
                .anim-6 { animation: slideDownText 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.85s both; }
            </style>

            <div class="max-w-2xl space-y-6 relative z-10">

                <!-- Badge -->
                <div
                    class="anim-1 inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-md border border-blue-100/50 shadow-sm text-blue-700 text-[10px] font-black uppercase tracking-widest rounded-full">
                    <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                    Perpustakaan Digital BKD Prov. Jawa Tengah
                </div>

                <!-- Judul Utama -->
                <h1
                    class="anim-2 text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-none text-slate-900 transition-all duration-700">
                    Badan Kepegawaian <br class="hidden sm:inline"> Daerah <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-500 bg-clip-text text-transparent drop-shadow-sm">Provinsi
                        Jawa Tengah</span>
                </h1>

                <div
                    class="anim-3 w-24 h-2 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.4)]">
                </div>

                <!-- Deskripsi 1 -->
                <p class="anim-4 text-slate-600 text-sm sm:text-base leading-relaxed font-medium">
                    <strong class="text-slate-900">Badan Kepegawaian Daerah (BKD) Provinsi Jawa Tengah</strong> adalah instansi yang berfokus pada manajemen,
                    pengembangan kompetensi, serta pembinaan karier ASN di lingkungan Pemprov Jateng.
                </p>

                <!-- Deskripsi 2 -->
                <p class="anim-5 text-slate-500 text-xs sm:text-sm leading-relaxed">
                    Melalui platform <span class="text-amber-500 font-bold">Perpustakaan Digital</span> ini, BKD Prov. Jateng
                    berkomitmen membangun budaya kerja berbasis pengetahuan (Knowledge Management). Platform ini
                    menyediakan akses cepat ke berbagai regulasi kepegawaian, modul teknis, tesis, hingga hasil riset
                    aparatur. Semua fasilitas ini didedikasikan untuk mewujudkan pelayanan publik yang makin prima,
                    sejalan dengan semangat <span class="italic text-slate-800 font-bold">Mboten Korupsi, Mboten Ngapusi</span>.
                </p>

                <!-- Floating Cards -->
                <div class="anim-6 grid grid-cols-3 gap-4 pt-8">
                    <div class="p-5 bg-white/70 backdrop-blur-md rounded-2xl border border-white shadow-sm hover:shadow-[0_10px_30px_rgba(245,158,11,0.15)] hover:border-amber-200 transition-all duration-500 transform hover:-translate-y-2 group cursor-default">
                        <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-amber-500 font-black text-sm">R</span>
                        </div>
                        <div class="text-xl sm:text-xl font-black text-slate-800 group-hover:text-amber-500 transition-colors">Regulasi</div>
                        <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-1">Tata Negara</div>
                    </div>
                    
                    <div class="p-5 bg-white/70 backdrop-blur-md rounded-2xl border border-white shadow-sm hover:shadow-[0_10px_30px_rgba(59,130,246,0.15)] hover:border-blue-200 transition-all duration-500 transform hover:-translate-y-2 group cursor-default">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-blue-500 font-black text-sm">M</span>
                        </div>
                        <div class="text-xl sm:text-xl font-black text-slate-800 group-hover:text-blue-500 transition-colors">Modul</div>
                        <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-1">Kompetensi</div>
                    </div>
                    
                    <div class="p-5 bg-white/70 backdrop-blur-md rounded-2xl border border-white shadow-sm hover:shadow-[0_10px_30px_rgba(16,185,129,0.15)] hover:border-emerald-200 transition-all duration-500 transform hover:-translate-y-2 group cursor-default">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-emerald-500 font-black text-sm">K</span>
                        </div>
                        <div class="text-xl sm:text-xl font-black text-slate-800 group-hover:text-emerald-500 transition-colors">Riset</div>
                        <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-1">Karya Ilmiah</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== BAGIAN KANAN: HALAMAN FORM LOGIN ==================== -->
        <div class="relative z-10 lg:col-span-5 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-transparent">

            <style>
                @keyframes slideDownCard {
                    0% { opacity: 0; transform: translateY(-35px); }
                    100% { opacity: 1; transform: translateY(0); }
                }
                .anim-right { animation: slideDownCard 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.35s both; }
            </style>

            <div class="anim-right max-w-md w-full space-y-8 bg-white/90 backdrop-blur-2xl border border-white p-8 sm:p-12 rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] transition-all duration-500">

                <div class="text-center">
                    <h2 class="text-3xl font-black tracking-tight text-slate-900">
                        Selamat Datang
                    </h2>
                    <p class="mt-2 text-xs text-slate-500 font-semibold tracking-wide">
                        Silakan masuk menggunakan akun kepegawaian Anda.
                    </p>
                </div>

                <!-- Tampilkan Error Validasi jika ada -->
                @if ($errors->any())
                    <div class="p-4 bg-rose-50 border border-rose-100 rounded-2xl">
                        <ul class="list-disc list-inside text-xs text-rose-600 font-bold space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORMULIR INPUT -->
                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- INPUT 1: EMAIL -->
                    <div class="space-y-2">
                        <label for="email" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">
                            Alamat Email Resmi
                        </label>
                        <div class="relative group/input">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}" placeholder="admin.perpus@bkd.jatengprov.go.id"
                                class="w-full px-5 py-4 bg-slate-50/50 text-slate-900 placeholder-slate-400 rounded-2xl border border-slate-200 shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)] focus:bg-white focus:border-amber-400 focus:ring-4 focus:ring-amber-500/10 text-sm font-semibold transition-all duration-300 outline-none">
                        </div>
                    </div>

                    <!-- INPUT 2: KATA SANDI -->
                    <div class="space-y-2" x-data="{ showPassword: false }">
                        <div class="flex justify-between items-center ml-1">
                            <label for="password" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                Kata Sandi
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[10px] font-black text-amber-500 hover:text-orange-500 transition-colors tracking-wide">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>

                        <div class="relative group/input">
                            <input id="password" name="password" :type="showPassword ? 'text' : 'password'"
                                autocomplete="current-password" required placeholder="••••••••••••"
                                class="w-full pl-5 pr-12 py-4 bg-slate-50/50 text-slate-900 placeholder-slate-400 rounded-2xl border border-slate-200 shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)] focus:bg-white focus:border-amber-400 focus:ring-4 focus:ring-amber-500/10 text-sm font-bold transition-all duration-300 outline-none">

                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-5 text-slate-400 hover:text-amber-500 focus:outline-none transition-colors">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg x-show="showPassword" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- INGAT SAYA -->
                    <div class="flex items-center ml-1">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-amber-500 focus:ring-amber-500 border-slate-300 rounded bg-white transition-colors cursor-pointer">
                        <label for="remember_me" class="ml-2 block text-[11px] font-bold text-slate-500 select-none cursor-pointer">
                            Ingat akun saya di perangkat ini
                        </label>
                    </div>

                    <!-- TOMBOL SUBMIT -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-4 px-4 bg-[length:200%_auto] bg-gradient-to-r from-amber-400 via-orange-500 to-amber-400 hover:bg-right text-white text-sm font-black uppercase tracking-widest rounded-2xl shadow-[0_10px_25px_rgba(245,158,11,0.3)] hover:shadow-[0_15px_35px_rgba(245,158,11,0.4)] transition-all duration-500 transform hover:-translate-y-1 active:scale-95">
                            Masuk ke Portal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>