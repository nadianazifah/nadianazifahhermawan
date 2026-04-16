<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MYAPP - @yield('title')</title>

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <style type="text/tailwindcss">
        @theme {
            --color-brand: #FBBF24; 
            --color-brand-dark: #F59E0B;
            --font-sans: 'Inter', ui-sans-serif, system-ui;
        }

        .menu-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-dropdown:hover .dropdown-content {
            display: block;
            animation: slideDown 0.2s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.9) translateY(20px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        
        .toast-animate {
            animation: popIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="bg-[#FAFAFA] font-sans antialiased text-slate-900 flex flex-col min-h-screen">

    <header class="bg-white/80 backdrop-blur-xl border-b border-gray-100 sticky top-0 z-50 h-20 flex items-center px-6 md:px-12 transition-all">
        <div class="flex-shrink-0">
            <a href="/" class="text-2xl font-black tracking-tighter uppercase italic">MYAPP</a>
        </div>
        
        <nav class="hidden md:flex items-center ml-12 space-x-8 text-sm font-bold tracking-wide uppercase text-slate-500">
            <a href="#" class="hover:text-black transition">Event</a>
            <a href="#" class="hover:text-black transition">Katalog</a>
            <a href="#" class="hover:text-black transition">Informasi</a>
        </nav>

        <div class="hidden md:flex items-center ml-auto">
            @guest
                <div class="flex items-center space-x-6">
                    <a href="/login" class="text-sm font-bold uppercase tracking-wider hover:text-brand-dark transition">Login</a>
                    <a href="/register" class="bg-black text-white px-8 py-3 rounded-full text-xs font-black uppercase tracking-widest hover:bg-slate-800 shadow-lg transition">Daftar</a>
                </div>
            @endguest

            @auth
                <div class="relative profile-dropdown">
                    <div class="flex items-center space-x-3 cursor-pointer">
                        <span class="text-sm font-bold text-slate-700">{{ Auth::user()->first_name }}</span>
                        <div class="w-10 h-10 bg-brand rounded-full flex items-center justify-center border-2 border-white shadow-md">
                            <span class="text-sm font-black text-black">
                                {{ strtoupper(substr(Auth::user()->first_name, 0, 1) . substr(Auth::user()->last_name, 0, 1)) }}
                            </span>
                        </div>
                    </div>
                    <div class="dropdown-content hidden absolute right-0 mt-2 w-48 bg-white border border-gray-100 shadow-2xl rounded-2xl overflow-hidden">
                        <a href="/dashboard" class="block px-6 py-4 text-sm font-bold text-slate-700 hover:bg-gray-50 transition">My Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-6 py-4 text-sm font-bold text-red-600 hover:bg-red-50 transition">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
        
        <button id="hamburger-open" class="md:hidden ml-auto p-2 text-black">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            </svg>
        </button>
    </header>

    <div id="mobile-menu-overlay" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-md"></div>
        <div id="mobile-menu-panel" class="absolute right-0 top-0 w-[80%] h-full bg-white shadow-2xl translate-x-full flex flex-col p-8 menu-transition">
            <div class="flex justify-end mb-8">
                <button id="hamburger-close" class="p-2 text-slate-400 hover:text-black transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mb-10">
                @guest
                    <div class="grid grid-cols-2 gap-4">
                        <a href="/login" class="flex items-center justify-center bg-gray-100 py-4 rounded-2xl font-bold text-sm">Login</a>
                        <a href="/register" class="flex items-center justify-center bg-brand py-4 rounded-2xl font-bold text-sm shadow-md">Daftar</a>
                    </div>
                @endguest

                @auth
                    <a href="/dashboard" class="flex items-center p-4 bg-gray-50 rounded-2xl border border-gray-100 shadow-sm mb-4">
                        <div class="w-12 h-12 bg-brand rounded-full flex items-center justify-center mr-4 shadow-inner">
                            <span class="text-sm font-black">
                                {{ strtoupper(substr(Auth::user()->first_name, 0, 1) . substr(Auth::user()->last_name, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-black leading-tight">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                            <p class="text-xs text-slate-400 font-medium">Lihat Profil</p>
                        </div>
                    </a>
                @endauth
            </div>

            <nav class="flex flex-col space-y-6">
                <a href="#" class="text-2xl font-black text-slate-800 hover:text-brand-dark transition">Event</a>
                <a href="#" class="text-2xl font-black text-slate-800 hover:text-brand-dark transition">Katalog</a>
                <a href="#" class="text-2xl font-black text-slate-800 hover:text-brand-dark transition">Informasi</a>
            </nav>

            @auth
                <div class="mt-auto pt-8 border-t border-gray-100">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex justify-center items-center py-4 bg-red-50 text-red-600 rounded-2xl font-bold text-sm hover:bg-red-100 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Log Out
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>

    <main class="flex-grow flex flex-col items-center justify-center w-full">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 py-8 px-8 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center opacity-50">
            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">&copy; {{ date('Y') }} Premium Experience Project</p>
        </div>
    </footer>

    @if(session('success'))
        <div id="toast-success" class="fixed bottom-8 right-8 z-[100] flex items-center bg-gray-900 text-white px-6 py-4 rounded-2xl shadow-2xl toast-animate">
            <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <p class="font-bold text-sm tracking-wide">{{ session('success') }}</p>
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-success');
                if(toast) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(20px)';
                    toast.style.transition = 'all 0.5s ease';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3500);
        </script>
    @endif

    @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 shadow-sm">
        <p class="font-black text-xs uppercase tracking-widest mb-2">Terjadi Kesalahan:</p>
        <ul class="list-disc list-inside text-sm font-bold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if(session('error'))
        <div id="toast-error" class="fixed bottom-8 right-8 z-[100] flex items-center bg-red-600 text-white px-6 py-4 rounded-2xl shadow-2xl toast-animate">
            <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <p class="font-bold text-sm tracking-wide">{{ session('error') }}</p>
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-error');
                if(toast) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(20px)';
                    toast.style.transition = 'all 0.5s ease';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3500);
        </script>
    @endif

    <script>
        const overlay = document.getElementById('mobile-menu-overlay');
        const panel = document.getElementById('mobile-menu-panel');
        const btnOpen = document.getElementById('hamburger-open');
        const btnClose = document.getElementById('hamburger-close');

        function openMenu() {
            overlay.classList.remove('hidden');
            setTimeout(() => { panel.classList.remove('translate-x-full'); }, 10);
            document.body.classList.add('overflow-hidden');
        }

        function closeMenu() {
            panel.classList.add('translate-x-full');
            setTimeout(() => { overlay.classList.add('hidden'); }, 400);
            document.body.classList.remove('overflow-hidden');
        }

        btnOpen.addEventListener('click', openMenu);
        btnClose.addEventListener('click', closeMenu);
        overlay.addEventListener('click', (e) => { if(e.target === overlay.firstElementChild) closeMenu(); });
    </script>
</body>
</html>