@extends('admin.layout')


@section('main')
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

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/riwayat_barang" class="btn btn-info btn-block">Riwayat Barang</a>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <a href="/riwayat_paket" class="btn btn-info btn-block">Riwayat Paket</a>
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
                            <a href="/paket_osce" class="btn btn-primary btn-block">Paket OSCE</a>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-3">
                            <a href="/paket_cbt" class="btn btn-primary btn-block">Paket CBT</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- live stock --}}
            @section('table')
            <div class="container">
                <div class="card mt-4">
                    <div class="card-header">
                        Stok Barang Ingenio
                    </div>
                    <div class="card-body">
                        <div class="text-center mt-3">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stok as $s)
                                        <tr>
                                            <td>
                                                {{ ucwords($s->barang) }}
                                                {{ ucwords($s->baju) }}
                                                @if (isset($s->ukuran))
                                                    - {{ strtoupper($s->ukuran) }}
                                                @endif
                                            </td>
                                            <td>{{ $s->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
            @endsection
        @endsection
