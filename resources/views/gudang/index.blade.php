@extends('layout')

@section('body')
<div class="container">
  <div class="card mt-4">
    <div class="card-header">
        Menu Gudang Ingenio
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Baju
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/stok">Stok Baju</a></li>
                        <li><a class="dropdown-item" href="/riwayat">Riwayat Stok Baju</a></li>
                        <li><a class="dropdown-item" href="/form_baju">Tambah Stok Baju</a></li>
                        <li><a class="dropdown-item" href="/form_kategori_baju">Tambah Kategori Baju</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-2">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Buku
                  </button>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
              </div>
          </div>
        </div>
    </div>
</div>

</div>
  
@endsection