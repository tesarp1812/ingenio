@extends('layout')

@section('body')
@section('main')
    @if (session('success_process'))
        <script>
            Swal.fire(
                'Berhasil!',
                '{{ session('success_process') }}',
                'success'
            );
        </script>
    @elseif(session('success_accepted'))
        <script>
            Swal.fire(
                'Accepted!',
                '{{ session('success_accepted') }}',
                'success'
            );
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
                                            @auth
                                                @php
                                                    $admin = ['1', '6'];
                                                    $user = ['4'];
                                                @endphp
                                                @foreach ($requests as $req)
                                                    @if (in_array(auth()->user()->role_id, $admin))
                                                        <!-- If user is admin, display all data -->
                                                        <tr>
                                                            <td>{{ $req->name }}</td>
                                                            <td>{{ $req->type1 }} - {{ $req->type2 }}</td>
                                                            <td>{{ $req->size }}</td>
                                                            <td>{{ $req->duration }}</td>
                                                            <td>{{ $req->description }}</td>
                                                            <td>{{ $req->deadline }}</td>
                                                            <td>{{ $req->whatsapp }}</td>
                                                            <td>{{ $req->status }}</td>
                                                            <td>
                                                                {{-- Admin actions --}}
                                                                @if ($req->status === 'pending')
                                                                    <form
                                                                        action="/multimedia/status/update/{{ $req->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" value="2"
                                                                            name="updateStatus">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Proses</button>
                                                                    </form>
                                                                @elseif ($req->status === 'process')
                                                                    <form
                                                                        action="/multimedia/status/update/{{ $req->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" value="5"
                                                                            name="updateStatus">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Accepted</button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="/multimedia/download/{{ $req->word_file }}"
                                                                    download>{{ $req->word_file }}</a>
                                                            </td>
                                                        </tr>
                                                    @elseif (in_array(auth()->user()->role_id, $user))
                                                        <!-- If user is not admin, display data based on user's name -->
                                                        @if (auth()->user()->name === $req->name)
                                                            <tr>
                                                                <td>{{ $req->name }}</td>
                                                                <td>{{ $req->type1 }} - {{ $req->type2 }}</td>
                                                                <td>{{ $req->size }}</td>
                                                                <td>{{ $req->duration }}</td>
                                                                <td>{{ $req->description }}</td>
                                                                <td>{{ $req->deadline }}</td>
                                                                <td>{{ $req->whatsapp }}</td>
                                                                <td>{{ $req->status }}</td>
                                                                <td>
                                                                     {{-- User actions --}}
                                                                     @if ($req->status === 'accepted')
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle"
                                                                            type="button" data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            Design Status
                                                                        </button>
                                                                       
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <form
                                                                                        action="/multimedia/status/update/{{ $req->id }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="text" value="5"
                                                                                            name="updateStatus" hidden>
                                                                                        <button type="submit"
                                                                                            class="btn">Diterima</button>
                                                                                    </form>
                                                                                </li>
                                                                                <li>
                                                                                    <form
                                                                                        action="/multimedia/status/update/{{ $req->id }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="text" value="4"
                                                                                            name="updateStatus" hidden>
                                                                                        <button type="submit"
                                                                                            class="btn">Revisi</button>
                                                                                    </form>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="/multimedia/download/{{ $req->word_file }}"
                                                                        download>{{ $req->word_file }}</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endauth
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
@endsection
