@extends('layout')

@section('body')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Menu Gudang Ingenio
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/stok_barang" class="btn btn-primary btn-block">Stok Gudang</a>
                    </div>

                    {{-- <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/riwayat_baju" class="btn btn-info btn-block">Baju</a>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/riwayat_buku" class="btn btn-info btn-block">Buku</a>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/riwayat_merchandise" class="btn btn-info btn-block">Merchandise</a>
                    </div> --}}

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/riwayat_barang" class="btn btn-info btn-block">Riwayat Barang</a>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/form_baju" class="btn btn-secondary btn-block">Input Stok Baju</a>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/form_barang" class="btn btn-secondary btn-block">Input Stok Barang</a>
                    </div>

                </div>
            </div>
        </div>

        {{-- menu kirim paket --}}

        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    Menu Kirim Paket
                </div>
                <div class="card-body">
                    <div class="row">
    
                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/stok_barang" class="btn btn-primary btn-block">Paket OSCE</a>
                        </div>
    
                        {{-- <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/riwayat_baju" class="btn btn-info btn-block">Baju</a>
                        </div>
    
                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/riwayat_buku" class="btn btn-info btn-block">Buku</a>
                        </div>
    
                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/riwayat_merchandise" class="btn btn-info btn-block">Merchandise</a>
                        </div>
    
                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/riwayat_barang" class="btn btn-info btn-block">Riwayat Barang</a>
                        </div>
    
                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/form_baju" class="btn btn-secondary btn-block">Input Stok Baju</a>
                        </div>
    
                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/form_barang" class="btn btn-secondary btn-block">Input Stok Barang</a>
                        </div> --}}
    
                    </div>
                </div>
            </div>


    @endsection
