@extends('layout')

@section('main')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Request Design Divisi Multimedia
            </div>
            <div class="card-body">

                {{-- form --}}
                <div class=" mt-3">
                    <form action="/multimedia/form_request/input" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputQty" class="form-label">Nama User</label>
                            <input type="text" class="form-control" id="inputQty" value="{{ auth()->user()->name }}"
                                name="" disabled>
                            <input type="text" class="form-control" name="inputUser" value="{{ auth()->user()->id }}"
                                hidden>
                        </div>

                        <div class="mb-3">
                            <label for="typeSelect" class="form-label"> Pilih Type Design</label>
                            <select class="form-select" id="typeSelect" name="inputTypeDesign"
                                aria-label="Pilih Type Design">
                                <option value="">Pilih Type</option>
                                @foreach ($sub_type_design as $sub)
                                    <option value="{{ $sub->id }}">{{ ucwords($sub->type_td) }} -
                                        {{ ucwords($sub->type_td2) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Ukuruan Design</label>
                            <input class="form-control" type="text" name="inputSize">
                        </div>
                        <div class="mb-3">
                            <label for="">Durasi Video</label>
                            <input class="form-control" type="text" name="inputDuration">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Design</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="inputDescription"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal Selesai Pengerjaan</label>
                            <input class="form-control" type="date" name="inputDeadline">
                        </div>
                        <div class="mb-3">
                            <label for="">Apakah CITO</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inputCito" id="flexRadioDefault1"
                                    value="true">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya, ini desain CITO
                                </label>
                            </div>
                            <div class="form-check" hidden>
                                <input class="form-check-input" type="radio" name="inputCito" id="flexRadioDefault1"
                                    value="false" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Whatsapp</label>
                            <input class="form-control" type="number" name="inputWhatsapp">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload File Word</label>
                            <input class="form-control" type="file" id="formFile" name="inputWord">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("typeSelect").addEventListener("change", function() {
            var selectedType = this.value;
            var videoInput = document.getElementById("duration");

            // Reset nilai input jika tersembunyi
            videoInput.value = "";

            // Tampilkan atau sembunyikan input berdasarkan pilihan
            if (selectedType.includes("video")) {
                videoInput.style.display = "block";
            } else {
                videoInput.style.display = "none";
            }
        });
    </script>
@endsection
