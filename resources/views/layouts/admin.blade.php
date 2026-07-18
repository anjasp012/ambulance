<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Admin Dashboard - ' . config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="h-full bg-slate-50 flex overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between shrink-0">
            <div>
                <!-- Brand logo area -->
                <div class="h-20 bg-slate-950 flex items-center px-6 gap-3">
                    <div class="w-8 h-8 bg-emerald-600 text-white flex items-center justify-center font-black rounded-lg">IK</div>
                    <span class="font-extrabold text-white text-xs tracking-wider uppercase">IK AMBULANS</span>
                </div>

                <!-- Nav list -->
                <nav class="p-4 space-y-2.5">
                    <span class="text-[10px] text-slate-500 font-extrabold uppercase px-2">Menu Utama</span>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-slate-800 text-white text-sm font-semibold transition-all">
                        <span>📊</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white text-sm font-semibold transition-all text-slate-400">
                        <span>🚑</span>
                        <span>Data Armada</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white text-sm font-semibold transition-all text-slate-400">
                        <span>📋</span>
                        <span>Daftar Pemesanan</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white text-sm font-semibold transition-all text-slate-400">
                        <span>⚙️</span>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <!-- User profile footer area of sidebar -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/40 flex items-center justify-between text-xs">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 bg-slate-700 text-white rounded-full flex items-center justify-center font-bold">AD</div>
                    <div>
                        <p class="font-bold text-white">Administrator</p>
                        <p class="text-slate-500 text-[10px]">admin@ik.org</p>
                    </div>
                </div>
                <a href="#" class="text-slate-500 hover:text-white transition-colors" title="Log Out">
                    🚪
                </a>
            </div>
        </aside>

        <!-- Main Content Area wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Header bar -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8">
                <h1 class="text-lg font-bold text-slate-800">Dashboard</h1>
                
                <div class="flex items-center gap-6">
                    <!-- Notifications -->
                    <button class="text-slate-400 hover:text-slate-600 text-lg relative" title="Notifications">
                        🔔
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Divider -->
                    <span class="w-px h-6 bg-slate-200"></span>
                    <!-- Time Indicator -->
                    <span class="text-xs text-slate-500 font-semibold bg-slate-100 py-1.5 px-3 rounded-lg">
                        Status Sistem: Siaga 24 Jam
                    </span>
                </div>
            </header>

            <!-- Main view container -->
            <main class="flex-1 overflow-y-auto p-8">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
    </body>
</html>
