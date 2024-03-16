<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasokuController;
use App\Http\Controllers\loginController;

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

// Tap link tutor
Route::get('/akses-tutor', function (){
    return view('taplink.layanan_tutor');
});

// Taplink Official
Route::get('/akses-officials', function (){
    return view('taplink.official_index');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/admin', function () {
    return view('admin.layout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->middleware('auth');
    Route::get('/reset-session', 'resetSession'); // reset session 
});

// login controller
Route::controller(LoginController::class)->middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
        Route::post('/logout', 'logout');
});

// Kasoku controller
Route::controller(KasokuController::class)->group(function () {
    Route::get('/kasoku', 'index');
    Route::get('/kasoku/request', 'request');
    Route::post('/input_request_kasoku', 'inputRequest');
    Route::get('/kasoku/request/list', 'kasokuRequest');

    // update status to process
    Route::get('/update/status/{id}', 'updateStatus');
    Route::get('kasoku/status/update/{id}', 'updateStatusProses');
    Route::put('kasoku/status/update/{id}', 'updateStatusProses');

    //update status to done
    

    Route::get('/kasoku/stock', 'stock');
    Route::get('/kasoku/stock/input', 'inputStock');
    Route::post('/kasoku/stock/input/save', 'saveInputStock');
});

Route::controller(GudangController::class)->middleware('auth')->group(function () {
   Route::get('gudang', 'index');

    // stok barang
    Route::get('stok_barang', 'stokBarang');
    Route::get('stok_baju', 'stokBaju');
    Route::get('stok_buku/{kategori?}', 'stokBuku')->name('stok_buku');
    Route::get('stok_merchandise', 'stokMerchandise');

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
    Route::get('form_buku', 'tambahBuku');
    Route::get('form_merchandise', 'tambahMerchandise');
    Route::post('simpan_barang', 'simpanBarang');
    //tambah kategori baju
    Route::get('kategori_barang', 'tambahKategoriBarang');
    Route::post('simpan_kategori_barang', 'simpanKategoriBarang');

    // form paket kirim
    Route::get('paket_osce', 'paketOSCE');
    Route::post('simpan_osce', 'simpanOSCE');

    Route::get('paket_cbt', 'paketCBT');
    Route::post('simpan_cbt', 'simpanCBT');

    // riwayat paket kirim
    Route::get('riwayat_paket', 'riwayatPaketKirim');

    // list statut request kasoku
    Route::get('gudang/kasoku/list', 'listRequest');
});
