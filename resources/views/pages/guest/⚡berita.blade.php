<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    public string $activeCategory = 'semua';

    public function setCategory(string $cat): void
    {
        $this->activeCategory = $cat;
    }
};
?>

@php
    $allArticles = [
        [
            'slug'     => 'tips-persiapan-evakuasi-medis',
            'category' => 'tips',
            'cat_label'=> 'Tips',
            'cat_color'=> '#059669',
            'cat_bg'   => 'rgba(5,150,105,0.1)',
            'title'    => '7 Hal yang Harus Disiapkan Sebelum Membutuhkan Ambulans',
            'excerpt'  => 'Persiapan yang tepat sebelum kedaruratan bisa menyelamatkan nyawa. Berikut panduan lengkap yang perlu diketahui keluarga Anda.',
            'image'    => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=600&fit=crop',
            'author'   => 'Tim Medis IK',
            'date'     => '20 Jul 2025',
            'read'     => '5 mnt',
            'views'    => '2.4K',
            'featured' => true,
        ],
        [
            'slug'     => 'kegiatan-donor-darah-masal',
            'category' => 'kegiatan',
            'cat_label'=> 'Kegiatan',
            'cat_color'=> '#3154B8',
            'cat_bg'   => 'rgba(49,84,184,0.1)',
            'title'    => 'Donor Darah Massal Bersama Ambulans IK & PMI Kota Bandung',
            'excerpt'  => 'Lebih dari 300 pendonor berpartisipasi dalam kegiatan donor darah yang kami selenggarakan bersama PMI Kota Bandung.',
            'image'    => 'https://images.unsplash.com/photo-1615461066841-6116e61058f4?q=80&w=600&fit=crop',
            'author'   => 'Humas IK',
            'date'     => '18 Jul 2025',
            'read'     => '3 mnt',
            'views'    => '1.8K',
            'featured' => false,
        ],
        [
            'slug'     => 'penanganan-stroke-golden-hour',
            'category' => 'kesehatan',
            'cat_label'=> 'Kesehatan',
            'cat_color'=> '#C0457F',
            'cat_bg'   => 'rgba(192,69,127,0.1)',
            'title'    => 'Golden Hour pada Stroke: Setiap Detik Sangat Berharga',
            'excerpt'  => 'Stroke adalah kedaruratan medis. Memahami gejala dan tindakan pertama yang tepat dapat mencegah kecacatan permanen.',
            'image'    => 'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?q=80&w=600&fit=crop',
            'author'   => 'dr. Fauzi Ahmad',
            'date'     => '15 Jul 2025',
            'read'     => '7 mnt',
            'views'    => '3.1K',
            'featured' => false,
        ],
        [
            'slug'     => 'pengumuman-tarif-baru-2025',
            'category' => 'pengumuman',
            'cat_label'=> 'Pengumuman',
            'cat_color'=> '#D97706',
            'cat_bg'   => 'rgba(217,119,6,0.1)',
            'title'    => 'Penyesuaian Tarif Layanan Ambulans Efektif 1 Agustus 2025',
            'excerpt'  => 'Kami menginformasikan adanya penyesuaian tarif layanan ambulans sosial dan darurat mulai 1 Agustus 2025 sesuai peraturan terbaru.',
            'image'    => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=600&fit=crop',
            'author'   => 'Manajemen IK',
            'date'     => '12 Jul 2025',
            'read'     => '2 mnt',
            'views'    => '4.2K',
            'featured' => false,
        ],
        [
            'slug'     => 'csr-ambulans-gratis-dhuafa',
            'category' => 'csr',
            'cat_label'=> 'CSR',
            'cat_color'=> '#6B3F98',
            'cat_bg'   => 'rgba(107,63,152,0.1)',
            'title'    => 'Program Ambulans Gratis untuk 500 Keluarga Dhuafa di Bandung',
            'excerpt'  => 'Melalui program CSR tahunan, kami memberikan subsidi penuh layanan ambulans bagi keluarga kurang mampu yang membutuhkan.',
            'image'    => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=600&fit=crop',
            'author'   => 'Divisi Sosial IK',
            'date'     => '10 Jul 2025',
            'read'     => '4 mnt',
            'views'    => '5.6K',
            'featured' => false,
        ],
        [
            'slug'     => 'tips-pertolongan-pertama-kecelakaan',
            'category' => 'tips',
            'cat_label'=> 'Tips',
            'cat_color'=> '#059669',
            'cat_bg'   => 'rgba(5,150,105,0.1)',
            'title'    => 'Pertolongan Pertama di Lokasi Kecelakaan: Jangan Lakukan Ini!',
            'excerpt'  => 'Ada banyak kesalahan umum yang justru memperparah kondisi korban. Pelajari apa yang benar dan yang harus dihindari.',
            'image'    => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?q=80&w=600&fit=crop',
            'author'   => 'Ns. Budi Santoso',
            'date'     => '8 Jul 2025',
            'read'     => '6 mnt',
            'views'    => '7.8K',
            'featured' => false,
        ],
        [
            'slug'     => 'penanganan-serangan-jantung',
            'category' => 'emergency',
            'cat_label'=> 'Emergency',
            'cat_color'=> '#DC2626',
            'cat_bg'   => 'rgba(220,38,38,0.1)',
            'title'    => 'Serangan Jantung di Tempat Publik: Panduan CPR untuk Orang Awam',
            'excerpt'  => 'Mengetahui cara melakukan CPR yang benar bisa menjadi perbedaan antara hidup dan mati. Panduan langkah demi langkah.',
            'image'    => 'https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=600&fit=crop',
            'author'   => 'Tim Medis IK',
            'date'     => '5 Jul 2025',
            'read'     => '8 mnt',
            'views'    => '9.2K',
            'featured' => false,
        ],
        [
            'slug'     => 'standarisasi-ambulans-who',
            'category' => 'kesehatan',
            'cat_label'=> 'Kesehatan',
            'cat_color'=> '#C0457F',
            'cat_bg'   => 'rgba(192,69,127,0.1)',
            'title'    => 'Standar WHO untuk Ambulans Modern: Apakah Indonesia Sudah Memenuhinya?',
            'excerpt'  => 'Sebuah tinjauan mendalam tentang standar peralatan, SDM, dan prosedur ambulans berdasarkan pedoman WHO terbaru.',
            'image'    => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?q=80&w=600&fit=crop',
            'author'   => 'dr. Hendra Gunawan',
            'date'     => '1 Jul 2025',
            'read'     => '10 mnt',
            'views'    => '3.5K',
            'featured' => false,
        ],
    ];

    $categories = [
        ['key' => 'semua',      'label' => 'Semua'],
        ['key' => 'kesehatan',  'label' => 'Kesehatan'],
        ['key' => 'kegiatan',   'label' => 'Kegiatan'],
        ['key' => 'pengumuman', 'label' => 'Pengumuman'],
        ['key' => 'csr',        'label' => 'CSR'],
        ['key' => 'tips',       'label' => 'Tips'],
        ['key' => 'emergency',  'label' => 'Emergency'],
    ];

    $articles = $activeCategory === 'semua'
        ? $allArticles
        : array_values(array_filter($allArticles, fn($a) => $a['category'] === $activeCategory));

    $featured = $allArticles[0];
