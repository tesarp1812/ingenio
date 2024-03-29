@extends('layout')

@section('main')
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
{{-- card dashboard login --}}
<div class="container text-center">
    <div class="w-100 p-3">
        <div class="card w-100" style="width: 50rem;">
            <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <img src="{{ asset('images/karakter.png') }}" class="img-thumbnail img-fluid" alt="karakter"
                    style="max-width: 250px;">
            </div>
            <div class="card-body">
                <a href="/multimedia/form_request" class="btn btn-primary"><i class="bi bi-box-seam"> Form Request Design</i></a>
                @section('table')
            <div class="container">
                <div class="card mt-4">
                    <div class="card-header">
                        List Request
                    </div>
                    <div class="card-body">
                        <div class="text-center mt-3">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Type Design</th>
                                        <th scope="col">Ukuran Design</th>
                                        <th scope="col">Durasi Design</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Whatsapp</th>
                                        <th scope="col">File</th>
                                        <th scope="col">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($stok as $s)
                                        <tr>
                                            <td>
                                                {{ ucwords($s->barang) }}
                                                {{ ucwords($s->baju) }}
                                                @if (isset($s->ukuran))
                                                    - {{ strtoupper($s->ukuran) }}
                                                @endif
                                            </td>
                                            <td>{{ $s->total }}</td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
            @endsection
            </div>
        </div>
    </div>
</div>
@endsection