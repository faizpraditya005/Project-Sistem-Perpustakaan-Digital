<x-app-layout>
    <style>
        @keyframes slideDownAdmin {
            0% {
                opacity: 0;
                margin-top: -30px;
            }

            100% {
                opacity: 1;
                margin-top: 0px;
            }
        }

        .anim-admin-1 {
            animation: slideDownAdmin 0.6s ease-out 0.1s both;
        }

        .anim-admin-2 {
            animation: slideDownAdmin 0.6s ease-out 0.25s both;
        }

        .anim-admin-3 {
            animation: slideDownAdmin 0.6s ease-out 0.4s both;
        }

        .anim-admin-4 {
            animation: slideDownAdmin 0.6s ease-out 0.55s both;
        }
    </style>

    <x-slot name="header">
        <div class="anim-admin-1 flex justify-between items-center">
            <h2 class="text-2xl font-black tracking-tight text-white flex items-center gap-2 drop-shadow-sm">
                 <span
                    class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">{{ __('Kelola Akun Bidang BKD') }}</span>
            </h2>

            <!-- Tombol Kembali -->
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white rounded-xl text-sm font-bold transition-all shadow-md hover:shadow-lg border border-slate-700 hover:scale-105">
                ⬅️ Kembali
            </a>
        </div>
    </x-slot>

    <!-- Background dan Kontainer Utama -->
    <div class="relative min-h-screen py-12 bg-slate-950 overflow-hidden">

        <div class="absolute inset-0 z-0 bg-cover bg-center pointer-events-none select-none filter contrast-140 brightness-90 opacity-20"
            style="background-image: url('{{ asset('images/bg-perpus-4.jpeg') }}');">
        </div>

        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl z-0 pointer-events-none">
        </div>
        <div class="relative z-10 max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tampilkan Pesan Sukses Jika Ada -->
            @if (session('sukses'))
                <div
                    class="anim-admin-2 p-4 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl backdrop-blur-sm">
                    <p class="text-sm font-bold text-emerald-400 flex items-center gap-2">✅ {{ session('sukses') }}</p>
                </div>
            @endif

            <!-- BAGIAN 1: EDIT PROFIL AKUN -->
            <div
                class="anim-admin-3 bg-slate-900/70 backdrop-blur-xl border border-white/10 shadow-[0_10px_40px_rgba(0,0,0,0.2)] rounded-3xl p-8 transition-all duration-300 hover:border-white/20">
                <div class="border-b border-white/10 pb-4 mb-6">
                    <h3 class="text-xl font-bold text-white">Informasi Profil Bidang</h3>
                    <p class="text-sm text-slate-400 mt-1">Perbarui nama atau alamat email akun bidang yang
                        bersangkutan.</p>
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name"
                            class="block text-xs font-black text-blue-200 uppercase tracking-wider mb-2">Nama Bidang /
                            Nama Admin</label>
                        <input type="text" name="name" id="name" required
                            value="{{ old('name', $user->name) }}"
                            class="block w-full px-4 py-3 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold">
                    </div>

                    <div>
                        <label for="email"
                            class="block text-xs font-black text-blue-200 uppercase tracking-wider mb-2">Alamat
                            Email</label>
                        <input type="email" name="email" id="email" required
                            value="{{ old('email', $user->email) }}"
                            class="block w-full px-4 py-3 bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-400 focus:ring-4 focus:ring-amber-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold">
                    </div>

                    <div class="flex justify-end pt-4 border-t border-white/10 mt-6">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-amber-400 to-orange-500 hover:from-amber-500 hover:to-orange-600 text-slate-900 text-sm font-black rounded-xl shadow-lg shadow-amber-500/20 hover:scale-[1.02] transition-all transform active:scale-95">
                             Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- BAGIAN 2: RESET PASSWORD  -->
            <div
                class="anim-admin-4 bg-rose-950/40 backdrop-blur-xl border border-rose-500/20 shadow-[0_10px_40px_rgba(0,0,0,0.2)] rounded-3xl p-8 transition-all duration-300 hover:border-rose-500/40">
                <div class="border-b border-rose-500/20 pb-4 mb-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-rose-400">Reset Kata Sandi</h3>
                        <p class="text-sm text-rose-200/70 mt-1">Gunakan fitur ini jika pemilik akun lupa kata sandi
                            mereka.</p>
                    </div>
                    <span
                        class="p-2 bg-rose-500/20 text-rose-400 rounded-lg text-xl border border-rose-500/30"></span>
                </div>

                <form action="{{ route('users.update_password', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="password"
                            class="block text-xs font-black text-rose-200 uppercase tracking-wider mb-2">Password Baru
                            untuk <span class="text-white">{{ $user->name }}</span></label>
                        <input type="text" name="password" id="password" required
                            placeholder="Ketik kata sandi baru..."
                            class="block w-full px-4 py-3 bg-slate-800/80 border border-rose-500/50 text-white placeholder-slate-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/20 rounded-xl shadow-sm transition-all duration-300 text-sm font-semibold">
                        <p class="text-[10px] text-rose-300/60 mt-2 font-medium">*Beritahukan kata sandi ini kepada
                            pemilik akun setelah berhasil direset.</p>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white text-sm font-black rounded-xl shadow-lg shadow-red-500/20 hover:scale-[1.02] transition-all transform active:scale-95">
                             Reset Password Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
