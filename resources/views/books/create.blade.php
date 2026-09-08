<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-500 leading-tight">
            {{ __('Form Pengisian Koleksi Perpustakaan Digital BKD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md rounded-2xl p-8">
                
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Tambah Referensi Baru</h3>
                    <p class="text-sm text-gray-900">Silakan input data buku fisik, e-book kepegawaian, atau tesis berkas pegawai.</p>
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

                <!-- FORM UTAMA -->
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Judul Buku / Tesis -->
                    <div>
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-wide">Judul Referensi</label>
                        <input type="text" name="judul" required class="mt-1 block w-full px-4 py-3 rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 text-sm shadow-sm" placeholder="Masukkan judul dokumen atau buku secara lengkap">
                    </div>

                    <!-- Penulis / Penyusun -->
                    <div>
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-wide">Penulis / Nama Pegawai Penyusun</label>
                        <input type="text" name="penulis" required class="mt-1 block w-full px-4 py-3 rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 text-sm shadow-sm" placeholder="Contoh: Dr. Supriyadi, S.H., M.Si.">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Jenis Koleksi -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Jenis Koleksi</label>
                            <select id="jenis_koleksi" name="jenis_koleksi" required class="mt-1 block w-full px-4 py-3 rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 text-sm shadow-sm">
                                <option value="E-Book">💾 E-Book Kepegawaian</option>
                                <option value="Buku Fisik">📚 Buku Fisik (Offline)</option>
                                <option value="Tesis">🎓 Tesis & Karya Ilmiah</option>
                            </select>
                        </div>

                        <!-- Status Akses -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Hak Akses Dokumen</label>
                            <select name="status_akses" required class="mt-1 block w-full px-4 py-3 rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 text-sm shadow-sm">
                                <option value="Internal">Khusus Internal BKD (ASN)</option>
                                <option value="Publik">Terbuka untuk Publik (Umum)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Jumlah Salinan / Copy -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Jumlah Tersedia (Copy)</label>
                            <input type="number" name="jumlah_copy" value="1" min="1" required class="mt-1 block w-full px-4 py-3 rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 text-sm shadow-sm">
                        </div>

                        <!-- DINAMIS: Kolom Lokasi Rak -->
                        <div id="kolom_rak" class="hidden">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Lokasi Rak Buku</label>
                            <input type="text" id="input_rak" name="lokasi_rak" class="mt-1 block w-full px-4 py-3 rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 text-sm shadow-sm" placeholder="Contoh: Rak A - Baris 3">
                        </div>
                    </div>

                    <!-- DINAMIS: Kolom Upload PDF -->
                    <div id="kolom_upload" class="block">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Unduh Berkas PDF Dokumen</label>
                        
                        <!-- Drop File -->
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl bg-gray-50 hover:bg-gray-100 transition duration-150">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h16a4 4 0 004-4V12a4 4 0 00-4-4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M32 16L24 8l-8 8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label class="relative cursor-pointer font-semibold text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                        <span>Pilih File PDF</span>
                                        <input id="input_file" type="file" name="file_path" class="sr-only" accept=".pdf" onchange="previewFile(this)">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Maksimal ukuran file PDF kedinasan adalah 20MB</p>
                            </div>
                        </div>

                        <!-- Kotak Preview File -->
                        <div id="file_preview_container" class="hidden mt-3 p-3 bg-indigo-50 border border-indigo-200 rounded-xl flex items-center justify-between transition-all duration-300">
                            <div class="flex items-center gap-3 overflow-hidden">
                                <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                                </div>
                                <div class="flex flex-col truncate">
                                    <span id="file_name" class="text-sm font-bold text-gray-800 truncate">namafile.pdf</span>
                                    <span id="file_size" class="text-[11px] font-medium text-gray-500">0 MB</span>
                                </div>
                            </div>
                            <button type="button" onclick="removeFile()" class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors shrink-0" title="Batal pilih file">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition">Batal</a>
                        <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md transform active:scale-95 transition">Simpan Referensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logika Interaktif Pilihan Form & File Upload -->
    <script>
        const jenisKoleksi = document.getElementById('jenis_koleksi');
        const kolomRak = document.getElementById('kolom_rak');
        const kolomUpload = document.getElementById('kolom_upload');
        const inputRak = document.getElementById('input_rak');
        const inputFile = document.getElementById('input_file');

        // Logika Menyembunyikan Rak / Upload sesuai pilihan dropdown
        jenisKoleksi.addEventListener('change', function() {
            if (this.value === 'Buku Fisik') {
                kolomRak.classList.remove('hidden');
                kolomUpload.classList.add('hidden');
                inputRak.required = true;
                inputFile.required = false;
            } else {
                kolomRak.classList.add('hidden');
                kolomUpload.classList.remove('hidden');
                inputRak.required = false;
                inputRak.value = ''; // Reset nilai input rak jika disembunyikan
                inputFile.required = true;
            }
        });

        // PREVIEW FILE PDF 
        function previewFile(input) {
            const previewContainer = document.getElementById('file_preview_container');
            const fileName = document.getElementById('file_name');
            const fileSize = document.getElementById('file_size');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                fileName.textContent = file.name;
                
                // Menghitung ukuran file (KB atau MB)
                let sizeInKB = file.size / 1024;
                if (sizeInKB > 1024) {
                    fileSize.textContent = (sizeInKB / 1024).toFixed(2) + ' MB';
                } else {
                    fileSize.textContent = sizeInKB.toFixed(2) + ' KB';
                }

                // Munculkan kotak preview
                previewContainer.classList.remove('hidden');
                previewContainer.classList.add('flex');
            }
        }

        // pembatalan FILE PDF
        function removeFile() {
            const input = document.getElementById('input_file');
            const previewContainer = document.getElementById('file_preview_container');
            
            input.value = ''; // Kosongkan file yang sudah dipilih
            previewContainer.classList.add('hidden'); // Sembunyikan lagi kotaknya
            previewContainer.classList.remove('flex');
        }
    </script>
</x-app-layout>