@extends('admin.layout')

@section('main')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Tambah Kategori Barang Ingenio
            </div>
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="{{ url()->previous() }}">kembali</a>

                {{-- form --}}
                <div class=" mt-3">
                    <form action="/simpan_kategori_barang" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Barang</label>
                            <input type="text" class="form-control" name="inputBarang">
                        </div>

                        <div class="mb-3">
                            <label for="jenis">Jenis</label>
                            <select class="form-select" aria-label="Default select example" name="inputJenis">
                                <option selected disabled></option>
                                <option value="buku">Buku</option>
                                <option value="merchandise">Merchandise</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
