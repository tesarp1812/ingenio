@extends('layout')

@section('navbar-content')

@endsection

@section('body')
<div class="container-sm" style="margin-top: 100px">
    <div class="card"  >
        <div class="card-header">
            Featured
        </div>
        <div class="row justify-content-center" style="margin-top: 15px">
            <div class="col-lg-6">
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-registration">
                    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                    <form action="/login" method="POST">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" required value="{{ old('email') }}"
                                placeholder="name@example.com" style="width: 95%; box-sizing: border-box; margin: 0 0 0 2%; padding: 10px;"  autofocus>
                                <label for="email" style="width: 95%; box-sizing: border-box; margin: 0 0 0 2%; padding: 10px;">Email address</label>
                            {{-- <div class="invalid-feedback">
                                {{ $message }}
                            </div> --}}
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-bottom" name="password"
                                id="password" required placeholder="Password" style="width: 95%; box-sizing: border-box; margin: 0 0 0 2%; padding: 10px;">
                            <label for="password" style="width: 95%; box-sizing: border-box; margin: 0 0 0 2%; padding: 10px;">Password</label>
                        </div>

                        <button class="w-9 btn btn-lg btn-warning mt-3" type="submit" style="margin: 0 0 0 20%" >Login</button>
                    </form>

                    <small class="d-block mt-4" style="margin: 0 0 5% 20%">Belum Punya Akun? <a class="text-danger" href="/register">Daftar
                            Sekarang!</a></small>
                </main>
            </div>
        </div>
    </div>
</div>

@endsection