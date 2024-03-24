<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingenio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <!-- Bootstrap CSS datatable -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

    {{-- boostraps icon cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @yield('name')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo" width="200"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- navbar --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#catalog-section">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-warning">
                            <i class="bi bi-basket"></i> <span class="badge text-bg-secondary">4</span>
                        </button>
                    </li>
                </ul>
            </div>
            @yield('navbar-content') <!-- Yield for Navbar Content -->
        </div>
    </nav>

    <main>
        <div class="myCarousel">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/OP CLASS UKMPPD BATCH 2 2024.png') }}" class="d-block w-100"
                            alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/OP CLASS UKMPPD BATCH 3 2024.png') }}" class="d-block w-100"
                            alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/OP CLASS UKMPPD BATCH 4 2024.png') }}" class="d-block w-100"
                            alt="">
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

            <!-- Katalog Barang -->
            <section id="catalog-section">
                <div class="container mt-4">
                    <h2 class="mb-4">Catalog</h2>
                    <div class="row">
                        {{-- product --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 1 Cover Depan.png') }}"
                                    class="card-img-top" alt="Product 1">
                                <div class="card-body">
                                    <h5 class="card-title">Modul UKMPPD CBT Ingenio Indonesia: Ilmu Penyakit Dalam, Ilmu
                                        Penyakit Telinga, Hidung, Tenggorok dan Kepala-Leher</h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul UKMPPD
                                                        CBT Ingenio Indonesia: Ilmu Penyakit Dalam, Ilmu
                                                        Penyakit Telinga, Hidung, Tenggorok dan Kepala-Leher</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 1 Cover Depan.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 1 Cover Belakang.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                        {{-- product --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 2 Cover Depan.png') }}"
                                    class="card-img-top" alt="Product 2">
                                <div class="card-body">
                                    <h5 class="card-title">Modul UKMPPD CBT Ingenio Indonesia: Ilmu Bedah,
                                        Ilmu Kesehatan Mata</h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul UKMPPD
                                                        CBT Ingenio Indonesia: Ilmu Bedah, Ilmu Kesehatan Mata</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample2" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 2 Cover Depan.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 2 Cover Belakang.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample2" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample2" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                        {{-- product 3 --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 3 Cover Depan.png') }}"
                                    class="card-img-top" alt="Product 3">
                                <div class="card-body">
                                    <h5 class="card-title">Modul UKMPPD
                                        CBT Ingenio Indonesia: Obstetri dan Ginekologi, Ilmu Kesehatan Jiwa</h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal3">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal3" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul UKMPPD
                                                        CBT Ingenio Indonesia: Obstetri dan Ginekologi, Ilmu Kesehatan
                                                        Jiwa</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample3" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 3 Cover Depan.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 3 Cover Belakang.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample3" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample3" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                        {{-- product 4 --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 4 Cover Depan.png') }}"
                                    class="card-img-top" alt="Product 4">
                                <div class="card-body">
                                    <h5 class="card-title">Modul UKMPPD CBT Ingenio Indonesia: Ilmu Kesehatan Anak,
                                        Neurologi</h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal4">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal4" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul UKMPPD
                                                        CBT Ingenio Indonesia: Ilmu Kesehatan Anak, Neurologi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample4" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 4 Cover Depan.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 4 Cover Belakang.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample4" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample4" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                        {{-- product 5 --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 5 Cover Depan.png') }}"
                                    class="card-img-top" alt="Product 5">
                                <div class="card-body">
                                    <h5 class="card-title">Modul UKMPPD
                                        CBT Ingenio Indonesia: Dematovenereologi, Hukum Kedokteran dan Etik Kedokteran
                                    </h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal6">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal6" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul UKMPPD
                                                        CBT Ingenio Indonesia: Dematovenereologi, Hukum Kedokteran dan
                                                        Etik Kedokteran</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample5" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 5 Cover Depan.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 5 Cover Belakang.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample5" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample5" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                        {{-- product 6 --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 6 Cover Depan.png') }}"
                                    class="card-img-top" alt="Product 6">
                                <div class="card-body">
                                    <h5 class="card-title">Modul UKMPPD
                                        CBT Ingenio Indonesia: Kardiologi, Pulmonologi, Ilmu Kesehatan Masyarakat
                                    </h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal5">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal5" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul UKMPPD
                                                        CBT Ingenio Indonesia: Kardiologi, Pulmonologi, Ilmu Kesehatan
                                                        Masyarakat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample6" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 6 Cover Depan.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/cbt/[WRAP] Modul 6 Cover Belakang.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample6" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample6" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                        {{-- product 7 --}}
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/buku/osce/Depan Materi.png') }}"
                                    class="card-img-top" alt="Product 7">
                                <div class="card-body">
                                    <h5 class="card-title">Modul Checklist UKMPPD OSCE 
                                        Ingenio Indonesia
                                    </h5>
                                    <p class="card-text"></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal7">
                                        <i class="bi bi-bag-plus-fill"> Checkout</i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal7" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modul Checklist UKMPPD OSCE 
                                                        Ingenio Indonesia</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- carousel --}}
                                                    <div id="carouselExample7" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('images/buku/osce/Depan Materi.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/osce/Depan Checklist.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/buku/osce/Belakang Checklist.png') }}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExample7" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExample7" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang
                                                    tertera dibawah ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="openWhatsAppChat('+6282143260751')"><i
                                                            class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end product --}}
                    </div>
                </div>
        </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        function openWhatsAppChat(phoneNumber) {
            // Ubah nomor telepon sesuai kebutuhan
            var whatsappNumber = phoneNumber;

            // Ubah teks pesan sesuai kebutuhan
            var message = encodeURIComponent("Halo, saya ingin bertanya tentang produk Anda.");

            // Buat URL WhatsApp dengan nomor telepon dan pesan default (opsional)
            var whatsappUrl = 'https://api.whatsapp.com/send?phone=' + whatsappNumber + '&text=' + message;

            // Buka URL WhatsApp dalam tab atau jendela baru
            window.open(whatsappUrl, '_blank');
        }
    </script>



</body>

</html>
