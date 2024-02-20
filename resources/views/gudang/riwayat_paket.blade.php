@extends('admin.layout')

@section('body')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
          Riwayat Paket Kirim
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="/gudang">kembali</a>
            <div class="text-center mt-3">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Nama Penerima</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomer</th>
                            <th scope="col">User Input</th>
                            <th scope="col">Tgl Dibuat</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $p)
                            <tr>
                                <th scope="row">{{ $p->id }}</th>
                                <td>{{ $p->nama_paket }}</td>
                                <td>{{ $p->nama_penerima }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->nomer }}</td>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ $p->formattedCreatedAt }}</td>
                                <td>{{ $p->JamCreatedAt }}</td>
                                <td>{{$p->keterangan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
</div>


    

@endsection