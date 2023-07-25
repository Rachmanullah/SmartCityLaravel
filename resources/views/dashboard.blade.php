@extends('layout')
@section('content')
<style>
        #map {
            height: 400px;
            width: 500px;
            margin-top: 20%;
        }
    </style>
<div class="mb-10">
    <h1 class="font-TitilliumWeb-Bold text-4xl">Dashboard</h1>
</div>
<div class="grid grid-cols-6 gap-4">
    <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
        <div class="grid grid-cols-2">
            <div class="col-rows-1  grid justify-start">
                <h1 class="font-TitilliumWeb-Regular text-2xl">User</h1>
                <p class="font-TitilliumWeb-BoldItalic text-3xl">{{ $countUser }}</p>
            </div>
            <div class="col-rows-2 grid justify-end">
                <i class="fa-solid fa-user-plus text-center text-7xl"></i>
            </div>
        </div>
    </div>
    <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
        <div class="grid grid-cols-2">
            <div class="col-rows-1  grid justify-start">
                <h1 class="font-TitilliumWeb-Regular text-2xl">Laporan</h1>
                <p class="font-TitilliumWeb-BoldItalic text-3xl">{{ $countLaporan }}</p>

            </div>
            <div class="col-rows-2 grid justify-end">
                <i class="fa-solid fa-toolbox text-center text-7xl"></i>
            </div>
        </div>
    </div>
    <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
        <div class="grid grid-cols-2">
            <div class="col-rows-1  grid justify-start">
                <h1 class="font-TitilliumWeb-Regular text-2xl">Teratasi</h1>
                <p class="font-TitilliumWeb-BoldItalic text-3xl">{{ $countLaporanDone }}</p>

            </div>
            <div class="col-rows-2 grid justify-end">
                <i class="fa-solid fa-check text-center text-7xl"></i>
            </div>
        </div>
    </div>
    {{-- <div class="mt-10 ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-xl">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Koordinate
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kerusakan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">

            </tbody>
        </table>
    </div> --}}
    <h1>Titik Jalan Rusak</h1>
    <div id="map"></div>
    <script>
        var markers = @json($MakerMaps);
        console.log(markers);
        function initMap() {
            // Inisialisasi peta
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.981902, lng: 112.626486}, // Ganti dengan koordinat pusat peta yang diinginkan
                zoom: 10 // Zoom level peta
            });
            // Tambahkan marker
            markers.forEach(function(markerData) {
                var marker = new google.maps.Marker({
                    position: {lat: Number(markerData.latitude), lng: Number(markerData.longitude)}, // Ganti dengan koordinat marker yang diinginkan
                    map: map,
                    title: markerData.kerusakan
                });
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_maps_api_key') }}&callback=initMap" async defer></script>
</div>
@endsection
