@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-white p-10 rounded-[32px] shadow-sm border border-gray-100">
        <h1 class="text-4xl font-black tracking-tighter mb-4">
            Selamat Datang, <span class="text-brand-dark">{{ Auth::user()->first_name }}</span>!
        </h1>
        <p class="text-slate-500 font-medium">Ini adalah area eksklusif Anda. Semua data profil dan aktivitas Anda tersimpan dengan aman.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Email Terdaftar</p>
                <p class="font-bold text-slate-800">{{ Auth::user()->email }}</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Nomor HP</p>
                <p class="font-bold text-slate-800">{{ Auth::user()->phone_number }}</p>
            </div>
        </div>
    </div>
</div>
@endsection