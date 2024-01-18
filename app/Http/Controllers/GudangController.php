<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\baju;
use App\Models\riwayat_baju;
use App\Models\buku;
use App\Models\riwayat_buku;
use App\Models\User;
use Carbon\Carbon;
class GudangController extends Controller
{
    //index
    public function index()
    {
        return view('gudang.index');
    }

    // riwayat data masuk dan keluar
    public function riwayatBaju()
    {
        $data = riwayat_baju::with('user', 'baju')->get();

        //dd($data);
        return view ('gudang.riwayat_baju', compact('data'));
    }

    public function rekapStockBaju()
    {
        //update stok
        $stok = DB::table('riwayat_bajus')
        ->join('bajus', 'bajus.id', '=', 'riwayat_bajus.baju_id')
        ->join('users', 'users.id', '=', 'riwayat_bajus.user_id')
        ->select('bajus.baju','bajus.ukuran', DB::raw('SUM(riwayat_bajus.jumlah) AS total_per_ukuran'))
        ->groupBy('bajus.baju','bajus.ukuran')
        ->get();

        //dd($stok);
        return view('gudang.rekap_baju', compact('stok'));
    }

    public function tambahBaju(Request $request)
    {
        $user = user::get();
        $barang = baju::get();

        //dd($barang);
        return view ('gudang.form_tambah_stok_baju', compact('user','barang'));
    }

    public function simpanBaju(Request $request)
    {
        //dd($request->all());
        riwayat_baju::create([
            'baju_id' => $request->inputbaju,
            'jumlah' => $request->inputjumlah,
            'user_id' => $request->inputuser,
            'keterangan' => $request->inputket,
        ]);

        return redirect('riwayat_baju');
    }

    //kategori baju
    public function tambahKategoriBaju()
    {
       
        return view ('gudang.form_tambah_kategori_baju');
    }

    public function simpanKategoriBaju(Request $request)
    {
        //dd($request->all());
        baju::create([
            'baju' => $request->inputBaju,
            'ukuran' => $request->inputUkuran
        ]);

        return redirect('riwayat');
    }

    // BUKU

    public function riwayatBuku()
    {
        $data = riwayat_buku::with('user','buku')->get();
        //dd($data);
        return view('gudang.riwayat_buku', compact('data'));
    }

    public function stokBuku()
    {
        //update stok
        $stok = DB::table('riwayat_bukus')
        ->join('bukus', 'bukus.id', '=', 'riwayat_bukus.buku_id')
        ->join('users', 'users.id', '=', 'riwayat_bukus.user_id')
        ->select('bukus.nama_buku', DB::raw('SUM(riwayat_bukus.jumlah) AS stok'))
        ->groupBy('bukus.nama_buku')
        ->get();

        //dd($stok);

        return view('gudang.stok_buku', compact('stok'));
    }
    
    public function tambahBuku(Request $request)
    {
        $user = user::get();
        $barang = buku::get();

        //dd($barang);
        return view ('gudang.form_tambah_stok_buku', compact('user','barang'));
    }

    public function simpanBuku(Request $request)
    {
        //dd($request->all());
        riwayat_buku::create([
            'buku_id' => $request->inputbuku,
            'jumlah' => $request->inputjumlah,
            'user_id' => $request->inputuser,
            'keterangan' => $request->inputket
        ]);

        return redirect('riwayat_buku');
    }

    //kategori buku
    public function tambahKategoriBuku()
    {
       
        return view ('gudang.form_tambah_kategori_buku');
    }

    public function simpanKategoriBuku(Request $request)
    {
        //dd($request->all());
        buku::create([
            'nama_buku' => $request->inputBuku
        ]);

        return redirect('riwayat_buku');
    }

}


