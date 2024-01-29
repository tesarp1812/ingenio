@extends('admin.layout')

@section('main')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Riwayat Barang
            </div>
            <div class="card-body">
                <div class="text-center mt-3">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <button type="button" class="btn btn-primary" id="btnFilter">Filter</button>
                    <button type="button" class="btn btn-secondary" id="btnReset">Reset</button>

                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">User</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>
                                        @if ($d->baju_id)
                                            {{ ucwords($d->baju->nama_barang) }} {{ strtoupper($d->baju->ukuran) }}
                                        @elseif ($d->barang_id)
                                            {{ ucwords($d->barang->nama_barang) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $d->jumlah }}</td>
                                    <td>{{ $d->user->name }}</td>
                                    <td>{{ $d->formattedCreatedAt }}</td>
                                    <td>{{ $d->JamCreatedAt }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var dataTable = $('#myTable').DataTable({
                dom: 'Blfrtip',
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    ['10', '25', '50', '100', 'All']
                ],
                buttons: [
                    {
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

            function filterByDate() {
                var selectedDate = $('#tanggal').val();
                dataTable.columns(4).search(selectedDate).draw();
            }

            function resetDateFilter() {
                $('#tanggal').val('');
                dataTable.columns(4).search('').draw();
            }

            $('#btnFilter').on('click', function() {
                filterByDate();
            });

            $('#btnReset').on('click', function() {
                resetDateFilter();
            });
        });
    </script>
@endsection
