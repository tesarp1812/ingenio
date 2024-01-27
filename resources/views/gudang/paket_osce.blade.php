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
                    <form action="/simpan_barang" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" name="inputjumlah" value="Paket Osce" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" name="inputjumlah" value="Paket Osce" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Pengiriman</label>
                            <input type="text" class="form-control" name="inputjumlah" value="Paket Osce" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomer Penerima</label>
                            <input type="text" class="form-control" name="inputjumlah" value="Paket Osce" disabled>
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
                            <input type="text" class="form-control" name="inputket">
                        </div>


                        <input type="submit" class="btn btn-success mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
