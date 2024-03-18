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
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/ukmppd.jpeg') }}" class="card-img-top" alt="Product 1">
                                <div class="card-body">
                                    <h5 class="card-title">Product 1</h5>
                                    <p class="card-text">Description of Product 1.</p>
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
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Untuk Pembelian bisa menghubungi pihak admin ingenio indonesia yang tertera dibawah ini 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary" onclick="openWhatsAppChat('+6282143260751')"><i class="bi bi-whatsapp"> Hubungi Admin</i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/product2.jpg') }}" class="card-img-top" alt="Product 2">
                                <div class="card-body">
                                    <h5 class="card-title">Product 2</h5>
                                    <p class="card-text">Description of Product 2.</p>
                                    <a href="#" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/product3.jpg') }}" class="card-img-top" alt="Product 3">
                                <div class="card-body">
                                    <h5 class="card-title">Product 3</h5>
                                    <p class="card-text">Description of Product 3.</p>
                                    <a href="#" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
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
