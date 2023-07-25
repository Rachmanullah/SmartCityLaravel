<!DOCTYPE html>
<html>

<head>
    <title>SPJR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Data Laporan Jalan Rusak</h2>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Pelopor</th>
                <th colspan="2">Koordinat</th>
                <th rowspan="2">Lokasi</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Kerusakan</th>
                <th rowspan="2">Status</th>
            </tr>
            <tr>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $datas)
            <tr class="text-center">
                <td>{{ $no++ }}</td>
                <td>{{ $datas->users->nama }}</td>
                <td>{{ $datas->latitude }}</td>
                <td>{{ $datas->longitude }}</td>
                <td>{{ $datas->lokasi }}</td>
                <td>{{ $datas->keterangan }}</td>
                <td>{{ $datas->kerusakan }}</td>
                <td>{{ $datas->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        <p class="text-center">Malang, {{ $date }}</p>
        {{-- <p class="text-center">{{ auth()->user()->roles->role }}</p> --}}
        <br><br><br>
        {{-- <p class="text-center">{{ auth()->user()->name }}</p> --}}
    </div>
</body>
</html>
