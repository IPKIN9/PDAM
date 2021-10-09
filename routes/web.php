<?php

use App\Http\Controllers\Cms\GolonganController;
use App\Http\Controllers\Cms\KaryawanController;
use App\Http\Controllers\Cms\PendaftaranController;
use App\Http\Controllers\Auth\UserController;
use App\Models\GolonganModel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Layout.Base');
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
