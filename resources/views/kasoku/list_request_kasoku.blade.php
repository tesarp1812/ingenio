@extends('layout')

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
                        @php
                            $kasoku = ['1', '5'];
                        @endphp
                        @if (in_array(auth()->user()->role_id, $kasoku))
                            <a href="/kasoku/stock" class="btn btn-primary"><i class="bi bi-box-seam"> Stock</i></a>
                        @endif

                        @if (in_array(auth()->user()->role_id, $kasoku))
                            <a href="/kasoku/stock/input" class="btn btn-primary"><i class="bi bi-box-seam"> Input Stock</i></a>
                        @endif

                        @if (in_array(auth()->user()->role_id, $kasoku))
                            <a href="/kasoku/request/list" class="btn btn-primary"><i class="bi bi-box-seam"> Permintaan</i></a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        @if (session('process'))
            <div class="alert alert-success">
                {{ session('process') }}
            </div>
        @elseif (session('done'))
            <div class="alert alert-info">
                {{ session('done') }}
            </div>
        @endif
    </div>

    <!-- Your other HTML content here -->


@section('table')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                List Permintaan
            </div>
            <div class="card-body">
                <div class="text-center mt-3">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>barang</th>
                                <th>jumlah</th>
                                <th>request from</th>
                                <th>keterangan</th>
                                <th>status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_req as $list)
                                @if ($list->status !== 'done' && $list->status !== 'accepted')
                                    <tr>
                                        <td>
                                            {{ $list->barang }}
                                            {{ $list->baju }}
                                            @if (isset($s->ukuran))
                                                - {{ strtoupper($s->ukuran) }}
                                            @endif
                                        </td>
                                        <td>{{ $list->qty }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->desc }}</td>
                                        <td>{{ $list->status }}</td>
                                        {{-- <td><a href="/update/status/{{ $list->id }}"> Ubah Status</a></td> --}}
                                        <td>
                                            @if ($list->status === 'request')
                                                <form action="/kasoku/status/update/{{ $list->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="process" name="inputStatus">
                                                    <button type="submit" class="btn btn-primary">proses</button>
                                                </form>
                                            @elseif($list->status === 'process')
                                                <form action="/kasoku/status/update/{{ $list->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="done" name="inputStatus">
                                                    <button type="submit" class="btn btn-success">done</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
