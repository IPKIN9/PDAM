<?php

use App\Http\Controllers\Cms\GolonganController;
use App\Http\Controllers\Cms\KaryawanController;
use App\Http\Controllers\Cms\PendaftaranController;
use App\Http\Controllers\Cms\DashController;
use App\Http\Controllers\Cms\PemakaianController;
use App\Http\Controllers\Cms\HomesController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Cms\PembayaranController;
use App\Http\Controllers\Cms\TentangKamiController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/home')->group(function () {
    Route::post('insertpermintaan', [HomeController::class, 'permintaan'])->name('permintaan.insert');
    Route::post('insertpengaduan', [HomeController::class, 'pengaduan'])->name('pengaduan.insert');
});

Route::get('Dashboard', function () {
    return view('Cms.Dashboard');
});
Route::get('/contoh', function () {
    return view('Contoh.Contoh');
})->name('contoh.index');

Route::prefix('/golongan')->group(function () {
    Route::get('index', [GolonganController::class, 'index'])->name('golongan.index');
    Route::post('create', [GolonganController::class, 'create'])->name('golongan.create');
    Route::get('getSpecData/{id}', [GolonganController::class, 'detail']);
    Route::post('update', [GolonganController::class, 'update'])->name('golongan.update');
    Route::delete('deleteDetailData/{id}', [GolonganController::class, 'destroy']);
    Route::delete('deleteSpecData/{id}', [GolonganController::class, 'delete']);
});

Route::prefix('/daftar')->group(function () {
    Route::get('index', [PendaftaranController::class, 'index'])->name('daftar.index');
    Route::get('getDetailGolongan/{id}', [PendaftaranController::class, 'detail']);
    Route::post('create', [PendaftaranController::class, 'create'])->name('daftar.create');
    Route::get('getSpecData/{id}', [PendaftaranController::class, 'detail_edit']);
    Route::post('update', [PendaftaranController::class, 'update'])->name('daftar.update');
    Route::delete('deleteSpecData/{id}', [PendaftaranController::class, 'delete']);
});

Route::prefix('/karyawan')->group(function () {
    Route::get('index', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::post('insert', [KaryawanController::class, 'insert'])->name('karyawan.insert');
    Route::get('getspecdata/{id}', [KaryawanController::class, 'edit']);
    Route::post('update', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('deletespecdata/{id}', [KaryawanController::class, 'delete']);
});
Route::prefix('/user')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::post('insert', [UserController::class, 'insert'])->name('user.insert');
    Route::get('getspecdata/{id}', [UserController::class, 'edit']);
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::delete('deletespecdata/{id}', [UserController::class, 'delete']);
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('index', [DashController::class, 'index'])->name('dashboard.index');
});

Route::prefix('/pemakaian')->group(function () {
    Route::get('index', [PemakaianController::class, 'index'])->name('pemakaian.index');
    Route::post('insert', [PemakaianController::class, 'insert'])->name('pemakaian.insert');
    Route::get('getspecdata/{id}', [PemakaianController::class, 'edit']);
    Route::post('update', [PemakaianController::class, 'update'])->name('pemakaian.update');
    Route::delete('deletespecdata/{id}', [PemakaianController::class, 'delete']);
});

Route::prefix('tentang_kami')->group(function () {
    Route::get('index', [TentangKamiController::class, 'index'])->name('tentangkami.index');
    Route::post('create', [TentangKamiController::class, 'create'])->name('tentangkami.create');
});
Route::prefix('/home')->group(function () {
    Route::get('index', [HomesController::class, 'permintaanindex'])->name('permintaan.index');
    Route::delete('deletespecdata/{id}', [HomesController::class, 'deletepermintaan']);
    Route::get('pengaduan', [HomesController::class, 'pengaduanindex'])->name('pengaduan.index');
    Route::delete('delete/{id}', [HomesController::class, 'deletepengaduan']);
});

Route::prefix('pembayaran')->group(function () {
    Route::get('index', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('getDataStatus/{id}', [PembayaranController::class, 'status']);
    Route::post('create', [PembayaranController::class, 'create'])->name('pembayaran.insert');
    Route::get('printData/{id}', [PembayaranController::class, 'cetak']);
});
