<x-app-layout>
    <div class="min-h-screen bg-slate-50/50 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- HEADER HALAMAN -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-black text-slate-800">Master Data Bidang / Subbag</h1>
                    <p class="text-sm font-medium text-slate-500">Kelola daftar unit kerja BKD Provinsi Jawa Tengah untuk pilihan login dan peminjaman.</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-black rounded-xl transition-all">
                        ← Kembali
                    </a>
                    <a href="{{ route('users.create') }}" class="px-4 py-2.5 bg-blue-900 hover:bg-blue-800 text-white text-xs font-black rounded-xl shadow-md transition-all">
                        + Tambah Bidang Baru
                    </a>
                </div>
            </div>

            <!-- PESAN NOTIFIKASI SUKSES / ERROR -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-sm font-bold">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl text-sm font-bold">
                    {{ session('error') }}
                </div>
            @endif

            <!-- TABEL DAFTAR BIDANG -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-wider">
                                <th class="p-4 pl-6">NAMA BIDANG / SUBBAG</th>
                                <th class="p-4">EMAIL NOTIFIKASI</th>
                                <th class="p-4 pr-6 text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                            @forelse($users as $user)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <!-- 1. Kolom Nama Bidang -->
                                    <td class="p-4 pl-6 font-bold text-slate-800">
                                        {{ $user->name }}
                                    </td>

                                    <!-- 2. Kolom Email Notifikasi -->
                                    <td class="p-4 text-slate-500 text-xs">
                                        {{ $user->email }}
                                    </td>

                                    <!-- 3. Kolom Aksi (Tombol Edit & Hapus) -->
                                    <td class="p-4 pr-6 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('users.edit_admin', $user->id) }}" 
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 hover:bg-amber-200 text-amber-900 text-xs font-black rounded-xl transition-all">
                                                ✏️ Edit
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bidang {{ $user->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-100 hover:bg-rose-200 text-rose-700 text-xs font-black rounded-xl transition-all">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-8 text-center text-slate-400 font-medium">Belum ada data bidang yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>