<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingenio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <!-- DataTables CSS and JS files -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.css"> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.js"></script> --}}
    <!-- Bootstrap CSS datatable -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

    @yield('name')
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3 p-0">
                <div class="flex-shrink-0 p-3 bg-warning" style="width: 255px; height: 100%; min-height: 100vh;">
                    <a class="navbar-brand mr-auto" href="/">
                        <img src="{{ asset('images/logo2.png') }}" alt="Logo" width="200"
                            class="d-inline-block align-text-top">
                    </a>
                    <a class="navbar-brand mr-auto" href="/gudang">
                      Menu Utama
                  </a>
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Home
                          </button>
                          <div class="collapse" id="home-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                              <li><a href="/stok_barang" class="link-dark rounded">Stok Gudang</a></li>
                              <li><a href="/riwayat_barang" class="link-dark rounded">Riwayat Barang</a></li>
                              <li><a href="#" class="link-dark rounded">Reports</a></li>
                            </ul>
                          </div>
                        </li>
                        <li class="mb-1">
                          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Stok Gudang
                          </button>
                          <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                              <li><a href="stok_baju" class="link-dark rounded">Baju</a></li>
                              <li><a href="stok_buku" class="link-dark rounded">Buku </a></li>
                              <li><a href="stok_merchandise" class="link-dark rounded">Merchandise</a></li>
                            </ul>
                          </div>
                        </li>
                        
                        <li class="mb-1">
                          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            Input Data
                          </button>
                          <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                              <li><a href="form_baju" class="link-dark rounded">Baju</a></li>
                              <li><a href="/form_buku" class="link-dark rounded">Buku</a></li>
                              <li><a href="/form_merchandise" class="link-dark rounded">Merchandise</a></li>
                            </ul>
                          </div>
                        </li>

                        <li class="mb-1">
                          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#paket-collapse" aria-expanded="false">
                            Kirim Paket
                          </button>
                          <div class="collapse" id="paket-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                              <li><a href="/paket_osce" class="link-dark rounded">Paket OSCE</a></li>
                              <li><a href="/paket_cbt" class="link-dark rounded">Paket CBT</a></li>
                              <li><a href="/form_merchandise" class="link-dark rounded">Merchandise</a></li>
                            </ul>
                          </div>
                        </li>

                       <li class="border-top my-3"></li>
                        <li class="mb-1">
                          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                            {{auth()->user()->name}} - {{auth()->user()->role}}
                          </button>
                          <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                              <li><a href="/dashboard" class="link-dark rounded">Dashboard</a></li>
                              <li><form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form></li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 p-0">
                <main style="padding-left: 20px;">
                    @yield('main')
                </main>
            </div>
            
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- DataTables initialization script -->
    <!-- Memuat jQuery terlebih dahulu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Kemudian baru memuat script DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    {{-- datatables --}}
    <div class="container">
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    dom: 'Blfrtip', // Show buttons and length menu
                    lengthMenu: [
                        [10, 25, 50, 100, -1], // Rows per page options
                        ['10', '25', '50', '100', 'All'] // Labels for the rows per page options
                    ],
                    buttons: [{
                            extend: 'copy',
                            exportOptions: {
                                columns: ':not(.exclude-export)'
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':not(.exclude-export)'
                            }
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: ':not(.exclude-export)'
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: ':not(.exclude-export)'
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':not(.exclude-export)'
                            }
                        }
                    ]
                });
            });
        </script>
        @yield('table')
    </div>

    {{-- button sidebar --}}

    
    @yield('body')
</body>

</html>
