<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Surat;
use App\Models\Kependudukan;

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

    // ==========================
    // PANEL WARGA
    // ==========================

    Route::get('/warga/dashboard', [SuratController::class, 'dashboard'])
        ->name('warga.dashboard');

    Route::get('/warga/riwayat-surat', [SuratController::class, 'index'])
        ->name('warga.surat.index');

    Route::get('/warga/ajukan-surat', [SuratController::class, 'create'])
        ->name('warga.surat.create');

    Route::post('/warga/ajukan-surat', [SuratController::class, 'store'])
        ->name('warga.surat.store');


    // ==========================
    // PANEL ADMIN
    // ==========================

    Route::get('/admin/dashboard', function () {

        $totalSurat = Surat::count();

        $pending = Surat::where('status', 'pending')->count();

        $disetujui = Surat::whereIn('status', ['selesai', 'disetujui'])->count();

        $totalPenduduk = Kependudukan::count();

        return view('admin.dashboard', compact(
            'totalSurat',
            'pending',
            'disetujui',
            'totalPenduduk'
        ));

    })->name('admin.dashboard');

    Route::get('/admin/kelola-surat', [SuratController::class, 'adminIndex'])
        ->name('admin.surat.index');

    Route::get('/admin/surat/{id}/cetak', [SuratController::class, 'cetak'])
        ->name('admin.surat.cetak');

    Route::post('/admin/surat/{id}/status', [SuratController::class, 'updateStatus'])
        ->name('admin.surat.status');

    Route::delete('/surat/{id}/hapus', [SuratController::class, 'destroy'])
        ->name('surat.destroy');


    // ==========================
    // KEPENDUDUKAN
    // ==========================

    Route::get('/admin/kependudukan', [KependudukanController::class, 'index'])
        ->name('kependudukan.index');

    Route::get('/admin/kependudukan/{id}/edit', [KependudukanController::class, 'edit'])
        ->name('kependudukan.edit');

    Route::put('/admin/kependudukan/{id}', [KependudukanController::class, 'update'])
        ->name('kependudukan.update');

    Route::delete('/admin/kependudukan/{id}', [KependudukanController::class, 'destroy'])
        ->name('kependudukan.destroy');

});

