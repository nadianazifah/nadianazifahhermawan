@extends('layouts.admin')

@section('title', 'Edit Resep: ' . $recipe->nama_resep)

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.recipes.index') }}" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-800 transition flex items-center mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Update Resep Katalog</h3>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 shadow-sm">
            <ul class="text-sm font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="space-y-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Resep</label>
                        <input type="text" name="nama_resep" value="{{ old('nama_resep', $recipe->nama_resep) }}" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Kategori</label>
                        <input type="text" name="jenis_resep" value="{{ old('jenis_resep', $recipe->jenis_resep) }}" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Foto Masakan (Baru)</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $recipe->foto_resep) }}" class="w-20 h-20 rounded-2xl object-cover border">
                            <input type="file" name="foto_resep" class="text-xs text-slate-500">
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Bahan-Bahan</label>
                        <textarea name="bahan" rows="6" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-brand outline-none transition" required>{{ old('bahan', $recipe->bahan) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Cara Memasak</label>
                        <textarea name="cara_masak" rows="8" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-brand outline-none transition" required>{{ old('cara_masak', $recipe->cara_masak) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end">
                <button type="submit" class="px-12 py-5 bg-brand text-slate-900 font-black text-xs uppercase tracking-widest rounded-full shadow-2xl active:scale-95 transition-all">
                    Update Resep
                </button>
            </div>
        </div>
    </form>
</div>
@endsection