@extends('layouts.admin')

@section('title', 'Informasi Visi & Misi')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tighter">Pengaturan Informasi</h3>
        <p class="text-sm text-slate-500 font-medium">Kelola profil Visi dan Misi yang akan ditampilkan di halaman utama untuk pengunjung.</p>
    </div>

    <form action="{{ route('admin.info.update') }}" method="POST" class="space-y-6">
        @csrf
        <div class="bg-white p-8 md:p-10 rounded-[32px] shadow-sm border border-gray-100">
            <div class="grid grid-cols-1 gap-8">
                
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Visi Aplikasi / Organisasi</label>
                    <textarea name="visi" rows="4" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-brand outline-none transition" placeholder="Tuliskan visi atau tujuan utama di masa depan..." required>{{ old('visi', $info->visi ?? '') }}</textarea>
                    <p class="mt-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Visi adalah gambaran besar / tujuan utama jangka panjang.</p>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Misi (Langkah-langkah)</label>
                    <textarea name="misi" rows="8" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-brand outline-none transition" placeholder="1. Memberikan inovasi...&#10;2. Membantu masyarakat...&#10;3. ..." required>{{ old('misi', $info->misi ?? '') }}</textarea>
                    <p class="mt-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Misi adalah cara mencapai Visi tersebut. Gunakan baris baru untuk setiap poin.</p>
                </div>

            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-brand text-slate-900 font-black text-xs uppercase tracking-widest rounded-full shadow-2xl shadow-brand/30 active:scale-95 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection