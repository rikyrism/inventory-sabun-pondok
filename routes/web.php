<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('auth.index');
    });

    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('login', [Controllers\Auth\AuthController::class, 'index'])->name('index');
        Route::post('login', [Controllers\Auth\AuthController::class, 'login'])->name('login');
    });
});

// authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('logout', [Controllers\Auth\AuthController::class, 'logout'])->name('logout');
    });

    Route::get('dashboard', [Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('barang', Controllers\Barang\BarangController::class);
    Route::resource('kategori', Controllers\Kategori\KategoriController::class);
    Route::resource('produksi', Controllers\Produksi\ProduksiController::class);
    Route::resource('barang-masuk', Controllers\BarangMasuk\BarangMasukController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::resource('barang-keluar', Controllers\BarangKeluar\BarangKeluarController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::prefix('laporan-stok')->name('laporan-stok.')->group(function() {
        Route::get('/', [Controllers\Laporan\LaporanController::class, 'laporanStokIndex'])->name('index'); //
        Route::get('/export-pdf', [Controllers\Laporan\LaporanController::class, 'laporanStokExportPdf'])->name('export-pdf');
        Route::get('/export-excel', [Controllers\Laporan\LaporanController::class, 'laporanStokExportExcel'])->name('export-excel');
    });
    Route::prefix('laporan-barang-masuk')->name('laporan-barang-masuk.')->group(function() {
        Route::get('/', [Controllers\Laporan\LaporanController::class, 'laporanBarangMasukIndex'])->name('index'); //
        Route::get('/export-pdf', [Controllers\Laporan\LaporanController::class, 'laporanBarangMasukExportPdf'])->name('export-pdf');
        Route::get('/export-excel', [Controllers\Laporan\LaporanController::class, 'laporanBarangMasukExportExcel'])->name('export-excel');
    });
    Route::prefix('laporan-barang-keluar')->name('laporan-barang-keluar.')->group(function() {
        Route::get('/', [Controllers\Laporan\LaporanController::class, 'laporanBarangKeluarIndex'])->name('index'); //
        Route::get('/export-pdf', [Controllers\Laporan\LaporanController::class, 'laporanBarangKeluarExportPdf'])->name('export-pdf');
        Route::get('/export-excel', [Controllers\Laporan\LaporanController::class, 'laporanBarangKeluarExportExcel'])->name('export-excel');
    });
    Route::resource('user', Controllers\User\UserController::class)->except('show');
    Route::get('change-password', [Controllers\Auth\AuthController::class, 'changePassword'])->name('profile.change-password');
    Route::post('update-password', [Controllers\Auth\AuthController::class, 'updatePassword'])->name('profile.update-password');
    
    // Routes untuk notifikasi
    Route::prefix('notification')->name('notification.')->group(function() {
        Route::get('/', [Controllers\NotificationController::class, 'getNotifications'])->name('get');
        Route::delete('/clear', [Controllers\NotificationController::class, 'clearNotifications'])->name('clear');
    });
});
