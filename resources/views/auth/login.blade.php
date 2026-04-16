@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-brand">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Selamat Datang Kembali</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:outline-none" required>
                </div>

                <button type="submit" class="w-full bg-brand hover:bg-brand-dark text-black font-black py-4 rounded-full shadow-lg shadow-yellow-200 transition-all active:scale-95 uppercase tracking-widest text-xs">
   MASUK
</button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Belum punya akun? <a href="/register" class="text-blue-600 font-bold">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection