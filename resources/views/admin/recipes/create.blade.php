@extends('layouts.admin')

@section('title', 'Tambah Resep Baru')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.recipes.index') }}" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-800 transition flex items-center mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Buat Resep Baru</h3>
    </div>

    <form action="{{ route('admin.recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="space-y-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Resep</label>
                        <input type="text" name="nama_resep" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Contoh: Nasi Goreng Spesial" required>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Kategori / Jenis</label>
                        <input type="text" name="jenis_resep" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Contoh: Makanan Utama, Dessert..." required>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Ceritakan sedikit tentang resep ini..."></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Foto Hasil Masakan</label>
                        <div class="relative group">
                            <div class="w-full h-40 rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center transition group-hover:bg-gray-100">
                                <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <p class="text-xs font-bold text-slate-400">Pilih foto resep (Max: 2MB)</p>
                            </div>
                            <input type="file" name="foto_resep" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Bahan-Bahan</label>
                        <textarea name="bahan" rows="6" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-brand outline-none transition" placeholder="1. 2 siung bawang putih&#10;2. 1 piring nasi putih&#10;..." required></textarea>
                        <p class="mt-2 text-[10px] font-bold text-slate-400">Gunakan baris baru untuk setiap bahan.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Cara Memasak (Langkah-langkah)</label>
                        <textarea name="cara_masak" rows="8" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-brand outline-none transition" placeholder="Langkah 1: Panaskan minyak...&#10;Langkah 2: Tumis bumbu hingga harum...&#10;..." required></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-brand text-slate-900 font-black text-xs uppercase tracking-widest rounded-full shadow-2xl shadow-brand/30 active:scale-95 transition-all">
                    Simpan Resep
                </button>
            </div>
        </div>
    </form>
</div>
@endsection