<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 backdrop-blur-md border-b border-blue-800/50 sticky top-0 z-50 shadow-[0_4px_20px_rgba(0,0,0,0.15)]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- KIRI: Logo & Link Dashboard -->
            <div class="flex items-center">
                
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-3 mr-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('images/jateng.png') }}" class="h-12 w-auto object-contain drop-shadow-[0_0_10px_rgba(255,255,255,0.1)] hover:scale-105 transition-transform duration-300"
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
                        {{ __('Log Out') }}
                    </button>
                </form>

                <!-- Garis Pembatas -->
                <div class="h-6 w-px bg-blue-200 mx-1"></div>

                <!-- Informasi Nama Bidang Aktif -->
                <span class="text-xs font-bold text-blue-50 bg-blue-950/60 border border-blue-700/80 px-3 py-1.5 rounded-lg shadow-inner select-none flex items-center gap-2">
                    👤 {{ Auth::user()->name }}
                </span>
            </div>

            <!-- HAMBURGER MENU (Untuk Tampilan Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-800 focus:outline-none focus:bg-blue-800 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-rose-300 hover:bg-rose-900/50 hover:text-rose-200">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>