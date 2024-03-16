<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\baju;
use App\Models\barang;
use App\Models\paket_kirim;
use App\Models\riwayat_baju;
use App\Models\riwayat_barang;
use App\Models\User;
use Carbon\Carbon;

class GudangController extends Controller
{
    //index
    public function index()
    {
        $stok = DB::table('riwayat_barang')
            ->leftJoin('baju', 'baju.id', '=', 'riwayat_barang.baju_id')
            ->leftJoin('barang', 'barang.id', '=', 'riwayat_barang.barang_id')
            ->select('barang.nama_barang as barang', 'baju.nama_barang as baju', 'baju.ukuran', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
            ->groupBy('barang.nama_barang', 'baju.nama_barang', 'baju.ukuran')
            ->get();

        return view('gudang.index', compact('stok'));
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


        //dd($stokMerchandise);
        return view('gudang.stok_barang', compact('stok'));
    }

    public function stokBaju()
    {

        $stokBaju = DB::table('riwayat_barang')
            ->leftJoin('baju', 'baju.id', '=', 'riwayat_barang.baju_id')
            ->select('baju.nama_barang as baju', 'baju.ukuran', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
            ->groupBy('baju.nama_barang', 'baju.ukuran')
            ->get();

        return view('gudang.stok_baju', compact('stokBaju'));
    }

    public function stokBuku(Request $request, $kategori = 'mandiri')
{
    $kategori = $request->input('kategori', $kategori);


    // Logika pengambilan data berdasarkan kategori
    if ($kategori == 'paket') {
        $stokBuku = DB::table('riwayat_barang')
        ->leftJoin('barang', 'barang.id', '=', 'riwayat_barang.barang_id')
        ->where('barang.jenis', 'buku')
        ->whereIn('barang.nama_barang', ['OSCE', 'UKMPPD'])
        ->select('barang.nama_barang as barang', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
        ->groupBy('barang.nama_barang')
        ->get();
    } else {
        $stokBuku = DB::table('riwayat_barang')
        ->leftJoin('barang', 'barang.id', '=', 'riwayat_barang.barang_id')
        ->where('barang.jenis', 'buku')
        ->whereNotIn('barang.nama_barang', ['OSCE', 'UKMPPD'])
        ->select('barang.nama_barang as barang', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
        ->groupBy('barang.nama_barang')
        ->get();
    }

    return view('gudang.stok_buku', compact('stokBuku'));
}


    // public function stokBukuPaket($paket)
    // {
    //     $stokBuku = DB::table('riwayat_barang')
    //         ->leftJoin('barang', 'barang.id', '=', 'riwayat_barang.barang_id')
    //         ->where('barang.jenis', 'buku')
    //         ->select('barang.nama_barang as barang', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
    //         ->groupBy('barang.nama_barang')
    //         ->get();


    //     return view('gudang.stok_buku', compact('stokBuku'));
    // }

    public function stokMerchandise()
    {
        $stokMerchandise = DB::table('riwayat_barang')
            ->leftJoin('barang', 'barang.id', '=', 'riwayat_barang.barang_id')
            ->where('barang.jenis', 'merchandise')
            ->select('barang.nama_barang as barang', DB::raw('SUM(riwayat_barang.jumlah) AS total'))
            ->groupBy('barang.nama_barang')
            ->get();


        return view('gudang.stok_merchandise', compact('stokMerchandise'));
    }

    // tambah barang buku & merchandise
    public function tambahBarang(Request $request)
    {
        $user = user::get();
        $barang = barang::get();

        //dd($barang);
        return view('gudang.form_tambah_stok_barang', compact('user', 'barang'));
    }

    // simpan buku
    public function tambahBuku()
    {
        $user = user::get();
        $barang = barang::where('jenis', 'buku')->get();

        return view('gudang.form_tambah_stok_buku', compact('user', 'barang'));
    }

    // simpan merchandise
    public function tambahMerchandise()
    {
        $user = user::get();
        $barang = barang::where('jenis', 'merchandise')->get();

        return view('gudang.form_tambah_stok_merchandise', compact('user', 'barang'));
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

    // paket osce
    public function paketOSCE()
    {
        $user = user::get();
        $baju = baju::get();
        return view('gudang.paket_osce', compact('user', 'baju'));
    }

    public function simpanOSCE(Request $request)
    {
        //dd($request->all());
        $paket = paket_kirim::create([
            'nama_paket' => $request->inputNamaPaket,
            'nama_penerima' => $request->inputNamaPenerima,
            'alamat' => $request->inputAlamat,
            'nomer' => $request->inputNomer,
            'user_id' => $request->inputUser,
            'keterangan' => $request->inputKeterangan
        ]);

        // Menggunakan ID yang dihasilkan paket
        $paket_id = $paket->id;
        $user_id = $request->inputUser;
        $nama_penerima = $request->inputNamaPenerima;

        // baju 
        riwayat_barang::create([
            'baju_id' => $request->inputBaju,
            'jumlah' => -1,
            'user_id' => $user_id,
            'paket_id' => $paket_id,
            'keterangan' => 'Pengiriman ke Babies, Penerima: ' . $nama_penerima
        ]);

        // OSCE
        $osce = 'OSCE';
        $barang = Barang::where('nama_barang', $osce)->firstOrFail();
        // Lanjutkan dengan membuat riwayat_barang
        riwayat_barang::create([
            'barang_id' => $barang->id,
            'jumlah' => -1,
            'user_id' => $user_id,
            'paket_id' => $paket_id,
            'keterangan' => 'Pengiriman ke Babies, Penerima: ' . $nama_penerima
        ]);

        // notebook
        $notebook = 'notebook';
        $barang = Barang::where('nama_barang', $notebook)->firstOrFail();
        // Lanjutkan dengan membuat riwayat_barang
        riwayat_barang::create([
            'barang_id' => $barang->id,
            'jumlah' => -1,
            'user_id' => $user_id,
            'paket_id' => $paket_id,
            'keterangan' => 'Pengiriman ke Babies, Penerima: ' . $nama_penerima
        ]);

        return redirect('riwayat_barang');
    }

    // paket CBT
    public function paketCBT()
    {
        $user = user::get();
        $baju = baju::get();
        return view('gudang.paket_cbt', compact('user', 'baju'));
    }

    public function simpanCBT(Request $request)
    {
        //dd($request->all());
        $paket = paket_kirim::create([
            'nama_paket' => $request->inputNamaPaket,
            'nama_penerima' => $request->inputNamaPenerima,
            'alamat' => $request->inputAlamat,
            'nomer' => $request->inputNomer,
            'user_id' => $request->inputUser,
            'keterangan' => $request->inputKeterangan
        ]);

        // Menggunakan ID yang dihasilkan paket
        $paket_id = $paket->id;
        $user_id = $request->inputUser;
        $nama_penerima = $request->inputNamaPenerima;

        // baju 
        riwayat_barang::create([
            'baju_id' => $request->inputBaju,
            'jumlah' => -1,
            'user_id' => $user_id,
            'paket_id' => $paket_id,
            'keterangan' => 'Pengiriman ke Babies, Penerima: ' . $nama_penerima
        ]);

        // CBT
        $cbt = 'CBT';
        $barang = Barang::where('nama_barang', $cbt)->firstOrFail();
        // Lanjutkan dengan membuat riwayat_barang
        riwayat_barang::create([
            'barang_id' => $barang->id,
            'jumlah' => -1,
            'user_id' => $user_id,
            'paket_id' => $paket_id,
            'keterangan' => 'Pengiriman ke Babies, Penerima: ' . $nama_penerima
        ]);


        return redirect('riwayat_barang');

        // riwayat paket kirim
    }

    public function riwayatPaketKirim()
    {
        $paket = paket_kirim::with('user')->get();
        //dd($paket);

        return view ('gudang.riwayat_paket', compact('paket'));
    }

    public function listRequest()
    {
        $list_req = DB::table('kasoku_requests')
            ->leftJoin('baju', 'baju.id', '=', 'kasoku_requests.baju_id')
            ->leftJoin('barang', 'barang.id', '=', 'kasoku_requests.barang_id')
            ->leftJoin('users', 'users.id', '=', 'kasoku_requests.user_id')
            ->select('barang.nama_barang as barang', 'baju.nama_barang as baju', 'baju.ukuran', 'kasoku_requests.qty', 'kasoku_requests.status', 'kasoku_requests.desc', 'kasoku_requests.id', 'users.name')
            ->groupBy('barang.nama_barang', 'baju.nama_barang', 'baju.ukuran', 'kasoku_requests.qty', 'kasoku_requests.status', 'kasoku_requests.desc', 'kasoku_requests.id', 'users.name')
            ->get();

        return view('gudang.status_request_kasoku', compact('list_req'));
    }
}
