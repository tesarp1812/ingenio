@extends('layout')



@section('body')
    {{-- card dashboard login --}}
    <div class="container text-center">
        <div class="w-100 p-3">
            <div class="card w-100" style="width: 50rem;">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                    <img src="{{ asset('images/karakter.png') }}" class="img-thumbnail img-fluid" alt="karakter"
                        style="max-width: 250px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang {{ auth()->user()->name }}</h5>
                    <label for="">test</label>
                    <p class="card-text">semangat menjalani hari ini</p>
                    {{-- route gudang (GA,Admin) --}}
                    @auth
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/gudang" class="btn btn-primary"><i class="bi bi-box-seam"> Gudang</i></a>
                        @endif

                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair' || auth()->user()->role === 'kasoku')
                            <a href="/kasoku" class="btn btn-primary"><i class="bi bi-box-seam"> Kasoku</i></a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
