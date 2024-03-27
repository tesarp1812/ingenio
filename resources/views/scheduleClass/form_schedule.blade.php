@extends('layout')


@section('body')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <a href="/schedule" class="btn btn-primary">Kembali</a>
                <div class="card mb-4">
                    <div class="card-header">Pemesanan Kelas Online & Offline</div>
                    <div class="card-body">
                        <form action="/schedule/form_schedule/input" method="POST">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">User</label>
                                <input class="form-control" type="text"
                                    placeholder="Enter your username" name="inputUser" value="{{ auth()->user()->name }}" disabled>
                                    <input class="form-control"  type="text"
                                    placeholder="Enter your username" name="inputUser" value="{{ auth()->user()->id }}" hidden>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Region</label>
                                    <select class="form-select" aria-label="Default select example" name="inputRegion">
                                        <option selected disabled>Pilih Region</option>
                                        @foreach ($region as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                        @endforeach
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
                                    <select class="form-select" aria-label="Default select example" name="inputActivityType">
                                        <option selected disabled>Pilih Jenis Aktifitas</option>
                                        @foreach ($activity as $activity)
                                        <option value="{{$activity->id}}">{{$activity->name}} - {{$activity->description}}</option>
                                        @endforeach
                                    </select>
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
