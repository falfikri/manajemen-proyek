<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.style')
    <title>Report</title>
</head>
<body>
    <div class="container-scroller">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">    
                    <img src="{{ asset('assets/images/NU.png') }}" alt="" height="130px" class="mt-1">
                    <div class="card-title fs-2 mt-3 ms-2">
                        Laporan Data Pekerjaan
                        <p class="fs-6 mb-0">CV. Napoleon Utara</p>
                        <p class="fs-6 mb-0">Jl.Tok Aziz Singgang Bulan</p>
                        <p class="fs-6 mb-0"></p>
                    </div>
                </div>
                <table class="table table-bordered dt-responsive nowrap w-100 display">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Nama Pekerjaan</th>
                            <th>Status</th>
                            <th>Progres</th>
                            <th>Tanggal Mulai</th>
                            <th>Target Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $d)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->status }}</td>
                            <td>{{ $d->progres }}%</td>
                            <td>{{ date('d-m-Y', strtotime($d->start)) }}</td>  
                            <td>{{ date('d-m-Y', strtotime($d->finish)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>