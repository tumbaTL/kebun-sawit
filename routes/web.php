<?php

use App\Http\Controllers\DashboardPemilikController;
use App\Http\Controllers\KelolaJadwalController;
use App\Http\Controllers\KelolaPerawatanController;
use App\Http\Controllers\InputPekerjaanController;
use App\Http\Controllers\PohonLokasiController;
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
    Route::get('/dashboard/pemilik', [
        DashboardPemilikController::class,
        'index'
    ])->name('pemilik.dashboard');

    // Data Pohon dan Lokasi
    Route::get('/dashboard/pemilik/pohon-lokasi', [
        PohonLokasiController::class,
        'index'
    ])->name('pemilik.pohon-lokasi');

    Route::post('/dashboard/pemilik/pohon-lokasi', [
        PohonLokasiController::class,
        'store'
    ])->name('pemilik.pohon-lokasi.store');

    // Input Pekerjaan
    Route::get('/dashboard/pemilik/input-pekerjaan', [
        InputPekerjaanController::class,
        'index'
    ])->name('pemilik.input-pekerjaan');

    Route::post('/dashboard/pemilik/input-pekerjaan', [
        InputPekerjaanController::class,
        'store'
    ])->name('pemilik.input-pekerjaan.store');

    // Edit tugas
    Route::put('/dashboard/pemilik/input-pekerjaan/{task}', [
        InputPekerjaanController::class,
        'update'
    ])->name('pemilik.input-pekerjaan.update');

    // Hapus tugas
    Route::delete('/dashboard/pemilik/input-pekerjaan/{task}', [
        InputPekerjaanController::class,
        'destroy'
    ])->name('pemilik.input-pekerjaan.destroy');

    // Kelola Perawatan

    // Kelola Perawatan
    Route::get('/dashboard/pemilik/kelola-perawatan', [
        KelolaPerawatanController::class,
        'index'
    ])->name('pemilik.perawatan');

    Route::post('/dashboard/pemilik/kelola-perawatan', [
        KelolaPerawatanController::class,
        'store'
    ])->name('pemilik.perawatan.store');

    Route::put('/dashboard/pemilik/kelola-perawatan/{maintenance}', [
        KelolaPerawatanController::class,
        'update'
    ])->name('pemilik.perawatan.update');

    Route::delete('/dashboard/pemilik/kelola-perawatan/{maintenance}', [
        KelolaPerawatanController::class,
        'destroy'
    ])->name('pemilik.perawatan.destroy');

    // Kelola Jadwal
    Route::get('/dashboard/pemilik/kelola-jadwal', [
        KelolaJadwalController::class,
        'index'
    ])->name('pemilik.jadwal');

    Route::post('/dashboard/pemilik/kelola-jadwal', [
        KelolaJadwalController::class,
        'store'
    ])->name('pemilik.jadwal.store');

    Route::put('/dashboard/pemilik/kelola-jadwal/{maintenanceSchedule}', [
        KelolaJadwalController::class,
        'update'
    ])->name('pemilik.jadwal.update');

    Route::delete('/dashboard/pemilik/kelola-jadwal/{maintenanceSchedule}', [
        KelolaJadwalController::class,
        'destroy'
    ])->name('pemilik.jadwal.destroy');


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
