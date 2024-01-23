@extends('layout')

@section('body')

<div class="container">
<div class="card mt-4">
    <div class="card-header">
      Tambah Kategori
    </div>
    <div class="card-body">
        <a class="btn btn-secondary mb-3" href="{{ url()->previous() }}">kembali</a>
        <a class="btn btn-primary mb-3" href="/gudang">Gudang</a>

        {{-- form --}}
        <div class=" mt-3">
            <form action="/simpan_kategori_baju" method="POST">
                @csrf


                <div class="mb-3">
                    <label class="form-label">Baju</label>
                    <input type="text" class="form-control" name="inputBaju" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Ukuran</label>
                    <input type="text" class="form-control" name="inputUkuran" >
                </div>


                  <input type="submit" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
  </div>
</div>
    
@endsection