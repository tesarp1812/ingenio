@extends('layout')

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
                    
                </div>
            </div>
        </div>
    </div>
@section('table')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Stock Kasoku
            </div>
            <div class="card-body">
                <div class="text-center mt-3">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Sign</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($checklog as $log)
                           <tr>
                            <td>{{$log->name}}</td>
                            <td>{{$log->sign}}</td>
                            <td>{{$log->created_at}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
