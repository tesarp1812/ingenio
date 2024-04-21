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
    @elseif(session('error'))
    <script>
        Swal.fire(
            'error!',
            '{{ session('error') }}',
            'error'
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
                    @auth
                    @php
                        $multimedia = ['1', '6'];
                    @endphp
                    @if (in_array(auth()->user()->role_id, $multimedia))
                    <a href="/multimedia/task" class="btn btn-primary"><i class="bi bi-box-seam"> Task Design</i></a>
                    @endif
                    @endauth
                <div>
                </div>
                @section('table')
                    <div class="container">
                        <div class="card mt-4">
                            <div class="card-header">
                                List Request
                            </div>
                            <div class="card-body">
                                <div class="text-center mt-3">
                                    <table id="" class="table table-striped table-bordered">
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
                                                <th scope="col">File</th>
                                                <th scope="col">Aksi</th>
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
                                                            <td>
                                                                {{ $req->description }}
                                                                @if($req->is_cito === "true")
                                                                <span class="badge badge-success">Cito</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $req->deadline }}</td>
                                                            <td>{{ $req->whatsapp }}</td>
                                                            <td>{{ $req->status }}</td>
                                                            <td>
                                                                <a href="/multimedia/download/{{ $req->word_file }}"
                                                                    download>{{ $req->word_file }}</a>
                                                            </td>
                                                            <td>
                                                                {{-- Admin actions --}}
                                                                @if ($req->status === 'pending')
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal" data-bs-target="#processDesign">
                                                                        Proses Design
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="processDesign" tabindex="-1" aria-labelledby="processDesignLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Proses Design</h1>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form action="/multimedia/status/update/{{ $req->id }}" method="POST">
                                                                                    <div class="modal-body">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden" value="2" name="updateStatus">
                                                                                        {{-- input to history_design --}}
                                                                                        <input type="hidden" value="{{ $req->id }}" name="inputRespon">
                                                                                        <input type="hidden" value="2" name="inputStatus">
                                                                                        <div class="mb-3">
                                                                                            <label for="inputuser" class="form-label">Pilih Pengguna</label>
                                                                                            <select class="form-select" aria-label="Pilih Pengguna" name="inputUser" onchange="copyUser()" required>
                                                                                                <option selected disabled>Pilih Pengguna</option>
                                                                                                @foreach ($users as $user)
                                                                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="inputDescription" class="form-label">Deskripsi</label>
                                                                                            <input type="text" class="form-control" id="inputDescription" name="inputDescription" required>
                                                                                        </div>
                                                                                        {{-- input to task_design --}}
                                                                                        <input type="hidden" value="{{ $req->id }}" name="inputTaskRespon">
                                                                                        <input type="hidden" id="inputTaskUser" name="inputTaskUser">
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- process to accepted --}}
                                                                @elseif ($req->status === 'process')
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal" data-bs-target="#processAccepted">
                                                                        Accepted
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="processAccepted" tabindex="-1" aria-labelledby="processAcceptedLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Design Selesai</h1>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form action="/multimedia/status/update/{{ $req->id }}" method="POST">
                                                                                    <div class="modal-body">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden" value="5" name="updateStatus">
                                                                                        <input type="hidden" value="{{ $req->id }}" name="inputRespon">
                                                                                        <input type="hidden" value="5" name="inputStatus">
                                                                                        <input type="hidden" name="inputDescription" value="Diselesaikan oleh {{ auth()->user()->id }}">
                                                                                        <input type="hidden" value="{{ auth()->user()->id }}" name="inputUser">
                                                                                        <p>Apa design anda sudah selesai ?</p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
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
                                                                    <a href="/multimedia/download/{{ $req->word_file }}"
                                                                        download>{{ $req->word_file }}</a>
                                                                </td>
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

<script>
    function copyUser() {
        var selectedUserId = document.querySelector('select[name="inputUser"]').value;
        document.getElementById('inputTaskUser').value = selectedUserId;
    }
</script>
@endsection
@endsection
