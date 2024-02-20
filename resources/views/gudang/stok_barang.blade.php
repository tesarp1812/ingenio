@extends('admin.layout')

@section('main')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Stok Barang Ingenio
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="/gudang">kembali</a>
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

