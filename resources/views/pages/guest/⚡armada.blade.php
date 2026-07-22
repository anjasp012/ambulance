<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    public string $activeCategory = 'semua';

    public function setCategory(string $category): void
    {
        $this->activeCategory = $category;
    }
};
?>

@php
    $allFleet = [
        [
            'code'        => 'AMB-01',
            'type'        => 'Toyota HiAce Premio 2.8',
            'category'    => 'emergency',
            'cat_label'   => 'Emergency',
            'cat_color'   => '#DC2626',
            'cat_bg'      => 'rgba(220,38,38,0.1)',
            'status'      => 'siaga',
            'status_label'=> 'Siaga 24 Jam',
            'area'        => 'Bandung Raya & Jawa Barat',
            'image'       => asset('assets/images/fleet/amb_01.png'),
            'facilities'  => ['Stretcher Otomatis', 'Oksigen Tabung Central', 'Monitor EKG & Tensi', 'Suction Pump', 'Defibrillator (AED)', 'Sirine 7 Suara + Strobo', 'GPS Realtime'],
        ],
        [
            'code'        => 'AMB-02',
            'type'        => 'Hyundai Staria Medis 2.2',
            'category'    => 'icu',
            'cat_label'   => 'ICU Mobile',
            'cat_color'   => '#6B3F98',
            'cat_bg'      => 'rgba(107,63,152,0.1)',
            'status'      => 'siaga',
            'status_label'=> 'Siaga 24 Jam',
            'area'        => 'Rujukan Se-Jawa & Bali',
            'image'       => asset('assets/images/fleet/amb_02.png'),
            'facilities'  => ['Ventilator Portable', 'Monitor Multi-Parameter', 'Infus Pump & Syringe Pump', 'Stretcher Loaded System', 'Oksigen Medis Ganda', 'Inverter Listrik 220V', 'AC HEPA Filter'],
        ],
        [
            'code'        => 'AMB-03',
            'type'        => 'Mercedes-Benz Sprinter 315',
            'category'    => 'nicu',
            'cat_label'   => 'NICU / Neonatal',
            'cat_color'   => '#0891B2',
            'cat_bg'      => 'rgba(8,145,178,0.1)',
            'status'      => 'siaga',
            'status_label'=> 'Siaga 24 Jam',
            'area'        => 'Jawa Barat & Nasional',
            'image'       => asset('assets/images/fleet/amb_03.png'),
            'facilities'  => ['Inkubator Transport Atom', 'Monitor Vital Neonatal', 'Oksigen Mikro & Blender', 'Resusitator Neopuff', 'Stretcher Suspensi Halus', 'Kamera Kabin Terhubung'],
        ],
        [
            'code'        => 'AMB-04',
            'type'        => 'Toyota Innova Zenix Medis',
            'category'    => 'standar',
            'cat_label'   => 'Ambulans Standar',
            'cat_color'   => '#3154B8',
            'cat_bg'      => 'rgba(49,84,184,0.1)',
            'status'      => 'siaga',
            'status_label'=> 'Siaga 24 Jam',
            'area'        => 'Kota Bandung & Cimahi',
            'image'       => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?q=80&w=800&auto=format&fit=crop',
            'facilities'  => ['Stretcher Lipat Alumunium', 'Tabung Oksigen 1m³', 'Set P3K Darurat', 'Pengukur Tekanan Darah', 'AC Steril Kabin', 'Kursi Paramedis'],
        ],
        [
            'code'        => 'AMB-05',
            'type'        => 'Isuzu Traga Box Medis',
            'category'    => 'jenazah',
            'cat_label'   => 'Jenazah',
            'cat_color'   => '#64748B',
            'cat_bg'      => 'rgba(100,116,139,0.1)',
            'status'      => 'tugas',
            'status_label'=> 'Dalam Penugasan',
            'area'        => 'Antar Kota & Provinsi (Se-Jawa)',
            'image'       => 'https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=800&auto=format&fit=crop',
            'facilities'  => ['Keranda Stainless Steel', 'Sistem Rel Stretcher Jenazah', 'Pendingin Kabin Khusus', 'Tempat Duduk Keluarga (3 Orang)', 'Perlengkapan Kehormatan'],
        ],
        [
            'code'        => 'AMB-06',
            'type'        => 'Toyota HiAce Commuter 2.5',
            'category'    => 'event',
            'cat_label'   => 'Standby Event',
            'cat_color'   => '#D97706',
            'cat_bg'      => 'rgba(217,119,6,0.1)',
            'status'      => 'siaga',
            'status_label'=> 'Siaga 24 Jam',
            'area'        => 'Lokasi Acara / Venue Event',
            'image'       => 'https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=800&auto=format&fit=crop',
            'facilities'  => ['Tenda Medis Lapangan 3x3m', 'Bed Observasi Portable (2 Unit)', 'Peralatan Trauma Lengkap', 'Tandu Basket / Scoop Stretcher', 'Defibrillator AED', 'Radio Komunikasi HT'],
        ],
        [
            'code'        => 'AMB-07',
            'type'        => 'Suzuki APV GX Medis',
            'category'    => 'standar',
            'cat_label'   => 'Ambulans Standar',
            'cat_color'   => '#3154B8',
            'cat_bg'      => 'rgba(49,84,184,0.1)',
            'status'      => 'siaga',
            'status_label'=> 'Siaga 24 Jam',
            'area'        => 'Bandung Raya',
            'image'       => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=800&auto=format&fit=crop',
            'facilities'  => ['Stretcher Lipat Standard', 'Oksigen Portable', 'Kit Pertolongan Pertama', 'Sirine & Lampu Strobo', 'Kursi Pendamping'],
        ],
        [
            'code'        => 'AMB-08',
            'type'        => 'Ford Transit V363 Medis',
            'category'    => 'emergency',
            'cat_label'   => 'Emergency',
            'cat_color'   => '#DC2626',
            'cat_bg'      => 'rgba(220,38,38,0.1)',
            'status'      => 'maintenance',
            'status_label'=> 'Perawatan Berkala',
            'area'        => 'Bandung Raya & Rujukan Jawa',
            'image'       => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?q=80&w=800&auto=format&fit=crop',
            'facilities'  => ['Stretcher Ketinggian Otomatis', 'Double Oksigen Central', 'Monitor EKG NIBP SpO2', 'Suction Pump Elektrik', 'Sirine Multi-Tone', 'GPS Trackers'],
        ],
    ];

    $categories = [
        ['key' => 'semua',    'label' => 'Semua Armada'],
        ['key' => 'standar',  'label' => 'Standar'],
        ['key' => 'emergency','label' => 'Emergency'],
        ['key' => 'icu',      'label' => 'ICU'],
        ['key' => 'nicu',     'label' => 'NICU'],
        ['key' => 'jenazah',  'label' => 'Jenazah'],
        ['key' => 'event',    'label' => 'Event'],
    ];

    $fleetList = $activeCategory === 'semua'
        ? $allFleet
        : array_values(array_filter($allFleet, fn($item) => $item['category'] === $activeCategory));
