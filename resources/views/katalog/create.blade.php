<x-app-layout>
    <div class="min-h-screen bg-slate-50/50 py-10">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <h2 class="text-xl font-black text-slate-800 mb-6">Tambah Koleksi Buku Fisik Baru</h2>

                <form action="{{ route('katalog.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-black text-slate-700 uppercase mb-1">Kode Buku / ISBN</label>
                        <input type="text" name="kode_buku" required placeholder="Contoh: BKD-2026-001" 
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-900 focus:bg-white focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black text-slate-700 uppercase mb-1">Judul Buku</label>
                        <input type="text" name="judul" required placeholder="Judul literatur..." 
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-900 focus:bg-white focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black text-slate-700 uppercase mb-1">Penulis / Instansi</label>
                        <input type="text" name="penulis" required placeholder="Nama penulis..." 
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-900 focus:bg-white focus:border-blue-500 outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-black text-slate-700 uppercase mb-1">Kategori</label>
                            <input type="text" name="kategori" required placeholder="Manajemen / Regulasi" 
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-900 focus:bg-white focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-black text-slate-700 uppercase mb-1">Tahun Terbit</label>
                            <input type="number" name="tahun" required placeholder="2026" 
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-900 focus:bg-white focus:border-blue-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-black text-slate-700 uppercase mb-1">Jumlah Stok Fisik</label>
                        <input type="number" name="stok" min="1" value="3" required 
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm font-bold text-slate-900 focus:bg-white focus:border-blue-500 outline-none">
                    </div>

                    <div class="pt-4 flex gap-3">
                        <a href="{{ route('katalog.index') }}" class="flex-1 px-4 py-3 bg-slate-100 text-slate-700 text-center font-bold rounded-xl text-sm hover:bg-slate-200 transition-colors">Kembali</a>
                        <button type="submit" class="flex-1 px-4 py-3 bg-blue-900 hover:bg-blue-800 text-white font-bold rounded-xl text-sm shadow-lg transition-all">Simpan Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>