@endphp

<div class="min-h-screen bg-slate-50 flex flex-col pb-28 text-slate-800" id="top">

    {{-- ================================================================
         1. HEADER STICKY
         ================================================================ --}}
    <header class="bg-white border-b border-slate-200/80 px-4 py-3.5 sticky top-0 z-40 flex items-center gap-3">
        <a href="/" wire:navigate class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center hover:bg-slate-100 transition-colors flex-shrink-0">
            <i data-lucide="chevron-left" style="width:18px;height:18px;stroke-width:2.5" class="text-slate-700"></i>
        </a>
        <div class="flex-1">
            <h1 class="text-[16px] font-bold text-slate-800 leading-tight">Berita & Artikel</h1>
            <p class="text-[11px] text-slate-400">{{ count($allArticles) }} artikel terbaru</p>
        </div>
        <button class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center">
            <i data-lucide="search" style="width:16px;height:16px;stroke-width:2" class="text-slate-500"></i>
        </button>
    </header>

    {{-- ================================================================
         2. HERO FEATURED ARTICLE
         ================================================================ --}}
    <a href="/berita/{{ $featured['slug'] }}" wire:navigate class="block relative overflow-hidden" style="height:220px">
        <img src="{{ $featured['image'] }}" alt="{{ $featured['title'] }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(20,10,35,0.92) 0%, rgba(20,10,35,0.4) 55%, transparent 100%)"></div>
        <div class="absolute inset-0 p-4 flex flex-col justify-end">
            <span class="self-start text-[10px] font-extrabold uppercase tracking-widest px-2.5 py-1 rounded-full mb-2"
                  style="background:{{ $featured['cat_bg'] }}; color:{{ $featured['cat_color'] }}; backdrop-filter:blur(4px)">
                {{ $featured['cat_label'] }}
            </span>
            <h2 class="text-white font-bold text-[15px] leading-snug mb-1.5">{{ $featured['title'] }}</h2>
            <div class="flex items-center gap-3 text-white/60 text-[11px]">
                <span class="flex items-center gap-1">
                    <i data-lucide="user" style="width:10px;height:10px;stroke-width:2.5"></i>
                    {{ $featured['author'] }}
                </span>
                <span class="flex items-center gap-1">
                    <i data-lucide="clock" style="width:10px;height:10px;stroke-width:2.5"></i>
                    {{ $featured['read'] }} baca
                </span>
                <span class="flex items-center gap-1">
                    <i data-lucide="eye" style="width:10px;height:10px;stroke-width:2.5"></i>
                    {{ $featured['views'] }}
                </span>
            </div>
        </div>
        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-full border border-white/30">
            PILIHAN EDITOR
        </div>
    </a>

    {{-- ================================================================
         3. CATEGORY FILTER
         ================================================================ --}}
    <div class="bg-white border-b border-slate-100 sticky top-[61px] z-30">
        <div class="flex gap-2 px-4 py-3 overflow-x-auto scrollbar-hide">
            @foreach($categories as $cat)
                <button wire:click="setCategory('{{ $cat['key'] }}')"
                        class="px-4 py-1.5 rounded-full text-[12.5px] font-medium border whitespace-nowrap flex-shrink-0 transition-all"
                        :class="false"
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
         4. ARTICLE LIST
         ================================================================ --}}
    <div class="flex flex-col gap-0 flex-1 bg-white">

        @forelse($articles as $article)
            <a href="/berita/{{ $article['slug'] }}" wire:navigate
               class="flex gap-3 px-4 py-4 border-b border-slate-100 hover:bg-slate-50/50 transition-colors active:bg-slate-100">

                {{-- Thumbnail --}}
                <div class="w-24 h-20 rounded-xl overflow-hidden flex-shrink-0 bg-slate-100">
                    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}"
                         class="w-full h-full object-cover">
                </div>

                {{-- Content --}}
                <div class="flex-1 min-w-0 flex flex-col justify-between">
                    <div>
                        <span class="inline-block text-[10px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-md mb-1"
                              style="background:{{ $article['cat_bg'] }}; color:{{ $article['cat_color'] }}">
                            {{ $article['cat_label'] }}
                        </span>
                        <h3 class="text-[13.5px] font-bold text-slate-800 leading-snug line-clamp-2">{{ $article['title'] }}</h3>
                    </div>
                    <div class="flex items-center gap-2.5 text-[11px] text-slate-400 mt-1.5">
                        <span>{{ $article['date'] }}</span>
                        <span>·</span>
                        <span class="flex items-center gap-1">
                            <i data-lucide="clock" style="width:10px;height:10px;stroke-width:2.5"></i>
                            {{ $article['read'] }}
                        </span>
                        <span>·</span>
                        <span class="flex items-center gap-1">
                            <i data-lucide="eye" style="width:10px;height:10px;stroke-width:2.5"></i>
                            {{ $article['views'] }}
                        </span>
                    </div>
                </div>

                <div class="flex-shrink-0 self-center">
                    <i data-lucide="chevron-right" style="width:14px;height:14px;stroke-width:2.5" class="text-slate-300"></i>
                </div>
            </a>
        @empty
            <div class="py-16 flex flex-col items-center gap-3 text-slate-400">
                <i data-lucide="newspaper" style="width:40px;height:40px;stroke-width:1.2" class="text-slate-200"></i>
                <p class="text-[13px] font-medium">Belum ada artikel di kategori ini</p>
            </div>
        @endforelse

    </div>

</div>
