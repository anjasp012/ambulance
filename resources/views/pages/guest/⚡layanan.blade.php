<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    //
};
?>

<div class="min-h-screen bg-slate-50 flex flex-col pb-28 text-slate-800 text-[14px] relative"
     id="top"
     x-data="{ activeFilter: 'semua' }">

    {{-- ================================================================
         1. HEADER STICKY
         ================================================================ --}}
    <header class="bg-white border-b border-slate-200/80 px-4 py-3.5 sticky top-0 z-40 flex items-center gap-3">
        <a href="/" wire:navigate class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center hover:bg-slate-100 transition-colors flex-shrink-0">
            <i data-lucide="chevron-left" style="width:18px;height:18px;stroke-width:2.5" class="text-slate-700"></i>
        </a>
        <div class="flex-1 min-w-0">
            <h1 class="text-[16px] font-bold text-slate-800 leading-tight">Layanan Kami</h1>
            <p class="text-[11px] text-slate-400">10 kategori layanan medis profesional</p>
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
            <span class="text-[10px] font-extrabold tracking-widest uppercase" style="color:#D4AAFF">Transportasi Medis</span>
            <h2 class="text-white font-bold mt-1 leading-snug" style="font-size:19px">Semua Layanan<br>di Satu Tempat</h2>
            <p class="text-[13px] mt-2 leading-relaxed" style="color:rgba(255,255,255,0.72)">
                Siaga 24 jam — dari ambulans darurat, rawat jalan, ICU mobile, hingga home care dan medical escort.
            </p>
            <div class="flex gap-5 mt-4">
                <div><p class="text-white font-extrabold leading-none" style="font-size:17px">10+</p><p class="text-[10px] mt-0.5" style="color:rgba(255,255,255,0.55)">Kategori</p></div>
                <div><p class="text-white font-extrabold leading-none" style="font-size:17px">50+</p><p class="text-[10px] mt-0.5" style="color:rgba(255,255,255,0.55)">Mitra RS</p></div>
                <div><p class="text-white font-extrabold leading-none" style="font-size:17px">24/7</p><p class="text-[10px] mt-0.5" style="color:rgba(255,255,255,0.55)">Siaga</p></div>
            </div>
        </div>
    </div>

    {{-- ================================================================
         3. FILTER CHIPS
         ================================================================ --}}
    <div class="bg-white border-b border-slate-100 sticky top-[61px] z-30">
        <div class="flex gap-2 px-4 py-3 overflow-x-auto scrollbar-hide">
            @php
                $chips = [
                    ['key'=>'semua',       'label'=>'Semua',       'icon'=>'grid-2x2'],
                    ['key'=>'darurat',     'label'=>'Darurat',     'icon'=>'siren'],
                    ['key'=>'rawat-jalan', 'label'=>'Rawat Jalan', 'icon'=>'stethoscope'],
                    ['key'=>'icu',         'label'=>'ICU/NICU',    'icon'=>'activity'],
                    ['key'=>'jenazah',     'label'=>'Jenazah',     'icon'=>'cross'],
                    ['key'=>'homecare',    'label'=>'Home Care',   'icon'=>'house'],
                    ['key'=>'escort',      'label'=>'Escort',      'icon'=>'shield-check'],
                    ['key'=>'event',       'label'=>'Standby',     'icon'=>'calendar-check'],
                    ['key'=>'rental',      'label'=>'Rental',      'icon'=>'truck'],
                    ['key'=>'corporate',   'label'=>'Corporate',   'icon'=>'briefcase'],
                ];
            @endphp
            @foreach($chips as $chip)
                <button @click="activeFilter = '{{ $chip['key'] }}'"
                        class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[12px] font-medium border whitespace-nowrap flex-shrink-0 transition-all"
                        :class="activeFilter === '{{ $chip['key'] }}'
                            ? 'bg-[#6B3F98] text-white border-[#6B3F98] shadow-sm'
                            : 'bg-white text-slate-500 border-slate-200'">
                    <i data-lucide="{{ $chip['icon'] }}" style="width:12px;height:12px;stroke-width:2.5"></i>
                    {{ $chip['label'] }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- ================================================================
         4. SERVICE CARDS
         ================================================================ --}}
    <div class="flex flex-col flex-1">

        @php
            $services = [
                [
                    'key'   => 'rawat-jalan',
                    'icon'  => 'stethoscope',
                    'color' => '#3154B8',
                    'bg'    => 'rgba(49,84,184,0.08)',
                    'badge' => 'Terjangkau',
                    'title' => 'Ambulans Rawat Jalan',
                    'desc'  => 'Transportasi medis terencana untuk kontrol rutin, kemoterapi, hemodialisa, dan pemeriksaan lanjutan di rumah sakit.',
                    'items' => ['Kontrol & Rawat Jalan','Kemoterapi','Hemodialisa','Radioterapi','Medical Check Up'],
                    'avail' => '07.00 – 21.00',
                    'cta'   => 'Pesan Sekarang',
                ],
                [
                    'key'   => 'darurat',
                    'icon'  => 'siren',
                    'color' => '#DC2626',
                    'bg'    => 'rgba(220,38,38,0.08)',
                    'badge' => 'Prioritas 24 Jam',
                    'title' => 'Ambulans Emergency',
                    'desc'  => 'Respons cepat untuk kondisi darurat medis. Target waktu jemput ≤ 8 menit di wilayah Bandung Raya.',
                    'items' => ['Kecelakaan Lalu Lintas','Stroke & TIA','Serangan Jantung','Sesak Napas Akut','Trauma & Luka Berat'],
                    'avail' => '24 Jam Non-stop',
                    'cta'   => 'Hubungi Sekarang',
                ],
                [
                    'key'   => 'icu',
                    'icon'  => 'activity',
                    'color' => '#6B3F98',
                    'bg'    => 'rgba(107,63,152,0.08)',
                    'badge' => 'ICU Mobile',
                    'title' => 'Ambulans ICU',
                    'desc'  => 'Transport pasien kritis antar rumah sakit dengan peralatan ICU lengkap dan paramedis BTCLS/PPGD.',
                    'items' => ['Transport Pasien Kritis','Ventilator Portable','Monitor Multi-parameter','Infus Pump','Syringe Pump'],
                    'avail' => '24 Jam Non-stop',
                    'cta'   => 'Konsultasi Dulu',
                ],
                [
                    'key'   => 'icu',
                    'icon'  => 'baby',
                    'color' => '#0891B2',
                    'bg'    => 'rgba(8,145,178,0.08)',
                    'badge' => 'Neonatal',
                    'title' => 'Ambulans NICU',
                    'desc'  => 'Khusus transport bayi baru lahir dan neonatal kritis dengan inkubator transport berteknologi tinggi.',
                    'items' => ['Transport Bayi Prematur','Inkubator Transport','Monitor Neonatal','Oksigen Mikro','Tim Perawat Neonatal'],
                    'avail' => '24 Jam Non-stop',
                    'cta'   => 'Hubungi Sekarang',
                ],
                [
                    'key'   => 'jenazah',
                    'icon'  => 'cross',
                    'color' => '#64748B',
                    'bg'    => 'rgba(100,116,139,0.08)',
                    'badge' => 'Bermartabat',
                    'title' => 'Ambulans Jenazah',
                    'desc'  => 'Layanan pemindahan jenazah dengan penuh kehormatan, higienis, dan profesional ke seluruh wilayah.',
                    'items' => ['Dalam Kota','Luar Kota','Antar Provinsi','Repatriasi Internasional','Pengawalan Khusus'],
                    'avail' => '24 Jam Non-stop',
                    'cta'   => 'Hubungi Kami',
                ],
                [
                    'key'   => 'homecare',
                    'icon'  => 'house',
                    'color' => '#059669',
                    'bg'    => 'rgba(5,150,105,0.08)',
                    'badge' => 'Ke Rumah Anda',
                    'title' => 'Home Care',
                    'desc'  => 'Tim medis profesional hadir ke rumah Anda untuk perawatan kesehatan harian maupun pasca operasi.',
                    'items' => ['Dokter Kunjungan','Perawat Profesional','Fisioterapi','Perawatan Luka','Pemasangan Kateter','Perawatan Lansia','Sunat','Laboratorium Mobile'],
                    'avail' => '07.00 – 22.00',
                    'cta'   => 'Jadwalkan Kunjungan',
                ],
                [
                    'key'   => 'escort',
                    'icon'  => 'shield-check',
                    'color' => '#C0457F',
                    'bg'    => 'rgba(192,69,127,0.08)',
                    'badge' => 'Premium',
                    'title' => 'Medical Escort',
                    'desc'  => 'Pendampingan medis profesional selama perjalanan jarak jauh menggunakan transportasi umum.',
                    'items' => ['Pendamping Pasien','Perjalanan Bandara','Kereta Api','Penerbangan Domestik/Int\'l','Laporan Medis Perjalanan'],
                    'avail' => 'Sesuai Jadwal',
                    'cta'   => 'Jadwalkan',
                ],
                [
                    'key'   => 'event',
                    'icon'  => 'calendar-check',
                    'color' => '#D97706',
                    'bg'    => 'rgba(217,119,6,0.08)',
                    'badge' => 'Siaga Event',
                    'title' => 'Standby Event',
                    'desc'  => 'Ambulans dan tim medis siaga di lokasi acara besar untuk penanganan kondisi darurat.',
                    'items' => ['Konser & Festival','Marathon & Triathlon','Seminar & Pameran','Pertandingan Olahraga','Acara Pemerintahan'],
                    'avail' => 'Sesuai Event',
                    'cta'   => 'Minta Penawaran',
                ],
                [
                    'key'   => 'rental',
                    'icon'  => 'truck',
                    'color' => '#7C3AED',
                    'bg'    => 'rgba(124,58,237,0.08)',
                    'badge' => 'Kontrak',
                    'title' => 'Rental Ambulans',
                    'desc'  => 'Sewa ambulans terjadwal untuk kebutuhan jangka menengah hingga panjang bagi institusi dan perusahaan.',
                    'items' => ['Sewa Bulanan','Sewa Tahunan','Untuk Perusahaan','Untuk Rumah Sakit','Paket Termasuk Driver Medis'],
                    'avail' => 'Fleksibel',
                    'cta'   => 'Minta Penawaran',
                ],
                [
                    'key'   => 'corporate',
                    'icon'  => 'briefcase',
                    'color' => '#83316B',
                    'bg'    => 'rgba(131,49,107,0.08)',
                    'badge' => 'B2B',
                    'title' => 'Layanan Corporate',
                    'desc'  => 'Solusi kesehatan korporat komprehensif untuk perusahaan, pabrik, dan institusi dengan perjanjian kerjasama.',
                    'items' => ['Medical Check Up Massal','Ambulans Standby Pabrik','Emergency Response Plan','Klinik Perusahaan Support'],
                    'avail' => 'Sesuai Kontrak',
                    'cta'   => 'Hubungi Sales',
                ],
            ];
        @endphp

        @foreach($services as $svc)
        <div x-show="activeFilter === 'semua' || activeFilter === '{{ $svc['key'] }}'"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white border-b border-slate-100">
            <div class="px-4 py-5">

                {{-- Card Header --}}
                <div class="flex items-start gap-3.5 mb-3">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0"
                         style="background:{{ $svc['bg'] }}; color:{{ $svc['color'] }}">
                        <i data-lucide="{{ $svc['icon'] }}" style="width:20px;height:20px;stroke-width:2"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-[14.5px] font-bold text-slate-800 leading-tight mb-1">{{ $svc['title'] }}</h3>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-[10px] font-extrabold uppercase tracking-wide px-2 py-0.5 rounded-full"
                                  style="background:{{ $svc['bg'] }}; color:{{ $svc['color'] }}">
                                {{ $svc['badge'] }}
                            </span>
                            <span class="flex items-center gap-1 text-[11px] text-slate-400">
                                <i data-lucide="clock" style="width:10px;height:10px;stroke-width:2.5"></i>
                                {{ $svc['avail'] }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-[13px] text-slate-500 leading-relaxed mb-3">{{ $svc['desc'] }}</p>

                {{-- Sub-service Pills --}}
                <div class="flex flex-wrap gap-1.5 mb-4">
                    @foreach($svc['items'] as $item)
                        <span class="text-[11.5px] font-medium px-2.5 py-1 rounded-lg"
                              style="background:{{ $svc['bg'] }}; color:{{ $svc['color'] }}">
                            {{ $item }}
                        </span>
                    @endforeach
                </div>

                {{-- CTA Buttons --}}
                <div class="flex items-center gap-2">
                    <a href="tel:08123456789"
                       class="flex-1 flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-[13px] font-bold text-white active:scale-95 transition-transform"
                       style="background: {{ $svc['color'] }}">
                        <i data-lucide="phone-call" style="width:13px;height:13px;stroke-width:2.5"></i>
                        {{ $svc['cta'] }}
                    </a>
                    <a href="https://wa.me/628123456789"
                       target="_blank"
                       class="w-10 h-10 rounded-xl flex items-center justify-center border border-slate-200 bg-slate-50 text-slate-400 hover:bg-green-50 hover:text-green-600 hover:border-green-200 transition-colors">
                        <i data-lucide="message-circle" style="width:16px;height:16px;stroke-width:2"></i>
                    </a>
                </div>

            </div>
        </div>
        @endforeach

    </div>

    {{-- ================================================================
         5. EMERGENCY BANNER
         ================================================================ --}}
    <div class="mx-4 my-5 rounded-2xl overflow-hidden" style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%)">
        <div class="p-4 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="siren" style="width:18px;height:18px;stroke-width:2" class="text-white"></i>
                </div>
                <div>
                    <p class="text-white font-bold text-[14px] leading-tight">Darurat Medis?</p>
                    <p class="text-red-200 text-[11.5px]">Respon ≤ 8 menit · Siaga 24 Jam</p>
                </div>
            </div>
            <a href="tel:08123456789"
               class="flex-shrink-0 bg-white text-red-600 font-extrabold text-[12px] px-4 py-2 rounded-xl shadow-sm active:scale-95 transition-transform">
                PANGGIL
            </a>
        </div>
    </div>

</div>
