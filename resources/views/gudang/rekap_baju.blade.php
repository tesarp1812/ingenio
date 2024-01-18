@extends('layout')

@section('table')
    

<div class="container">
    <div class="card mt-4">
        <div class="card-header">
          Stok Baju Ingenio
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="/gudang">kembali</a>
            <a class="btn btn-primary mb-3" href="/riwayat_baju">Cek Riwayat Stok</a>
            <div class="text-center mt-3">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Barang</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stok as $s)
                            <tr>
                                <td>{{ ucwords($s->baju) }}</td>
                                <td>{{ strtoupper($s->ukuran) }}</td>
                                <td>{{ $s->total_per_ukuran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
</div>



    

@endsection