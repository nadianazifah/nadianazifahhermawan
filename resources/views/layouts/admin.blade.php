<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <style type="text/tailwindcss">
        @theme { 
            --color-brand: #FBBF24; 
            --font-sans: 'Inter', ui-sans-serif, system-ui;
        }

        /* Custom Scrollbar untuk sidebar dan konten utama */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-50 flex font-sans text-slate-900 min-h-screen overflow-hidden">

    <div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden backdrop-blur-sm transition-opacity opacity-0 md:hidden"></div>

    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white flex flex-col transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 shadow-2xl md:shadow-none">
        
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800 shrink-0">
            <h1 class="text-2xl font-black italic text-brand tracking-tighter uppercase">MYAPP ADMIN</h1>
            <button id="close-sidebar" class="md:hidden text-slate-400 hover:text-white transition p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand text-slate-900 shadow-lg shadow-brand/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                Dashboard Overview
            </a>
            
            <p class="px-4 pt-4 pb-2 text-xs font-bold text-slate-500 uppercase tracking-widest">Manajemen Data</p>
            
            <a href="{{ route('admin.events.index') }}" class="block py-3 px-4 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.events.*') ? 'bg-brand text-slate-900 shadow-lg shadow-brand/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                Manage Events
            </a>
            <a href="{{ route('admin.recipes.index') }}" class="block py-3 px-4 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.recipes.*') ? 'bg-brand text-slate-900 shadow-lg shadow-brand/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                Manage Recipes
            </a>
            <a href="{{ route('admin.books.index') }}" class="block py-3 px-4 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.books.*') ? 'bg-brand text-slate-900 shadow-lg shadow-brand/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                Manage Books
            </a>
            
            <p class="px-4 pt-4 pb-2 text-xs font-bold text-slate-500 uppercase tracking-widest">Pengaturan</p>

            <a href="{{ route('admin.info.edit') }}" class="block py-3 px-4 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.info.*') ? 'bg-brand text-slate-900 shadow-lg shadow-brand/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                Informasi Visi Misi
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800 shrink-0">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center py-3 px-4 bg-slate-800 text-red-400 font-bold hover:bg-red-500 hover:text-white rounded-xl transition-colors duration-300 border border-slate-700 hover:border-red-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 bg-gray-50/50 h-screen overflow-hidden">
        
        <header class="bg-white/80 backdrop-blur-xl h-20 border-b border-gray-200 flex items-center px-4 md:px-8 justify-between shrink-0 z-30">
            <div class="flex items-center">
                <button id="open-sidebar" class="md:hidden p-2 mr-4 text-slate-600 hover:text-slate-900 hover:bg-gray-100 rounded-lg transition focus:outline-none focus:ring-2 focus:ring-brand">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="font-black text-lg md:text-xl uppercase tracking-wider text-slate-800 truncate">@yield('title')</h2>
            </div>
            
            <div class="flex items-center space-x-4 pl-4 border-l border-gray-200">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-bold text-slate-800 leading-tight">{{ Auth::user()->first_name ?? 'Admin' }}</p>
                    <p class="text-[10px] text-slate-500 font-black uppercase tracking-widest">{{ Auth::user()->role ?? 'Administrator' }}</p>
                </div>
                <div class="w-10 h-10 bg-slate-900 rounded-full flex items-center justify-center border-2 border-brand shadow-sm">
                     <span class="text-sm font-black text-brand">
                        {{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}
                     </span>
                </div>
            </div>
        </header>
        
        <main class="flex-1 p-4 md:p-8 overflow-y-auto scroll-smooth">
            
            @if(session('success'))
                <div id="alert-success" class="bg-green-50 border border-green-200 text-green-800 px-4 py-4 rounded-2xl mb-6 font-bold text-sm flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div id="alert-error" class="bg-red-50 border border-red-200 text-red-800 px-4 py-4 rounded-2xl mb-6 font-bold text-sm flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
            
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('admin-sidebar');
            const openBtn = document.getElementById('open-sidebar');
            const closeBtn = document.getElementById('close-sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            // Fungsi Buka Sidebar
            const openMenu = () => {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
                document.body.classList.add('overflow-hidden'); 
            };

            // Fungsi Tutup Sidebar
            const closeMenu = () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300); 
                document.body.classList.remove('overflow-hidden');
            };

            openBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);
            overlay.addEventListener('click', closeMenu);

            setTimeout(() => {
                const alerts = document.querySelectorAll('#alert-success, #alert-error');
                alerts.forEach(alert => {
                    alert.style.transition = 'all 0.5s ease-out';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => alert.remove(), 500);
                });
            }, 4000);
        });
    </script>
</body>
</html>