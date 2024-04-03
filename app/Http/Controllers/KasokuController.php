<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\kasoku_request;
use App\Models\kasoku_history;
use App\Models\User;
use App\Models\barang;
use App\Models\baju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KasokuController extends Controller
{
    //

    public function index()
    {
        return view('kasoku.index');
    }

    public function request(Request $request)
    {
        $user = user::get();
        $baju = baju::get();
        $barang = barang::get();
        //dd($item);
        return view('kasoku.form_request', compact('user', 'barang', 'baju'));
    }

    public function inputRequest(Request $request)
    {
        //dd($request->all());

        $kolomItem = $request->kategori == 1 ? 'baju_id' : 'barang_id';

        // Buat kasoku request baru
        kasoku_request::create([
            $kolomItem => $request->inputItem,
            'qty' => $request->inputQty,
            'desc' => $request->inputDesc,
            'user_id' => $request->inputUser
        ]);


        return redirect('/gudang/kasoku/list');
    }

    public function kasokuRequest()
    {
        $list_req = DB::table('kasoku_requests')
            ->leftJoin('baju', 'baju.id', '=', 'kasoku_requests.baju_id')
            ->leftJoin('barang', 'barang.id', '=', 'kasoku_requests.barang_id')
            ->leftJoin('users', 'users.id', '=', 'kasoku_requests.user_id')
            ->select('barang.nama_barang as barang', 'baju.nama_barang as baju', 'baju.ukuran', 'kasoku_requests.qty', 'kasoku_requests.status', 'kasoku_requests.desc', 'kasoku_requests.id', 'users.name')
            ->groupBy('barang.nama_barang', 'baju.nama_barang', 'baju.ukuran', 'kasoku_requests.qty', 'kasoku_requests.status', 'kasoku_requests.desc', 'kasoku_requests.id', 'users.name')
            ->get();

        //dd($list_req);

        return view('kasoku.list_request_kasoku', compact('list_req'));
    }

    public function updateStatusProses(Request $request, $id)
    {
        $updateStatusProses = kasoku_request::find($id);

        //dd($request->all());
        $updateStatusProses->id = $request->id;
        $updateStatusProses->status = $request->inputStatus;
        $updateStatusProses->save();

        Session::flash('process', 'Berhasil Mengubah Status Permintaan Ke Proses');
        Session::flash('done', 'Status Permintaan Sudah Selesai');

        return redirect('/kasoku/request/list');
    }

    public function Stock()
    {
        $stok = DB::table('kasoku_histories')
            ->leftJoin('baju', 'baju.id', '=', 'kasoku_histories.baju_id')
            ->leftJoin('barang', 'barang.id', '=', 'kasoku_histories.barang_id')
            ->select('barang.nama_barang as barang', 'baju.nama_barang as baju', 'baju.ukuran', DB::raw('SUM(kasoku_histories.qty) AS total'))
            ->groupBy('barang.nama_barang', 'baju.nama_barang', 'baju.ukuran')
            ->get();

        //dd($stok);

        return view('kasoku.stock', compact('stok'));
    }

    public function inputStock(Request $request)
    {
        $user = user::get();
        $baju = baju::get();
        $barang = barang::get();
        //dd($item);
        return view('kasoku.form_stock', compact('user', 'barang', 'baju'));
    }

    public function saveInputStock(Request $request)
    {
        //dd($request->all());

        $kolomItem = $request->kategori == 1 ? 'baju_id' : 'barang_id';

        // Buat kasoku request baru
        kasoku_history::create([
            $kolomItem => $request->inputItem,
            'qty' => $request->inputQty,
            'desc' => $request->inputDesc,
            'user_id' => $request->inputUser
        ]);


        return redirect('kasoku/stock');
    }
}
