<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| LOGIN DAN LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| KHUSUS STAF
|--------------------------------------------------------------------------
| Staf mengelola pekerjaan, data pohon, perawatan, dan jadwal.
*/

Route::middleware(['auth', 'role:staf'])->group(function () {

    // Dashboard Staf
    Route::get('/dashboard/pemilik', function () {
        return view('dashboard.pemilik');
    })->name('pemilik.dashboard');

    // Data Pohon dan Lokasi
    Route::get('/dashboard/pemilik/pohon-lokasi', function () {
        return view('dashboard.pohon-lokasi');
    })->name('pemilik.pohon-lokasi');

    // Kelola Pekerjaan
    Route::get('/dashboard/pemilik/input-pekerjaan', function () {
        return view('dashboard.pekerjaan');
    })->name('pemilik.input-pekerjaan');

    // Kelola Perawatan
    Route::get('/dashboard/pemilik/kelola-perawatan', function () {
        return view('dashboard.perawatan');
    })->name('pemilik.perawatan');

    // Kelola Jadwal
    Route::get('/dashboard/pemilik/kelola-jadwal', function () {
        return view('dashboard.jadwal');
    })->name('pemilik.jadwal');

});

/*
|--------------------------------------------------------------------------
| KHUSUS PEKERJA
|--------------------------------------------------------------------------
| Pekerja melihat arahan tugas dan mengirim laporan pekerjaan.
*/

Route::middleware(['auth', 'role:pekerja'])->group(function () {

    // Dashboard Pekerja
    Route::get('/dashboard/pekerja', function () {
        return view('dashboard.pekerja');
    })->name('pekerja.dashboard');

    // Melihat Arahan Tugas
    Route::get('/dashboard/pekerja/arahan-tugas', function () {
        return view('dashboard.arahan-tugas');
    })->name('pekerja.arahan-tugas');

    // Laporan Pekerjaan
    Route::get('/dashboard/pekerja/laporan-pekerjaan', function () {
        return view('dashboard.laporan-pekerjaan');
    })->name('pekerja.laporan-pekerjaan');

});

/*
|--------------------------------------------------------------------------
| KHUSUS PEMILIK KEBUN
|--------------------------------------------------------------------------
| Pemilik melihat laporan keuangan.
*/

Route::middleware(['auth', 'role:pemilik'])->group(function () {

    // Laporan Keuangan
    Route::get('/dashboard/pemilik/laporan-keuangan', function () {
        return view('dashboard.keuangan');
    })->name('pemilik.keuangan');

});
