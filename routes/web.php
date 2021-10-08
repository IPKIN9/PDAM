<?php

use App\Http\Controllers\Cms\GolonganController;
use App\Http\Controllers\Cms\PendaftaranController;
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
});

Route::prefix('/daftar')->group(function () {
    Route::get('index', [PendaftaranController::class, 'index'])->name('daftar.index');
});
