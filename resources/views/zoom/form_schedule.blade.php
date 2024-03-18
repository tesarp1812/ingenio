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
    </style>
@endsection

@section('body')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="/form_schedule/input" method="POST">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">User</label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" name="inputUser" value="1">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Region</label>
                                    <select class="form-select" aria-label="Default select example" name="inputRegion">
                                        <option selected disabled>Pilih Region</option>
                                        <option value="1">Malang</option>
                                        <option value="2">Surabaya</option>
                                        <option value="3">Bali</option>
                                        <option value="4">Jakarta</option>
                                    </select>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Apakah Online ?</label>
                                    <select class="form-select" aria-label="Default select example" name="inputIsOnline">
                                        <option selected disabled>Pilih Online / Offline</option>
                                        <option value="true">Iya</option>
                                        <option value="false">Tidak, kelas offline</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Tipe Aktifitas</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Tipe Aktifitas" name="inputActivityType" value="1">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Nama Kelas</label>
                                    <input class="form-control" id="inputLocation" type="text" placeholder="Nama Kelas"
                                        name="inputClass">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Tanggal</label>
                                <input class="form-control" id="inputEmailAddress" type="date" name="inputStartDate">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Jam Mulai</label>
                                    <input class="form-control" type="time" name="inputStartTime">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Jam Mulai</label>
                                    <input class="form-control" type="time" name="inputEndTime">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Nomer Whatsapps</label>
                                    <input class="form-control" type="number" name="inputWA"
                                        placeholder="Masukkan Nomer Whatsapp">
                                </div>
                            </div>

                            <input type="number" name="inputIdZoom" value="1" hidden><br>
                            <input type="number" name="inputLogin" value="1" hidden><br>
                            <input type="number" name="inputHost" value="1" hidden><br>

                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Input</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
