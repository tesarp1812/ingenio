<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/schedule', function () {
    return view('schedule');
});

Route::post('/schedule', [ScheduleController::class, 'find_schedule']);

Route::get('/admin', function () {
    return view('admin.layout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->middleware('auth');
    Route::get('/reset-session', 'resetSession'); // reset session 
});

Route::controller(loginController::class)->group(function () {
        Route::get('/login', 'index')->name('login')->middleware('guest');
        Route::post('/login', 'authenticate');
        Route::post('/logout', 'logout');
});

Route::controller(GudangController::class)->group(function () {
   Route::get('gudang', 'index')->middleware('auth');

    // stok barang
    Route::get('stok_barang', 'stokBarang')->middleware('auth');
    Route::get('stok_baju', 'stokBaju')->middleware('auth');
    Route::get('stok_buku/{kategori?}', 'stokBuku')->name('stok_buku')->middleware('auth');
    Route::get('stok_merchandise', 'stokMerchandise')->middleware('auth');

    //tambah stok baju
    Route::get('form_baju', 'tambahBaju')->middleware('auth');
    Route::post('simpan_baju', 'simpanBaju')->middleware('auth');
    //tambah kategori baju
    Route::get('kategori_baju', 'tambahKategoriBaju')->middleware('auth');
    Route::post('simpan_kategori_baju', 'simpanKategoriBaju')->middleware('auth');

    // table barang
    //barang
    Route::get('riwayat_barang', 'riwayatBarang')->middleware('auth');
    Route::get('stok_buku', 'stokBuku')->middleware('auth');
    // riwayat barang
    Route::get('riwayat_merchandise', 'riwayatMerchandise')->middleware('auth');
    Route::get('riwayat_buku', 'riwayatBuku')->middleware('auth');
    Route::get('riwayat_barang', 'riwayatBarang')->middleware('auth');
    //tambah stok barang
    Route::get('form_barang', 'tambahBarang')->middleware('auth');
    Route::get('form_buku', 'tambahBuku')->middleware('auth');
    Route::get('form_merchandise', 'tambahMerchandise')->middleware('auth');
    Route::post('simpan_barang', 'simpanBarang')->middleware('auth');
    //tambah kategori baju
    Route::get('kategori_barang', 'tambahKategoriBarang')->middleware('auth');
    Route::post('simpan_kategori_barang', 'simpanKategoriBarang')->middleware('auth');

    // form paket kirim
    Route::get('paket_osce', 'paketOSCE')->middleware('auth');
    Route::post('simpan_osce', 'simpanOSCE')->middleware('auth');

    Route::get('paket_cbt', 'paketCBT')->middleware('auth');
    Route::post('simpan_cbt', 'simpanCBT')->middleware('auth');

    // riwayat paket kirim
    Route::get('riwayat_paket', 'riwayatPaketKirim')->middleware('auth');
});
