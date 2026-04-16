@extends('layouts.admin')

@section('title', 'Katalog Resep')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter">Manajemen Resep</h3>
        <p class="text-sm text-slate-500 font-medium">Kelola daftar resep masakan pada katalog.</p>
    </div>
    <a href="{{ route('admin.recipes.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-slate-900 text-brand font-black text-xs uppercase tracking-widest rounded-full hover:bg-slate-800 transition shadow-xl active:scale-95">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
        Tambah Resep
    </a>
</div>

<div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-gray-100 text-[10px] font-black uppercase tracking-widest text-slate-400">
                    <th class="px-8 py-5">Info Resep</th>
                    <th class="px-6 py-5">Kategori</th>
                    <th class="px-8 py-5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($recipes as $recipe)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-8 py-5">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 rounded-2xl overflow-hidden border border-gray-100 shadow-sm shrink-0">
                                <img src="{{ asset('storage/' . $recipe->foto_resep) }}" class="w-full h-full object-cover">
                            </div>
                            <div class="min-w-0 max-w-xs">
                                <p class="text-sm font-bold text-slate-800 truncate">{{ $recipe->nama_resep }}</p>
                                <p class="text-xs text-slate-400 truncate mt-1">{{ Str::limit($recipe->deskripsi, 50) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full border border-orange-200 bg-orange-50 text-orange-600 text-[10px] font-black uppercase tracking-widest">
                            {{ $recipe->jenis_resep }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.recipes.edit', $recipe->id) }}" class="p-2 text-slate-400 hover:text-brand-dark transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Hapus resep ini secara permanen?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-12 text-center text-slate-400 font-medium">Belum ada resep dalam katalog.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection