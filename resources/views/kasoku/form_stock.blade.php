@extends('layout')

@section('body')
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
        <h1>Kasoku Stocks Form</h1>
        <form action="/kasoku/stock/input/save" method="POST">
            @csrf

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" id="kategori" name="kategori" aria-label="Pilih kategori"
                    onchange="showItems()">
                    <option value="0" selected disabled>Pilih kategori</option>
                    <option value="1">Baju</option>
                    <option value="2">Barang</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="barang" class="form-label">Barang</label>
                <select class="form-select" id="barang" name="inputItem" aria-label="Pilih barang" style="display:none;">
                    <!-- Opsi barang akan ditampilkan di sini -->
                </select>
            </div>

            <div class="mb-3">
                <label for="inputQty" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="inputQty" name="inputQty">
            </div>

            <div class="mb-3">
                <label for="inputDesc" class="form-label">User</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                <input type="text" class="form-control" name="inputUser" value="{{ auth()->user()->id }}" hidden>
            </div>

            <div class="mb-3">
                <label for="inputDesc" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="inputDesc" name="inputDesc">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
<script>
    function showItems() {
        var kategori = document.getElementById("kategori").value;
        var barangSelect = document.getElementById("barang");

        // Bersihkan opsi barang sebelum menambahkan opsi baru
        barangSelect.innerHTML = "";

        if (kategori == 1) {
            // Jika kategori adalah Baju, tambahkan opsi baju
            @foreach ($baju as $baju)
                var option = document.createElement("option");
                option.text = "{{ $baju->nama_barang }}-{{ $baju->ukuran }}";
                option.value = "{{ $baju->id }}";
                barangSelect.appendChild(option);
            @endforeach
        } else if (kategori == 2) {
            // Jika kategori adalah Barang, tambahkan opsi barang
            @foreach ($barang as $barang)
                var option = document.createElement("option");
                option.text = "{{ $barang->nama_barang }}";
                option.value = "{{ $barang->id }}";
                barangSelect.appendChild(option);
            @endforeach
        }

        // Tampilkan elemen select barang
        barangSelect.style.display = "block";
    }
</script>
@endsection
