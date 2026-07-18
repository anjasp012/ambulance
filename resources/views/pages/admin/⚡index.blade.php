<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component
{
    //
};
?>

<div class="space-y-8">
    <!-- Welcome section -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Selamat Datang kembali, Admin!</h2>
            <p class="text-slate-500 text-xs mt-1">Berikut adalah ikhtisar operasional Ambulans Inisiatif Kebaikan hari ini.</p>
        </div>
        <button class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-md transition-colors flex items-center gap-2">
            <span>+</span> Tambah Armada Baru
        </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold text-slate-400 uppercase">Total Pemesanan</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-3xl font-black text-slate-800">2.845</span>
                <span class="text-xs text-emerald-600 font-bold">+12%</span>
            </div>
            <p class="text-[10px] text-slate-400 mt-2">Dibandingkan bulan lalu</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold text-slate-400 uppercase">Armada Aktif</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-3xl font-black text-slate-800">12 / 15</span>
                <span class="text-xs text-amber-600 font-semibold">Siaga</span>
            </div>
            <p class="text-[10px] text-slate-400 mt-2">3 Unit dalam perawatan rutin</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold text-slate-400 uppercase">Rata-rata Respon</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-3xl font-black text-slate-800">8.4 mnt</span>
                <span class="text-xs text-emerald-600 font-bold">-1.2m</span>
            </div>
            <p class="text-[10px] text-slate-400 mt-2">Kecepatan dispersi armada</p>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold text-slate-400 uppercase">Kepuasan Layanan</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-3xl font-black text-slate-800">4.9 / 5.0</span>
                <span class="text-xs text-slate-400">Google Review</span>
            </div>
            <p class="text-[10px] text-slate-400 mt-2">Berdasarkan 850+ ulasan</p>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-sm">Pemesanan Ambulans Terbaru</h3>
            <span class="text-xs text-emerald-600 font-semibold cursor-pointer hover:underline">Lihat Semua</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 uppercase font-bold border-b border-slate-200">
                        <th class="p-4">ID Pasien</th>
                        <th class="p-4">Nama Pelanggan</th>
                        <th class="p-4">Jenis Layanan</th>
                        <th class="p-4">Lokasi Jemput</th>
                        <th class="p-4">Tujuan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-600">
                    <tr class="hover:bg-slate-50/50">
                        <td class="p-4 font-bold text-slate-800">#IK-4921</td>
                        <td class="p-4">Ahmad Fauzi</td>
                        <td class="p-4">Ambulans Emergency</td>
                        <td class="p-4">Dago, Bandung</td>
                        <td class="p-4">RSHS Bandung</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 font-semibold text-[10px]">
                                Armada Diberangkatkan
                            </span>
                        </td>
                        <td class="p-4 text-right"><button class="text-slate-400 hover:text-slate-800">•••</button></td>
                    </tr>
                    <tr class="hover:bg-slate-50/50">
                        <td class="p-4 font-bold text-slate-800">#IK-4920</td>
                        <td class="p-4">Siti Aminah</td>
                        <td class="p-4">Ambulans Jenazah</td>
                        <td class="p-4">Soreang, Kab. Bandung</td>
                        <td class="p-4">TPU Cikutra</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-semibold text-[10px]">
                                Selesai
                            </span>
                        </td>
                        <td class="p-4 text-right"><button class="text-slate-400 hover:text-slate-800">•••</button></td>
                    </tr>
                    <tr class="hover:bg-slate-50/50">
                        <td class="p-4 font-bold text-slate-800">#IK-4919</td>
                        <td class="p-4">Budi Santoso</td>
                        <td class="p-4">Ambulans ICU</td>
                        <td class="p-4">Cimahi Tengah</td>
                        <td class="p-4">RS Santosa Central</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-semibold text-[10px]">
                                Selesai
                            </span>
                        </td>
                        <td class="p-4 text-right"><button class="text-slate-400 hover:text-slate-800">•••</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>