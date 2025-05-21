<?php

use App\Http\Controllers\Admin\AdminBarangController;
use App\Http\Controllers\Admin\AdminBarangKeluarController;
use App\Http\Controllers\Admin\AdminBarangMasukController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminRekomendasiController;
use App\Http\Controllers\Admin\AdminSatuanController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminJasaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Laporan;
use App\Models\Barang;
use App\Models\Jasa;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    $laporans = Laporan::with('barang.kategori', 'barang.satuan')->orderBy('created_at', 'desc')->get();
    return view('admin.dashboard', compact('laporans'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/admin/barangmasuk/import', [AdminBarangMasukController::class, 'importExcel'])->name('admin.barangmasuk.import');

Route::middleware('auth')->group(function () {
    Route::resource('barang', AdminBarangController::class);
    Route::resource('barangmasuk', AdminBarangMasukController::class);
    Route::resource('barangkeluar', AdminBarangKeluarController::class);
    Route::resource('kategori', AdminKategoriController::class);
    Route::resource('satuan', AdminSatuanController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('jasa', AdminJasaController::class);
    Route::get('/rekomendasi', [AdminRekomendasiController::class, 'index'])->name('rekomendasi');
    Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('laporan');
    
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

require __DIR__.'/auth.php';
