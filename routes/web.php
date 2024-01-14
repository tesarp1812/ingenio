<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GudangController;

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

Route::get('/', function () {
    return view('index');
});

Route::controller(GudangController::class)->group(function () {
    Route::get('gudang', 'index');
    Route::get('riwayat', 'riwayat');
    Route::get('stok', 'rekapStock');
    //tambah stok
    Route::get('form_baju', 'tambahBaju');
    Route::post('simpan_baju', 'simpanBaju');
    //tambah kategori
    Route::get('form_kategori_baju', 'tambahKategori');
    Route::post('simpan_kategori_baju', 'simpanKategori');

});
