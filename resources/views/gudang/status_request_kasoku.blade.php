@extends('admin.layout')

@section('main')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                List Request Kasoku
            </div>
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="/gudang">kembali</a>
                <div class="text-center mt-3">
                    <form action="" method="GET">
                        <select name="status">
                            <option value="">Semua Status</option>
                            <option value="request">Request</option>
                            <option value="process">Proses</option>
                            <option value="done">Done</option>
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                    <table id="" class="table table-striped table-bordered">
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
                            @if ($list->status !== 'accepted')
                                <tr>
                                    <td>
                                        {{ $list->barang }}
                                        {{ $list->baju }}
                                        @if (isset($list->ukuran))
                                            - {{ strtoupper($list->ukuran) }}
                                        @endif
                                    </td>
                                    <td>{{ $list->qty }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->desc }}</td>
                                    <td>{{ $list->status }}</td>
                                    <td>
                                        @if ($list->status === 'done')
                                            <form action="/gudang/status_stock/update/{{ $list->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $list->id }}">
                                                <input type="hidden" name="barang_id" value="{{ $list->barang_id }}">
                                                <input type="hidden" name="baju_id" value="{{ $list->baju_id }}">
                                                <input type="hidden" name="qty" value="{{ $list->qty }}">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="desc" value="{{ $list->desc }}">
                                                <input type="hidden" name="status" value="{{ $list->status }}">
                                                <button type="submit">Diterima</button>
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
