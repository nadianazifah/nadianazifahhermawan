@extends('layouts.admin')

@section('title', 'Tambah Event Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.events.index') }}" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-800 transition flex items-center mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Publikasi Event Baru</h3>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 shadow-sm">
        <p class="font-black text-xs uppercase tracking-widest mb-2">Validasi Gagal:</p>
        <ul class="list-disc list-inside text-sm font-bold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Event</label>
                    <input type="text" name="nama_event" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Masukkan judul event..." required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" rows="5" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" placeholder="Tuliskan detail acara..." required></textarea>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal_event" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Status Event</label>
                    <select name="status" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition uppercase tracking-widest text-xs cursor-pointer">
                        <option value="akan datang">Akan Datang</option>
                        <option value="berlangsung">Berlangsung</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Foto Sampul Event</label>
                    <div class="relative group">
                        <div class="w-full h-48 rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center transition group-hover:bg-gray-100">
                            <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-xs font-bold text-slate-400">Klik untuk pilih atau tarik foto ke sini</p>
                        </div>
                        <input type="file" name="foto_event" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" required>
                    </div>
                    <p class="mt-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Format: JPG, PNG, Max: 2MB</p>
                </div>
            </div>

            <div class="mt-12 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-brand text-slate-900 font-black text-xs uppercase tracking-widest rounded-full shadow-2xl shadow-brand/30 active:scale-95 transition-all">
                    Simpan & Publikasikan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection