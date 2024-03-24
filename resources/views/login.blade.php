@extends('layout')

@section('head')
    <style>
        body {
            background-color: #DCDCDC;

        }

        .card {
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e5e9f2;
            border-radius: .2rem;
        }
    </style>
@endsection

@section('body')
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Halo official Ingenio & Tutor</h1>
                        <p class="lead">
                            Silahkan Login untuk Masuk ke Apps
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Andrew Jones"
                                        class="img-fluid rounded-circle" width="132" height="132">
                                </div>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            type="email" name="email" required value="{{ old('email') }}"
                                            placeholder="email@ingenioindonesia.co.id" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter your password">
                                        <smalsl>
                                            <a href="pages-reset-password.html">Forgot password?</a>
                                        </small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox align-items-center">
                                            <input type="checkbox" class="custom-control-input" value="remember-me"
                                                name="remember-me" checked="">
                                            <label class="custom-control-label text-small">Remember me next time</label>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" href="index.html" class="btn btn-lg btn-primary">Sign in</button>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
