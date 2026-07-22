<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    // Livewire container layout
};
?>

<div class="min-h-screen bg-slate-50 flex flex-col pb-12 text-slate-800 text-[14px]"
     id="top"
     x-data="{
        pickup: 'RSUP Dr. Hasan Sadikin, Bandung',
        destination: 'RS Al Islam Bandung',
        type: 'emergency',
        condition: 'kritis',
        oxygen: 'ya',
        crew: 'perawat',

        // Fleet Pricing Database
        types: {
            'standar':   { label: 'Ambulans Standar',   desc: 'Kontrol & Rawat Jalan',       base: 250000, perKm: 12000, color: '#3154B8' },
            'emergency': { label: 'Ambulans Emergency', desc: 'Prioritas Gawat Darurat',     base: 450000, perKm: 15000, color: '#DC2626', badge: 'Rekomendasi' },
            'icu':       { label: 'Ambulans ICU Mobile',desc: 'Ventilator & Pasien Kritis',  base: 850000, perKm: 20000, color: '#6B3F98' },
            'nicu':      { label: 'Ambulans NICU',      desc: 'Bayi & Inkubator Transport',  base: 950000, perKm: 22000, color: '#0891B2' },
            'jenazah':   { label: 'Ambulans Jenazah',   desc: 'Layanan Pemindahan Duka',     base: 400000, perKm: 14000, color: '#64748B' },
            'event':     { label: 'Standby Event',      desc: 'Siaga Acara & Marathon',      base: 1200000,perKm: 0,     color: '#D97706' }
        },

        // Patient Condition Pricing
        conditions: {
            'stabil':     { label: 'Stabil / Kontrol',   fee: 0,      desc: 'Pasien sadar & stabil' },
            'pengawasan': { label: 'Perlu Pengawasan',   fee: 50000,  desc: 'Butuh pemantauan vital' },
            'kritis':     { label: 'Pasien Kritis',       fee: 150000, desc: 'Butuh tindakan intensif' },
            'non':        { label: 'Non-Pasien / Jenazah', fee: 0,    desc: 'Layanan pemindahan' }
        },

        // Medical Crew Options
        crews: {
            'driver':  { label: 'Driver Saja',               fee: 0,      desc: 'Pengemudi ambulans' },
            'perawat': { label: 'Driver + Perawat BTCLS',     fee: 150000, desc: 'Paramedis tersertifikasi', badge: 'Populer' },
            'dokter':  { label: 'Driver + Dokter & Perawat',  fee: 350000, desc: 'Tim medis lengkap' }
        },

        // Helper calculations
        get distanceKm() {
            let pLen = (this.pickup || '').length;
            let dLen = (this.destination || '').length;
            return Math.max(4.5, Math.round((pLen + dLen) * 0.26 * 10) / 10);
        },

        get durationMins() {
            return Math.max(12, Math.round(this.distanceKm * 2.2));
        },

        get tollFee() {
            return this.distanceKm > 10 ? 14000 : 0;
        },

        get etaMins() {
            return 8;
        },

        get selectedType() {
            return this.types[this.type] || this.types['emergency'];
        },

        get selectedCond() {
            return this.conditions[this.condition] || this.conditions['stabil'];
        },

        get selectedCrew() {
            return this.crews[this.crew] || this.crews['perawat'];
        },

        get oxygenFee() {
            return this.oxygen === 'ya' ? 100000 : 0;
        },

        get baseFare() {
            return this.selectedType.base || 0;
        },

        get distFare() {
            return Math.round(this.distanceKm * (this.selectedType.perKm || 0));
        },

        get totalFare() {
            return this.baseFare + this.distFare + this.selectedCond.fee + this.oxygenFee + this.selectedCrew.fee + this.tollFee;
        },

        get waLink() {
            let text = `*PEMESANAN AMBULANS INISIATIF KEBAIKAN*%0A`
                + `------------------------------------%0A`
                + `📍 *Alamat Jemput:* ${encodeURIComponent(this.pickup)}%0A`
                + `🏁 *Alamat Tujuan:* ${encodeURIComponent(this.destination)}%0A%0A`
                + `🚑 *Jenis Unit:* ${encodeURIComponent(this.selectedType.label)}%0A`
                + `🏥 *Kondisi Pasien:* ${encodeURIComponent(this.selectedCond.label)}%0A`
                + `🫁 *Oksigen Medis:* ${this.oxygen === 'ya' ? 'Ya (Butuh Oksigen)' : 'Tidak'}%0A`
                + `👨‍⚕️ *Tim Medis:* ${encodeURIComponent(this.selectedCrew.label)}%0A`
                + `------------------------------------%0A`
                + `📍 *Est. Jarak:* ${this.distanceKm} km%0A`
                + `⏱️ *Est. Waktu Jalan:* ${this.durationMins} menit%0A`
                + `🚨 *Est. Kedatangan Unit:* ±${this.etaMins} menit%0A`
                + `💰 *ESTIMASI TOTAL:* Rp ${this.totalFare.toLocaleString('id-ID')}`;
            return `https://wa.me/628123456789?text=${text}`;
        },

        showMapPicker: false,
        pickerTarget: 'pickup',
        pickerTitle: 'Pilih Titik di Peta',
        pickerLat: -6.8906,
        pickerLng: 107.6106,
        mapInstance: null,
        markerInstance: null,
        isGpsLoading: false,

        openMapPicker(target) {
            this.pickerTarget = target;
            this.pickerTitle = target === 'pickup' ? 'Pilih Titik Penjemputan di Peta' : 'Pilih Titik Tujuan di Peta';
            this.showMapPicker = true;
            
            this.$nextTick(() => {
                if (typeof L === 'undefined') return;
                
                let initialLat = target === 'pickup' ? -6.8906 : -6.9315;
                let initialLng = target === 'pickup' ? 107.6106 : 107.6590;

                if (!this.mapInstance) {
                    this.mapInstance = L.map('leaflet-picker-canvas').setView([initialLat, initialLng], 14);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(this.mapInstance);

                    this.markerInstance = L.marker([initialLat, initialLng], { draggable: true }).addTo(this.mapInstance);
                    this.pickerLat = initialLat.toFixed(5);
                    this.pickerLng = initialLng.toFixed(5);

                    this.markerInstance.on('dragend', (e) => {
                        let pos = e.target.getLatLng();
                        this.pickerLat = pos.lat.toFixed(5);
                        this.pickerLng = pos.lng.toFixed(5);
                    });

                    this.mapInstance.on('click', (e) => {
                        this.markerInstance.setLatLng(e.latlng);
                        this.pickerLat = e.latlng.lat.toFixed(5);
                        this.pickerLng = e.latlng.lng.toFixed(5);
                    });
                } else {
                    this.mapInstance.setView([initialLat, initialLng], 14);
                    this.markerInstance.setLatLng([initialLat, initialLng]);
                    this.pickerLat = initialLat.toFixed(5);
                    this.pickerLng = initialLng.toFixed(5);
                    setTimeout(() => { this.mapInstance.invalidateSize(); }, 250);
                }
            });
        },

        confirmMapPicker() {
            let label = `Koordinat Peta (${this.pickerLat}, ${this.pickerLng})`;
            if (this.pickerTarget === 'pickup') {
                this.pickup = label;
            } else {
                this.destination = label;
            }
            this.showMapPicker = false;
        },

        getGpsLocation() {
            if (!navigator.geolocation) {
                alert('Browser Anda tidak mendukung lokasi GPS');
                return;
            }
            this.isGpsLoading = true;
            navigator.geolocation.getCurrentPosition(
                (pos) => {
                    this.isGpsLoading = false;
                    let lat = pos.coords.latitude.toFixed(5);
                    let lng = pos.coords.longitude.toFixed(5);
                    this.pickup = `Lokasi Presisi GPS (${lat}, ${lng})`;
                },
                (err) => {
                    this.isGpsLoading = false;
                    alert('Gagal mengambil lokasi GPS. Memakai titik perkiraan.');
                    this.pickup = 'RSUP Dr. Hasan Sadikin, Bandung';
                },
                { enableHighAccuracy: true, timeout: 8000 }
            );
        },

        swapLocations() {
            let temp = this.pickup;
            this.pickup = this.destination;
            this.destination = temp;
        }
     }">

