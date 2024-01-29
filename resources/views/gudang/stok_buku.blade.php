@extends('admin.layout')

@section('main')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Stok Buku Ingenio
        </div>
        <div class="card-body">
            <div class="text-center mt-3">
                <form action="{{ route('stok_buku', ['kategori' => $kategori ?? null]) }}" method="get">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Pilih Kategori:</label>
                        <select class="form-select" id="kategori" name="kategori">
                            <option value="paket" {{ request('kategori') == 'paket' ? 'selected' : '' }}>Paket</option>
                            <option value="mandiri" {{ request('kategori') == 'mandiri' ? 'selected' : '' }}>Mandiri</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>

                <table id="myTable" class="table table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Barang</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stokBuku as $s)
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

