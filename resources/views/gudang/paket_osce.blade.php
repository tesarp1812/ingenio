@extends('layout')

@section('body')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Pengiriman Paket OSCE
            </div>
            <div class="card-body">
                <a class="btn btn-secondary mb-3" href="{{ url()->previous() }}">kembali</a>

                {{-- form --}}
                <div class=" mt-3">
                    <form action="/simpan_osce" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" name="inputNamaPaket" value="Paket Osce" disabled>
                            <input name="inputNamaPaket" value="Paket Osce" hidden>

                            <label class="form-label mt-3"></label>
                            <input type="text" class="form-control" name="OSCE" value="Buku OSCE" disabled>

                            <label class="form-label mt-3"></label>
                            <input type="text" class="form-control" name="Notebook" value="NOTEBOOK" disabled>

                            <label class="form-label mt-3"></label>
                            <select class="form-select" aria-label="Default select example" name="inputBaju">
                                <option selected disabled>Pilih Ukuran</option>
                                @foreach ($baju as $baju)
                                    @if ($baju->nama_barang == 'kaos')
                                        <option value="{{ $baju->id }}">{{ $baju->nama_barang }} - {{ $baju->ukuran }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" name="inputNamaPenerima" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Pengiriman</label>
                            <textarea class="form-control" name="inputAlamat" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomer Penerima</label>
                            <input type="number" class="form-control" name="inputNomer" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <select class="form-select" aria-label="Default select example" name="inputUser">
                                <option selected disabled>pilih User</option>
                                @foreach ($user as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="inputKeterangan">
                        </div>


                        <input type="submit" class="btn btn-success mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
