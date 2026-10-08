<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
// DASHBOARD PEMILIK
// ==============================

Route::middleware('auth')->group(function () {

    // Dashboard Pemilik
    Route::get('/dashboard/pemilik', function () {
        return view('dashboard.pemilik');
    })->name('pemilik.dashboard');


    // Data Pohon & Lokasi
    Route::get('/dashboard/pemilik/pohon-lokasi', function () {
        return view('dashboard.pohon-lokasi');
    })->name('pemilik.pohon-lokasi');

});