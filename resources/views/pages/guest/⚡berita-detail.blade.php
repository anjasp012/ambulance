<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component
{
    public string $slug = '';
    public bool $showShareSheet = false;
    public string $newComment = '';
    public array $comments = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->comments = [
            ['name' => 'Siti Rahayu', 'initial' => 'S', 'color' => '#C0457F', 'time' => '2 jam lalu', 'text' => 'Artikel yang sangat bermanfaat! Saya jadi lebih paham cara menangani situasi darurat. Terima kasih Ambulans IK!'],
            ['name' => 'Budi Santoso', 'initial' => 'B', 'color' => '#3154B8', 'time' => '5 jam lalu', 'text' => 'Informasinya akurat dan mudah dipahami. Semoga makin banyak yang baca artikel ini.'],
        ];
    }

    public function addComment(): void
    {
        if (strlen(trim($this->newComment)) < 5) return;
        array_unshift($this->comments, [
            'name'    => 'Anda',
            'initial' => 'A',
            'color'   => '#6B3F98',
            'time'    => 'Baru saja',
            'text'    => $this->newComment,
        ]);
        $this->newComment = '';
    }

    public function toggleShare(): void
    {
        $this->showShareSheet = !$this->showShareSheet;
    }
};
?>

@php
    // Dummy article data keyed by slug
    $articles = [
        'tips-persiapan-evakuasi-medis' => [
            'category'   => 'Tips',
            'cat_color'  => '#059669',
            'cat_bg'     => 'rgba(5,150,105,0.1)',
            'title'      => '7 Hal yang Harus Disiapkan Sebelum Membutuhkan Ambulans',
            'author'     => 'Tim Medis IK',
            'author_role'=> 'Tenaga Medis Bersertifikasi',
            'date'       => '20 Juli 2025',
            'read'       => '5 mnt',
            'views'      => '2.4K',
            'image'      => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=800&fit=crop',
            'has_video'  => true,
            'gallery'    => [
                'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?q=80&w=400&fit=crop',
                'https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=400&fit=crop',
                'https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=400&fit=crop',
            ],
            'content'    => [
                ['type' => 'lead',    'text' => 'Tidak ada yang bisa memprediksi kapan kedaruratan medis akan terjadi. Namun, persiapan yang matang bisa menjadi perbedaan antara hidup dan mati.'],
                ['type' => 'h2',      'text' => '1. Simpan Nomor Ambulans di Speed Dial'],
                ['type' => 'p',       'text' => 'Pastikan nomor hotline ambulans terdekat tersimpan di kontak utama ponsel Anda dan anggota keluarga. Ambulans IK: 0812-3456-789 siaga 24 jam.'],
                ['type' => 'h2',      'text' => '2. Ketahui Alamat Rumah Anda dengan Tepat'],
                ['type' => 'p',       'text' => 'Banyak panggilan darurat terlambat karena penelepon tidak bisa mendeskripsikan lokasi dengan jelas. Hafalkan nama jalan, nomor rumah, dan patokan terdekat.'],
                ['type' => 'callout', 'text' => '⚡ Tip Cepat: Aktifkan fitur "Share Location" di WhatsApp saat menelepon ambulans untuk mempercepat navigasi tim.'],
                ['type' => 'h2',      'text' => '3. Siapkan Daftar Riwayat Medis Keluarga'],
                ['type' => 'p',       'text' => 'Informasi seperti alergi obat, kondisi kronis, dan golongan darah sangat membantu paramedis dalam memberikan penanganan yang tepat.'],
                ['type' => 'h2',      'text' => '4. Pelajari Dasar-Dasar Pertolongan Pertama'],
                ['type' => 'p',       'text' => 'Mengetahui cara melakukan CPR, menghentikan pendarahan, dan posisi recovery bisa menyelamatkan nyawa sambil menunggu ambulans tiba.'],
                ['type' => 'h2',      'text' => '5. Kenali Tanda-Tanda Darurat Utama'],
                ['type' => 'p',       'text' => 'Kenali tanda stroke (FAST: Face drooping, Arm weakness, Speech difficulty, Time to call), serangan jantung, dan reaksi alergi berat.'],
                ['type' => 'h2',      'text' => '6. Pastikan Akses Jalan ke Rumah Terbuka'],
                ['type' => 'p',       'text' => 'Ambulans membutuhkan akses minimal 3 meter. Pastikan tidak ada kendaraan yang menghalangi jalan masuk ke rumah Anda, terutama di malam hari.'],
                ['type' => 'h2',      'text' => '7. Siapkan Dokumen Penting dalam Satu Tempat'],
                ['type' => 'p',       'text' => 'KTP, kartu BPJS, kartu asuransi, dan rekam medis sebaiknya disimpan dalam satu map yang mudah diakses saat kondisi darurat.'],
            ],
            'related' => [
                ['slug' => 'penanganan-stroke-golden-hour', 'title' => 'Golden Hour pada Stroke: Setiap Detik Sangat Berharga', 'image' => 'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?q=80&w=400&fit=crop', 'read' => '7 mnt'],
                ['slug' => 'penanganan-serangan-jantung', 'title' => 'Panduan CPR untuk Orang Awam', 'image' => 'https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=400&fit=crop', 'read' => '8 mnt'],
            ],
        ],
    ];

    // Fallback for any slug not in the array
    $article = $articles[$slug] ?? [
        'category'   => 'Artikel',
        'cat_color'  => '#6B3F98',
        'cat_bg'     => 'rgba(107,63,152,0.1)',
        'title'      => 'Artikel Tidak Ditemukan',
        'author'     => 'Tim IK',
        'author_role'=> '',
        'date'       => today()->format('d F Y'),
        'read'       => '-',
        'views'      => '-',
        'image'      => 'https://images.unsplash.com/photo-1612997951721-4d9e3794c1d5?q=80&w=800&fit=crop',
        'has_video'  => false,
        'gallery'    => [],
        'content'    => [['type' => 'p', 'text' => 'Artikel yang Anda cari tidak tersedia.']],
        'related'    => [],
    ];
