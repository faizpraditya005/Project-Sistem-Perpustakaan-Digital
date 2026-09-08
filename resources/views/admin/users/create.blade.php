<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-xl text-gray-800 leading-tight tracking-tight">
                {{ __('Registrasi Akun Bidang BKD') }}
            </h2>
            <a href="{{ route('dashboard') }}" 
                class="inline-flex items-center gap-1.5 px-4 py-2 bg-white hover:bg-gray-50 text-gray-800 text-xs font-bold rounded-xl shadow-sm border border-gray-200 transition transform active:scale-95">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl p-8 border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Tambah Akun Bidang Baru</h3>
                    <p class="text-sm text-gray-500">Buat hak akses khusus untuk perwakilan bidang agar dapat mengunggah regulasi atau tesis kedinasan.</p>
                </div>

                <!-- Tampilkan Error Validasi jika ada -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORM REGISTRASI -->
                <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Nama Bidang / Unit Kerja -->
                    <div>
                        <label for="name" class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Nama Bidang / Nama Admin</label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Contoh: Bidang Mutasi Pegawai / Supriyadi"
                            class="w-full px-4 py-3 bg-gray-50 text-gray-900 placeholder-gray-400 rounded-2xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-medium transition shadow-sm">
                    </div>

                    <!-- Email Akun -->
                    <div>
                        <label for="email" class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Alamat Email Dinas/Akun</label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="Contoh: mutasi.bkd@jatengprov.go.id"
                            class="w-full px-4 py-3 bg-gray-50 text-gray-900 placeholder-gray-400 rounded-2xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-medium transition shadow-sm">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi (Password)</label>
                            <input type="password" name="password" id="password" required placeholder="Minimal 8 karakter"
                                class="w-full px-4 py-3 bg-gray-50 text-gray-900 placeholder-gray-400 rounded-2xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-medium transition shadow-sm">
                        </div>

                        <!-- Konfirmasi Password -->
                        <div>
                            <label for="password_confirmation" class="block text-xs font-extrabold text-gray-700 uppercase tracking-wider mb-2">Ulangi Kata Sandi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Ketik ulang password"
                                class="w-full px-4 py-3 bg-gray-50 text-gray-900 placeholder-gray-400 rounded-2xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-medium transition shadow-sm">
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition">Batal</a>
                        <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md transform active:scale-95 transition">Daftarkan Akun</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>