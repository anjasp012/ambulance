<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    //
};
?>


<div class="min-h-screen bg-white flex flex-col pb-28 text-slate-800 text-[15px] relative" id="top" x-data="{}">

    {{-- ================================================================
         1.1 HERO SECTION — navbar as transparent overlay
         ================================================================ --}}
    <section class="relative overflow-hidden" style="min-height:480px">
        {{-- Video background --}}
        <video autoplay loop muted playsinline
               class="absolute inset-0 w-full h-full object-cover"
               poster="https://images.unsplash.com/photo-1612997951721-4d9e3794c1d5?q=80&w=400&fit=crop">
            <source src="{{ asset('assets/videos/hero.mp4') }}" type="video/mp4">
        </video>
        {{-- Gradient overlay — stronger at top & bottom --}}
        <div class="absolute inset-0" style="background:linear-gradient(to bottom, rgba(20,10,35,0.75) 0%, rgba(107,63,152,0.40) 40%, rgba(20,10,35,0.92) 100%)"></div>

        {{-- ── OVERLAY NAVBAR (absolutely positioned over video) ─── --}}
        <div class="absolute top-0 left-0 right-0 z-20 px-4 pt-4 flex items-center justify-between">
            {{-- Left: logo + tagline --}}
            <div class="flex items-center gap-1.5">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Inisiatif Kebaikan" class="w-9 h-9 object-contain flex-shrink-0">
                <p class="text-white font-bold leading-none tracking-widest uppercase">Ambulance</p>
            </div>
            {{-- Right: bell --}}
            <button class="w-8 h-8 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center">
                <i data-lucide="bell" style="width:16px;height:16px;stroke-width:2" class="text-white/80"></i>
            </button>
        </div>

        {{-- ── HERO CONTENT ────────────────────────────────────────── --}}
        <div class="relative z-10 px-4 pt-20 pb-6 flex flex-col gap-3 min-h-[480px] justify-end">
            <div class="flex flex-col gap-2">
                <h1 class="text-white text-2xl font-bold leading-tight drop-shadow-sm">
                    Siap Menemani Perjalanan<br>Kesehatan Anda,
                    <span style="color:#D4AAFF">Kapan Pun</span>
                </h1>
                <p class="text-white/70 text-[14px] leading-relaxed font-normal">
                    Ambulans profesional, jenazah, ICU, home care, dan standby event — siaga 24 jam.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col gap-1.5 mt-1">
                    <a href="#emergency"
                       class="flex items-center justify-center gap-1.5 bg-red-500 text-white text-[15px] font-medium py-2.5 rounded-xl shadow-lg shadow-red-900/30">
                        <i data-lucide="phone-call" style="width:14px;height:14px;stroke-width:2.5"></i>
                        Pesan Ambulans Sekarang
                    </a>
                    <div class="flex gap-1.5">
                        <a href="https://wa.me/628123456789" target="_blank"
                           class="flex-1 flex items-center justify-center gap-1 bg-white/10 backdrop-blur-sm border border-white/20 text-white text-[14px] font-normal py-1.5 rounded-xl">
                            <i data-lucide="message-circle" style="width:13px;height:13px;stroke-width:2.5"></i>
                            WhatsApp
                        </a>
                        <a href="#tarif"
                           class="flex-1 flex items-center justify-center gap-1 bg-white/10 backdrop-blur-sm border border-white/20 text-white text-[14px] font-normal py-1.5 rounded-xl">
                            <i data-lucide="calculator" style="width:13px;height:13px;stroke-width:2.5"></i>
                            Estimasi Tarif
                        </a>
                    </div>
                    <a href="#layanan" class="flex items-center justify-center gap-0.5 text-white/45 text-[13px] py-0.5">
                        Lihat semua layanan
                        <i data-lucide="chevron-down" style="width:12px;height:12px;stroke-width:2.5"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         1.2 EMERGENCY ACTION
         ================================================================ --}}
    <section id="emergency" class="px-3 py-3 bg-white">
        <div class="rounded-xl border border-red-100 overflow-hidden"
             style="background:linear-gradient(135deg,#FEF2F2,#FFF5F5)">
            {{-- Header --}}
            <div class="flex items-center gap-2 p-3 border-b border-red-100">
                <div class="w-9 h-9 rounded-xl bg-red-500 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="siren" style="width:20px;height:20px;stroke-width:2" class="text-white"></i>
                </div>
                <div>
                    <p class="text-[16px] font-bold text-red-700">Butuh Ambulans Sekarang?</p>
                    <p class="text-[13px] text-red-500 font-normal">Tim medis siap meluncur cepat</p>
                </div>
            </div>

            {{-- Contact options --}}
            <div class="grid grid-cols-2 gap-2 p-3">
                <a href="tel:1500000"
                   class="flex items-center gap-2 p-2 bg-white rounded-xl border border-red-50">
                    <div class="w-6 h-6 rounded-lg bg-red-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="phone" style="width:14px;height:14px;stroke-width:2.5" class="text-red-500"></i>
                    </div>
                    <div>
                        <p class="text-[12px] text-slate-400 font-normal uppercase">Hotline</p>
                        <p class="text-[14px] font-bold text-slate-800">1500-XXX</p>
                    </div>
                </a>
                <a href="https://wa.me/628123456789" target="_blank"
                   class="flex items-center gap-2 p-2 bg-white rounded-xl border border-red-50">
                    <div class="w-6 h-6 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="message-circle" style="width:14px;height:14px;stroke-width:2.5" class="text-green-500"></i>
                    </div>
                    <div>
                        <p class="text-[12px] text-slate-400 font-normal uppercase">WhatsApp</p>
                        <p class="text-[14px] font-bold text-slate-800">0812-3456-789</p>
                    </div>
                </a>
                <a href="tel:08123456789"
                   class="flex items-center gap-2 p-2 bg-white rounded-xl border border-red-50">
                    <div class="w-6 h-6 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="phone-call" style="width:14px;height:14px;stroke-width:2.5" class="text-blue-500"></i>
                    </div>
                    <div>
                        <p class="text-[12px] text-slate-400 font-normal uppercase">Telepon CS</p>
                        <p class="text-[14px] font-bold text-slate-800">0812-3456-789</p>
                    </div>
                </a>
                <a href="https://maps.google.com" target="_blank"
                   class="flex items-center gap-2 p-2 bg-white rounded-xl border border-red-50">
                    <div class="w-6 h-6 rounded-lg bg-purple-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="map-pin" style="width:14px;height:14px;stroke-width:2.5" class="text-purple-500"></i>
                    </div>
                    <div>
                        <p class="text-[12px] text-slate-400 font-normal uppercase">Lokasi Kami</p>
                        <p class="text-[14px] font-bold text-slate-800">Lihat Maps</p>
                    </div>
                </a>
            </div>

            {{-- Panggil Button --}}
            <div class="px-3 pb-3">
                <a href="tel:08123456789"
                   class="w-full flex items-center justify-center gap-1.5 bg-red-500 text-white font-bold text-[16px] py-2.5 rounded-xl shadow-md"
                   style="box-shadow:0 3px 10px rgba(239,68,68,0.3)">
                    <i data-lucide="siren" style="width:16px;height:16px;stroke-width:2.5"></i>
                    Panggil Ambulans
                </a>
            </div>
    </section>

    <div class="sect-divider"></div>

    <section class="bg-white px-4 py-3">
        {{-- Overlaid Image Banner --}}
        <div class="rounded-xl overflow-hidden relative mb-3 h-24 bg-slate-900">
            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=400&fit=crop" 
                 alt="Medical team" class="w-full h-full object-cover opacity-45">
            <div class="absolute inset-0 p-3 flex flex-col justify-end bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent">
                <span class="text-[12px] font-medium text-[#D4AAFF] uppercase tracking-widest leading-none mb-1">Inisiatif Kebaikan</span>
                <p class="text-white text-[15px] font-bold leading-snug">"Setiap detik adalah ikhtiar penting untuk menyelamatkan kehidupan."</p>
            </div>
        </div>

        <div class="flex items-center gap-1.5 mb-2">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Dedikasi & Kemanusiaan</h2>
        </div>
        <p class="text-[13.5px] text-slate-500 leading-relaxed mb-3">
            Berdiri sejak 2015 di Bandung, Jawa Barat, kami mengabdikan diri untuk menyediakan akses transportasi medis darurat yang andal, aman, dan berstandar dinas kesehatan.
        </p>

        {{-- Visi Misi cards side-by-side --}}
        <div class="grid grid-cols-2 gap-2 mb-3">
            <div class="p-2.5 rounded-xl border flex flex-col gap-1" style="background:linear-gradient(135deg, rgba(49,84,184,0.10) 0%, rgba(107,63,152,0.04) 100%); border-color: rgba(49,84,184,0.15)">
                <div class="flex items-center gap-1">
                    <i data-lucide="eye" style="width:14px;height:14px;stroke-width:2.5" class="text-[#3154B8]"></i>
                    <p class="text-[13.5px] font-bold text-slate-800 uppercase">Visi Kami</p>
                </div>
                <p class="text-[12.5px] text-slate-600 leading-relaxed">Menjadi penyedia transportasi medis sosial terdepan yang cepat tanggap dan tepercaya.</p>
            </div>
            <div class="p-2.5 rounded-xl border flex flex-col gap-1" style="background:linear-gradient(135deg, rgba(192,69,127,0.10) 0%, rgba(131,49,107,0.04) 100%); border-color: rgba(192,69,127,0.15)">
                <div class="flex items-center gap-1">
                    <i data-lucide="target" style="width:14px;height:14px;stroke-width:2.5" class="text-[#C0457F]"></i>
                    <p class="text-[13.5px] font-bold text-slate-800 uppercase">Misi Kami</p>
                </div>
                <p class="text-[12.5px] text-slate-600 leading-relaxed">Menyediakan armada standar tinggi dan paramedis terlatih secara berkesinambungan.</p>
            </div>
        </div>

        {{-- Credential Badges --}}
        <div class="p-2.5 rounded-xl border border-slate-100 flex items-center justify-between mt-3" style="background:linear-gradient(to right, #ffffff, rgba(192,69,127,0.03))">
            <div class="flex items-center gap-2">
                <i data-lucide="shield-check" style="width:17px;height:17px;stroke-width:2" class="text-emerald-500"></i>
                <div>
                    <p class="text-[13px] font-medium text-slate-800">Izin Dinkes & Sertifikat Resmi</p>
                    <p class="text-[12px] text-slate-400">Driver & paramedis tersertifikasi BTCLS/PPGD</p>
                </div>
            </div>
            <span class="text-[12px] font-medium text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">Resmi</span>
        </div>
    </section>

    <div class="sect-divider"></div>

    <section class="bg-white px-4 py-3">
        <div class="flex items-center justify-between mb-2.5">
            <div class="flex items-center gap-1.5">
                <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
                <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Kenapa Memilih Kami?</h2>
            </div>
            <span class="text-[11.5px] font-medium text-slate-400 bg-slate-100 px-1.5 py-0.5 rounded">10 Keunggulan</span>
        </div>

        @php
            $advantages = [
                ['lucide'=>'clock',        'label'=>'Operasional 24 Jam',      'bg'=>'#FEF3C7', 'border'=>'#FDE68A', 'tc'=>'#B45309'],
                ['lucide'=>'shield-check', 'label'=>'Driver Bersertifikat',    'bg'=>'#D1FAE5', 'border'=>'#A7F3D0', 'tc'=>'#047857'],
                ['lucide'=>'stethoscope',  'label'=>'Tim Medis Profesional',   'bg'=>'#DBEAFE', 'border'=>'#BFDBFE', 'tc'=>'#1D4ED8'],
                ['lucide'=>'zap',          'label'=>'Respon Cepat 8 Menit',    'bg'=>'#FEE2E2', 'border'=>'#FECACA', 'tc'=>'#B91C1C'],
                ['lucide'=>'sparkles',     'label'=>'Unit Steril & Bersih',    'bg'=>'#CCFBF1', 'border'=>'#99F6E4', 'tc'=>'#0F766E'],
                ['lucide'=>'heart-pulse',  'label'=>'Peralatan Lengkap',       'bg'=>'#F3E8FF', 'border'=>'#E9D5FF', 'tc'=>'#6D28D9'],
                ['lucide'=>'receipt',      'label'=>'Tarif Transparan',        'bg'=>'#FFE4E6', 'border'=>'#FECDD3', 'tc'=>'#BE123C'],
                ['lucide'=>'map',          'label'=>'Rute Jawa Bali',          'bg'=>'#E0F2FE', 'border'=>'#BAE6FD', 'tc'=>'#0369A1'],
                ['lucide'=>'map-pin',      'label'=>'GPS Live Tracking',       'bg'=>'#ECFEFF', 'border'=>'#A5F3FC', 'tc'=>'#0E7490'],
                ['lucide'=>'headphones',   'label'=>'CS Responsif 24 Jam',     'bg'=>'#EEF2FF', 'border'=>'#C7D2FE', 'tc'=>'#4338CA'],
            ];
        @endphp

        <div class="grid grid-cols-2 gap-2">
            @foreach ($advantages as $adv)
                <div class="flex items-center gap-2 p-2 rounded-xl border" style="background:{{ $adv['bg'] }}35; border-color:{{ $adv['border'] }}70">
                    <div class="w-6 h-6 rounded-md flex items-center justify-center flex-shrink-0" style="background:{{ $adv['bg'] }}">
                        <i data-lucide="{{ $adv['lucide'] }}" style="width:14px;height:14px;stroke-width:2.2;color:{{ $adv['tc'] }}" class="flex-shrink-0"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[13.5px] font-medium text-slate-800 leading-tight">{{ $adv['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.5 STATISTIK
         ================================================================ --}}
    <section class="px-4 py-5" style="background:linear-gradient(150deg,#2C1B39 0%,#3E458E 45%,#6B3F98 100%)">
        {{-- Featured big stat --}}
        <div class="text-center mb-3">
            <p class="text-white/50 text-[13px] font-normal uppercase tracking-widest mb-0.5">Sejak 2015</p>
            <p class="text-4xl font-bold text-white leading-none">8.500<span style="color:#D4AAFF">+</span></p>
            <p class="text-white/70 text-[13.5px] font-normal mt-0.5">pasien telah kami layani</p>
        </div>

        {{-- Supporting stats --}}
        <div class="grid grid-cols-3 gap-1.5 mb-2">
            @php
                $topStats = [
                    ['val'=>'15+',  'label'=>'Armada',     'tc'=>'#FBBF24'],
                    ['val'=>'120+', 'label'=>'Mitra RS',   'tc'=>'#22D3EE'],
                    ['val'=>'18',   'label'=>'Kota/Kab',   'tc'=>'#C084FC'],
                ];
            @endphp
            @foreach ($topStats as $s)
                <div class="rounded-xl py-1.5 px-1 text-center bg-white/5 border border-white/10">
                    <p class="text-[16px] font-bold" style="color:{{ $s['tc'] }}">{{ $s['val'] }}</p>
                    <p class="text-white/50 text-[11.5px] font-normal mt-0.5 leading-none">{{ $s['label'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-2 gap-1.5">
            @php
                $botStats = [
                    ['val'=>'24 Jam', 'label'=>'Nonstop operasional',   'tc'=>'#34D399', 'lucide'=>'clock'],
                    ['val'=>'98%',    'label'=>'Tingkat kepuasan',       'tc'=>'#F43F5E', 'lucide'=>'smile'],
                ];
            @endphp
            @foreach ($botStats as $s)
                <div class="rounded-xl py-1.5 px-2 flex items-center gap-1.5 bg-white/5 border border-white/10">
                    <i data-lucide="{{ $s['lucide'] }}" style="width:13px;height:13px;stroke-width:2;color:{{ $s['tc'] }}" class="flex-shrink-0"></i>
                    <div>
                        <p class="text-[14px] font-bold leading-none" style="color:{{ $s['tc'] }}">{{ $s['val'] }}</p>
                        <p class="text-white/50 text-[11.5px] mt-0.5 leading-none">{{ $s['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.6 LAYANAN UNGGULAN
         ================================================================ --}}
    <section id="layanan" class="bg-white px-4 py-3">
        <div class="flex items-center gap-1.5 mb-2.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Armada & Layanan Medis</h2>
        </div>

        <div class="grid grid-cols-2 gap-1.5">
            @php
                $services = [
                    ['lucide'=>'stethoscope','label'=>'Rawat Jalan',  'bg'=>'#EFF6FF','ic'=>'#3B82F6','tc'=>'#1E40AF','bd'=>'#DBEAFE'],
                    ['lucide'=>'siren',      'label'=>'Emergency',    'bg'=>'#FEF2F2','ic'=>'#EF4444','tc'=>'#991B1B','bd'=>'#FEE2E2'],
                    ['lucide'=>'heart-pulse','label'=>'Ambulans ICU', 'bg'=>'#F3EEF9','ic'=>'#6B3F98','tc'=>'#581C87','bd'=>'#E9D5FF'],
                    ['lucide'=>'baby',       'label'=>'Ambulans NICU','bg'=>'#FFF7ED','ic'=>'#F97316','tc'=>'#9A3412','bd'=>'#FFEDD5'],
                    ['lucide'=>'moon',       'label'=>'Jenazah',      'bg'=>'#F8FAFC','ic'=>'#475569','tc'=>'#1E293B','bd'=>'#E2E8F0'],
                    ['lucide'=>'house',      'label'=>'Home Care',     'bg'=>'#ECFDF5','ic'=>'#10B981','tc'=>'#065F46','bd'=>'#D1FAE5'],
                    ['lucide'=>'shield-check','label'=>'Standby Event','bg'=>'#FFF1F2','ic'=>'#F43F5E','tc'=>'#9F1239','bd'=>'#FFE4E6'],
                    ['lucide'=>'plane',      'label'=>'Medical Escort','bg'=>'#F0F9FF','ic'=>'#0EA5E9','tc'=>'#075985','bd'=>'#E0F2FE'],
                ];
            @endphp

            @foreach ($services as $svc)
                <div class="flex items-center gap-2 p-1.5 rounded-xl border" style="background:{{ $svc['bg'] }}40; border-color:{{ $svc['bd'] }}">
                    <div class="w-7.5 h-7.5 rounded-lg flex items-center justify-center flex-shrink-0"
                         style="background:{{ $svc['bg'] }}; color:{{ $svc['ic'] }}">
                        <i data-lucide="{{ $svc['lucide'] }}" style="width:15px;height:15px;stroke-width:2"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[13.5px] font-medium leading-snug" style="color:{{ $svc['tc'] }}">{{ $svc['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="#"
           class="mt-2.5 w-full flex items-center justify-center gap-1 bg-gradient-to-r from-[#3154B8] to-[#6B3F98] text-white font-medium text-[14.5px] py-2 rounded-xl shadow-md">
            <i data-lucide="layout-grid" style="width:14px;height:14px;stroke-width:2"></i>
            Lihat Seluruh Layanan
        </a>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.7 ALUR PEMESANAN
         ================================================================ --}}
    <section class="bg-white px-4 py-3">
        <div class="flex items-center gap-1.5 mb-3">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Alur Pemesanan</h2>
        </div>

        <div class="space-y-2.5 relative">
            @php
                $steps = [
                    ['n'=>1,'lucide'=>'phone',        'title'=>'Hubungi Admin',         'desc'=>'Hubungi hotline darurat atau via chat WhatsApp.', 'color'=>'#3B82F6', 'bg'=>'#EFF6FF'],
                    ['n'=>2,'lucide'=>'message-square','title'=>'Konsultasi Kebutuhan', 'desc'=>'Konfirmasi kondisi pasien untuk penentuan unit medis.', 'color'=>'#8B5CF6', 'bg'=>'#F3EEF9'],
                    ['n'=>3,'lucide'=>'map-pin',       'title'=>'Konfirmasi Lokasi',     'desc'=>'Kirim share-loc GPS jemput dan tujuan RS rujukan.', 'color'=>'#EC4899', 'bg'=>'#FFF1F2'],
                    ['n'=>4,'lucide'=>'truck',         'title'=>'Armada Berangkat',      'desc'=>'Unit ambulans terdekat segera dilepas ke lokasi.', 'color'=>'#F97316', 'bg'=>'#FFF7ED'],
                    ['n'=>5,'lucide'=>'check-circle',  'title'=>'Sampai Tujuan',         'desc'=>'Pendampingan medis intensif hingga tempat tujuan.', 'color'=>'#10B981', 'bg'=>'#ECFDF5'],
                ];
            @endphp

            @foreach ($steps as $step)
                <div class="relative flex items-start gap-2.5 pl-0.5">
                    {{-- Step circle --}}
                    <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold text-[13.5px] z-10"
                         style="background:{{ $step['color'] }}; box-shadow: 0 2px 5px {{ $step['color'] }}40">
                        {{ $step['n'] }}
                    </div>
                    {{-- Content box --}}
                    <div class="flex-1 p-2 rounded-xl border border-slate-100/80" style="background:{{ $step['bg'] }}40">
                        <div class="flex items-center gap-1">
                            <i data-lucide="{{ $step['lucide'] }}" style="width:13px;height:13px;stroke-width:2.2;color:{{ $step['color'] }}"></i>
                            <p class="text-[14px] font-medium text-slate-800 leading-none">{{ $step['title'] }}</p>
                        </div>
                        <p class="text-[12.5px] text-slate-500 mt-0.5 leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.8 WILAYAH OPERASIONAL
         ================================================================ --}}
    <section id="wilayah" class="bg-white px-4 py-3">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-1.5">
                <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
                <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Wilayah Operasional</h2>
            </div>
            <span class="text-[11.5px] font-medium text-slate-400 bg-slate-100 px-1.5 py-0.5 rounded">Jawa & Bali</span>
        </div>
        <p class="text-[13.5px] text-slate-500 mb-2.5 leading-relaxed">
            Bandung Raya (pos utama), regional Jawa Barat, hingga rujukan se-Jawa Bali.
        </p>

        {{-- Map placeholder --}}
        <div class="rounded-xl overflow-hidden border border-[#6B3F98]/20 bg-slate-100 relative mb-2.5" style="height:110px">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252951.99699889748!2d107.43305!3d-6.917464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung!5e0!3m2!1sid!2sid!4v1000000000000"
                width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="grayscale opacity-80"></iframe>
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="bg-white/95 backdrop-blur-sm px-2.5 py-1 rounded-full flex items-center gap-1 shadow-md border border-[#6B3F98]/15">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#C0457F] animate-pulse"></span>
                    <span class="text-[12.5px] font-medium text-slate-700">Bandung Raya (Pos Utama)</span>
                </div>
            </div>
        </div>

        {{-- Coverage areas --}}
        <div class="space-y-1.5">
            @php
                $areas = [
                    ['lucide'=>'map-pin',  'zone'=>'A', 'label'=>'Bandung Raya',             'sub'=>'Bandung, Cimahi, Kab. Bandung, KBB', 'bg'=>'#F3EEF9', 'tc'=>'#6B3F98', 'bd'=>'#E9D5FF'],
                    ['lucide'=>'map',      'zone'=>'B', 'label'=>'Seluruh Jawa Barat',       'sub'=>'Seluruh wilayah kota/kabupaten Jabar', 'bg'=>'#EFF6FF', 'tc'=>'#3B82F6', 'bd'=>'#DBEAFE'],
                    ['lucide'=>'globe',    'zone'=>'C', 'label'=>'Antar Provinsi',           'sub'=>'Rujukan jarak jauh se-Jawa Bali',     'bg'=>'#ECFDF5', 'tc'=>'#10B981', 'bd'=>'#D1FAE5'],
                ];
            @endphp
            @foreach ($areas as $a)
                <div class="flex items-center gap-2.5 p-1.5 rounded-xl border" style="background:{{ $a['bg'] }}30; border-color:{{ $a['bd'] }}">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background:{{ $a['bg'] }}; color:{{ $a['tc'] }}">
                        <i data-lucide="{{ $a['lucide'] }}" style="width:14px;height:14px;stroke-width:2"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[13.5px] font-medium text-slate-800 leading-none">{{ $a['label'] }}</p>
                        <p class="text-[12px] text-slate-400 mt-0.5 leading-none truncate">{{ $a['sub'] }}</p>
                    </div>
                    <span class="text-[12.5px] font-bold rounded-full w-4.5 h-4.5 flex items-center justify-center border" style="background:{{ $a['bg'] }}; color:{{ $a['tc'] }}; border-color:{{ $a['bd'] }}">{{ $a['zone'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.9 TESTIMONI
         ================================================================ --}}
    <section class="bg-white px-4 py-3">
        <div class="flex items-center gap-1.5 mb-2.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Ulasan Pelanggan</h2>
        </div>

        {{-- Rating bar --}}
        <div class="flex items-center gap-3 p-2.5 rounded-xl bg-gradient-to-br from-white to-[#6B3F98]/5 border border-[#6B3F98]/10 mb-2.5 shadow-sm">
            <div class="text-center flex-shrink-0">
                <p class="text-2xl font-bold text-slate-800 leading-none">4.9</p>
                <div class="flex gap-0.5 mt-0.5 justify-center">
                    @for($i=0;$i<5;$i++)
                        <i data-lucide="star" style="width:10px;height:10px;stroke-width:0;fill:#FBBF24"></i>
                    @endfor
                </div>
                <p class="text-[11.5px] text-slate-400 mt-1 leading-none">850+ Ulasan Google</p>
            </div>
            <div class="flex-1 space-y-0.5">
                @foreach([['5',90],['4',7],['3',2],['2',1],['1',0]] as [$star,$pct])
                    <div class="flex items-center gap-1">
                        <span class="text-[11.5px] text-slate-400 w-1 text-right">{{ $star }}</span>
                        <i data-lucide="star" style="width:8.5px;height:8.5px;stroke-width:0;fill:#FBBF24;flex-shrink:0"></i>
                        <div class="flex-1 h-1 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-[#3154B8] to-[#C0457F]" style="width:{{ $pct }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Review cards --}}
        <div class="space-y-2">
            @php
                $reviews = [
                    [
                        'name'=>'Rian Pratama',
                        'loc'=>'Bandung',
                        'star'=>5,
                        'avatar'=>'R',
                        'text'=>'Sangat bersyukur ada ambulans IK saat bapak drop tengah malam. Paramedis handal & tenang.',
                        'border' => '#3154B8',
                        'grad' => 'from-[#3154B8] to-[#4A4FB2]'
                    ],
                    [
                        'name'=>'Aditya Hendra',
                        'loc'=>'Soreang',
                        'star'=>5,
                        'avatar'=>'A',
                        'text'=>'Pelayanan ambulans jenazahnya sangat takzim. Mengemudi dengan sangat hati-hati & penuh hormat.',
                        'border' => '#C0457F',
                        'grad' => 'from-[#83316B] to-[#C0457F]'
                    ],
                ];
            @endphp
            @foreach ($reviews as $r)
                <div class="p-2.5 rounded-xl bg-gradient-to-br from-white to-slate-50/50 border border-slate-100 border-l-[3.5px]" style="border-left-color:{{ $r['border'] }}">
                    <div class="flex items-start justify-between mb-1">
                        <div class="flex items-center gap-2">
                            <div class="w-6.5 h-6.5 rounded-full bg-gradient-to-br {{ $r['grad'] }} flex items-center justify-center text-white text-[13.5px] font-bold flex-shrink-0">
                                {{ $r['avatar'] }}
                            </div>
                            <div>
                                <p class="text-[13.5px] font-medium text-slate-800 leading-none">{{ $r['name'] }}</p>
                                <p class="text-[11.5px] text-slate-400 mt-0.5 leading-none">{{ $r['loc'] }}</p>
                            </div>
                        </div>
                        <div class="flex gap-0.5 flex-shrink-0">
                            @for($i=0;$i<$r['star'];$i++)
                                <i data-lucide="star" style="width:9px;height:9px;stroke-width:0;fill:#FBBF24"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="text-[13px] text-slate-600 leading-relaxed">{{ $r['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.10 MITRA KAMI
         ================================================================ --}}
    <section id="mitra" class="px-4 py-3 bg-gradient-to-b from-white to-[#6B3F98]/5">
        <div class="flex items-center gap-1.5 mb-2.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Mitra Kami</h2>
        </div>

        @php
            $partnerGroups = [
                [
                    'label'=>'Rumah Sakit',
                    'items'=>['RSHS Bandung','RS Santosa','RS Al Islam','RS Borromeus'],
                    'bg'=>'#EFF6FF',
                    'bd'=>'#BFDBFE',
                    'tc'=>'#1E40AF',
                    'lucide'=>'building-2'
                ],
                [
                    'label'=>'Pemerintah',
                    'items'=>['Dinkes Jabar','PMI Jabar','BPBD Jabar','PMI Bandung'],
                    'bg'=>'#F3EEF9',
                    'bd'=>'#E9D5FF',
                    'tc'=>'#581C87',
                    'lucide'=>'shield'
                ],
            ];
        @endphp

        <div class="space-y-2.5">
            @foreach ($partnerGroups as $group)
                <div>
                    <p class="text-[11.5px] font-medium text-slate-400 uppercase tracking-wider mb-1">{{ $group['label'] }}</p>
                    <div class="flex gap-1.5 overflow-x-auto scrollbar-hide pb-0.5">
                        @foreach ($group['items'] as $partner)
                            <div class="flex items-center gap-1 rounded-lg px-2.5 py-1 text-[12.5px] font-medium border flex-shrink-0"
                                 style="background:{{ $group['bg'] }}; border-color:{{ $group['bd'] }}; color:{{ $group['tc'] }}">
                                <i data-lucide="{{ $group['lucide'] }}" style="width:10px;height:10px;stroke-width:2.2"></i>
                                {{ $partner }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.11 BERITA
         ================================================================ --}}
    <section id="berita" class="bg-white px-4 py-3">
        {{-- Header --}}
        <div class="flex items-center justify-between mb-2.5">
            <div class="flex items-center gap-1.5">
                <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
                <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">Berita Terbaru</h2>
            </div>
            <a href="#" class="flex items-center gap-0.5 text-[13.5px] font-medium brand-text">
                Lihat Semua
                <i data-lucide="arrow-right" style="width:13px;height:13px;stroke-width:2.5"></i>
            </a>
        </div>

        @php
            $berita = [
                [
                    'img'     => 'https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=600&fit=crop',
                    'cat'     => 'Kegiatan',
                    'catBg'   => '#EF4444',
                    'date'    => '12 Jul 2025',
                    'title'   => 'Aksi Siaga Medis di Bandung Timur Pasca Musibah Longsor',
                    'excerpt' => 'Tim IK dikerahkan untuk evakuasi korban dan distribusi bantuan medis darurat.',
                    'featured' => true,
                ],
                [
                    'img'   => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?q=80&w=300&fit=crop',
                    'cat'   => 'Edukasi',
                    'catBg' => '#3154B8',
                    'date'  => '08 Jul',
                    'title' => 'Mengenal Peralatan Medis Standar Ambulans',
                    'featured' => false,
                ],
                [
                    'img'   => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=300&fit=crop',
                    'cat'   => 'Layanan',
                    'catBg' => '#6B3F98',
                    'date'  => '05 Jul',
                    'title' => 'Home Care untuk Lansia Pasca Rawat Inap',
                    'featured' => false,
                ],
            ];
        @endphp

        <div class="space-y-2">
            {{-- Featured article (full-width) --}}
            @php $f = $berita[0]; @endphp
            <div class="rounded-xl overflow-hidden border border-[#6B3F98]/15 shadow-sm">
                <div class="relative h-32 bg-slate-200">
                    <img src="{{ $f['img'] }}" alt="{{ $f['title'] }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
                    <span class="absolute top-2 left-2 text-[11px] font-bold text-white px-2 py-0.5 rounded uppercase tracking-wide"
                          style="background:{{ $f['catBg'] }}">{{ $f['cat'] }}</span>
                    <div class="absolute bottom-0 left-0 right-0 p-2.5">
                        <p class="text-white text-[14px] font-bold leading-snug line-clamp-2">{{ $f['title'] }}</p>
                        <p class="text-white/65 text-[12px] mt-0.5 leading-relaxed line-clamp-1">{{ $f['excerpt'] }}</p>
                    </div>
                </div>
            </div>

            {{-- 2-column small articles --}}
            <div class="grid grid-cols-2 gap-2">
                @foreach (array_slice($berita, 1) as $b)
                    <div class="rounded-xl overflow-hidden border border-slate-100 bg-[#6B3F98]/5">
                        <div class="relative h-16 bg-slate-200">
                            <img src="{{ $b['img'] }}" alt="{{ $b['title'] }}" class="w-full h-full object-cover">
                            <span class="absolute top-1 left-1 text-[10.5px] font-bold text-white px-1.5 py-0.5 rounded uppercase"
                                  style="background:{{ $b['catBg'] }}">{{ $b['cat'] }}</span>
                        </div>
                        <div class="p-2">
                            <p class="text-[13px] font-bold text-slate-800 leading-snug line-clamp-2 mb-0.5">{{ $b['title'] }}</p>
                            <span class="text-[11.5px] text-slate-400 font-normal">{{ $b['date'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="sect-divider"></div>


    {{-- ================================================================
         1.12 FAQ
         ================================================================ --}}
    <section class="bg-white px-4 py-3">
        <div class="flex items-center gap-1.5 mb-2.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h2 class="text-[16px] font-bold text-slate-800 uppercase tracking-wide">FAQ</h2>
        </div>

        <div class="space-y-1.5" x-data="{ active: null }">
            @php
                $faqs = [
                    ['i'=>0, 'q'=>'Bagaimana cara memesan ambulans?',             'a'=>'Hubungi hotline 1500-XXX atau WA 0812-3456-789. Tim kami siaga 24 jam.'],
                    ['i'=>1, 'q'=>'Berapa tarif layanan ambulans?',                'a'=>'Tarif dihitung berdasarkan jarak tempuh dan klasifikasi unit medis yang dipilih.'],
                    ['i'=>2, 'q'=>'Wilayah mana saja yang dilayani?',             'a'=>'Siaga utama Bandung Raya, melayani rute se-Jawa Bali.'],
                ];
            @endphp

            @foreach ($faqs as $faq)
                <div class="border rounded-xl overflow-hidden transition-all duration-200"
                     :style="active === {{ $faq['i'] }} ? 'border-color: rgba(107, 63, 152, 0.4); box-shadow: 0 2px 8px rgba(107,63,152,0.06)' : 'border-color: #f1f5f9'">
                    <button
                        @click="active = (active === {{ $faq['i'] }} ? null : {{ $faq['i'] }})"
                        class="w-full flex items-center justify-between px-3 py-2 gap-2 text-left transition-colors duration-200 focus:outline-none"
                        :class="active === {{ $faq['i'] }} ? 'bg-[#6B3F98]/5' : 'bg-white'">
                        <span class="text-[13.5px] font-bold flex-1 leading-snug"
                              :class="active === {{ $faq['i'] }} ? 'text-[#6B3F98]' : 'text-slate-800'">{{ $faq['q'] }}</span>
                        <div class="flex-shrink-0 w-4.5 h-4.5 rounded-full flex items-center justify-center transition-all duration-300"
                             :class="active === {{ $faq['i'] }} ? 'rotate-180 bg-[#6B3F98] text-white' : 'bg-[#AE99B0]/15 text-slate-500'">
                            <i data-lucide="chevron-down" style="width:11px;height:11px;stroke-width:2.5"></i>
                        </div>
                    </button>
                    <div class="px-3 pb-2.5 border-t border-slate-100/50 bg-[#6B3F98]/[0.01]"
                         x-show="active === {{ $faq['i'] }}"
                         x-transition
                         style="display: none;">
                        <p class="text-[13px] text-slate-500 leading-relaxed pt-2">{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="sect-divider"></div>

    {{-- ================================================================
         1.13 CTA PENUTUP
         ================================================================ --}}
    <section class="px-4 py-6 text-center" style="background:linear-gradient(135deg,#3E458E 0%,#6B3F98 60%,#83316B 100%)">
        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center mx-auto mb-3">
            <i data-lucide="ambulance" style="width:22px;height:22px;stroke-width:1.8" class="text-white"></i>
        </div>
        <h2 class="text-base font-bold text-white mb-1.5">Siap Membantu Anda 24 Jam</h2>
        <p class="text-white/70 text-[13.5px] leading-relaxed mb-4 max-w-xs mx-auto">
            Transportasi medis darurat berstandar dinas kesehatan.
        </p>
        <a href="#emergency"
           class="inline-flex items-center justify-center gap-1.5 bg-white font-bold text-[14px] py-2.5 px-6 rounded-xl shadow-md"
           style="color:#6B3F98">
            <i data-lucide="phone-call" style="width:14px;height:14px;stroke-width:2.5"></i>
            Pesan Ambulans
        </a>
    </section>

    {{-- ================================================================
         FOOTER (Simple & Clean White Theme)
         ================================================================ --}}
    <footer class="bg-white border-t border-slate-100 px-5 pt-8 pb-7 relative z-10">
        {{-- Brand Section --}}
        <div class="flex items-center gap-1.5 mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-9 h-9 object-contain flex-shrink-0">
            <p class="text-[16px] font-bold text-slate-800 leading-none tracking-widest uppercase">Ambulance</p>
        </div>

        {{-- Description --}}
        <p class="text-[14px] text-slate-500 leading-relaxed mb-5">
            Layanan transportasi medis sosial dan darurat terpercaya. Siaga 24 jam.
        </p>

        {{-- Contact Rows --}}
        <div class="space-y-2 text-[14px] text-slate-650 mb-6">
            <a href="tel:1500000" class="flex items-center gap-2 hover:text-[#6B3F98] transition-colors">
                <i data-lucide="phone" style="width:14px;height:14px;stroke-width:2" class="text-slate-400"></i>
                <span class="font-medium text-slate-700">Hotline:</span> 1500-XXX (Darurat)
            </a>
            <a href="https://wa.me/628123456789" target="_blank" class="flex items-center gap-2 hover:text-[#6B3F98] transition-colors">
                <i data-lucide="message-circle" style="width:14px;height:14px;stroke-width:2" class="text-slate-400"></i>
                <span class="font-medium text-slate-700">WhatsApp:</span> 0812-3456-789
            </a>
        </div>

        {{-- Minimalist Navigation Links --}}
        <div class="border-t border-slate-100 pt-4 mb-4 flex flex-wrap gap-x-3 gap-y-1.5 text-[14px] text-slate-400">
            <a href="#top" class="hover:text-[#6B3F98] transition-colors">Beranda</a>
            <span>·</span>
            <a href="#layanan" class="hover:text-[#6B3F98] transition-colors">Layanan</a>
            <span>·</span>
            <a href="#wilayah" class="hover:text-[#6B3F98] transition-colors">Wilayah</a>
            <span>·</span>
            <a href="#mitra" class="hover:text-[#6B3F98] transition-colors">Kemitraan</a>
            <span>·</span>
            <a href="/admin" class="hover:text-[#6B3F98] transition-colors font-medium text-slate-500">Admin</a>
        </div>

        {{-- Bottom Copyright --}}
        <div class="border-t border-slate-100 pt-4 flex flex-col gap-2">
            <div class="flex items-center gap-1.5 text-[12px] text-slate-450">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                <span>Unit Medis Berizin Resmi Dinkes</span>
            </div>
            <div class="flex items-center justify-between text-[12px] text-slate-400">
                <p>© {{ date('Y') }} Ambulans IK. All rights reserved.</p>
                <div class="flex gap-2">
                    <a href="#" class="hover:text-slate-600 transition-colors">Kebijakan</a>
                    <span>·</span>
                    <a href="#" class="hover:text-slate-600 transition-colors">Syarat</a>
                </div>
            </div>
        </div>
    </footer>

</div>
