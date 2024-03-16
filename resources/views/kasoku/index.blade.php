@extends('admin.layout')

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
                    @auth
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/kasoku/stock" class="btn btn-primary"><i class="bi bi-box-seam"> Stock</i></a>
                        @endif

                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/kasoku/stock/input" class="btn btn-primary"><i class="bi bi-box-seam"> Input Stock</i></a>
                        @endif

                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'General Affair')
                            <a href="/kasoku/request/list" class="btn btn-primary"><i class="bi bi-box-seam"> Permintaan</i></a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection