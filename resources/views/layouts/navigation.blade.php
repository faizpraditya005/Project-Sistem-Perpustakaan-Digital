<nav x-data="{ open: false }"
    class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 backdrop-blur-md border-b border-blue-800/50 sticky top-0 z-50 shadow-[0_4px_20px_rgba(0,0,0,0.15)]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- KIRI: Logo & Link Dashboard -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-3 mr-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('images/jateng.png') }}"
                            class="h-12 w-auto object-contain drop-shadow-[0_0_10px_rgba(255,255,255,0.1)] hover:scale-105 transition-transform duration-300"
                            alt="Logo BKD Jateng">
                    </a>
                </div>

                <!-- Link Navigasi Utama (Desktop) -->
                <div class="hidden sm:flex sm:items-center space-x-8 h-full">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-black tracking-wide rounded-xl transform active:scale-95 transition-all duration-300
                        {{ request()->routeIs('dashboard')
                            ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/40 border border-blue-500 hover:bg-blue-500 hover:scale-105'
                            : 'text-blue-100 hover:text-white hover:bg-white/10 hover:scale-105' }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>

                <!-- ================= MENU DROPDOWN: PEMINJAMAN BUKU ================= -->
                <!-- x-data="{ open: false }" adalah inisialisasi Alpine.js untuk membuka/tutup menu -->
                <div x-data="{ open: false }" class="relative" @click.away="open = false" @close.stop="open = false">

                    <!-- Tombol Pemicu (Trigger) -->
                    <button @click="open = ! open" type="button"
                        class="group flex items-center gap-2 px-4 py-2.5 rounded-xl text-blue-100 text-sm font-bold hover:bg-white/10 hover:text-white transition-all duration-300 border border-transparent hover:border-white/20 focus:outline-none">

                        <!-- Ikon Buku -->
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-amber-400 transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>

                        Peminjaman Buku

                        <!-- Ikon Panah Bawah (Akan berputar 180 derajat saat menu terbuka) -->
                        <svg class="w-4 h-4 text-blue-300 group-hover:text-white transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Panel Sub-menu (Liquid Glass Dropdown) -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-3 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute left-0 mt-3 w-80 rounded-2xl bg-white/95 backdrop-blur-xl border border-slate-200/50 shadow-[0_20px_60px_-15px_rgba(0,0,0,0.15)] overflow-hidden z-50"
                        style="display: none;">

                        <div class="p-2.5 space-y-1">

                            <!-- Sub-menu 1: Katalog Buku Fisik -->
                            <!-- Ganti href="#" menjadi pemanggilan route katalog -->
                            <a href="{{ route('katalog.index') }}"
                                class="group flex items-start gap-3.5 p-3 rounded-xl hover:bg-blue-50 transition-all duration-300">
                                <!-- ... (kode ikon dan teks tetap sama) ... -->
                                <div
                                    class="w-10 h-10 rounded-xl bg-blue-100/50 flex items-center justify-center group-hover:bg-blue-200 group-hover:scale-105 transition-all duration-300 text-blue-600 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-blue-700 transition-colors">
                                        Katalog Buku Fisik</h4>
                                    <p class="text-[11px] font-semibold text-slate-500 mt-0.5 leading-snug">Cari
                                        ketersediaan judul buku dan ajukan permohonan pinjam.</p>
                                </div>
                            </a>

                            <!-- Sub-menu 2: Status Peminjaman -->
                            <a href="{{ route('peminjaman.status') }}"
                                class="group flex items-start gap-3.5 p-3 rounded-xl hover:bg-amber-50 transition-all duration-300">
                                <div
                                    class="w-10 h-10 rounded-xl bg-amber-100/50 flex items-center justify-center group-hover:bg-amber-200 group-hover:scale-105 transition-all duration-300 text-amber-600 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-amber-700 transition-colors">
                                        Status Peminjaman</h4>
                                    <p class="text-[11px] font-semibold text-slate-500 mt-0.5 leading-snug">Pantau buku
                                        yang sedang dipinjam dan cek batas waktu (tenggat).</p>
                                </div>
                            </a>

                            <!-- Sub-menu 3: Riwayat & Pengembalian -->
                            <a href="{{ route('peminjaman.riwayat') }}"
                                class="group flex items-start gap-3.5 p-3 rounded-xl hover:bg-emerald-50 transition-all duration-300">
                                <div
                                    class="w-10 h-10 rounded-xl bg-emerald-100/50 flex items-center justify-center group-hover:bg-emerald-200 group-hover:scale-105 transition-all duration-300 text-emerald-600 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-emerald-700 transition-colors">
                                        Riwayat Pengembalian</h4>
                                    <p class="text-[11px] font-semibold text-slate-500 mt-0.5 leading-snug">Lihat arsip
                                        daftar buku yang sudah selesai dikembalikan.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- KANAN: Profile, Log Out, & Nama Bidang -->
            <div class="hidden sm:flex sm:items-center gap-3">

                <!-- TOMBOL PROFILE -->
                <a href="{{ route('profile.edit') }}"
                    class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-extrabold tracking-wide text-white bg-white/10 hover:bg-white hover:text-blue-900 border border-white/20 hover:border-transparent rounded-xl shadow-sm hover:shadow-lg hover:shadow-white/20 hover:scale-105 transition-all duration-300 transform active:scale-95">
                    {{ __('Profile') }}
                </a>

                <!-- TOMBOL LOG OUT -->
                <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-extrabold tracking-wide text-rose-200 bg-white/10 hover:bg-rose-500 hover:text-white border border-white/20 hover:border-transparent rounded-xl shadow-sm hover:shadow-lg hover:shadow-rose-500/30 hover:scale-105 transition-all duration-300 transform active:scale-95">
                        {{ __('Exit') }}
                    </button>
                </form>

                <!-- Garis Pembatas -->
                <div class="h-6 w-px bg-blue-200 mx-1"></div>

                <!-- Informasi Nama Bidang Aktif -->
                <span
                    class="text-xs font-bold text-blue-50 bg-blue-950/60 border border-blue-700/80 px-3 py-1.5 rounded-lg shadow-inner select-none flex items-center gap-2">
                    👤 {{ Auth::user()->name }}
                </span>
            </div>

            <!-- HAMBURGER MENU (Untuk Tampilan Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-800 focus:outline-none focus:bg-blue-800 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MENU MOBILE DROPDOWN -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-blue-900 border-t border-blue-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-blue-800">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Settings Options (Mobile) -->
        <div class="pt-4 pb-1 border-t border-blue-800/50">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-100 hover:bg-blue-800 hover:text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-rose-300 hover:bg-rose-900/50 hover:text-rose-200">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
