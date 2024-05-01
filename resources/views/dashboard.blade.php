@extends('layout')

@section('head')
    <style>
        .card-style1 {
            box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
        }

        .border-0 {
            border: 0 !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
        }

        section {
            padding: 120px 0;
            overflow: hidden;
            background: #fff;
        }

        .mb-2-3,
        .my-2-3 {
            margin-bottom: 2.3rem;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .text-primary {
            color: #ceaa4d !important;
        }

        .text-secondary {
            color: #15395A !important;
        }

        .font-weight-600 {
            font-weight: 600;
        }

        .display-26 {
            font-size: 1.3rem;
        }

        @media screen and (min-width: 992px) {
            .p-lg-7 {
                padding: 4rem;
            }
        }

        @media screen and (min-width: 768px) {
            .p-md-6 {
                padding: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {
            .p-sm-2-3 {
                padding: 2.3rem;
            }
        }

        .p-1-9 {
            padding: 1.9rem;
        }

        .bg-secondary {
            background: #15395A !important;
        }

        @media screen and (min-width: 576px) {

            .pe-sm-6,
            .px-sm-6 {
                padding-right: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {

            .ps-sm-6,
            .px-sm-6 {
                padding-left: 3.5rem;
            }
        }

        .pe-1-9,
        .px-1-9 {
            padding-right: 1.9rem;
        }

        .ps-1-9,
        .px-1-9 {
            padding-left: 1.9rem;
        }

        .pb-1-9,
        .py-1-9 {
            padding-bottom: 1.9rem;
        }

        .pt-1-9,
        .py-1-9 {
            padding-top: 1.9rem;
        }

        .mb-1-9,
        .my-1-9 {
            margin-bottom: 1.9rem;
        }

        @media (min-width: 992px) {
            .d-lg-inline-block {
                display: inline-block !important;
            }
        }

        .rounded {
            border-radius: 0.25rem !important;
        }

        .img-logo {
            width: 300px;
            height: 300px;
        }
    </style>
@endsection

@section('body')
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <img class="img-logo" src="{{ asset('images/karakter.png') }}" alt="...">
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                        <h3 class="h2 text-white mb-0">{{ auth()->user()->name }}</h3>
                                        <span class="text-primary">{{ auth()->user()->role->roles }}</span>
                                    </div>
                                    <ul class="list-unstyled mb-1-9">
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Position:</span>
                                            {{ auth()->user()->role->roles }}</li>

                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Email:</span>
                                            {{ auth()->user()->email }}</li>

                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">
                                                <a href="/profile" class="btn btn-primary"><i class="bi bi-box-seam"> Update
                                                        Profile</i></a>
                                            </span></li>

                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">
                                                <a href="/password" class="btn btn-primary"><i class="bi bi-box-seam"> Ganti
                                                        Password</i></a>
                                            </span></li>

                                        <li class="mb-2 mb-xl-3 display-28">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Absensi Online
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="inputQty" class="form-label">Nama User</label>
                                                                <input type="text" class="form-control" id="inputQty"
                                                                    value="{{ auth()->user()->name }}" name=""
                                                                    disabled>
                                                                <input type="text" class="form-control" name="inputUser"
                                                                    value="{{ auth()->user()->id }}" hidden>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="inputQty" class="form-label">keterangan</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="inputQty" class="form-label">Waktu</label>
                                                                <div id="txt"></div>
                                                            </div>
                                                            <div class="mb-1">
                                                                {{-- clock in --}}
                                                                <form action="/clock-sign" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    <input type="hidden" value="{{auth()->user()->id}}" name="inputUser">
                                                                    <input type="hidden" value="sign in" name="inputSign">
                                                                    <input type="hidden" value="sign in" name="inputDesc">
                                                                    <button type="submit" class="btn btn-primary">Clock In</button>
                                                                </form>
                                                        
                                                                {{-- clock out --}}
                                                                <form action="/clock-sign" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    <input type="hidden" value="{{auth()->user()->id}}" name="inputUser">
                                                                    <input type="hidden" value="sign out" name="inputSign">
                                                                    <input type="hidden" value="sign out" name="inputDesc">
                                                                    <button class="btn btn-primary" type="submit">Clock Out</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div>
                        <span class="section-title text-primary mb-3 mb-sm-4">Fitur Apps</span>
                        <div class="container">
                            @auth
                                @php
                                    $gudang = ['1', '3']; // superadmin, General Affair
                                    $kasoku = ['1', '5']; // superadmin, Kasoku
                                    $scheduleClass = ['1', '4']; // superadmin, Tutor
                                    $multimedia = ['1', '4', '6']; // superadmin, Tutor, Multimedia
                                    $hr = ['1']; // superadmin, 
                                @endphp

                                @if (in_array(auth()->user()->role_id, $gudang))
                                    <a href="/gudang" class="btn btn-primary btn-lg"><i class="bi bi-box-seam"> Gudang</i></a>
                                @endif

                                @if (in_array(auth()->user()->role_id, $kasoku))
                                    <a href="/kasoku" class="btn btn-primary btn-lg"><i class="bi bi-box-seam"> Kasoku</i></a>
                                @endif

                                @if (in_array(auth()->user()->role_id, $scheduleClass))
                                    <a href="/schedule" class="btn btn-primary btn-lg"><i class="bi bi-box-seam"> Pemesanan
                                            Kelas</i></a>
                                @endif

                                @if (in_array(auth()->user()->role_id, $multimedia))
                                    <a href="/multimedia" class="btn btn-primary btn-lg"><i class="bi bi-box-seam">
                                            Multimedia</i></a>
                                @endif
                                @if (in_array(auth()->user()->role_id, $multimedia))
                                    <a href="/checklog" class="btn btn-primary btn-lg"><i class="bi bi-box-seam">
                                            HR</i></a>
                                @endif

                                <a href="/task-work" class="btn btn-primary btn-lg"><i class="bi bi-box-seam">Task
                                        Harian</i></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function startTime() {
          const today = new Date();
          let h = today.getHours();
          let m = today.getMinutes();
          let s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
          setTimeout(startTime, 1000);
        }
        
        function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
        }
        </script>
@endsection
