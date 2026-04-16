@extends('layouts.admin')

@section('title', 'Katalog Buku')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter">Manajemen Buku</h3>
        <p class="text-sm text-slate-500 font-medium">Kelola e-book resep dan file PDF untuk diunduh user.</p>
    </div>
    <a href="{{ route('admin.books.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-slate-900 text-brand font-black text-xs uppercase tracking-widest rounded-full hover:bg-slate-800 transition shadow-xl active:scale-95">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
        Upload Buku
    </a>
</div>

<div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-gray-100 text-[10px] font-black uppercase tracking-widest text-slate-400">
                    <th class="px-8 py-5">Info Buku</th>
                    <th class="px-6 py-5">File PDF</th>
                    <th class="px-8 py-5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($books as $book)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-8 py-5">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-16 rounded-lg overflow-hidden border border-gray-100 shadow-sm shrink-0">
                                <img src="{{ asset('storage/' . $book->foto_sampul) }}" class="w-full h-full object-cover">
                            </div>
                            <div class="min-w-0 max-w-xs">
                                <p class="text-sm font-bold text-slate-800 truncate">{{ $book->nama_buku }}</p>
                                <p class="text-xs text-slate-400 truncate mt-1">{{ Str::limit($book->deskripsi, 50) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <a href="{{ asset('storage/' . $book->file_pdf) }}" target="_blank" class="inline-flex items-center px-3 py-1 rounded-full border border-red-200 bg-red-50 text-red-600 text-[10px] font-black uppercase tracking-widest hover:bg-red-100 transition">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                            Lihat PDF
                        </a>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="p-2 text-slate-400 hover:text-brand-dark transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus buku beserta file PDF-nya secara permanen?')">
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
                    <td colspan="3" class="px-8 py-12 text-center text-slate-400 font-medium">Belum ada buku yang diunggah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection