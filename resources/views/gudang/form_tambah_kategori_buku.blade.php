@extends('layout')

@section('body')

<div class="container">
<div class="card mt-4">
    <div class="card-header">
      Tambah Kategori Buku Ingenio
    </div>
    <div class="card-body">
        <a class="btn btn-primary mb-3" href="{{ url()->previous() }}">kembali</a>

        {{-- form --}}
        <div class=" mt-3">
            <form action="/simpan_kategori_buku" method="POST">
                @csrf


                <div class="mb-3">
                    <label class="form-label">Buku</label>
                    <input type="text" class="form-control" name="inputBuku" >
                </div>
                  <input type="submit" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
  </div>
</div>
    
@endsection