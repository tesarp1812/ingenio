@extends('layout')

@section('main')
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
                    <a href="/multimedia" class="btn btn-primary"><i class="bi bi-box-seam"> List Design</i></a>
                    <div>
                    </div>
                </div>
            @section('table')
                <div class="container">
                    <div class="card mt-4">
                        <div class="card-header">
                            List Task Proses
                        </div>
                        <div class="card-body">
                            <div class="text-center mt-3">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Task User</th>
                                            <th>Type Design</th>
                                            <th>Kebutuhan Design</th>
                                            <th>Task User</th>
                                            <th>Deadline</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($taskDesign as $task)
                                            @if (auth()->user()->name === $task->user_name && $task->status === 'process')
                                                <tr>
                                                    <td>{{ $task->user_name }}</td>
                                                    <td>{{ $task->type1 }} - {{ $task->type2 }}</td>
                                                    <td>Ukuran: {{ $task->size }} <br> Durasi: {{ $task->duration }}</td>
                                                    <td>{{ $task->deadline }}</td>
                                                    <td>{{ $task->whatsapp }}</td>
                                                    <td>{{ $task->word_file }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"1
                                                            data-bs-toggle="modal" data-bs-target="#statusProcess">
                                                            Selesai
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="statusProcess" tabindex="-1"
                                                            aria-labelledby="statusProcessLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="statusProcessLabel">
                                                                            Status Proses</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Design sudah selesai ? jika sudah upload link design dibawah ini !
                                                                        <div class="mb-3">
                                                                            {{-- <label for="" class="form-label">Upload Link design</label> --}}
                                                                            <input type="text" class="form-control" name="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="card mt-4">
                        <div class="card-header">
                            List Task Revisi
                        </div>
                        <div class="card-body">
                            <div class="text-center mt-3">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Task User</th>
                                            <th>Type Design</th>
                                            <th>Kebutuhan Design</th>
                                            <th>Task User</th>
                                            <th>Deadline</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($taskDesign as $task)
                                        @if (auth()->user()->name === $task->user_name && $task->status === 'revision')
                                            <tr>
                                                <td>{{ $task->user_name }}</td>
                                                <td>{{ $task->type1 }} - {{ $task->type2 }}</td>
                                                <td>Ukuran: {{ $task->size }} <br> Durasi: {{ $task->duration }}</td>
                                                <td>{{ $task->deadline }}</td>
                                                <td>{{ $task->whatsapp }}</td>
                                                <td>{{ $task->word_file }}</td>
                                                <td>{{ $task->status }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        Revisi Selesai
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Status Revisi</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Revisi Sudah Selesai ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
        </div>
    @endsection
