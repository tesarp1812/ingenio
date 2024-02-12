@extends('layout')

@section('navbar-content')
@endsection

@section('body')
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #ec890f;
            /* Ganti dengan warna yang diinginkan */
        }

        .container-fluid {
            height: 100vh;
        }
    </style>
@section('main')
    {{-- carousel --}}
    <div class="myCarousel">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/OP CLASS UKMPPD BATCH 2 2024.png') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/OP CLASS UKMPPD BATCH 3 2024.png') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/OP CLASS UKMPPD BATCH 4 2024.png') }}" class="d-block w-100" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- video --}}

      <div class="ratio ratio-16x9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Wk2p0yduAI4?si=rqsON9YTJS9xMu-n"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
      </iframe>
      </div>
@endsection
@endsection
