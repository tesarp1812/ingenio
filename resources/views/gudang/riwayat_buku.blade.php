@extends('layout')

@section('body')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
          Riwayat Stok Buku Ingenio
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="/gudang">kembali</a>
            <a class="btn btn-primary mb-3" href="/form_buku">Tambah Data</a>
            <div class="text-center mt-3">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">User</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <th scope="row">{{ $d->id }}</th>
                                <td>{{ $d->buku->nama_buku }}</td>
                                <td>{{ $d->jumlah }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->formattedCreatedAt }}</td>
                                <td>{{$d->JamCreatedAt}}</td>
                                <td>{{$d->keterangan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
</div>


    

@endsection