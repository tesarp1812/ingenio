@extends('layout')

@section('body')
<div class="container">
  <div class="card mt-4">
    <div class="card-header">
        Menu Gudang Ingenio
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Baju
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/stok_baju">Stok Baju</a></li>
                        <li><a class="dropdown-item" href="/riwayat_baju">Riwayat Stok Baju</a></li>
                        <li><a class="dropdown-item" href="/form_baju">Tambah Stok Baju</a></li>
                        <li><a class="dropdown-item" href="/form_kategori_baju">Tambah Kategori Baju</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-3">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Buku
                  </button>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/stok_buku">Stok Buku</a></li>
                      <li><a class="dropdown-item" href="/riwayat_buku">Riwayat Stok Buku</a></li>
                      <li><a class="dropdown-item" href="/form_buku">Tambah Stok Buku</a></li>
                      <li><a class="dropdown-item" href="/form_kategori_buku">Tambah Kategori Buku</a></li>
                  </ul>
              </div>
          </div>
        </div>
    </div>
</div>

</div>
  
@endsection