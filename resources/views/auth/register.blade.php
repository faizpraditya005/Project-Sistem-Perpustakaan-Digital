<x-guest-layout>
    <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
        
        <!-- SISI KIRI: Branding Informasi Registrasi -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-blue-900 via-indigo-900 to-slate-900 p-12 flex-col justify-between relative overflow-hidden">
            <div class="absolute -top-40 -left-40 w-80 h-80 bg-indigo-600 rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-pulse"></div>
            
            <div class="flex items-center space-x-3 z-10">
                <div class="bg-white p-2 rounded-xl shadow-md">
                    <span class="text-xl font-black text-indigo-900 tracking-wider">BKD</span>
                </div>
                <div>
                    <h2 class="text-white font-bold text-sm tracking-widest uppercase">Pemerintah Provinsi</h2>
                    <p class="text-xs text-blue-200">Jawa Tengah</p>
                </div>
            </div>

            <div class="my-auto z-10 max-w-lg">
                <span class="bg-emerald-500/20 text-emerald-300 text-xs px-3 py-1 rounded-full font-semibold uppercase tracking-wider">Registrasi Anggota</span>
                <h1 class="text-white text-4xl font-extrabold tracking-tight mt-4 leading-tight">
                    Satu Akun untuk Semua <span class="text-amber-400">Akses Ilmu.</span>
                </h1>
                <p class="text-blue-100/80 mt-4 leading-relaxed text-sm">
                    Daftarkan data kepegawaian Anda untuk membuka akses penuh ke repositori tesis eksklusif, jurnal internal, serta layanan peminjaman buku fisik ruang baca BKD Provinsi Jateng.
                </p>
            </div>

            <div class="text-xs text-blue-300/60 z-10">
                &copy; {{ date('Y') }} Badan Kepegawaian Daerah Provinsi Jawa Tengah. All rights reserved.
            </div>
        </div>

        <!-- SISI KANAN: Formulir Pendaftaran -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 sm:p-12 bg-white shadow-2xl z-10">
            <div class="w-full max-w-md space-y-6">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 tracking-tight">Registrasi Akun Baru</h2>
                    <p class="text-sm text-gray-500 mt-1">Lengkapi data di bawah ini menggunakan data rill kepegawaian.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Nama Lengkap beserta Gelar -->
                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Nama Lengkap & Gelar</label>
                        <input id="name" class="block w-full mt-1 px-4 py-2.5 rounded-xl border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 bg-gray-50 text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Contoh: Budi Santoso, S.Kom." />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Email Resmi Dinas/Pribadi -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Alamat Email</label>
                        <input id="email" class="block w-full mt-1 px-4 py-2.5 rounded-xl border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 bg-gray-50 text-sm" type="text" name="email" :value="old('email')" required autocomplete="username" placeholder="budi.santoso@gmail.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Kata Sandi -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Kata Sandi</label>
                        <input id="password" class="block w-full mt-1 px-4 py-2.5 rounded-xl border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 bg-gray-50 text-sm" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" class="block w-full mt-1 px-4 py-2.5 rounded-xl border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 bg-gray-50 text-sm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transform active:scale-95 transition duration-150 ease-in-out">
                            Selesaikan Pendaftaran
                        </button>
                    </div>
                </form>

                <div class="text-center pt-2 border-t border-gray-100">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">Masuk disini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
