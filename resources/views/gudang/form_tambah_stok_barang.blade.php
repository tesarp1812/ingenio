@extends('layout')

@section('body')

<div class="container">
<div class="card mt-4">
    <div class="card-header">
      Tambah Stok Barang Ingenio
    </div>
    <div class="card-body">
        <a class="btn btn-secondary mb-3" href="{{ url()->previous() }}">kembali</a>
        <a class="btn btn-primary mb-3" href="/kategori_barang">Tambah Kategori</a>
        <a class="btn btn-primary mb-3" href="/gudang">Gudang</a>

        {{-- form --}}
        <div class=" mt-3">
            <form action="/simpan_barang" method="POST">
                @csrf
                  <div class="mb-3">
                    <label class="form-label">Barang</label>
                    <select class="form-select" aria-label="Default select example" name="inputbarang">
                        <option selected disabled>pilih Barang</option>
                        @foreach ($barang as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="inputjumlah">
                </div>

                <div class="mb-3">
                    <label class="form-label">User</label>
                    <select class="form-select" aria-label="Default select example" name="inputuser">
                        <option selected disabled>pilih User</option>
                        @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="inputket" >
                </div>


                  <input type="submit" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
  </div>
</div>
    
@endsection