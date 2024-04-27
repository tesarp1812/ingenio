@extends('layout')

@section('head')
    {{-- jdn camera --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <style type="text/css">
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }
    </style>
@endsection
@section('body')
@section('main')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Absensi Online Official Ingenio
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
                            <button id="start-camera">Start Camera</button>
                            <video id="video" width="320" height="240" autoplay></video>
                            <button id="click-photo">Click Photo</button>
                            <canvas id="canvas" width="320" height="240"></canvas>
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

                        <input type="text"name="inputStatus" value="1" hidden>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cameraButton = document.querySelector("#start-camera");
        const video = document.querySelector("#video");
        const clickButton = document.querySelector("#click-photo");
        const canvas = document.querySelector("#canvas");
        let stream;

        cameraButton.addEventListener('click', async function() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                });
                video.srcObject = stream;
            } catch (error) {
                console.error('Error accessing camera:', error);
                alert('Failed to access camera. Please check permissions.');
            }
        });

        clickButton.addEventListener('click', function() {
            if (stream) {
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                let imageDataURL = canvas.toDataURL('image/jpeg');
                console.log(imageDataURL);
            } else {
                console.error('No camera stream available.');
                alert('Camera stream not available. Please start the camera first.');
            }
        });

        // Stop camera stream when leaving the page
        window.addEventListener('beforeunload', function() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        });
    });
</script>
@endsection
