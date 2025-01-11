<?php

use App\Http\Controllers\Admin\AdminBarangController;
use App\Http\Controllers\Admin\AdminBarangKeluarController;
use App\Http\Controllers\Admin\AdminBarangMasukController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminRekomendasiController;
use App\Http\Controllers\Admin\AdminSatuanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('barang', AdminBarangController::class);

Route::resource('barangmasuk', AdminBarangMasukController::class);

Route::resource('barangkeluar', AdminBarangKeluarController::class);

Route::resource('kategori', AdminKategoriController::class);

Route::resource('satuan', AdminSatuanController::class);

Route::get('/rekomendasi', [AdminRekomendasiController::class, 'index'])->name('rekomendasi');

Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('laporan');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
