<section>
    <header>
        <h2 class="text-xl font-black text-white">
            Perbarui Kata Sandi
        </h2>
        <p class="mt-1 text-sm text-black font-bold">
            Pastikan akun Anda menggunakan kata sandi yang mudah di ingat.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- ================= 1. Kata Sandi Saat Ini ================= -->
        <div x-data="{ show: false }">
            <label for="update_password_current_password"
                class="block text-xs font-black text-black uppercase tracking-wider mb-2">
                Kata Sandi Saat Ini
            </label>
            <div class="relative">
                <input id="update_password_current_password" name="current_password" :type="show ? 'text' : 'password'"
                    class="block w-full px-4 py-3 pr-12 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold"
                    autocomplete="current-password" />

                <!-- Tombol Mata SVG Minimalis -->
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-amber-400 transition-colors focus:outline-none">
                    <!-- Ikon Mata Terbuka -->
                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    <!-- Ikon Mata Tercoret -->
                    <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                        </path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-rose-400 font-medium text-xs" />
        </div>

        <!-- ================= 2. Kata Sandi Baru ================= -->
        <div x-data="{ show: false }">
            <label for="update_password_password"
                class="block text-xs font-black text-black uppercase tracking-wider mb-2">
                Kata Sandi Baru
            </label>
            <div class="relative">
                <input id="update_password_password" name="password" :type="show ? 'text' : 'password'"
                    class="block w-full px-4 py-3 pr-12 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold"
                    autocomplete="new-password" />

                <!-- Tombol Mata SVG Minimalis -->
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-amber-400 transition-colors focus:outline-none">
                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                        </path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-rose-400 font-medium text-xs" />
        </div>

        <!-- ================= 3. Konfirmasi Kata Sandi Baru ================= -->
        <div x-data="{ show: false }">
            <label for="update_password_password_confirmation"
                class="block text-xs font-black text-black uppercase tracking-wider mb-2">
                Konfirmasi Kata Sandi Baru
            </label>
            <div class="relative">
                <input id="update_password_password_confirmation" name="password_confirmation"
                    :type="show ? 'text' : 'password'"
                    class="block w-full px-4 py-3 pr-12 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold"
                    autocomplete="new-password" />

                <!-- Tombol Mata SVG Minimalis -->
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-amber-400 transition-colors focus:outline-none">
                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                        </path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-rose-400 font-medium text-xs" />
        </div>

        <!-- Tombol Simpan & Notifikasi -->
        <div class="flex items-center gap-4 pt-4 border-t border-white/10">
            <button type="submit"
                class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-amber-400 to-orange-500 hover:from-amber-500 hover:to-orange-600 text-slate-900 text-sm font-black rounded-xl shadow-lg shadow-amber-500/20 hover:scale-[1.02] transition-all transform active:scale-95">
                Simpan Sandi Baru
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm text-emerald-400 font-bold flex items-center gap-1">
                    ✅ Berhasil Diperbarui.
                </p>
            @endif
        </div>
    </form>
</section>