{{-- Include Leaflet CDN CSS & JS for Interactive Map Picker --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- ================================================================
         1. STICKY HEADER
         ================================================================ --}}
    <header class="bg-white border-b border-slate-200/80 px-4 py-3.5 sticky top-0 z-40 flex items-center justify-between shadow-2xs">
        <div class="flex items-center gap-3">
            <a href="/" wire:navigate class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center hover:bg-slate-100 transition-colors flex-shrink-0">
                <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="text-[16px] font-bold text-slate-800 leading-tight">Simulasi Cek Rute & Tarif</h1>
                <p class="text-[11px] text-slate-400">Kalkulator Penjemputan Real-Time</p>
            </div>
        </div>
        <a href="tel:08123456789" class="flex items-center gap-1.5 bg-red-500 text-white text-[11px] font-bold px-3 py-1.5 rounded-full shadow-xs active:scale-95 transition-transform">
            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            Darurat
        </a>
    </header>

    {{-- ================================================================
         2. HERO BANNER
         ================================================================ --}}
    <div class="relative overflow-hidden px-5 pt-6 pb-6" style="background: linear-gradient(135deg, #2C1B39 0%, #3E458E 50%, #6B3F98 100%)">
        <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full pointer-events-none" style="background:rgba(192,69,127,0.2);filter:blur(35px)"></div>
        <div class="relative z-10 flex flex-col gap-1">
            <span class="text-[10.5px] font-extrabold tracking-widest uppercase text-[#D4AAFF]">Transparansi Biaya Medis</span>
            <h2 class="text-white font-extrabold text-[19px] leading-snug">Estimasi Rute & Biaya Instan</h2>
            <p class="text-[12.5px] text-white/75 leading-relaxed">
                Tentukan lokasi penjemputan dan spesifikasi armada untuk melihat rute peta, estimasi waktu, serta total biaya transparan.
            </p>
        </div>
    </div>

    {{-- ================================================================
         3. INPUT FORM CONTAINER
         ================================================================ --}}
    <div class="p-4 flex flex-col gap-4">

        {{-- STEP 1: ALAMAT JEMPUT & TUJUAN --}}
        <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col gap-3.5">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B3F98] text-white text-[12px] font-bold flex items-center justify-center">1</span>
                    <h3 class="text-[14px] font-bold text-slate-800">Alamat Jemput & Tujuan</h3>
                </div>
                <button type="button" @click="swapLocations()" class="text-[11px] font-bold text-[#6B3F98] flex items-center gap-1 bg-[#6B3F98]/10 px-2.5 py-1 rounded-full hover:bg-[#6B3F98]/20 transition-colors">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/></svg>
                    Tukar Lokasi
                </button>
            </div>

            {{-- Alamat Jemput --}}
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="text-[12px] font-bold text-slate-700 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Lokasi Penjemputan (Asal)
                    </label>
                    <button type="button" @click="openMapPicker('pickup')" class="text-[11px] font-bold text-[#6B3F98] flex items-center gap-1 hover:underline">
                        🗺️ Pilih di Peta
                    </button>
                </div>
                <div class="relative">
                    <input type="text" x-model="pickup" placeholder="Masukkan alamat penjemputan..."
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-3.5 py-2.5 text-[13px] text-slate-800 font-semibold outline-none focus:border-[#6B3F98] focus:bg-white focus:ring-2 focus:ring-[#6B3F98]/20 transition-all">
                    <svg class="w-4 h-4 text-emerald-600 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                {{-- Quick Presets & GPS Auto Fetch --}}
                <div class="flex gap-1.5 mt-2 overflow-x-auto scrollbar-hide">
                    <button type="button" @click="getGpsLocation()" class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 transition-colors whitespace-nowrap flex items-center gap-1">
                        <svg x-show="!isGpsLoading" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span x-text="isGpsLoading ? 'Mengambil GPS...' : '📍 Gunakan Lokasi GPS Saya'"></span>
                    </button>
                    <button type="button" @click="pickup = 'RSUP Dr. Hasan Sadikin, Bandung'" class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors whitespace-nowrap">+ RSHS Bandung</button>
                    <button type="button" @click="pickup = 'Kota Cimahi, Jawa Barat'" class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors whitespace-nowrap">+ Cimahi</button>
                </div>
            </div>

            {{-- Alamat Tujuan --}}
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="text-[12px] font-bold text-slate-700 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                        Lokasi Tujuan (Rumah Sakit)
                    </label>
                    <button type="button" @click="openMapPicker('destination')" class="text-[11px] font-bold text-[#6B3F98] flex items-center gap-1 hover:underline">
                        🗺️ Pilih di Peta
                    </button>
                </div>
                <div class="relative">
                    <input type="text" x-model="destination" placeholder="Masukkan lokasi tujuan..."
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-3.5 py-2.5 text-[13px] text-slate-800 font-semibold outline-none focus:border-[#6B3F98] focus:bg-white focus:ring-2 focus:ring-[#6B3F98]/20 transition-all">
                    <svg class="w-4 h-4 text-red-500 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg>
                </div>
                {{-- Quick Presets --}}
                <div class="flex gap-1.5 mt-2 overflow-x-auto scrollbar-hide">
                    <button type="button" @click="destination = 'RS Al Islam Bandung'" class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors whitespace-nowrap">+ RS Al Islam</button>
                    <button type="button" @click="destination = 'RS Immanuel Bandung'" class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors whitespace-nowrap">+ RS Immanuel</button>
                    <button type="button" @click="destination = 'RS Santosa Bandung'" class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors whitespace-nowrap">+ RS Santosa</button>
                    <button type="button" @click="destination = 'Jakarta / Luar Kota'" class="text-[11px] font-medium px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors whitespace-nowrap">+ Luar Kota</button>
                </div>
            </div>
        </div>

        {{-- STEP 2: JENIS AMBULANS (HIGH-CONTRAST SELECTION CARDS) --}}
        <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col gap-3">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B3F98] text-white text-[12px] font-bold flex items-center justify-center">2</span>
                    <h3 class="text-[14px] font-bold text-slate-800">Jenis Ambulans</h3>
                </div>
                <span class="text-[11px] font-bold text-[#6B3F98] bg-[#6B3F98]/10 px-2 py-0.5 rounded-full" x-text="selectedType.label"></span>
            </div>

            <div class="grid grid-cols-2 gap-2.5">
                <template x-for="(conf, key) in types" :key="key">
                    <button type="button" @click="type = key"
                            class="relative p-3 rounded-xl border-2 text-left flex flex-col justify-between transition-all duration-150 active:scale-98"
                            :class="type === key
                                ? 'border-[#6B3F98] bg-[#6B3F98]/10 ring-2 ring-[#6B3F98]/20 shadow-md'
                                : 'border-slate-200 bg-slate-50/60 opacity-65 hover:opacity-100 hover:bg-white'">
                        
                        {{-- Top status indicator & badge --}}
                        <div class="flex items-center justify-between w-full mb-2">
                            <span class="text-[9.5px] font-extrabold uppercase tracking-wide px-2 py-0.5 rounded"
                                  :class="type === key ? 'bg-[#6B3F98] text-white' : 'bg-slate-200 text-slate-600'"
                                  x-text="conf.badge || 'Siaga'"></span>
                            
                            {{-- CLEAR CHECKMARK INDICATOR --}}
                            <div class="w-5 h-5 rounded-full flex items-center justify-center transition-all"
                                 :class="type === key ? 'bg-[#6B3F98] text-white shadow-xs' : 'border border-slate-300 bg-white text-transparent'">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-[13px] font-bold leading-tight"
                                :class="type === key ? 'text-[#6B3F98]' : 'text-slate-800'"
                                x-text="conf.label"></h4>
                            <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-1" x-text="conf.desc"></p>
                        </div>

                        <div class="mt-2 pt-2 border-t border-slate-200/60 flex items-center justify-between">
                            <span class="text-[10px] font-semibold text-slate-400">Tarif Dasar</span>
                            <span class="text-[12.5px] font-extrabold text-slate-800" x-text="'Rp ' + conf.base.toLocaleString('id-ID')"></span>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        {{-- STEP 3: KONDISI PASIEN --}}
        <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col gap-3">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B3F98] text-white text-[12px] font-bold flex items-center justify-center">3</span>
                    <h3 class="text-[14px] font-bold text-slate-800">Kondisi Pasien</h3>
                </div>
                <span class="text-[11px] font-bold text-[#6B3F98] bg-[#6B3F98]/10 px-2 py-0.5 rounded-full" x-text="selectedCond.label"></span>
            </div>

            <div class="grid grid-cols-2 gap-2">
                <template x-for="(conf, key) in conditions" :key="key">
                    <button type="button" @click="condition = key"
                            class="p-2.5 rounded-xl border-2 text-left flex items-center justify-between transition-all"
                            :class="condition === key
                                ? 'border-[#6B3F98] bg-[#6B3F98]/10 ring-2 ring-[#6B3F98]/20 shadow-xs'
                                : 'border-slate-200 bg-slate-50/60 opacity-65 hover:opacity-100'">
                        <div>
                            <p class="text-[12.5px] font-bold" :class="condition === key ? 'text-[#6B3F98]' : 'text-slate-800'" x-text="conf.label"></p>
                            <p class="text-[10.5px] text-slate-400 mt-0.5" x-text="conf.fee > 0 ? '+Rp ' + conf.fee.toLocaleString('id-ID') : 'Tidak ada biaya tambahan'"></p>
                        </div>
                        <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                             :class="condition === key ? 'bg-[#6B3F98] text-white' : 'border border-slate-300 bg-white text-transparent'">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        {{-- STEP 4: KEBUTUHAN OKSIGEN --}}
        <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col gap-3">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B3F98] text-white text-[12px] font-bold flex items-center justify-center">4</span>
                    <h3 class="text-[14px] font-bold text-slate-800">Kebutuhan Oksigen Medis</h3>
                </div>
                <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100" x-text="oxygen === 'ya' ? 'Butuh Oksigen (+100k)' : 'Tanpa Oksigen'"></span>
            </div>

            <div class="grid grid-cols-2 gap-2.5">
                <button type="button" @click="oxygen = 'ya'"
                        class="p-3.5 rounded-xl border-2 flex items-center justify-between transition-all"
                        :class="oxygen === 'ya'
                            ? 'border-emerald-600 bg-emerald-50/80 ring-2 ring-emerald-500/20 shadow-xs'
                            : 'border-slate-200 bg-slate-50/60 opacity-65 hover:opacity-100'">
                    <div class="text-left">
                        <p class="text-[13px] font-bold" :class="oxygen === 'ya' ? 'text-emerald-800' : 'text-slate-800'">✓ Butuh Oksigen</p>
                        <p class="text-[11px] text-emerald-600 font-semibold mt-0.5">+Rp 100.000</p>
                    </div>
                    <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                         :class="oxygen === 'ya' ? 'bg-emerald-600 text-white' : 'border border-slate-300 bg-white text-transparent'">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    </div>
                </button>

                <button type="button" @click="oxygen = 'tidak'"
                        class="p-3.5 rounded-xl border-2 flex items-center justify-between transition-all"
                        :class="oxygen === 'tidak'
                            ? 'border-slate-600 bg-slate-100 ring-2 ring-slate-400/20 shadow-xs'
                            : 'border-slate-200 bg-slate-50/60 opacity-65 hover:opacity-100'">
                    <div class="text-left">
                        <p class="text-[13px] font-bold" :class="oxygen === 'tidak' ? 'text-slate-900' : 'text-slate-600'">Tidak Butuh</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Tanpa Tabung Oksigen</p>
                    </div>
                    <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                         :class="oxygen === 'tidak' ? 'bg-slate-700 text-white' : 'border border-slate-300 bg-white text-transparent'">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    </div>
                </button>
            </div>
        </div>

        {{-- STEP 5: TENAGA MEDIS --}}
        <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col gap-3">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B3F98] text-white text-[12px] font-bold flex items-center justify-center">5</span>
                    <h3 class="text-[14px] font-bold text-slate-800">Pendampingan Tenaga Medis</h3>
                </div>
                <span class="text-[11px] font-bold text-[#6B3F98] bg-[#6B3F98]/10 px-2 py-0.5 rounded-full" x-text="selectedCrew.label"></span>
            </div>

            <div class="flex flex-col gap-2">
                <template x-for="(conf, key) in crews" :key="key">
                    <button type="button" @click="crew = key"
                            class="p-3 rounded-xl border-2 text-left flex items-center justify-between transition-all"
                            :class="crew === key
                                ? 'border-[#6B3F98] bg-[#6B3F98]/10 ring-2 ring-[#6B3F98]/20 shadow-xs'
                                : 'border-slate-200 bg-slate-50/60 opacity-65 hover:opacity-100 hover:bg-white'">
                        <div>
                            <div class="flex items-center gap-2">
                                <p class="text-[13px] font-bold" :class="crew === key ? 'text-[#6B3F98]' : 'text-slate-800'" x-text="conf.label"></p>
                                <span x-show="conf.badge" class="text-[9.5px] font-extrabold bg-amber-500 text-white px-2 py-0.5 rounded-full uppercase" x-text="conf.badge"></span>
                            </div>
                            <p class="text-[11px] text-slate-500 mt-0.5" x-text="conf.desc + ' · ' + (conf.fee > 0 ? '+Rp ' + conf.fee.toLocaleString('id-ID') : 'Termasuk dalam paket dasar')"></p>
                        </div>
                        <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                             :class="crew === key ? 'bg-[#6B3F98] text-white' : 'border border-slate-300 bg-white text-transparent'">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        {{-- ================================================================
             4. OUTPUT RESULTS & MAPS CONTAINER (LIVE REACTIVE)
             ================================================================ --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-md overflow-hidden flex flex-col">
            
            {{-- Header --}}
            <div class="bg-slate-900 px-4 py-3 text-white flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#D4AAFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span class="text-[13.5px] font-bold">Hasil Kalkulasi Rute & Tarif</span>
                </div>
                <span class="text-[10px] font-extrabold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 px-2 py-0.5 rounded-full">
                    Kalkulator Aktif
                </span>
            </div>

            {{-- Google Maps Embed Frame --}}
            <div class="relative bg-slate-100 border-b border-slate-100 overflow-hidden" style="height:200px">
                <iframe
                    width="100%"
                    height="100%"
                    style="border:0; filter: contrast(1.05);"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    :src="'https://maps.google.com/maps?q=' + encodeURIComponent(pickup) + '+to+' + encodeURIComponent(destination) + '&t=&z=13&ie=UTF8&iwloc=&output=embed'">
                </iframe>

                {{-- Map Float Overlay --}}
                <div class="absolute bottom-2 left-2 right-2 bg-white/95 backdrop-blur-md p-2.5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div>
                            <p class="text-[9.5px] font-bold text-slate-400 uppercase leading-none">Est. Jarak</p>
                            <p class="text-[15px] font-extrabold text-slate-900 mt-0.5" x-text="distanceKm + ' km'"></p>
                        </div>
                        <div class="h-6 w-px bg-slate-200"></div>
                        <div>
                            <p class="text-[9.5px] font-bold text-slate-400 uppercase leading-none">Est. Perjalanan</p>
                            <p class="text-[15px] font-extrabold text-slate-900 mt-0.5" x-text="durationMins + ' mnt'"></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 bg-red-50 text-red-700 px-2.5 py-1 rounded-lg border border-red-100">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span class="text-[11px] font-bold" x-text="'ETA Jemput: ' + etaMins + ' mnt'"></span>
                    </div>
                </div>
            </div>

            {{-- Cost Breakdown & Details --}}
            <div class="p-4 flex flex-col gap-3">
                
                {{-- ETA Arrival Notice --}}
                <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[12.5px] font-bold text-emerald-900">Kedatangan Ambulans Ke Lokasi</p>
                            <p class="text-[11px] text-emerald-700">Unit berangkat dalam ± <span class="font-bold" x-text="etaMins"></span> menit setelah pemesanan</p>
                        </div>
                    </div>
                </div>

                {{-- Price Itemized Table --}}
                <div class="p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/80 space-y-2 text-[12.5px]">
                    <div class="flex justify-between text-slate-600">
                        <span>Tarif Dasar (<span class="font-semibold text-slate-800" x-text="selectedType.label"></span>)</span>
                        <span class="font-bold text-slate-800" x-text="'Rp ' + baseFare.toLocaleString('id-ID')"></span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Biaya Jarak (<span x-text="distanceKm"></span> km @ Rp <span x-text="(selectedType.perKm || 0).toLocaleString('id-ID')"></span>/km)</span>
                        <span class="font-bold text-slate-800" x-text="'Rp ' + distFare.toLocaleString('id-ID')"></span>
                    </div>
                    <div x-show="selectedCond.fee > 0" class="flex justify-between text-slate-600">
                        <span>Kondisi Pasien (<span class="font-semibold" x-text="selectedCond.label"></span>)</span>
                        <span class="font-bold text-slate-800" x-text="'Rp ' + selectedCond.fee.toLocaleString('id-ID')"></span>
                    </div>
                    <div x-show="oxygenFee > 0" class="flex justify-between text-slate-600">
                        <span>Fasilitas Oksigen Medis</span>
                        <span class="font-bold text-slate-800" x-text="'Rp ' + oxygenFee.toLocaleString('id-ID')"></span>
                    </div>
                    <div x-show="selectedCrew.fee > 0" class="flex justify-between text-slate-600">
                        <span>Tenaga Medis (<span class="font-semibold" x-text="selectedCrew.label"></span>)</span>
                        <span class="font-bold text-slate-800" x-text="'Rp ' + selectedCrew.fee.toLocaleString('id-ID')"></span>
                    </div>
                    <div x-show="tollFee > 0" class="flex justify-between text-slate-600">
                        <span>Estimasi Biaya Tol (Rute Jalan Tol)</span>
                        <span class="font-bold text-slate-800" x-text="'Rp ' + tollFee.toLocaleString('id-ID')"></span>
                    </div>

                    <div class="border-t border-slate-200/90 pt-2.5 mt-1 flex justify-between items-baseline text-[14px]">
                        <div>
                            <span class="font-extrabold text-slate-900 block">Total Estimasi Biaya</span>
                            <span class="text-[10px] text-slate-400">Sudah termasuk driver & BBM</span>
                        </div>
                        <span class="text-[20px] font-extrabold text-[#6B3F98]" x-text="'Rp ' + totalFare.toLocaleString('id-ID')"></span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col gap-2 mt-1">
                    <a :href="waLink"
                       target="_blank"
                       class="w-full py-3.5 rounded-xl text-white font-extrabold text-[15px] flex items-center justify-center gap-2 shadow-md active:scale-98 transition-all"
                       style="background: linear-gradient(135deg, #059669 0%, #10B981 100%)">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.943-.708-1.797 0-.855.448-1.275.607-1.448.159-.174.347-.217.463-.217.116 0 .231.002.332.007.108.005.253-.041.396.303.145.347.492 1.201.535 1.288.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.087-.179.182-.077.357.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.087.275.072.376-.043.101-.116.433-.506.549-.68.116-.174.231-.145.39-.087.159.058 1.011.477 1.184.564.174.087.289.13.332.202.043.073.043.42-.101.825z"/></svg>
                        Pesan Sekarang (WhatsApp)
                    </a>
                    
                    <a href="tel:08123456789"
                       class="w-full py-3 rounded-xl border border-red-200 bg-red-50 text-red-600 font-bold text-[13.5px] flex items-center justify-center gap-2 active:scale-98 transition-all">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Hubungi Hotline Darurat (Telepon 24 Jam)
                    </a>
                </div>

            </div>

        </div>

    </div>

    {{-- ================================================================
         5. INTERACTIVE LEAFLET MAP PICKER MODAL
         ================================================================ --}}
    <div x-show="showMapPicker" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs flex justify-center items-end sm:items-center p-0 sm:p-4"
         @click.self="showMapPicker = false">

        <div class="w-full max-w-[480px] bg-white rounded-t-3xl sm:rounded-2xl shadow-2xl flex flex-col overflow-hidden max-h-[90vh]">
            {{-- Header --}}
            <div class="px-4 py-3.5 bg-slate-900 text-white flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#D4AAFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="text-[14px] font-bold" x-text="pickerTitle"></span>
                </div>
                <button type="button" @click="showMapPicker = false" class="w-7 h-7 rounded-full bg-white/10 flex items-center justify-center text-white/80 hover:text-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Map Canvas --}}
            <div class="relative w-full bg-slate-200" style="height:320px">
                <div id="leaflet-picker-canvas" class="w-full h-full"></div>
                <div class="absolute top-2 left-2 right-2 bg-white/95 backdrop-blur-sm p-2 rounded-xl border border-slate-200 text-center shadow-xs z-40 pointer-events-none">
                    <p class="text-[11px] font-bold text-slate-700">📍 Klik peta atau geser pin penanda untuk menentukan lokasi presisi</p>
                </div>
            </div>

            {{-- Coordinates Info & Confirm Button --}}
            <div class="p-4 bg-white flex flex-col gap-3">
                <div class="flex items-center justify-between text-[12.5px] bg-slate-50 p-2.5 rounded-xl border border-slate-200">
                    <span class="text-slate-500 font-medium">Titik Koordinat Selected:</span>
                    <span class="font-extrabold text-[#6B3F98]" x-text="pickerLat + ', ' + pickerLng"></span>
                </div>

                <div class="flex gap-2">
                    <button type="button" @click="showMapPicker = false" class="flex-1 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-600 text-[13px]">
                        Batal
                    </button>
                    <button type="button" @click="confirmMapPicker()" class="flex-1 py-2.5 rounded-xl bg-[#6B3F98] text-white font-bold text-[13px] shadow-sm active:scale-95 transition-transform">
                        ✓ Gunakan Titik Ini
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
