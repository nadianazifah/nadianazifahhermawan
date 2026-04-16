@extends('layouts.admin')

@section('title', 'Upload Buku Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.books.index') }}" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-800 transition flex items-center mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Upload E-Book Baru</h3>
    </div>

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 gap-8">
                
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Buku</label>
                    <input type="text" name="nama_buku" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Judul buku resep..." required>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi / Sinopsis</label>
                    <textarea name="deskripsi" rows="4" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Ceritakan isi dari buku ini..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Foto Sampul</label>
                        <div class="relative group">
                            <div class="w-full h-40 rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center transition group-hover:bg-gray-100">
                                <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class="text-xs font-bold text-slate-400 text-center px-4">Pilih Foto Sampul (JPG/PNG)</p>
                            </div>
                            <input type="file" name="foto_sampul" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">File PDF Buku</label>
                        <div class="relative group">
                            <div class="w-full h-40 rounded-2xl border-2 border-dashed border-red-200 bg-red-50 flex flex-col items-center justify-center transition group-hover:bg-red-100">
                                <svg class="w-10 h-10 text-red-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <p class="text-xs font-bold text-red-400 text-center px-4">Pilih File Buku (Format .PDF, Max 10MB)</p>
                            </div>
                            <input type="file" name="file_pdf" class="absolute inset-0 opacity-0 cursor-pointer" accept="application/pdf" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-brand text-slate-900 font-black text-xs uppercase tracking-widest rounded-full shadow-2xl shadow-brand/30 active:scale-95 transition-all">
                    Upload Buku
                </button>
            </div>
        </div>
    </form>
</div>
@endsection