@endphp

<div class="min-h-screen bg-white flex flex-col pb-28 text-slate-800 text-[14px]" id="top" x-data="{ showGallery: false, galleryIndex: 0 }">

    {{-- ================================================================
         1. HEADER
         ================================================================ --}}
    <header class="bg-white/90 backdrop-blur-md border-b border-slate-200/60 px-4 py-3.5 sticky top-0 z-40 flex items-center gap-3">
        <a href="/berita" wire:navigate class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center hover:bg-slate-100 transition-colors flex-shrink-0">
            <i data-lucide="chevron-left" style="width:18px;height:18px;stroke-width:2.5" class="text-slate-700"></i>
        </a>
        <div class="flex-1 min-w-0">
            <p class="text-[12px] font-medium text-slate-500 truncate">Berita</p>
        </div>
        <button wire:click="toggleShare" class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center">
            <i data-lucide="share-2" style="width:15px;height:15px;stroke-width:2.2" class="text-slate-500"></i>
        </button>
        <button class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center">
            <i data-lucide="bookmark" style="width:15px;height:15px;stroke-width:2.2" class="text-slate-500"></i>
        </button>
    </header>

    {{-- ================================================================
         2. HERO IMAGE
         ================================================================ --}}
    <div class="relative overflow-hidden bg-slate-200" style="height:240px">
        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover">
        <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(255,255,255,0.15) 0%, transparent 60%)"></div>
        @if($article['has_video'])
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-14 h-14 rounded-full bg-white/90 backdrop-blur flex items-center justify-center shadow-lg">
                <i data-lucide="play" style="width:20px;height:20px;fill:currentColor;stroke-width:1" class="text-[#6B3F98] ml-1"></i>
            </div>
        </div>
        @endif
    </div>

    {{-- ================================================================
         3. META & TITLE
         ================================================================ --}}
    <div class="px-5 pt-5 pb-4 border-b border-slate-100">
        <span class="inline-block text-[10.5px] font-extrabold uppercase tracking-widest px-2.5 py-1 rounded-full mb-3"
              style="background:{{ $article['cat_bg'] }}; color:{{ $article['cat_color'] }}">
            {{ $article['category'] }}
        </span>
        <h1 class="text-[19px] font-extrabold text-slate-900 leading-snug mb-3">{{ $article['title'] }}</h1>

        {{-- Author & Meta --}}
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-[13px] font-bold flex-shrink-0"
                 style="background:{{ $article['cat_color'] }}">
                {{ substr($article['author'], 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[12.5px] font-bold text-slate-800 leading-none">{{ $article['author'] }}</p>
                @if($article['author_role'])
                    <p class="text-[11px] text-slate-400 mt-0.5">{{ $article['author_role'] }}</p>
                @endif
            </div>
            <div class="text-right text-[11px] text-slate-400">
                <p>{{ $article['date'] }}</p>
                <p class="flex items-center gap-1 justify-end">
                    <i data-lucide="clock" style="width:10px;height:10px;stroke-width:2.5"></i>
                    {{ $article['read'] }} baca
                </p>
            </div>
        </div>

        {{-- Stats row --}}
        <div class="flex items-center gap-4 mt-3 pt-3 border-t border-slate-100">
            <span class="flex items-center gap-1.5 text-[12px] text-slate-400">
                <i data-lucide="eye" style="width:13px;height:13px;stroke-width:2.2"></i>
                {{ $article['views'] }} dibaca
            </span>
            <span class="flex items-center gap-1.5 text-[12px] text-slate-400">
                <i data-lucide="message-circle" style="width:13px;height:13px;stroke-width:2.2"></i>
                {{ count($comments) }} komentar
            </span>
            <button wire:click="toggleShare" class="ml-auto flex items-center gap-1.5 text-[12px] font-medium" style="color:{{ $article['cat_color'] }}">
                <i data-lucide="share-2" style="width:13px;height:13px;stroke-width:2.2"></i>
                Bagikan
            </button>
        </div>
    </div>

    {{-- ================================================================
         4. ARTICLE BODY
         ================================================================ --}}
    <div class="px-5 py-5 space-y-3.5 border-b border-slate-100">
        @foreach($article['content'] as $block)
            @if($block['type'] === 'lead')
                <p class="text-[15px] text-slate-700 leading-relaxed font-medium">{{ $block['text'] }}</p>
            @elseif($block['type'] === 'h2')
                <h2 class="text-[15.5px] font-extrabold text-slate-900 mt-2 leading-snug">{{ $block['text'] }}</h2>
            @elseif($block['type'] === 'p')
                <p class="text-[14px] text-slate-600 leading-relaxed">{{ $block['text'] }}</p>
            @elseif($block['type'] === 'callout')
                <div class="rounded-xl p-3.5 border-l-4 text-[13px] leading-relaxed font-medium"
                     style="background:{{ $article['cat_bg'] }}; border-color:{{ $article['cat_color'] }}; color:{{ $article['cat_color'] }}">
                    {{ $block['text'] }}
                </div>
            @endif
        @endforeach
    </div>

    {{-- ================================================================
         5. VIDEO SECTION
         ================================================================ --}}
    @if($article['has_video'])
    <div class="px-4 py-5 border-b border-slate-100 bg-slate-50">
        <div class="flex items-center gap-1.5 mb-3">
            <div class="w-1 h-4 rounded-full" style="background:{{ $article['cat_color'] }}"></div>
            <h3 class="text-[13px] font-bold text-slate-800 uppercase tracking-wide">Video Terkait</h3>
        </div>
        <div class="rounded-2xl overflow-hidden relative bg-slate-900" style="height:160px">
            <img src="{{ $article['image'] }}" alt="Video" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 flex flex-col items-center justify-center gap-2">
                <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow-xl">
                    <i data-lucide="play" style="width:18px;height:18px;fill:currentColor;stroke-width:1" class="text-[#6B3F98] ml-0.5"></i>
                </div>
                <p class="text-white text-[12px] font-semibold">Cara Memesan Ambulans Darurat</p>
                <p class="text-white/60 text-[11px]">3:45 menit</p>
            </div>
        </div>
    </div>
    @endif

    {{-- ================================================================
         6. GALLERY
         ================================================================ --}}
    @if(count($article['gallery']) > 0)
    <div class="px-4 py-5 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-3">
            <div class="w-1 h-4 rounded-full" style="background:{{ $article['cat_color'] }}"></div>
            <h3 class="text-[13px] font-bold text-slate-800 uppercase tracking-wide">Galeri Foto</h3>
        </div>
        <div class="grid grid-cols-3 gap-1.5">
            @foreach($article['gallery'] as $i => $img)
                <button @click="galleryIndex = {{ $i }}; showGallery = true"
                        class="rounded-xl overflow-hidden relative bg-slate-100 active:scale-95 transition-transform"
                        style="height:85px">
                    <img src="{{ $img }}" alt="Galeri {{ $i+1 }}" class="w-full h-full object-cover">
                    @if($i === 2 && count($article['gallery']) > 3)
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                            <span class="text-white font-bold text-[15px]">+{{ count($article['gallery']) - 3 }}</span>
                        </div>
                    @endif
                </button>
            @endforeach
        </div>
    </div>

    {{-- Lightbox overlay --}}
    <div x-show="showGallery" x-cloak
         @click.self="showGallery = false"
         class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4">
        <button @click="showGallery = false" class="absolute top-5 right-5 text-white/70 hover:text-white">
            <i data-lucide="x" style="width:24px;height:24px;stroke-width:2.5"></i>
        </button>
        @foreach($article['gallery'] as $i => $img)
            <img x-show="galleryIndex === {{ $i }}" src="{{ $img }}" alt="Galeri {{ $i+1 }}"
                 class="max-w-full max-h-full rounded-xl object-contain shadow-2xl">
        @endforeach
        <div class="absolute bottom-5 left-0 right-0 flex justify-center gap-2">
            @foreach($article['gallery'] as $i => $img)
                <button @click="galleryIndex = {{ $i }}"
                        class="w-2 h-2 rounded-full transition-all"
                        :class="galleryIndex === {{ $i }} ? 'bg-white scale-125' : 'bg-white/40'"></button>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ================================================================
         7. RELATED ARTICLES
         ================================================================ --}}
    @if(count($article['related']) > 0)
    <div class="px-4 py-5 border-b border-slate-100 bg-slate-50">
        <div class="flex items-center gap-1.5 mb-3">
            <div class="w-1 h-4 rounded-full" style="background:{{ $article['cat_color'] }}"></div>
            <h3 class="text-[13px] font-bold text-slate-800 uppercase tracking-wide">Artikel Terkait</h3>
        </div>
        <div class="space-y-2.5">
            @foreach($article['related'] as $rel)
                <a href="/berita/{{ $rel['slug'] }}" wire:navigate
                   class="flex gap-3 bg-white rounded-xl p-3 border border-slate-100 hover:shadow-sm transition-shadow active:scale-[0.99]">
                    <div class="w-16 h-14 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ $rel['image'] }}" alt="{{ $rel['title'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[13px] font-bold text-slate-800 leading-snug line-clamp-2">{{ $rel['title'] }}</p>
                        <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                            <i data-lucide="clock" style="width:10px;height:10px;stroke-width:2.5"></i>
                            {{ $rel['read'] }} baca
                        </p>
                    </div>
                    <i data-lucide="chevron-right" style="width:14px;height:14px;stroke-width:2.5" class="text-slate-300 self-center flex-shrink-0"></i>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ================================================================
         8. COMMENTS
         ================================================================ --}}
    <div class="px-4 py-5 border-b border-slate-100">
        <div class="flex items-center gap-1.5 mb-4">
            <div class="w-1 h-4 rounded-full" style="background:{{ $article['cat_color'] }}"></div>
            <h3 class="text-[13px] font-bold text-slate-800 uppercase tracking-wide">Komentar ({{ count($comments) }})</h3>
        </div>

        {{-- Write comment --}}
        <div class="flex gap-2.5 mb-4">
            <div class="w-8 h-8 rounded-full bg-[#6B3F98] flex items-center justify-center text-white text-[12px] font-bold flex-shrink-0">A</div>
            <div class="flex-1 flex gap-2">
                <input wire:model="newComment" type="text" placeholder="Tulis komentar..."
                       class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-[13px] outline-none focus:border-[#6B3F98] focus:ring-1 focus:ring-[#6B3F98]/20 transition-all">
                <button wire:click="addComment"
                        class="w-9 h-9 rounded-xl flex items-center justify-center text-white flex-shrink-0"
                        style="background:#6B3F98">
                    <i data-lucide="send" style="width:14px;height:14px;stroke-width:2.5"></i>
                </button>
            </div>
        </div>

        {{-- Comments list --}}
        <div class="space-y-3.5">
            @foreach($comments as $comment)
                <div class="flex gap-2.5">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-[12px] font-bold flex-shrink-0"
                         style="background:{{ $comment['color'] }}">
                        {{ $comment['initial'] }}
                    </div>
                    <div class="flex-1 bg-slate-50 rounded-xl rounded-tl-none p-3">
                        <div class="flex items-baseline justify-between mb-1">
                            <p class="text-[12.5px] font-bold text-slate-800">{{ $comment['name'] }}</p>
                            <p class="text-[11px] text-slate-400">{{ $comment['time'] }}</p>
                        </div>
                        <p class="text-[13px] text-slate-600 leading-relaxed">{{ $comment['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ================================================================
         9. SHARE SHEET (bottom drawer via Livewire)
         ================================================================ --}}
    @if($showShareSheet)
    <div class="fixed inset-0 z-50 bg-black/40 flex justify-center items-end"
         wire:click.self="toggleShare">
        <div class="w-full max-w-[480px] bg-white rounded-t-3xl p-5 shadow-2xl">
            <div class="w-10 h-1 bg-slate-200 rounded-full mx-auto mb-4"></div>
            <h3 class="text-[15px] font-bold text-slate-800 mb-4">Bagikan Artikel</h3>
            <div class="grid grid-cols-4 gap-3 mb-5">
                @php
                    $shareOptions = [
                        ['icon' => 'message-circle', 'label' => 'WhatsApp',  'color' => '#25D366', 'bg' => 'rgba(37,211,102,0.1)'],
                        ['icon' => 'facebook',        'label' => 'Facebook',  'color' => '#1877F2', 'bg' => 'rgba(24,119,242,0.1)'],
                        ['icon' => 'twitter',         'label' => 'Twitter/X', 'color' => '#000000', 'bg' => 'rgba(0,0,0,0.08)'],
                        ['icon' => 'link',            'label' => 'Salin Link','color' => '#6B3F98', 'bg' => 'rgba(107,63,152,0.1)'],
                    ];
                @endphp
                @foreach($shareOptions as $opt)
                    <button class="flex flex-col items-center gap-2 active:scale-95 transition-transform">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center"
                             style="background:{{ $opt['bg'] }}; color:{{ $opt['color'] }}">
                            <i data-lucide="{{ $opt['icon'] }}" style="width:20px;height:20px;stroke-width:2"></i>
                        </div>
                        <span class="text-[11px] text-slate-500 font-medium">{{ $opt['label'] }}</span>
                    </button>
                @endforeach
            </div>
            <button wire:click="toggleShare"
                    class="w-full py-3 rounded-xl border border-slate-200 text-[13px] font-medium text-slate-500">
                Batal
            </button>
        </div>
    </div>
    @endif

</div>
