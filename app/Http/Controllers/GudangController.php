<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\baju;
use App\Models\barang;
use App\Models\riwayat_baju;
use App\Models\riwayat_barang;
use App\Models\User;
use Carbon\Carbon;

class GudangController extends Controller
{
    //index
    public function index()
    {
        return view('gudang.index');
    }

    // riwayat data masuk dan keluar baju
    public function riwayatBaju()
    {
        $data = riwayat_barang::with('user', 'baju')->get();
        //dd($data);
        return view('gudang.riwayat_baju', compact('data'));
    }

    //form tambah baju
    public function tambahBaju(Request $request)
    {
        $user = user::get();
        $baju = baju::get();

        //dd($barang);
        return view('gudang.form_tambah_stok_baju', compact('user', 'baju'));
    }

    public function simpanBaju(Request $request)
    {
        //dd($request->all());
        riwayat_barang::create([
            'baju_id' => $request->inputbaju,
            'jumlah' => $request->inputjumlah,
            'user_id' => $request->inputuser,
            'keterangan' => $request->inputket,
        ]);

        return redirect('riwayat_barang');
    }

    //kategori baju
    public function tambahKategoriBaju()
    {

        return view('gudang.form_tambah_kategori_baju');
    }

    public function simpanKategoriBaju(Request $request)
    {
        //dd($request->all());
        baju::create([
            'nama_barang' => $request->inputBaju,
            'ukuran' => $request->inputUkuran
        ]);

        return redirect('form_baju');
    }

    // table barang
    // tampilan barang 
    public function riwayatBarang()
    {
        $data = riwayat_barang::with('user', 'barang', 'baju')->get();
        //dd($data);
        return view('gudang.riwayat_barang', compact('data'));
    }

    // tampilan buku
    public function riwayatBuku()
    {
        $data = riwayat_barang::with('user', 'barang')
            ->whereHas('barang', function ($query) {
                $query->where('jenis', '=', 'buku');
            })->get();
        //dd($data);
        return view('gudang.riwayat_buku', compact('data'));
    }

    public function stokBarang()
    {
        
        $stok = DB::table('riwayat_barang')
        ->leftJoin('baju', 'baju.id', '=', 'riwayat_barang.baju_id')
        ->leftJoin('barang', 'barang.id', '=', 'riwayat_barang.barang_id')
        ->select('barang.nama_barang as barang', 'baju.nama_barang as baju', 'baju.ukuran', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
        ->groupBy('barang.nama_barang', 'baju.nama_barang', 'baju.ukuran')
        ->get();

        //dd($stok);
        return view('gudang.stok_barang', compact('stok'));
    }

    // tambah barang buku & merchandise
    public function tambahBarang(Request $request)
    {
        $user = user::get();
        $barang = barang::get();

        //dd($barang);
        return view('gudang.form_tambah_stok_barang', compact('user', 'barang'));
    }

    public function simpanBarang(Request $request)
    {
        //dd($request->all());
        riwayat_barang::create([
            'barang_id' => $request->inputbarang,
            'jumlah' => $request->inputjumlah,
            'user_id' => $request->inputuser,
            'keterangan' => $request->inputket
        ]);

        return redirect('riwayat_barang');
    }

    //kategori barang
    public function tambahKategoriBarang()
    {

        return view('gudang.form_tambah_kategori_barang');
    }

    public function simpanKategoriBarang(Request $request)
    {
        //dd($request->all());
        barang::create([
            'nama_barang' => $request->inputBarang,
            'jenis' => $request->inputJenis
        ]);

        return redirect('riwayat_barang');
    }
}
