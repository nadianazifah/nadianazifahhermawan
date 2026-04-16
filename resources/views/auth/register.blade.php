@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-brand">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Buat Akun Baru</h2>

            <form action="/register" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Nama Depan</label>
                        <input type="text" name="first_name" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Nama Belakang</label>
                        <input type="text" name="last_name" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nomor HP</label>
                    <input type="tel" name="phone_number" placeholder="0812..." class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                </div>

             
                <button type="submit" class="w-full bg-brand hover:bg-brand-dark text-black font-black py-4 rounded-full shadow-lg shadow-yellow-200 transition-all active:scale-95 uppercase tracking-widest text-xs">
    DAFTAR SEKARANG
</button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun? <a href="/login" class="text-blue-600 font-bold">Login di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection