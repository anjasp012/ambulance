<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    //
};
?>

<style>
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    .scrollbar-hide::-webkit-scrollbar { display: none; }
</style>

<div class="min-h-screen bg-slate-50 flex flex-col pb-10 text-slate-800 text-[14px] relative" id="top" x-data="{ activeTab: 'pengurus' }">

    {{-- ================================================================
         1. HEADER STICKY BAR
         ================================================================ --}}
    <header class="bg-white border-b border-slate-200/80 px-4 py-3.5 sticky top-0 z-40 flex items-center gap-3">
        <a href="/" wire:navigate class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center hover:bg-slate-100 transition-colors">
            <i data-lucide="chevron-left" style="width:18px;height:18px;stroke-width:2.5" class="text-slate-700"></i>
        </a>
        <div>
            <h1 class="text-[16px] font-bold text-slate-800 leading-tight">Tentang Kami</h1>
            <p class="text-[11px] text-slate-400">Profil Yayasan & Tim Medis Resmi</p>
        </div>
    </header>

    {{-- ================================================================
         2. HERO PROFILE SECTION
         ================================================================ --}}
    <section class="relative overflow-hidden py-8 px-5" style="background: linear-gradient(135deg, #2C1B39 0%, #3E458E 50%, #6B3F98 100%)">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full pointer-events-none" style="background:rgba(255,255,255,0.04);filter:blur(40px)"></div>
        <div class="absolute -bottom-6 -left-6 w-28 h-28 rounded-full pointer-events-none" style="background:rgba(192,69,127,0.12);filter:blur(40px)"></div>
        <div class="relative z-10 flex flex-col gap-2.5">
            <span class="text-[10px] font-extrabold tracking-widest uppercase leading-none" style="color:#D4AAFF">Profil Yayasan</span>
            <h2 class="text-white font-bold leading-tight" style="font-size:18px">Dedikasi Kemanusiaan & Penyelamatan Darurat</h2>
            <p class="text-[13px] leading-relaxed" style="color:rgba(255,255,255,0.72)">
                Sejak 2015, Ambulans Inisiatif Kebaikan hadir untuk menyediakan transportasi medis darurat yang andal, aman, dan siaga 24 jam.
            </p>
        </div>
    </section>

    {{-- ================================================================
         3. SEJARAH & TIMELINE
         ================================================================ --}}
    <section class="bg-white px-4 py-6 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-4">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Sejarah Perjalanan</h3>
        </div>

        <p class="text-[13px] text-slate-500 leading-relaxed mb-5">
            Berawal dari keprihatinan atas sulitnya akses ambulans yang cepat dan terjangkau bagi masyarakat Bandung, kami merintis gerakan ini dengan satu armada kecil.
        </p>

        {{-- Vertical Timeline --}}
        <div class="relative pl-5 space-y-5 border-l border-slate-200 ml-2">
            @php
                $timeline = [
                    ['year' => '2015', 'title' => 'Awal Berdiri', 'desc' => 'Didirikan secara swadaya di Kota Bandung dengan 1 unit armada sosial pertama.'],
                    ['year' => '2018', 'title' => 'Pengembangan Medis', 'desc' => 'Mulai menyertakan tim perawat tersertifikasi BTCLS/PPGD dan menambah unit darurat.'],
                    ['year' => '2021', 'title' => 'Izin Resmi Dinkes', 'desc' => 'Menerima legalitas operasional resmi dan memperluas kemitraan ke 50+ Rumah Sakit.'],
                    ['year' => '2025', 'title' => 'Era Digital & Jawa-Bali', 'desc' => 'Mengintegrasikan GPS real-time, standar waktu respon 8 menit, dan perluasan rute se-Jawa Bali.'],
                ];
            @endphp
            @foreach ($timeline as $t)
                <div class="relative">
                    {{-- Dot --}}
                    <div class="absolute -left-[26px] top-1.5 w-3 h-3 rounded-full bg-[#6B3F98] border border-white shadow shadow-[#6B3F98]/50"></div>
                    <div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-[12px] font-bold text-[#C0457F] bg-[#C0457F]/5 px-2 py-0.5 rounded-md border border-[#C0457F]/10">{{ $t['year'] }}</span>
                            <h4 class="text-[13.5px] font-bold text-slate-800">{{ $t['title'] }}</h4>
                        </div>
                        <p class="text-[12px] text-slate-500 mt-1 leading-relaxed">{{ $t['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================================================================
         4. VISI & MISI
         ================================================================ --}}
    <section class="bg-slate-50/50 px-4 py-6 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-4.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Visi & Misi</h3>
        </div>

        <div class="space-y-3.5">
            {{-- Visi Card --}}
            <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-[#3154B8]/5 rounded-bl-full flex items-center justify-center">
                    <i data-lucide="eye" style="width:16px;height:16px" class="text-[#3154B8] translate-x-2 -translate-y-2"></i>
                </div>
                <h4 class="text-[12px] font-bold text-[#3154B8] uppercase tracking-wider mb-1">Visi Kami</h4>
                <p class="text-[13px] text-slate-700 leading-relaxed font-medium">
                    Menjadi jaringan pelayanan transportasi medis sosial dan darurat terdepan di Indonesia yang cepat tanggap, profesional, dan tepercaya.
                </p>
            </div>

            {{-- Misi Card --}}
            <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-[#C0457F]/5 rounded-bl-full flex items-center justify-center">
                    <i data-lucide="target" style="width:16px;height:16px" class="text-[#C0457F] translate-x-2 -translate-y-2"></i>
                </div>
                <h4 class="text-[12px] font-bold text-[#C0457F] uppercase tracking-wider mb-2">Misi Kami</h4>
                <ul class="space-y-2.5">
                    @php
                        $misi = [
                            'Menyediakan ambulans respons cepat 24 jam dengan standar dispersi rute tercepat.',
                            'Memelihara armada medis agar tetap steril, higienis, dan dilengkapi peralatan penunjang hidup darurat.',
                            'Membekali perawat dan supir medis dengan sertifikasi BTCLS/PPGD resmi.',
                            'Mengembangkan program kemitraan bantuan sosial bagi pasien kurang mampu.'
                        ];
                    @endphp
                    @foreach ($misi as $m)
                        <li class="flex items-start gap-2 text-[12.5px] text-slate-650 leading-relaxed">
                            <i data-lucide="check" style="width:14px;height:14px;stroke-width:3" class="text-emerald-500 mt-0.5 flex-shrink-0"></i>
                            <span>{{ $m }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ================================================================
         5. NILAI PERUSAHAAN (COMPANY VALUES)
         ================================================================ --}}
    <section class="bg-white px-4 py-6 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-4">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Nilai Perusahaan</h3>
        </div>

        <div class="grid grid-cols-2 gap-2.5">
            @php
                $values = [
                    ['lucide' => 'shield-check', 'title' => 'Integrity', 'desc' => 'Jujur, akuntabel, dan transparan dalam penentuan tarif sosial.'],
                    ['lucide' => 'award',        'title' => 'Professional', 'desc' => 'Tindakan medis sesuai prosedur baku & sertifikat dinkes.'],
                    ['lucide' => 'heart',        'title' => 'Compassion', 'desc' => 'Melayani dengan kepedulian tulus dan penuh kasih sayang.'],
                    ['lucide' => 'zap',          'title' => 'Fast Response', 'desc' => 'Menghargai waktu demi keselamatan pasien darurat.'],
                    ['lucide' => 'activity',     'title' => 'Safety First', 'desc' => 'Mengutamakan keselamatan berkendara di jalan raya.'],
                    ['lucide' => 'sparkles',     'title' => 'Innovation', 'desc' => 'Terus mengadopsi standar sterilisasi medis modern.'],
                ];
            @endphp
            @foreach ($values as $val)
                <div class="p-3 rounded-xl border border-slate-100 bg-slate-50/30 flex flex-col gap-1.5">
                    <div class="w-7 h-7 rounded-lg bg-[#6B3F98]/5 flex items-center justify-center text-[#6B3F98]">
                        <i data-lucide="{{ $val['lucide'] }}" style="width:15px;height:15px;stroke-width:2.2"></i>
                    </div>
                    <h4 class="text-[13px] font-bold text-slate-800">{{ $val['title'] }}</h4>
                    <p class="text-[11.5px] text-slate-500 leading-normal">{{ $val['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================================================================
         6. LEGALITAS (LEGAL DOCUMENTS)
         ================================================================ --}}
    <section class="bg-slate-50/50 px-4 py-6 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-2.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Legalitas Resmi</h3>
        </div>
        <p class="text-[12.5px] text-slate-500 leading-relaxed mb-4">
            Yayasan kami beroperasi resmi dengan dokumen perizinan negara dan izin dari dinas kesehatan daerah.
        </p>

        <div class="space-y-2">
            @php
                $docs = [
                    ['title' => 'Yayasan Inisiatif Kebaikan', 'sub' => 'Kemenkumham AHU-0012345.AH.01.04', 'icon' => 'building'],
                    ['title' => 'Nomor Induk Berusaha (NIB)', 'sub' => '9120301234567 - OSS RI', 'icon' => 'file-text'],
                    ['title' => 'Nomor Pokok Wajib Pajak (NPWP)', 'sub' => '81.234.567.8-423.000', 'icon' => 'credit-card'],
                    ['title' => 'Izin Operasional Ambulans', 'sub' => 'Rekomendasi Dinas Kesehatan No. 440/123', 'icon' => 'shield-check'],
                ];
            @endphp
            @foreach ($docs as $d)
                <div class="bg-white p-3 rounded-xl border border-slate-100 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 flex-shrink-0">
                            <i data-lucide="{{ $d['icon'] }}" style="width:15px;height:15px"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[12.5px] font-bold text-slate-800 truncate">{{ $d['title'] }}</p>
                            <p class="text-[11px] text-slate-400 mt-0.5 truncate">{{ $d['sub'] }}</p>
                        </div>
                    </div>
                    <span class="text-[9.5px] font-extrabold text-emerald-600 bg-emerald-50 border border-emerald-100 rounded-full px-2 py-0.5 flex-shrink-0">Aktif</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================================================================
         7. TIM & STRUKTUR ORGANISASI
         ================================================================ --}}
    <section class="bg-white px-4 py-6 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-2.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Struktur Organisasi</h3>
        </div>
        
        {{-- Tab Headers --}}
        <div class="flex gap-1.5 border-b border-slate-100 pb-2.5 mb-4 overflow-x-auto scrollbar-hide">
            <button @click="activeTab = 'pengurus'" 
                    class="px-3.5 py-1.5 rounded-lg text-[12px] font-bold border transition-all flex-shrink-0"
                    :class="activeTab === 'pengurus' ? 'bg-[#6B3F98] text-white border-[#6B3F98]' : 'bg-slate-50 text-slate-500 border-slate-200/60'">
                Pengurus Utama
            </button>
            <button @click="activeTab = 'manajemen'" 
                    class="px-3.5 py-1.5 rounded-lg text-[12px] font-bold border transition-all flex-shrink-0"
                    :class="activeTab === 'manajemen' ? 'bg-[#6B3F98] text-white border-[#6B3F98]' : 'bg-slate-50 text-slate-500 border-slate-200/60'">
                Manajemen
            </button>
            <button @click="activeTab = 'medis'" 
                    class="px-3.5 py-1.5 rounded-lg text-[12px] font-bold border transition-all flex-shrink-0"
                    :class="activeTab === 'medis' ? 'bg-[#6B3F98] text-white border-[#6B3F98]' : 'bg-slate-50 text-slate-500 border-slate-200/60'">
                Tim Medis
            </button>
            <button @click="activeTab = 'operasional'" 
                    class="px-3.5 py-1.5 rounded-lg text-[12px] font-bold border transition-all flex-shrink-0"
                    :class="activeTab === 'operasional' ? 'bg-[#6B3F98] text-white border-[#6B3F98]' : 'bg-slate-50 text-slate-500 border-slate-200/60'">
                Tim Lapangan
            </button>
        </div>

        {{-- Tab Content: Pengurus --}}
        <div x-show="activeTab === 'pengurus'" class="space-y-2">
            @php
                $board = [
                    ['name' => 'H. M. Ridwan, M.Si', 'role' => 'Pembina Yayasan', 'initial' => 'R', 'color' => 'bg-amber-500'],
                    ['name' => 'Dr. Hendra Gunawan, Sp.An', 'role' => 'Ketua Pengurus & Penasihat Medis', 'initial' => 'H', 'color' => 'bg-[#3154B8]'],
                ];
            @endphp
            @foreach ($board as $member)
                <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-100/80 bg-slate-50/10">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold {{ $member['color'] }} flex-shrink-0">
                        {{ $member['initial'] }}
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-slate-800">{{ $member['name'] }}</p>
                        <p class="text-[11.5px] text-slate-400 font-medium">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tab Content: Manajemen --}}
        <div x-show="activeTab === 'manajemen'" x-cloak class="space-y-2">
            @php
                $manajemen = [
                    ['name' => 'Aditya Pratama', 'role' => 'Kepala Operasional Medis', 'initial' => 'A', 'color' => 'bg-[#C0457F]'],
                    ['name' => 'Siti Rahmawati', 'role' => 'Koordinator Admin & Call Center', 'initial' => 'S', 'color' => 'bg-[#6B3F98]'],
                ];
            @endphp
            @foreach ($manajemen as $member)
                <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-100/80 bg-slate-50/10">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold {{ $member['color'] }} flex-shrink-0">
                        {{ $member['initial'] }}
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-slate-800">{{ $member['name'] }}</p>
                        <p class="text-[11.5px] text-slate-400 font-medium">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tab Content: Tim Medis --}}
        <div x-show="activeTab === 'medis'" x-cloak class="space-y-2">
            @php
                $medis = [
                    ['name' => 'dr. Fauzi Ahmad', 'role' => 'Dokter Konsultan Gawat Darurat', 'initial' => 'F', 'color' => 'bg-[#10B981]'],
                    ['name' => 'Ns. Budi Santoso, S.Kep', 'role' => 'Kepala Paramedis (BTCLS/PPGD)', 'initial' => 'B', 'color' => 'bg-[#3B82F6]'],
                ];
            @endphp
            @foreach ($medis as $member)
                <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-100/80 bg-slate-50/10">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold {{ $member['color'] }} flex-shrink-0">
                        {{ $member['initial'] }}
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-slate-800">{{ $member['name'] }}</p>
                        <p class="text-[11.5px] text-slate-400 font-medium">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tab Content: Tim Lapangan --}}
        <div x-show="activeTab === 'operasional'" x-cloak class="space-y-2">
            @php
                $op = [
                    ['name' => 'Ahmad Yani', 'role' => 'Koordinator Driver & Logistik', 'initial' => 'Y', 'color' => 'bg-indigo-500'],
                    ['name' => 'Rian Hidayat', 'role' => 'Driver Paramedis Bersertifikat', 'initial' => 'R', 'color' => 'bg-purple-500'],
                ];
            @endphp
            @foreach ($op as $member)
                <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-100/80 bg-slate-50/10">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold {{ $member['color'] }} flex-shrink-0">
                        {{ $member['initial'] }}
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-slate-800">{{ $member['name'] }}</p>
                        <p class="text-[11.5px] text-slate-400 font-medium">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================================================================
         8. BUDAYA KERJA
         ================================================================ --}}
    <section class="bg-slate-50/50 px-4 py-6 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-3.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Budaya Pelayanan Kami</h3>
        </div>

        <div class="space-y-3">
            @php
                $culture = [
                    ['title' => 'Keramahan Tanpa Batas', 'desc' => 'Menerapkan 3S (Senyum, Sapa, Salam) untuk memberikan ketenangan pikiran bagi keluarga pasien.'],
                    ['title' => 'Sterilisasi Disiplin', 'desc' => 'Semua unit medis wajib disterilkan secara menyeluruh sesaat setelah menyelesaikan penugasan.'],
                    ['title' => 'Presisi Waktu & Navigasi', 'desc' => 'Driver memanfaatkan rute terintegrasi GPS secara presisi demi meminimalkan keterlambatan waktu jemput.'],
                ];
            @endphp
            @foreach ($culture as $c)
                <div class="flex gap-3">
                    <div class="w-1.5 h-1.5 rounded-full bg-[#C0457F] mt-2 flex-shrink-0"></div>
                    <div>
                        <h4 class="text-[13.5px] font-bold text-slate-800 leading-tight">{{ $c['title'] }}</h4>
                        <p class="text-[12.5px] text-slate-500 mt-1 leading-relaxed">{{ $c['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================================================================
         9. GALERI INTERAKTIF (FOTO & VIDEO)
         ================================================================ --}}
    <section class="bg-white px-4 py-6">
        <div class="flex items-center gap-1.5 mb-3.5">
            <div class="w-1 h-3.5 rounded-full bg-gradient-to-b from-[#3154B8] to-[#C0457F]"></div>
            <h3 class="text-[14px] font-bold text-slate-800 uppercase tracking-wide">Galeri Armada & Kegiatan</h3>
        </div>

        {{-- Video Profil Mock Frame --}}
        <div class="rounded-xl overflow-hidden relative mb-4 h-36 bg-slate-900 border border-slate-100">
            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=600&fit=crop" 
                 alt="Medical team" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 flex flex-col justify-between p-3.5 bg-gradient-to-t from-black/80 via-black/30 to-transparent">
                <span class="text-[9.5px] font-extrabold text-[#D4AAFF] uppercase tracking-widest leading-none">Video Profil Resmi</span>
                <div class="flex items-center justify-between w-full">
                    <p class="text-white text-[12.5px] font-bold leading-snug">"Dedikasi Kemanusiaan 24 Jam Nonstop"</p>
                    <button class="w-9 h-9 rounded-full bg-white text-[#6B3F98] flex items-center justify-center shadow-lg transition-transform hover:scale-105">
                        <i data-lucide="play" style="width:16px;height:16px;fill:currentColor" class="ml-0.5 text-[#6B3F98]"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Photos Grid --}}
        <div class="grid grid-cols-2 gap-2">
            <div class="rounded-xl overflow-hidden border border-slate-100 relative h-24">
                <img src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?q=80&w=300" alt="Kegiatan Medis" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-2">
                    <span class="text-[10px] font-semibold text-white leading-none">Aksi Siaga Medis</span>
                </div>
            </div>
            <div class="rounded-xl overflow-hidden border border-slate-100 relative h-24">
                <img src="https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=300" alt="Unit Medis" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-2">
                    <span class="text-[10px] font-semibold text-white leading-none">Armada Ambulans</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         10. SIMPLE FOOTER
         ================================================================ --}}
    <footer class="bg-white border-t border-slate-150 px-5 py-6 text-center text-slate-400 text-[12.5px]">
        <p>© {{ date('Y') }} Ambulans IK. All rights reserved.</p>
        <p class="text-[10.5px] text-slate-350 mt-1">Layanan Transportasi Medis Kemanusiaan Terintegrasi</p>
    </footer>

</div>
