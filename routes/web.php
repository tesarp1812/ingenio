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
   
    // stok barang
    Route::get('stok_barang', 'stokBarang');

   // table baju
    Route::get('gudang', 'index');
    //baju
    Route::get('riwayat_baju', 'riwayatBaju');
    //tambah stok baju
    Route::get('form_baju', 'tambahBaju');
    Route::post('simpan_baju', 'simpanBaju');
    //tambah kategori baju
    Route::get('kategori_baju', 'tambahKategoriBaju');
    Route::post('simpan_kategori_baju', 'simpanKategoriBaju');

    // table barang
    //barang
    Route::get('riwayat_barang', 'riwayatBarang');
    Route::get('stok_buku', 'stokBuku');
    // riwayat barang
    Route::get('riwayat_merchandise', 'riwayatMerchandise');
    Route::get('riwayat_buku', 'riwayatBuku');
    Route::get('riwayat_barang', 'riwayatBarang');
    //tambah stok barang
    Route::get('form_barang', 'tambahBarang');
    Route::post('simpan_barang', 'simpanBarang');
    //tambah kategori baju
    Route::get('kategori_barang', 'tambahKategoriBarang');
    Route::post('simpan_kategori_barang', 'simpanKategoriBarang');

    // form paket kirim
    Route::get('paket_osce', 'paketOSCE');
});
