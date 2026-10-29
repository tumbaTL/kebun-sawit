<?php

use App\Http\Controllers\LaporanPenjualanStafController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\DashboardPekerjaController;
use App\Http\Controllers\VerifikasiLaporanPekerjaanController;
use App\Http\Controllers\LaporanPekerjaanController;
use App\Http\Controllers\ArahanTugasController;
use App\Http\Controllers\LaporanKeuanganController;
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
| LUPA PASSWORD
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // Halaman lupa password
    Route::get('/forgot-password', [
        PasswordResetController::class,
        'create'
    ])->name('password.request');

    // Mengirim tautan pemulihan ke email
    Route::post('/forgot-password', [
        PasswordResetController::class,
        'sendResetLinkEmail'
    ])->name('password.email');

    // Halaman membuat password baru
    Route::get('/reset-password/{token}', [
        PasswordResetController::class,
        'showResetForm'
    ])->name('password.reset');

    // Menyimpan password baru
    Route::post('/reset-password', [
        PasswordResetController::class,
        'reset'
    ])->name('password.update');

});


/*
|--------------------------------------------------------------------------
| KHUSUS STAF
|--------------------------------------------------------------------------
| Staf mengelola pekerjaan, data pohon, perawatan, dan jadwal.
*/

Route::middleware(['auth', 'role:staf'])->group(function () {

     // Verifikasi laporan pekerjaan (khusus Staf Kebun)
    Route::get('/dashboard/pemilik/verifikasi-laporan-pekerjaan', [
        VerifikasiLaporanPekerjaanController::class,
        'index',
    ])->name('pemilik.verifikasi-laporan');

    Route::post('/dashboard/pemilik/verifikasi-laporan-pekerjaan/{workReport}/setujui', [
        VerifikasiLaporanPekerjaanController::class,
        'approve',
    ])->name('pemilik.verifikasi-laporan.approve');

    Route::post('/dashboard/pemilik/verifikasi-laporan-pekerjaan/{workReport}/tolak', [
        VerifikasiLaporanPekerjaanController::class,
        'reject',
    ])->name('pemilik.verifikasi-laporan.reject');

    Route::get('/dashboard/pemilik/verifikasi-laporan-pekerjaan/{workReport}/foto/{photoIndex}', [
        VerifikasiLaporanPekerjaanController::class,
        'photo',
    ])->whereNumber('photoIndex')->name('pemilik.verifikasi-laporan.foto');

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

    
    // Laporan Penjualan - khusus Staf
    Route::get('/dashboard/staf/laporan-penjualan', [
        LaporanPenjualanStafController::class,
        'index',
    ])->name('staf.penjualan');

    Route::post('/dashboard/staf/laporan-penjualan', [
        LaporanPenjualanStafController::class,
        'store',
    ])->name('staf.penjualan.store');

    // Rekap hasil penjualan ke pabrik setiap 14 hari panen
    Route::get('/dashboard/staf/hasil-penjualan-pabrik', [
        LaporanPenjualanStafController::class,
        'factoryResults',
    ])->name('staf.hasil-penjualan');

});

/*
|--------------------------------------------------------------------------
| KHUSUS PEKERJA
|--------------------------------------------------------------------------
| Pekerja melihat arahan tugas dan mengirim laporan pekerjaan.
*/

Route::middleware(['auth', 'role:pekerja'])->group(function () {

    // Dashboard Pekerja
    Route::get('/dashboard/pekerja', [
        DashboardPekerjaController::class,
        'index',
    ])->name('pekerja.dashboard');

    // Melihat Arahan Tugas
    Route::get('/dashboard/pekerja/arahan-tugas', [
        ArahanTugasController::class,
        'index',
    ])->name('pekerja.arahan-tugas');

    // Laporan Pekerjaan
    Route::get('/dashboard/pekerja/laporan-pekerjaan', [
        LaporanPekerjaanController::class,
        'index',
    ])->name('pekerja.laporan-pekerjaan');

    Route::post('/dashboard/pekerja/laporan-pekerjaan', [
        LaporanPekerjaanController::class,
        'store',
    ])->name('pekerja.laporan-pekerjaan.store');

});


/*
|--------------------------------------------------------------------------
| KHUSUS PEMILIK KEBUN
|--------------------------------------------------------------------------
| Pemilik hanya melihat laporan penjualan.
*/

Route::middleware(['auth', 'role:pemilik'])->group(function () {

    Route::get('/dashboard/pemilik/laporan-keuangan', [
        LaporanKeuanganController::class,
        'index',
    ])->name('pemilik.keuangan');

});
