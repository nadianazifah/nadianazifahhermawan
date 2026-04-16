@extends('layouts.admin')

@section('title', 'Edit Buku: ' . $book->nama_buku)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.books.index') }}" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-800 transition flex items-center mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Edit Data Buku</h3>
    </div>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 gap-8">
                
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Buku</label>
                    <input type="text" name="nama_buku" value="{{ old('nama_buku', $book->nama_buku) }}" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi / Sinopsis</label>
                    <textarea name="deskripsi" rows="4" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Foto Sampul (Baru)</label>
                        @if($book->foto_sampul)
                            <div class="mb-4 w-24 h-32 rounded-lg overflow-hidden border">
                                <img src="{{ asset('storage/' . $book->foto_sampul) }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <input type="file" name="foto_sampul" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-brand file:text-slate-900 cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">File PDF (Baru)</label>
                        @if($book->file_pdf)
                            <div class="mb-4 flex items-center p-3 bg-red-50 rounded-xl border border-red-100">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path></svg>
                                <span class="text-[10px] font-bold text-red-600 uppercase truncate">File PDF Tersedia</span>
                            </div>
                        @endif
                        <input type="file" name="file_pdf" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-red-50 file:text-red-600 cursor-pointer" accept="application/pdf">
                    </div>
                </div>

            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-brand text-slate-900 font-black text-xs uppercase tracking-widest rounded-full shadow-2xl shadow-brand/30 active:scale-95 transition-all">
                    Update Buku
                </button>
            </div>
        </div>
    </form>
</div>
@endsection