<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\PesananController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPaketController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\User\RiwayatPemesananController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('paket/data', [HomeController::class, 'paketData'])->name('paket.data');

Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail.paket');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('profil', [ProfilController::class, 'index'])->name('profil');
        Route::post('profil', [ProfilController::class, 'simpan'])->name('profil.simpan');
        Route::get('pesanan', [PesananController::class, 'daftar'])->name('pesanan');
        Route::get('riwayat-pemesanan', [RiwayatPemesananController::class, 'index'])->name('user.riwayat');
    });
    Route::get('bayar/{token}/{id}', [PesananController::class, 'bayar'])->name('user.bayar');
    Route::post('bayar', [PesananController::class, 'simpanBayar'])->name('user.bayar.simpan');
    Route::get('pesan/{id}', [PesananController::class, 'index'])->name('pesan-sekarang');
    Route::post('pesan/simpan', [PesananController::class, 'simpan'])->name('user.simpanSewa');
    Route::get('kota', [RajaOngkirController::class, 'kotaProvinsi'])->name('kota');
    Route::get('nota/{id}', [PesananController::class, 'nota'])->name('nota');
});

// route untuk admin
Route::prefix('admin')->middleware(['auth','admin'])->group(function() {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    Route::get('laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan');

    Route::get('pesanan', [AdminPesananController::class, 'index'])->name('admin.pesanan');
    Route::post('pesanan/komentar', [AdminPesananController::class, 'komentar'])->name('admin.pesanan.komentar');

    Route::prefix('kategori')->group(function() {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('admin.kategori');
        Route::get('/tambah', [AdminKategoriController::class, 'tambah'])->name('admin.kategori.tambah');
        Route::post('/simpan', [AdminKategoriController::class, 'simpan'])->name('admin.kategori.simpan');
        Route::get('/ubah/{id}', [AdminKategoriController::class, 'ubah'])->name('admin.kategori.ubah');
        Route::post('/edit', [AdminKategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::get('/hapus/{id}', [AdminKategoriController::class, 'hapus'])->name('admin.kategori.hapus');
    });

    Route::prefix('paket')->group(function() {
        Route::get('/', [AdminPaketController::class, 'index'])->name('admin.paket');
        Route::get('/tambah', [AdminPaketController::class, 'tambah'])->name('admin.paket.tambah');
        Route::post('/simpan', [AdminPaketController::class, 'simpan'])->name('admin.paket.simpan');
        Route::get('/ubah/{id}', [AdminPaketController::class, 'ubah'])->name('admin.paket.ubah');
        Route::post('/edit', [AdminPaketController::class, 'edit'])->name('admin.paket.edit');
        Route::get('/hapus/{id}', [AdminPaketController::class, 'hapus'])->name('admin.paket.hapus');
    });
});

