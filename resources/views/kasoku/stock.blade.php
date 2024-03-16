@extends('admin.layout')

@section('main')
    {{-- card dashboard login --}}
    <div class="container text-center">
        <div class="w-100 p-3">
            <div class="card w-100" style="width: 50rem;">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                    <img src="{{ asset('images/karakter.png') }}" class="img-thumbnail img-fluid" alt="karakter"
                        style="max-width: 250px;">
                </div>
                <div class="card-body">
                    {{-- route gudang (GA,Admin) --}}
                    @auth
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/kasoku/stock" class="btn btn-primary"><i class="bi bi-box-seam"> Stock</i></a>
                        @endif

                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/kasoku/stock/input" class="btn btn-primary"><i class="bi bi-box-seam"> Input Stock</i></a>
                        @endif

                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/kasoku/request/list" class="btn btn-primary"><i class="bi bi-box-seam"> Permintaan</i></a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@section('table')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Stock Kasoku
            </div>
            <div class="card-body">
                <div class="text-center mt-3">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>barang</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stok as $stok)
                                <td>
                                    {{ ucwords($stok->barang) }}
                                    {{ ucwords($stok->baju) }}
                                    @if (isset($stok->ukuran))
                                        - {{ strtoupper($stok->ukuran) }}
                                    @endif
                                </td>
                                <td>{{ $stok->total }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
