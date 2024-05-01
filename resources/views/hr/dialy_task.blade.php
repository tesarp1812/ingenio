@extends('layout')

@section('bady')
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dialy-task">
                        Dialy Task
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="dialy-task" tabindex="-1" aria-labelledby="dialy-taskLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="dialy-taskLabel">Dialy Task</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/dialy-task" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="inputQty"
                                                value="{{ auth()->user()->name }}" disabled>
                                            <input type="hidden" class="form-control" name="inputUser"
                                                value="{{ auth()->user()->id }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Task</label>
                                            <textarea class="form-control" aria-label="With textarea" name="inputTask"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
