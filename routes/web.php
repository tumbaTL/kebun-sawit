
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});

// ==============================
// LOGIN
// ==============================

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

// ==============================
// LOGOUT
// ==============================

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// ==============================
// KHUSUS STAF
// ==============================

Route::middleware(['auth', 'role:staf'])->group(function () {

    // Dashboard
    Route::get('/dashboard/pemilik', function () {
        return view('dashboard.pemilik');
    })->name('pemilik.dashboard');

    // Data Pohon & Lokasi
    Route::get('/dashboard/pemilik/pohon-lokasi', function () {
        return view('dashboard.pohon-lokasi');
    })->name('pemilik.pohon-lokasi');

    // Input Pekerjaan
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

// ==============================
// KHUSUS PEMILIK
// ==============================

Route::middleware(['auth', 'role:pemilik'])->group(function () {

    // Laporan Keuangan
    Route::get('/dashboard/pemilik/laporan-keuangan', function () {
        return view('dashboard.keuangan');
    })->name('pemilik.keuangan');

});
