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
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>barang</th>
                            <th>jumlah</th>
                            <th>request from</th>
                            <th>keterangan</th>
                            <th>status</th>
                            {{-- <th>aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_req as $list)
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
                                {{-- <td>
                                    @if ($list->status === 'accepted')
                                        <form action="/kasoku/status/update/{{ $list->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="process" name="inputStatus">
                                            <button type="submit" class="btn btn-primary">proses</button>
                                        </form>
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@endsection

