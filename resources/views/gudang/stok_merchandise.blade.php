@extends('admin.layout')

@section('main')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Stok Merchandise Ingenio
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
                        @foreach ($stokMerchandise as $s)
                            <tr>
                                <td>
                                    {{ ucwords($s->barang) }}
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

