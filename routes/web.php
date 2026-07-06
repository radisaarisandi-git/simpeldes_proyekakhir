<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman Awal
Route::get('/', function () { 
    return redirect()->route('login'); 
});

// Grup Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
}); // <-- Penutup Grup Guest

// Grup Route untuk Auth (Sudah Login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- PANEL WARGA ---
    Route::get('/warga/dashboard', function () {
        return view('warga.dashboard');
    })->name('warga.dashboard');

    Route::get('/warga/riwayat-surat', [SuratController::class, 'index'])->name('warga.surat.index');
    Route::get('/warga/ajukan-surat', [SuratController::class, 'create'])->name('warga.surat.create');
    Route::post('/warga/ajukan-surat', [SuratController::class, 'store'])->name('warga.surat.store');
    Route::get('/warga/surat/{id}/cetak', [SuratController::class, 'cetak'])->name('warga.surat.cetak');

    // --- PANEL ADMIN / KADES ---
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/kelola-surat', [SuratController::class, 'adminIndex'])->name('admin.surat.index');
    Route::post('/admin/surat/{id}/status', [SuratController::class, 'updateStatus'])->name('admin.surat.status');
    Route::delete('/surat/{id}/hapus', [SuratController::class, 'destroy'])->name('surat.destroy');
    
    // --- MANAJEMEN KEPENDUDUKAN (KADES) ---
    // 1. Menampilkan Tabel Utama Kependudukan
    Route::get('/admin/kependudukan', [KependudukanController::class, 'index'])->name('kependudukan.index');

    // 2. Menampilkan Form Edit Warga
    Route::get('/admin/kependudukan/{id}/edit', [KependudukanController::class, 'edit'])->name('kependudukan.edit');

    // 3. Memproses Simpan Perubahan Data (Method PUT)
    Route::put('/admin/kependudukan/{id}', [KependudukanController::class, 'update'])->name('kependudukan.update');

    // 4. Memproses Hapus Data Warga
    Route::delete('/admin/kependudukan/{id}', [KependudukanController::class, 'destroy'])->name('kependudukan.destroy');

}); // <-- Penutup Grup Auth yang Hilang Tadi!