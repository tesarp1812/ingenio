@extends('admin.layout')

@section('main')

<div class="container">
    <div class="card mt-4">
        <div class="card-header">
          Request Barang Kasoku
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="/kategori_barang">Tambah Kategori</a>
            
    
            {{-- form --}}
            <div class=" mt-3">
                <form action="/input_request_kasoku" method="POST">
                    @csrf
            
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" aria-label="Pilih kategori" onchange="showItems()">
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
                        <label for="inputUser" class="form-label">User</label>
                        <select class="form-select" id="inputUser" name="inputUser" aria-label="Pilih user">
                            <option selected disabled>Open this select menu</option>
                            @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="inputDesc" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="inputDesc" name="inputDesc">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
