@extends('layout')

@section('body')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
          Riwayat Barang
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="/gudang">Home</a>
            <a class="btn btn-info mb-3" href="/form_barang">Tambah Barang</a>
            <a class="btn btn-primary mb-3" href="/form_baju">Tambah Baju</a>
            <div class="text-center mt-3">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            {{-- <th scope="col">Jenis</th> --}}
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
                                <td>@if ($d->baju_id)
                                    {{ ucwords($d->baju->nama_barang) }} {{ strtoupper($d->baju->ukuran) }}
                                @elseif ($d->barang_id)
                                    {{ ucwords($d->barang->nama_barang) }}
                                @else
                                    N/A
                                @endif</td>
                                <td>{{ $d->jumlah }}</td>
                                {{-- <td>{{$d->barang->jenis}}</td> --}}
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