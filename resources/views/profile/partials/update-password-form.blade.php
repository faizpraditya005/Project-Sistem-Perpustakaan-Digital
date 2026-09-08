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

        <!-- Kata Sandi Saat Ini -->
        <div>
            <label for="update_password_current_password" class="block text-xs font-black text-black uppercase tracking-wider mb-2">
                Kata Sandi Saat Ini
            </label>
            <div class="relative">
                <input id="update_password_current_password" name="current_password" type="password" 
                    class="block w-full px-4 py-3 pr-12 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold" 
                    autocomplete="current-password" />
                <!-- Tombol Mata Simpel -->
                <button type="button" onclick="togglePassword('update_password_current_password', this)" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-white transition-colors focus:outline-none text-xs font-bold">
                    👁
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-rose-400 font-medium text-xs" />
        </div>

        <!-- Kata Sandi Baru -->
        <div>
            <label for="update_password_password" class="block text-xs font-black text-black uppercase tracking-wider mb-2">
                Kata Sandi Baru
            </label>
            <div class="relative">
                <input id="update_password_password" name="password" type="password" 
                    class="block w-full px-4 py-3 pr-12 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold" 
                    autocomplete="new-password" />
                <!-- Tombol Mata Simpel -->
                <button type="button" onclick="togglePassword('update_password_password', this)" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-white transition-colors focus:outline-none text-xs font-bold">
                    👁
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-rose-400 font-medium text-xs" />
        </div>

        <!-- Konfirmasi Kata Sandi Baru -->
        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-black text-black uppercase tracking-wider mb-2">
                Konfirmasi Kata Sandi Baru
            </label>
            <div class="relative">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                    class="block w-full px-4 py-3 pr-12 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold" 
                    autocomplete="new-password" />
                <!-- Tombol Mata Simpel -->
                <button type="button" onclick="togglePassword('update_password_password_confirmation', this)" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-white transition-colors focus:outline-none text-xs font-bold">
                    👁
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-rose-400 font-medium text-xs" />
        </div>

        <!-- Tombol Simpan & Notifikasi -->
        <div class="flex items-center gap-4 pt-4 border-t border-white/10">
            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-amber-400 to-orange-500 hover:from-amber-500 hover:to-orange-600 text-slate-900 text-sm font-black rounded-xl shadow-lg shadow-amber-500/20 hover:scale-[1.02] transition-all transform active:scale-95">
                💾 Simpan Sandi Baru
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)" 
                    class="text-sm text-emerald-400 font-bold flex items-center gap-1">
                    ✅ Berhasil Diperbarui.
                </p>
            @endif
        </div>
    </form>

    <!-- Skrip JavaScript untuk Tombol Mata Simpel -->
    <script>
        function togglePassword(fieldId, btn) {
            const inputField = document.getElementById(fieldId);
            if (inputField.type === "password") {
                inputField.type = "text";
                btn.textContent = "🔒"; // Simpel: Berubah jadi ikon gembok terbuka/tutup atau tetap teks bersih
            } else {
                inputField.type = "password";
                btn.textContent = "👁";
            }
        }
    </script>
</section>