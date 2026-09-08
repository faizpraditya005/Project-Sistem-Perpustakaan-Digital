<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-xl text-gray-800 leading-tight tracking-tight">
                {{ __('Daftar Akun Bidang') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-800 text-xs font-bold rounded-xl shadow-sm border border-gray-200 transition">
                    ⬅️ Kembali
                </a>
                <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
                    ➕ Tambah Akun Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                            <th class="p-4 font-extrabold">Nama Bidang</th>
                            <th class="p-4 font-extrabold">Alamat Email</th>
                            <th class="p-4 font-extrabold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($users as $u)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="p-4 font-bold text-gray-900">{{ $u->name }}</td>
                            <td class="p-4 text-gray-600 text-sm">{{ $u->email }}</td>
                            <td class="p-4 text-center">
                                <a href="{{ route('users.edit_admin', $u->id) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 hover:bg-amber-200 font-bold text-xs rounded-lg transition">
                                    ⚙️ Edit & Reset Password
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-gray-500 italic">Belum ada akun bidang yang terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>