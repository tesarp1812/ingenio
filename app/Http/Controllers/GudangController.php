<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\baju;
use App\Models\riwayat_baju;
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
    public function riwayat()
    {
        $data = riwayat_baju::with('user', 'baju')->get();

        //dd($data);
        return view ('gudang.riwayat', compact('data'));
    }

    public function rekapStock()
    {
        //update stok
        $stok = DB::table('riwayat_bajus')
        ->join('bajus', 'bajus.id', '=', 'riwayat_bajus.baju_id')
        ->join('users', 'users.id', '=', 'riwayat_bajus.user_id')
        ->select('bajus.baju','bajus.ukuran', DB::raw('SUM(riwayat_bajus.jumlah) AS total_per_ukuran'))
        ->groupBy('bajus.baju','bajus.ukuran')
        ->get();

        //dd($stok);
        return view('gudang.rekap', compact('stok'));
    }

    public function tambahBaju(Request $request)
    {
        $user = user::get();
        $barang = baju::get();

        //dd($barang);
        return view ('gudang.form_tambah_stok', compact('user','barang'));
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

        return redirect('riwayat');
    }

    //kategori baju
    public function tambahKategori()
    {
       
        return view ('gudang.form_tambah_kategori');
    }

    public function simpanKategori(Request $request)
    {
        //dd($request->all());
        baju::create([
            'baju' => $request->inputBaju,
            'ukuran' => $request->inputUkuran
        ]);

        return redirect('riwayat');
    }
}


