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

Route::get('/admin', function () {
    return view('admin.layout');
});

Route::controller(GudangController::class)->group(function () {
    Route::get('gudang', 'index');
    //baju
    Route::get('riwayat_baju', 'riwayatBaju');
    Route::get('stok_baju', 'rekapStockBaju');
    //tambah stok baju
    Route::get('form_baju', 'tambahBaju');
    Route::post('simpan_baju', 'simpanBaju');
    //tambah kategori baju
    Route::get('form_kategori_baju', 'tambahKategoriBaju');
    Route::post('simpan_kategori_baju', 'simpanKategoriBaju');

    //buku
    Route::get('riwayat_buku', 'riwayatBuku');
    Route::get('stok_buku', 'stokBuku');

    //tambah stok buku
    Route::get('form_buku', 'tambahBuku');
    Route::post('simpan_buku', 'simpanBuku');

    //tambah kategori baju
    Route::get('form_kategori_buku', 'tambahKategoriBuku');
    Route::post('simpan_kategori_buku', 'simpanKategoriBuku');

});