@endphp

<div class="min-h-screen bg-slate-50 flex flex-col pb-28 text-slate-800" id="top">

    {{-- ================================================================
         1. HEADER STICKY
         ================================================================ --}}
    <header class="bg-white border-b border-slate-200/80 px-4 py-3.5 sticky top-0 z-40 flex items-center gap-3">
        <a href="/" wire:navigate class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center hover:bg-slate-100 transition-colors flex-shrink-0">
            <i data-lucide="chevron-left" style="width:18px;height:18px;stroke-width:2.5" class="text-slate-700"></i>
        </a>
        <div class="flex-1 min-w-0">
            <h1 class="text-[16px] font-bold text-slate-800 leading-tight">Armada Medis</h1>
            <p class="text-[11px] text-slate-400 truncate">{{ count($allFleet) }} Unit Siaga Berizin Dinkes</p>
        </div>
        <a href="tel:08123456789" class="flex-shrink-0 flex items-center gap-1.5 bg-red-500 text-white text-[11px] font-bold px-3 py-1.5 rounded-full shadow-sm">
            <i data-lucide="phone-call" style="width:12px;height:12px;stroke-width:2.5"></i>
            Darurat
        </a>
    </header>

    {{-- ================================================================
         2. HERO BANNER
         ================================================================ --}}
    <div class="relative overflow-hidden px-5 pt-7 pb-6" style="background: linear-gradient(135deg, #2C1B39 0%, #3E458E 45%, #6B3F98 100%)">
        <div class="absolute -top-6 -right-6 w-28 h-28 rounded-full pointer-events-none" style="background:rgba(192,69,127,0.18);filter:blur(30px)"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 rounded-full pointer-events-none" style="background:rgba(49,84,184,0.2);filter:blur(30px)"></div>
        <div class="relative z-10">
            <span class="text-[10px] font-extrabold tracking-widest uppercase" style="color:#D4AAFF">Fasilitas & Unit Medis</span>
            <h2 class="text-white font-bold mt-1 leading-snug" style="font-size:19px">Armada Berstandar<br>Dinas Kesehatan</h2>
            <p class="text-[13px] mt-2 leading-relaxed" style="color:rgba(255,255,255,0.72)">
                Seluruh unit rutin disterilisasi dan dilengkapi peralatan pertolongan darurat serta paramedis tersertifikasi.
            </p>
            <div class="flex gap-5 mt-4">
                <div><p class="text-white font-extrabold leading-none" style="font-size:17px">8 Unit</p><p class="text-[10px] mt-0.5" style="color:rgba(255,255,255,0.55)">Total Armada</p></div>
                <div><p class="text-white font-extrabold leading-none" style="font-size:17px">100%</p><p class="text-[10px] mt-0.5" style="color:rgba(255,255,255,0.55)">Steril HEPA</p></div>
                <div><p class="text-white font-extrabold leading-none" style="font-size:17px">GPS</p><p class="text-[10px] mt-0.5" style="color:rgba(255,255,255,0.55)">Tracking Realtime</p></div>
            </div>
        </div>
    </div>

    {{-- ================================================================
         3. CATEGORY CHIPS
         ================================================================ --}}
    <div class="bg-white border-b border-slate-100 sticky top-[61px] z-30">
        <div class="flex gap-2 px-4 py-3 overflow-x-auto scrollbar-hide">
            @foreach($categories as $cat)
                <button wire:click="setCategory('{{ $cat['key'] }}')"
                        class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[12px] font-medium border whitespace-nowrap flex-shrink-0 transition-all"
                        @class([
                            'bg-[#6B3F98] text-white border-[#6B3F98] shadow-sm' => $activeCategory === $cat['key'],
                            'bg-white text-slate-500 border-slate-200' => $activeCategory !== $cat['key'],
                        ])>
                    {{ $cat['label'] }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- ================================================================
         4. FLEET CARDS LIST
         ================================================================ --}}
    <div class="flex flex-col gap-3 p-4 flex-1">

        @forelse($fleetList as $fleet)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">
                
                {{-- Vehicle Image Container --}}
                <div class="relative h-44 bg-slate-900 overflow-hidden">
                    <img src="{{ $fleet['image'] }}" alt="{{ $fleet['type'] }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                    {{-- Category Badge (Top Left) --}}
                    <div class="absolute top-3 left-3">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-md shadow-sm"
                              style="background:{{ $fleet['cat_color'] }}; color: white">
                            {{ $fleet['cat_label'] }}
                        </span>
                    </div>

                    {{-- Status Badge (Top Right) --}}
                    <div class="absolute top-3 right-3">
                        @if($fleet['status'] === 'siaga')
                            <span class="inline-flex items-center gap-1.5 bg-emerald-500/90 backdrop-blur-sm text-white text-[10.5px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                                {{ $fleet['status_label'] }}
                            </span>
                        @elseif($fleet['status'] === 'tugas')
                            <span class="inline-flex items-center gap-1.5 bg-amber-500/90 backdrop-blur-sm text-white text-[10.5px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-white"></span>
                                {{ $fleet['status_label'] }}
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 bg-slate-600/90 backdrop-blur-sm text-white text-[10.5px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-slate-300"></span>
                                {{ $fleet['status_label'] }}
                            </span>
                        @endif
                    </div>

                    {{-- Fleet Code & Type (Bottom Left) --}}
                    <div class="absolute bottom-3 left-3 right-3 text-white">
                        <div class="flex items-center gap-2 mb-0.5">
                            <span class="bg-white/20 backdrop-blur-md text-white text-[11px] font-extrabold px-2 py-0.5 rounded border border-white/30">
                                {{ $fleet['code'] }}
                            </span>
                            <h3 class="text-[15px] font-bold text-white truncate drop-shadow-sm">{{ $fleet['type'] }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Card Content --}}
                <div class="p-4 flex flex-col gap-3">
                    
                    {{-- Area Operasional --}}
                    <div class="flex items-center gap-2 text-[12.5px] text-slate-600 bg-slate-50 px-3 py-2 rounded-xl border border-slate-100">
                        <i data-lucide="map-pin" style="width:14px;height:14px;stroke-width:2.2" class="text-[#6B3F98] flex-shrink-0"></i>
                        <span class="font-medium text-slate-700">Area Operasional:</span>
                        <span class="text-slate-500 truncate">{{ $fleet['area'] }}</span>
                    </div>

                    {{-- Fasilitas List --}}
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <i data-lucide="shield-check" style="width:12px;height:12px;stroke-width:2.5" class="text-emerald-500"></i>
                            Fasilitas Medis & Peralatan
                        </p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($fleet['facilities'] as $fac)
                                <span class="text-[11.5px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 border border-slate-200/60 flex items-center gap-1">
                                    <i data-lucide="check" style="width:11px;height:11px;stroke-width:3" class="text-emerald-600"></i>
                                    {{ $fac }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- CTA Actions --}}
                    <div class="flex items-center gap-2 mt-1 pt-3 border-t border-slate-100">
                        <a href="tel:08123456789"
                           class="flex-1 flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-[13px] font-bold text-white transition-transform active:scale-95 shadow-sm"
                           style="background: linear-gradient(135deg, #3154B8 0%, #6B3F98 100%)">
                            <i data-lucide="phone-call" style="width:13px;height:13px;stroke-width:2.5"></i>
                            Pesan Unit {{ $fleet['code'] }}
                        </a>
                        <a href="https://wa.me/628123456789?text=Halo, saya ingin menanyakan ketersediaan unit {{ $fleet['code'] }} ({{ urlencode($fleet['type']) }})"
                           target="_blank"
                           class="w-10 h-10 rounded-xl flex items-center justify-center border border-slate-200 bg-slate-50 text-slate-500 hover:bg-green-50 hover:text-green-600 hover:border-green-200 transition-colors flex-shrink-0">
                            <i data-lucide="message-circle" style="width:16px;height:16px;stroke-width:2"></i>
                        </a>
                    </div>

                </div>

            </div>
        @empty
            <div class="py-16 text-center text-slate-400">
                <i data-lucide="truck" style="width:40px;height:40px;stroke-width:1.2" class="mx-auto mb-2 text-slate-300"></i>
                <p class="text-[13px] font-medium">Belum ada armada di kategori ini</p>
            </div>
        @endforelse

    </div>

    {{-- ================================================================
         5. EMERGENCY BANNER
         ================================================================ --}}
    <div class="mx-4 my-3 rounded-2xl overflow-hidden shadow-md" style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%)">
        <div class="p-4 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="siren" style="width:18px;height:18px;stroke-width:2" class="text-white"></i>
                </div>
                <div>
                    <p class="text-white font-bold text-[14px] leading-tight">Butuh Penanganan Cepat?</p>
                    <p class="text-red-200 text-[11.5px]">Petugas & Unit Siaga Berangkat Dalam 8 Menit</p>
                </div>
            </div>
            <a href="tel:08123456789"
               class="flex-shrink-0 bg-white text-red-600 font-extrabold text-[12px] px-4 py-2 rounded-xl shadow-sm active:scale-95 transition-transform">
                PANGGIL
            </a>
        </div>
    </div>

</div>
