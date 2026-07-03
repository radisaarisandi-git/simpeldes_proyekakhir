<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () { 
    return redirect()->route('login'); 
    });

    Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    });

    Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/warga/dashboard', function () {
        return view('warga.dashboard');
    })->name('warga.dashboard');

    Route::get('/warga/riwayat-surat', [SuratController::class, 'index'])->name('warga.surat.index');

    Route::get('/warga/ajukan-surat', [SuratController::class, 'create'])->name('warga.surat.create');

    Route::post('/warga/ajukan-surat', [SuratController::class, 'store'])->name('warga.surat.store');

    Route::get('/warga/surat/{id}/cetak', [SuratController::class, 'cetak'])->name('warga.surat.cetak');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/kelola-surat', [SuratController::class, 'adminIndex'])->name('admin.surat.index');
    Route::post('/admin/surat/{id}/status', [SuratController::class, 'updateStatus'])->name('admin.surat.status');

    Route::delete('/surat/{id}/hapus', [SuratController::class, 'destroy'])->name('surat.destroy');
});