<?php

use App\Http\Controllers\Cms\GolonganController;
use App\Http\Controllers\Cms\KaryawanController;
use App\Http\Controllers\Cms\PendaftaranController;
use App\Models\GolonganModel;
use Illuminate\Support\Facades\Route;

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
