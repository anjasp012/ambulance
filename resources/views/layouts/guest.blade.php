<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        @livewireStyles
    </head>
    <body class="h-full bg-slate-100 flex justify-center items-start overflow-y-auto">
        <!-- Simulated Mobile Frame -->
        <div class="w-full max-w-[480px] min-h-screen bg-slate-50 border-x border-slate-200/80 flex flex-col relative shadow-2xl overflow-x-hidden">
            {{ $slot }}

            {{-- ================================================================
                 GLOBAL BOTTOM NAVIGATION — persists across all pages
                 ================================================================ --}}
            @persist('floatnav')
            <div x-data="{ showLainnya: false, activeTab: 'home' }" id="floatnav-root">

                {{-- Floating Nav Container --}}
                <div class="floatnav-container">
                    <div class="floatnav-bulge-wrapper"></div>
                    <div class="floatnav-bulge-mask"></div>

                    {{-- Center Cek Rute Button --}}
                    <a href="/cek-rute" wire:navigate @click="activeTab = 'rute'" class="floatnav-sos-btn">
                        <i data-lucide="compass" style="width:18px;height:18px;stroke-width:2.2" class="text-white"></i>
                    </a>

                    {{-- Main White Bar --}}
                    <nav class="floatnav-bar">

                        {{-- Beranda --}}
                        <a href="/" wire:navigate @click="activeTab = 'home'" class="floatnav-item">
                            <div class="floatnav-icon" :class="activeTab === 'home' ? 'text-[#6B3F98]' : 'text-slate-400'">
                                <i data-lucide="house" style="width:20px;height:20px;stroke-width:1.8"></i>
                            </div>
                            <span class="floatnav-label"
                                  :class="activeTab === 'home' ? 'text-[#6B3F98] font-bold' : 'text-slate-400 font-normal'">Beranda</span>
                        </a>

                        {{-- Layanan --}}
                        <a href="/layanan" wire:navigate @click="activeTab = 'layanan'" class="floatnav-item">
                            <div class="floatnav-icon" :class="activeTab === 'layanan' ? 'text-[#6B3F98]' : 'text-slate-400'">
                                <i data-lucide="layout-grid" style="width:20px;height:20px;stroke-width:1.8"></i>
                            </div>
                            <span class="floatnav-label"
                                  :class="activeTab === 'layanan' ? 'text-[#6B3F98] font-bold' : 'text-slate-400 font-normal'">Layanan</span>
                        </a>

                        {{-- Middle placeholder for bulge --}}
                        <a href="/cek-rute" wire:navigate @click="activeTab = 'rute'" class="floatnav-item">
                            <div class="floatnav-icon opacity-0"></div>
                            <span class="floatnav-label"
                                  :class="activeTab === 'rute' ? 'text-[#6B3F98] font-bold' : 'text-slate-400 font-normal'">Cek Rute</span>
                        </a>

                        {{-- Donasi --}}
                        <a href="/#top" wire:navigate @click="activeTab = 'donasi'" class="floatnav-item">
                            <div class="floatnav-icon" :class="activeTab === 'donasi' ? 'text-[#6B3F98]' : 'text-slate-400'">
                                <i data-lucide="heart" style="width:20px;height:20px;stroke-width:1.8"></i>
                            </div>
                            <span class="floatnav-label"
                                  :class="activeTab === 'donasi' ? 'text-[#6B3F98] font-bold' : 'text-slate-400 font-normal'">Donasi</span>
                        </a>

                        {{-- Lainnya --}}
                        <button @click="showLainnya = true; activeTab = 'lainnya'" class="floatnav-item">
                            <div class="floatnav-icon" :class="activeTab === 'lainnya' ? 'text-[#6B3F98]' : 'text-slate-400'">
                                <i data-lucide="grid-2x2" style="width:20px;height:20px;stroke-width:1.8"></i>
                            </div>
                            <span class="floatnav-label"
                                  :class="activeTab === 'lainnya' ? 'text-[#6B3F98] font-bold' : 'text-slate-400 font-normal'">Lainnya</span>
                        </button>

                    </nav>
                </div>

                {{-- ================================================================
                     DRAWER SLIDE-UP (LAINNYA)
                     ================================================================ --}}
                <div x-show="showLainnya"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-50 bg-black/40 flex justify-center items-end"
                     @click.self="showLainnya = false"
                     x-cloak>

                    <div x-show="showLainnya"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="translate-y-full"
                         x-transition:enter-end="translate-y-0"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="translate-y-0"
                         x-transition:leave-end="translate-y-full"
                         class="w-full max-w-[480px] bg-white rounded-t-3xl p-4 shadow-2xl relative flex flex-col gap-3">

                        <div class="w-10 h-1 bg-slate-200 rounded-full mx-auto cursor-pointer" @click="showLainnya = false"></div>

                        {{-- Header --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-[16px] font-bold text-slate-800">Menu Utama</h3>
                                <p class="text-[13px] text-slate-400 leading-none">Pilih informasi atau layanan pendukung</p>
                            </div>
                            <button @click="showLainnya = false" class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center">
                                <i data-lucide="x" style="width:14px;height:14px;stroke-width:2.5" class="text-slate-500"></i>
                            </button>
                        </div>

                        {{-- Menus Grid --}}
                        <div class="grid grid-cols-3 gap-2 my-1">
                            @php
                                $drawerMenus = [
                                    ['lucide'=>'home',            'label'=>'Beranda',      'link'=>'/'],
                                    ['lucide'=>'info',            'label'=>'Tentang Kami', 'link'=>'/tentang-kami'],
                                    ['lucide'=>'layout-grid',     'label'=>'Layanan Medis','link'=>'/layanan'],
                                    ['lucide'=>'compass',         'label'=>'Cek Rute',     'link'=>'/cek-rute'],
                                    ['lucide'=>'truck',           'label'=>'Armada',       'link'=>'/armada'],
                                    ['lucide'=>'newspaper',       'label'=>'Berita',       'link'=>'/berita'],
                                    ['lucide'=>'graduation-cap',  'label'=>'Edukasi',      'link'=>'/berita'],
                                    ['lucide'=>'image',           'label'=>'Galeri Foto',  'link'=>'/'],
                                    ['lucide'=>'handshake',       'label'=>'Kemitraan',    'link'=>'/#mitra'],
                                    ['lucide'=>'briefcase',       'label'=>'Karir/Relawan','link'=>'/'],
                                    ['lucide'=>'heart',           'label'=>'Donasi Sosial','link'=>'/'],
                                    ['lucide'=>'phone-call',      'label'=>'Hubungi Kami', 'link'=>'/#emergency'],
                                ];
                            @endphp
                            @foreach ($drawerMenus as $item)
                                <a href="{{ $item['link'] }}" wire:navigate @click="showLainnya = false" class="flex flex-col items-center gap-1.5 p-2 rounded-xl bg-slate-50 border border-slate-100 hover:bg-slate-100 transition-colors">
                                    <div class="w-8 h-8 rounded-lg brand-light-bg flex items-center justify-center text-brand flex-shrink-0">
                                        <i data-lucide="{{ $item['lucide'] }}" style="width:16px;height:16px;stroke-width:2"></i>
                                    </div>
                                    <span class="text-[12.5px] font-medium text-slate-700 text-center leading-tight">{{ $item['label'] }}</span>
                                </a>
                            @endforeach
                        </div>

                        {{-- Quick hotline call in modal --}}
                        <div class="p-2.5 rounded-xl bg-red-50 border border-red-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-lucide="siren" style="width:16px;height:16px;stroke-width:2" class="text-red-500"></i>
                                <div>
                                    <p class="text-[13px] font-medium text-red-700">Hotline Siaga Darurat</p>
                                    <p class="text-[12px] text-red-500">Respon dalam 8 menit</p>
                                </div>
                            </div>
                            <a href="tel:08123456789" class="bg-red-500 text-white text-[12px] font-bold uppercase px-2 py-1 rounded shadow-sm">
                                Panggil
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            @endpersist
        </div>

        @livewireScripts

        {{-- Lucide Icons --}}
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
        <script>
            function initLucide() {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }

            // Initialize on first page load
            document.addEventListener('DOMContentLoaded', initLucide);

            // Re-initialize after every wire:navigate page swap
            document.addEventListener('livewire:navigated', initLucide);

            // Also re-initialize after any Livewire component update
            document.addEventListener('livewire:update', initLucide);

            // Sync active tab based on current route & hide floatnav on /cek-rute
            function syncActiveTab() {
                const path = window.location.pathname;
                
                // Hide floating bottom nav bar specifically on /cek-rute page
                const navContainer = document.querySelector('.floatnav-container');
                if (navContainer) {
                    navContainer.style.display = path.startsWith('/cek-rute') ? 'none' : '';
                }

                const root = document.getElementById('floatnav-root');
                if (!root || !root._x_dataStack) return;
                const data = root._x_dataStack[0];
                if (!data) return;
                if (path === '/' || path === '') {
                    data.activeTab = 'home';
                } else if (path.startsWith('/tentang') || path.startsWith('/berita') || path.startsWith('/armada')) {
                    data.activeTab = 'lainnya';
                } else if (path.startsWith('/layanan')) {
                    data.activeTab = 'layanan';
                } else if (path.startsWith('/cek-rute')) {
                    data.activeTab = 'rute';
                }
            }

            document.addEventListener('DOMContentLoaded', syncActiveTab);
            document.addEventListener('livewire:navigated', syncActiveTab);
        </script>
    </body>
</html>

