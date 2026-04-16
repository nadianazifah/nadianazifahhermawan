@extends('layouts.admin')

@section('title', 'Edit Event: ' . $event->nama_event)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.events.index') }}" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-800 transition flex items-center mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Edit Event</h3>
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

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Event</label>
                    <input type="text" name="nama_event" value="{{ old('nama_event', $event->nama_event) }}" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal_event" value="{{ old('tanggal_event', $event->tanggal_event) }}" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition" required>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Status (Manual Override)</label>
                    <select name="status" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-2 focus:ring-brand outline-none transition uppercase tracking-widest text-xs">
                        <option value="akan datang" {{ $event->status == 'akan datang' ? 'selected' : '' }}>Akan Datang</option>
                        <option value="berlangsung" {{ $event->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                        <option value="selesai" {{ $event->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Foto Sampul (Biarkan kosong jika tidak diubah)</label>
                    <div class="flex items-center space-x-6">
                        <div class="w-32 h-20 rounded-xl overflow-hidden border">
                            <img src="{{ asset('storage/' . $event->foto_event) }}" class="w-full h-full object-cover">
                        </div>
                        <input type="file" name="foto_event" class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-brand file:text-slate-900 cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-slate-900 text-brand font-black text-xs uppercase tracking-widest rounded-full shadow-2xl active:scale-95 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection