<?php

use App\Http\Controllers\PengunjungController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PengunjungController::class, 'home'])->name('home');
Route::get('/tentangkami', [PengunjungController::class, 'tentang'])->name('tentang');
Route::get('/paketwisata', [PengunjungController::class, 'paket'])->name('paket');
Route::get('/galeri', [PengunjungController::class, 'galeri'])->name('galeri');
Route::get('/kalender', [PengunjungController::class, 'kalender'])->name('kalender');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/datawisata', function () {
    return view('admin.datawisata');
});
// Submenu dari Data Wisata
Route::get('/admin/datawisata/tentang-kami', function () {
    return view('admin.datawisata.tentang-kami');
});

Route::get('/admin/datawisata/carousel', function () {
    return view('admin.datawisata.carousel');
});

Route::get('/admin/datawisata/event', function () {
    return view('admin.datawisata.event');
});

Route::get('/admin/paketdestinasi', function () {
    return view('admin.paketdestinasi');
});

Route::get('/admin/galeri', function () {
    return view('admin.galeri');
});

Route::get('/admin/kalender', function () {
    return view('admin.kalender');
});

Route::get('/admin/kunjungan', function () {
    return view('admin.kunjungan');
});

Route::get('/admin/booking', function () {
    return view('admin.booking');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});