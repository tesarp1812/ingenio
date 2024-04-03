@extends('layout')

@section('main')
    @if (session('success'))
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
                    <a href="/multimedia/form_request" class="btn btn-primary"><i class="bi bi-box-seam"> Form Request
                            Design</i></a>
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
                                                <th scope="col">Deadline</th>
                                                <th scope="col">Whatsapp</th>
                                                <th scope="col">Status Design</th>
                                                <th scope="col">Aksi</th>
                                                <th scope="col">File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($requests as $req)
                                                <tr>
                                                    <td>{{ $req->name }}</td>
                                                    <td>{{ $req->type1 }} - {{ $req->type2 }}</td>
                                                    <td>{{ $req->size }}</td>
                                                    <td>{{ $req->duration }}</td>
                                                    <td>{{ $req->description }}</td>
                                                    <td>{{ $req->deadline }}</td>
                                                    <td>{{ $req->whatsapp }}</td>
                                                    <td>{{ $req->status }}</td>
                                                    @auth
                                                        <td>
                                                            @php
                                                                $admin = ['1', '6'];
                                                                $user = ['4'];
                                                            @endphp
                                                            {{-- role admin --}}
                                                            @if (in_array(auth()->user()->role_id, $admin))
                                                                {{-- status pending -> proccess --}}
                                                                @if ($req->status === 'pending')
                                                                <form action="/multimedia/status/update/{{ $req->id }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" value="process" name="updateStatus">
                                                                    <button type="submit" class="btn btn-primary">Proses</button>
                                                                </form>
                                                                @elseif ($req->status === 'process')
                                                                    {{-- status proccess -> accepted / design has complete --}}
                                                                    <form action="">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="text" value="accepted" hidden>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Accepted</button>
                                                                    </form>
                                                                @endif
                                                                {{-- role user non admin --}}
                                                            @elseif (in_array(auth()->user()->role_id, $user))
                                                                @if ($req->status === 'accepted')
                                                                    <form action="">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="text" value="" hidden>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Accepted</button>
                                                                    </form>
                                                                @elseif ($req->status === 'accepted')
                                                                    <form action="">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="text" value="revision" hidden>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Revisi</button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td>{{ $req->status }}</td>
                                                    @endauth
                                                    <td>
                                                        <a href="/multimedia/download/{{ $req->word_file }}"
                                                            download>{{ $req->word_file }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
