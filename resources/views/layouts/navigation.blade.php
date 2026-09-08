<nav x-data="{ open: false }" class="bg-slate-900/90 backdrop-blur-md border-b border-slate-800/50 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('images/jateng.png') }}" class="h-12 w-auto object-contain"
                            alt="Logo BKD Jateng">
                    </a>
                </div>

                <!-- NAVIGASI UTAMA -->
                <div class="flex justify-between h-16">
                    <div class="hidden space-x-8 sm:-my-px sm:flex sm:items-center h-full">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-black tracking-wide rounded-xl transform active:scale-95 transition-all duration-300
                {{ request()->routeIs('dashboard')
                    ? 'bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 text-white shadow-lg shadow-indigo-500/30 hover:from-blue-700 hover:via-indigo-700 hover:to-blue-800 hover:scale-105 hover:shadow-indigo-500/40'
                    : 'text-gray-500 hover:text-indigo-600 hover:bg-indigo-50/70 hover:scale-105 hover:shadow-sm' }}">
                             {{ __('Dashboard') }}
                        </a>
                    </div>

                    <!-- MENU NAVIGASI PROFILE, LOG OUT, & NAMA BIDANG -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">

                        <!-- TOMBOL PROFILE -->
                        <a href="{{ route('profile.edit') }}"
                            class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-extrabold tracking-wide text-slate-300 bg-slate-950/40 hover:text-white hover:bg-gradient-to-r hover:from-indigo-600 hover:to-blue-600 border border-slate-800 hover:border-transparent rounded-xl shadow-sm hover:shadow-lg hover:shadow-indigo-500/20 hover:scale-105 transition-all duration-300 transform active:scale-95">
                             {{ __('Profile') }}
                        </a>

                        <!-- TOMBOL LOG OUT -->
                        <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-extrabold tracking-wide text-rose-400 bg-slate-950/40 hover:text-white hover:bg-gradient-to-r hover:from-red-500 hover:to-rose-600 border border-slate-800 hover:border-transparent rounded-xl shadow-sm hover:shadow-lg hover:shadow-red-500/20 hover:scale-105 transition-all duration-300 transform active:scale-95">
                                 {{ __('Log Out') }}
                            </button>
                        </form>

                        <div class="h-6 w-px bg-slate-400/100 mx-1"></div>

                        <!-- Informasi Nama Bidang Aktif -->
                        <span
                            class="text-xs font-bold text-slate-300 bg-slate-950/60 border border-slate-800/80 px-3 py-1.5 rounded-lg select-none">
                            👤 {{ Auth::user()->name }}
                        </span>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>

                    <!-- Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
