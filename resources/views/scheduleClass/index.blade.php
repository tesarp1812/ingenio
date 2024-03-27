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
                    @auth
                    @php
                        $kasoku = ['1', '5'];
                    @endphp
                        @if (in_array(auth()->user()->role_id, $kasoku))
                            <a href="/schedule/form_schedule" class="btn btn-primary"><i class="bi bi-box-seam"> Pemesanan Kelas</i></a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection