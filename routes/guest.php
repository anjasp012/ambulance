<?php

Route::livewire('/', 'pages::guest.home');
Route::livewire('/tentang-kami', 'pages::guest.tentang-kami');
Route::livewire('/layanan', 'pages::guest.layanan');
Route::livewire('/berita', 'pages::guest.berita');
Route::livewire('/berita/{slug}', 'pages::guest.berita-detail');
Route::livewire('/armada', 'pages::guest.armada');
Route::livewire('/cek-rute', 'pages::guest.cek-rute');
