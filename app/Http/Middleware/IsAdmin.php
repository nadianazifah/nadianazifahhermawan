<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN rolenya adalah 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Lanjutkan permintaan (izinkan akses)
        }

        // Jika bukan admin, kembalikan ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Akses ditolak! Anda tidak memiliki izin untuk masuk ke halaman ini.');
    }
}