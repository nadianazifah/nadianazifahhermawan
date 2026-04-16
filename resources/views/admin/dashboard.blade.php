@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center hover:shadow-md transition">
        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-2">Total Events</p>
        <p class="text-5xl font-black text-slate-800">{{ \App\Models\Event::count() }}</p>
    </div>
    
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center hover:shadow-md transition">
        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-2">Total Resep</p>
        <p class="text-5xl font-black text-slate-800">{{ \App\Models\Recipe::count() }}</p>
    </div>
    
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center hover:shadow-md transition">
        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-2">Total Buku</p>
        <p class="text-5xl font-black text-slate-800">{{ \App\Models\CakeBook::count() }}</p>
    </div>
</div>

<div class="mt-10 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
    <h3 class="text-lg font-black uppercase tracking-wider mb-4">Selamat Datang di Admin Panel</h3>
    <p class="text-slate-500">Gunakan menu di sebelah kiri untuk mengelola data Event, Katalog Resep, Buku, dan Informasi aplikasi.</p>
</div>
@endsection