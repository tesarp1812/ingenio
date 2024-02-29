@extends('layout')

@section('head')
    <style>
        .tombol {
            text-decoration: none;
            width: 90%;
            box-sizing: border-box;
            margin: 0 0 20px 0;
            padding: 10px;
        }

        .kotak {
            text-align: center;
            width: 40%;
            margin: auto;
        }

        .gambar-logo {
            width: 300px;
            height: auto;
            margin-top: 10px
        }
    </style>
@endsection

@section('body')
    {{-- logo --}}
    <div class="mb-4 " style="text-align: center">
        <img src="{{ asset('images/karakter.png') }}" class="gambar-logo" alt="Logo Perusahaan " />
    </div>

    {{-- link  --}}

    <div class="mb-2 kotak">
        <a href="" class="btn btn-primary tombol">
            <h5>ADMINISTRASI BIMBINGAN</h5>
        </a>
    </div>

    <div class="accordion accordion-flush kotak" id="administrasi">
        <div class="accordion-item">
            <h2 class="accordion-header ">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#menu-administrasi" aria-expanded="true" aria-controls="collapseOne">
                    ADMINISTRASI BIMBINGAN
                </button>
            </h2>
            <div id="menu-administrasi" class="accordion-collapse collapse" data-bs-parent="#administrasi">
                <div class="accordion-body">

                    {{-- acording program preklinik --}}
                    <div class="accordion accordion-flush" id="program-preklinik">
                        <div class="accordion-item">
                            <h2 class="accordion-header ">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#preklinik" aria-expanded="true" aria-controls="collapseOne">
                                    PROGRAM PREKLINIK INGENIO INDONESIA
                                </button>
                            </h2>
                            <div id="preklinik" class="accordion-collapse collapse" data-bs-parent="#program-preklinik">
                                <div class="accordion-body">

                                    <div class="mb-2">
                                        <a href="https://docs.google.com/spreadsheets/d/1nb3zauFk9Zkhlovet2Rhhz2MN5s4IFUiqLQMoPWQeAg/edit#gid=1875558464"
                                            class="btn btn-primary tombol">
                                            <h5>REKAPITULASI PESERTA DAN KELAS PREKLINIK DAN DOKTER MUDA INGENIO INDONESIA
                                            </h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/u/3/folders/1DUQXvI1G2PYLg_SpWensxrhlVGQl24vh"
                                            class="btn btn-primary tombol">
                                            <h5>REKAPITULASI HONORARIUM TUTOR PREKLINIK DAN DOKTER MUDA</h5>
                                        </a>
                                    </div>

                                    {{-- REGIONAL MALANG --}}
                                    <div class="mb-2" style="text-align: center;">
                                        <div class="dropdown-center">
                                            <button class="btn btn-primary tombol dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <h5>REGIONAL MALANG</h5>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1vPLCPvWgQqnYDglk_voo8rsEmmfvS3LP">DATA
                                                        DASAR PESERTA PREKLINIK REGIONAL MALANG</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1qyMpRJNZqRAt7ItpkH8rmE7TcJYnT2KO">ABSEN
                                                        PESERTA PREKLINIK REGIONAL MALANG</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1NNKoZI5ad4qd7a2P2IbVg_NCq--iIls3">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR PREKLINIK REGIONAL MALANG</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- REGIONAL BALI --}}
                                    <div class="mb-2" style="text-align: center;">
                                        <div class="dropdown-center">
                                            <button class="btn btn-primary tombol dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <h5>REGIONAL BALI</h5>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1dMsCoyuAjvEjgfcdS-TELHmDd_j9jamW">DATA
                                                        DASAR PESERTA PREKLINIK REGIONAL BALI</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1ykODuVdI7_SrqUJxh-oPKxwXlsF1-acK">ABSEN
                                                        PESERTA PREKLINIK REGIONAL BALI</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1xC9UwjUqCJjFDXuEPoteU-QbFkKl2tYI">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR PREKLINIK REGIONAL BALI</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- REGIONAL SURABAYA --}}
                                    <div class="mb-2" style="text-align: center;">
                                        <div class="dropdown-center">
                                            <button class="btn btn-primary tombol dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <h5>REGIONAL SURABAYA</h5>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1brTq_1PyaXrn9u4U87Uhlx-1DkZuEj6n">DATA
                                                        DASAR PESERTA PREKLINIK REGIONAL SURABAYA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1QQ9A41RW1c4_F-rKxTjdXEV1YCiV-Bsz">ABSEN
                                                        PESERTA PREKLINIK REGIONAL SURABAYA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1Kx0UJmZkT8Kdizrjh6DOL_Qd_cQ7wQ5Q">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR PREKLINIK REGIONAL SURABAYA</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- REGIONAL JAKARTA --}}
                                    <div class="mb-2" style="text-align: center;">
                                        <div class="dropdown-center">
                                            <button class="btn btn-primary tombol dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <h5>REGIONAL JAKARTA</h5>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1BqDyOf4_A636dCbDfAXhV2DNqufRYftm">DATA
                                                        DASAR PESERTA PREKLINIK REGIONAL JAKARTA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1ioEVDbxtY1J116cGh5yvUKr45EBDo4XF">ABSEN
                                                        PESERTA PREKLINIK REGIONAL JAKARTA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1Xrk7eKpAHGYHZO5bWjTZg6LQUXEgVLkM">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR PREKLINIK REGIONAL JAKARTA</a></li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
