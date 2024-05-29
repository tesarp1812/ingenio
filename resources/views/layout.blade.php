<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingenio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap CSS datatable -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

    {{-- boostraps icon cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('head')
</head>

<body onload="startTime()">

    <nav class="navbar navbar navbar-expand-lg navbar-light bg-warning">
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
                    @auth

                        @php
                            $gudang = ['1', '3'];
                            $kasoku = ['1', '3'];
                            $userId = auth()->id();
                        @endphp



                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu">
                                <li><a class="dropdown-item disabled" href="#">{{ auth()->user()->name }}</a></li>

                                {{-- route gudang --}}
                                @auth
                                    @if (in_array(auth()->user()->role_id, $gudang))
                                        <li><a class="dropdown-item" href="/gudang"><i class="bi bi-box-seam"> Gudang</i></a>
                                        </li>
                                    @endif
                                @endauth
                                {{-- end --}}

                                {{-- Menu Profile --}}
                                <li><a class="dropdown-item" href="/profile"><i class="bi bi-box-seam"> Profile</i></a></li>
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-box-seam"> Dashboard</i></a>
                                </li>


                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right">
                                            Logout</i></button>
                                </form>

                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/ingenio-store">Ingenio STORE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/akses-officials">Akses Officials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/akses-tutor">Akses Tutor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">login</a>
                        </li>
                    </ul>
                @endauth
            </div>
            @yield('navbar-content') <!-- Yield for Navbar Content -->
        </div>
    </nav>

    <main>
        @yield('main')
    </main>


    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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

    {{-- realtime clock --}}
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
    @yield('body')
</body>

</html>
