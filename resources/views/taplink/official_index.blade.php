@extends('layout')

@section('head')
    <style>
        body {
            background-color: rgb(239, 239, 239)
        }

        .tombol {
            text-decoration: none;
            width: 90%;
            box-sizing: border-box;
            margin: 0 0 20px 0;
            padding: 10px;
        }

        .btn-acordion {
            background-color: #f8ca2b
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

    {{-- <div class="mb-2 kotak">
        <a href="" class="btn btn-primary tombol">
            <h5>ADMINISTRASI BIMBINGAN</h5>
        </a>
    </div> --}}

    <div class="mb-3 accordion accordion-flush kotak" id="administrasi">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed btn-acordion" type="button" data-bs-toggle="collapse"
                    data-bs-target="#menu-administrasi" aria-expanded="true" aria-controls="collapseOne">
                    ADMINISTRASI BIMBINGAN
                </button>
            </h2>
            <div id="menu-administrasi" class="accordion-collapse collapse " data-bs-parent="#administrasi">
                <div class="accordion-body ">

                    {{-- acording program preklinik --}}
                    <div class="mb-2 accordion accordion-flush" id="program-preklinik">
                        <div class="accordion-item">
                            <h2 class="accordion-header ">
                                <button class="accordion-button collapsed btn-acordion" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#preklinik" aria-expanded="true"
                                    aria-controls="collapseOne">
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


                    {{-- acording program dokter muda --}}
                    <div class="mb-2 accordion accordion-flush" id="program-doktermuda">
                        <div class="accordion-item">
                            <h2 class="accordion-header ">
                                <button class="accordion-button collapsed btn-acordion" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#doktermuda" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    PROGRAM DOKTER MUDA INGENIO INDONESIA
                                </button>
                            </h2>
                            <div id="doktermuda" class="accordion-collapse collapse"
                                data-bs-parent="#program-doktermuda">
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

                    {{-- acording program ukmppd --}}
                    <div class="mb-2 accordion accordion-flush" id="program-ukmppd">
                        <div class="accordion-item">
                            <h2 class="accordion-header ">
                                <button class="accordion-button collapsed btn-acordion" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#ukmppd" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    PROGRAM UKMPPD INGENIO INDONESIA
                                </button>
                            </h2>
                            <div id="ukmppd" class="accordion-collapse collapse" data-bs-parent="#program-ukmppd">
                                <div class="accordion-body">
                                    {{-- isi acording --}}

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/u/3/folders/1y3t9ohmT2tEHTIA7bTY7hEhwFepZnVw6"
                                            class="btn btn-primary tombol">
                                            <h5>REKAPITULASI PESERTA DAN KELAS UKMPPD
                                                INGENIO INDONESIA
                                            </h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/u/3/folders/1RnscT2c6_Mu5Lpw5rv1RAw7aW6IStZ65"
                                            class="btn btn-primary tombol">
                                            <h5>REKAPITULASI HONORARIUM TUTOR UKMPPD</h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/u/3/folders/13paiUAsRdDlO19Kw78d7Q9x_fNoHzdRD"
                                            class="btn btn-primary tombol">
                                            <h5>REQUEST JADWAL BIMBINGAN UKMPPD</h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1U2zhEWu4C1-3Zsv2E28MRndyfWQ46ktO?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>PLOTTING TUTOR UKMPPD UKMPPD</h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1zoPxO8rt2is-GjwjTiJXTtL8vw4Cp2hR?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>PLOTTING JADWAL UKMPPD</h5>
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
                                                        href="https://drive.google.com/drive/u/3/folders/1cP5c-Wta7VOY1oPmUsyLYpd4_4qjAaZe">DATA
                                                        DASAR PESERTA UKMPPD REGIONAL MALANG</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/188v_ixyJSAfwpFDu-KMwGWzgHVqTBh5J?usp=share_link">ABSEN
                                                        PESERTA UKMPPD REGIONAL MALANG</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1pKHL4xWJwZtwKPoLCLLKpD2CdEA_7vnM?usp=sharing">REKAPITULASI
                                                        PESERTA MUNDUR BATCH</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1PKVZvAAmjYUzggA6oAS96pinBU6X4Qls?usp=sharing">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR UKMPPD REGIONAL
                                                        MALANG</a></li>
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
                                                        href="https://drive.google.com/drive/folders/1-EljecVKUtqDjLp7PgfFzQyBhQQbQE6R?usp=sharing">DATA
                                                        DASAR PESERTA UKMPPD REGIONAL BALI</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1AE_YyUAgTpVJPiBBAH2MXZJrGl8IuZ9q?usp=sharing">ABSEN
                                                        PESERTA UKMPPD REGIONAL BALI</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1pKHL4xWJwZtwKPoLCLLKpD2CdEA_7vnM?usp=share_link">REKAPITULASI
                                                        PESERTA MUNDUR BATCH</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/u/3/folders/1AE_YyUAgTpVJPiBBAH2MXZJrGl8IuZ9q">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR UKMPPD REGIONAL
                                                        BALI</a></li>
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
                                                        href="https://drive.google.com/drive/u/3/folders/13_K0sbGVta8iN0tV96iMU0hXdBeTBdjS">DATA
                                                        DASAR PESERTA UKMPPD REGIONAL SURABAYA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1So_DvqxL8mgJZPipbBSSTxD06fi4glOe?usp=sharing">ABSEN
                                                        PESERTA UKMPPD REGIONAL SURABAYA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1pKHL4xWJwZtwKPoLCLLKpD2CdEA_7vnM?usp=sharing">REKAPITULASI
                                                        PESERTA MUNDUR BATCH</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1Gan3RZcKZjFTT65jgwB9aNCG-ZRQLW2j?usp=sharing">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR UKMPPD REGIONAL
                                                        SURABAYA</a></li>
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
                                                        href="https://drive.google.com/drive/folders/1ZGZLxLq3FbU6TQAiL1u6l_29lTZisHWp?usp=sharing">DATA
                                                        DASAR PESERTA UKMPPD REGIONAL JAKARTA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1woz6ncm0sTksSWp2uHcNtf76FN2JrhJU?usp=sharing">ABSEN
                                                        PESERTA UKMPPD REGIONAL JAKARTA</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/1pKHL4xWJwZtwKPoLCLLKpD2CdEA_7vnM?usp=sharing">REKAPITULASI
                                                        PESERTA MUNDUR BATCH</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://drive.google.com/drive/folders/11zwJ7Ioidlpbm-9FYk5W-Uv3pwvvVvSY?usp=sharing">ABSENSI
                                                        DAN JURNAL MENGAJAR TUTOR UKMPPD REGIONAL
                                                        JAKARTA</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- acording program ukmppd2dg --}}
                    <div class="mb-2 accordion accordion-flush" id="program-ukmppd2dg">
                        <div class="accordion-item">
                            <h2 class="accordion-header ">
                                <button class="accordion-button collapsed btn-acordion" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#ukmppd2dg" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    PROGRAM UKMPPD2DG INGENIO INDONESIA
                                </button>
                            </h2>
                            <div id="ukmppd2dg" class="accordion-collapse collapse" data-bs-parent="#program-ukmppd">
                                <div class="accordion-body">
                                    {{-- isi acording --}}

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/18iFnEcK1DDXjaEd0nj-S_ThGSEHr9VNf?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>DATA DASAR PESERTA UKMP2DG INGENIO INDONESIA
                                            </h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1tX-nH9-yopXx7dZTzrTgsR9xbNYq6SiX?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>ABSENSI PESERTA UKMP2DG INGENIO INDONESIA</h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1MmfB_ui7GLv9DaSU__HpDgkSVuq8qyjG?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>ABSENSI DAN JURNAL MENGAJAR TUTOR UKMP2DG</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- acording program kebidanan --}}
                    <div class="mb-2 accordion accordion-flush" id="program-kebidanan">
                        <div class="accordion-item">
                            <h2 class="accordion-header ">
                                <button class="accordion-button collapsed btn-acordion" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kebidanan" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    PROGRAM KEBIDANAN INGENIO INDONESIA
                                </button>
                            </h2>
                            <div id="kebidanan" class="accordion-collapse collapse" data-bs-parent="#program-ukmppd">
                                <div class="accordion-body">
                                    {{-- isi acording --}}

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1uCBoruqScQukmC-Pj00k5JwCG5tNkFX3?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>DATA DASAR PESERTA KEBIDANAN INGENIO INDONESIA
                                            </h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1Jey7nLtMqNNE8hUMWy09shydE-0FGKVn?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>ABSENSI PESERTA KEBIDANAN INGENIO INDONESIA</h5>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a href="https://drive.google.com/drive/folders/1zIRGaDXp-Yw0M6V8wR6PY1eNitq1SKdt?usp=sharing"
                                            class="btn btn-primary tombol">
                                            <h5>ABSENSI DAN JURNAL MENGAJAR TUTOR KEBIDANAN</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3" style="text-align: center;">
        <a href="https://account.mekari.com/users/sign_in?client_id=3ozGzJjjJrERyXUG&return_to=L2F1dGgvP2NsaWVudF9pZD0zb3pHekpqakpyRVJ5WFVHJnJlc3BvbnNlX3R5cGU9Y29kZSZzY29wZT1zc286cHJvZmlsZQ%3D%3D"
            class="btn btn-primary"
            style="width: 40%; box-sizing: border-box; margin: 0 0 20px 0; padding: 10px; height:">
            <h6>QONTAK</h6>
        </a>
    </div>

    <div class="mb-2" style="text-align: center;">
        <div class="dropdown-center">
            <button class="btn btn-primary tombol dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false" style="width: 40%; box-sizing: border-box; margin: 0 0 20px 0; padding: 10px; height:">
                <h5>TRYOUT</h5>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="https://www.e-ujian.com/web/index">DATA
                        Website Try Out Khusus Buat Peserta Kerjasama / Peserta Berkebutuhan Khusus</a></li>
                <li><a class="dropdown-item" href="https://tryout.ingenioindonesia.id/">ABSEN
                        Website Try Out Khusus Buat Peserta Kerjasama / Peserta Berkebutuhan Khusus</a></li>
            </ul>
        </div>
    </div>

    <div class="mb-3" style="text-align: center;">
        <a href="https://docs.google.com/spreadsheets/d/1meuww1-fw-T_sGJI-1HASZw-7gsNVit3j8EP4jSzojI/edit?usp=sharing"
            class="btn btn-primary"
            style="width: 40%; box-sizing: border-box; margin: 0 0 20px 0; padding: 10px; height:">
            <h6>ZOOM INGENIO INDONESIA</h6>
        </a>
    </div>

    <div class="mb-3" style="text-align: center;">
        <a href="https://genesis.lionparcel.com" class="btn btn-primary"
            style="width: 40%; box-sizing: border-box; margin: 0 0 20px 0; padding: 10px; height:">
            <h6>GENESIS LION PARCEL</h6>
        </a>
    </div>

    <div class="mb-3" style="text-align: center;">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSd1WwDK-H0q46jbnMnTLbKnJ9w9S0pffQh5J7jqSb8zI4ayMQ/viewform"
            class="btn btn-primary"
            style="width: 40%; box-sizing: border-box; margin: 0 0 20px 0; padding: 10px; height:">
            <h6>LAPORAN EVALUASI BULANAN</h6>
        </a>
    </div>

    <div class="mb-3" style="text-align: center;">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfbSbj-QESJNp8zrVkn7AoZ2nqkSAV5gK-51zcHVbyg2-EBtQ/viewform"
            class="btn btn-primary"
            style="width: 40%; box-sizing: border-box; margin: 0 0 20px 0; padding: 10px; height:">
            <h6>FORMULIR ABSENSI RAPAT INGENIO INDONESIA</h6>
        </a>
    </div>
@endsection
