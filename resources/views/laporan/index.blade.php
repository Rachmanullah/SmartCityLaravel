@extends('layout')
@section('content')
<div class="mb-5">
    <h1 class="font-TitilliumWeb-Bold text-4xl">Data Laporan</h1>
</div>

@if (session('message'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success alert!</span>{{ session('message') }}
</div>
@elseif (session('error'))
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Danger alert!</span> {{ session('error') }}
</div>
@endif
<button
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none mb-28 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    <a href="{{ route('laporan.print') }}"
        class=" mt-5 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-12 rounded w-50">
        Print
    </a>
</button>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    No
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Nama Pelopor
                </th>
                <th scope="col" class="px-6 py-3" colspan="2">
                    Koordinat
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Lokasi
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Status
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Action
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-3 py-2">
                    Latitude
                </th>
                <th scope="col" class="px-3 py-2">
                    Longitude
                </th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($data as $lapors)
            <tr class="bg-white border-b">
                <td class="px-6 py-4">
                    {{ $no++ }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->users->nama }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->latitude }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->longitude }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->lokasi }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->status }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" data-modal-target="update-modal{{ $lapors->id }}"
                        data-modal-toggle="update-modal{{ $lapors->id }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
                    <a href="{{ route('laporan.delete',['id'=>$lapors->id]) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a> |
                    <a href="#" data-modal-target="detail-modal{{ $lapors->id }}"
                        data-modal-toggle="detail-modal{{ $lapors->id }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                </td>
                <!-- Main modal -->
                <div id="update-modal{{ $lapors->id }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="update-modal{{ $lapors->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Status Laporan
                                </h3>
                                <form class="space-y-6" action="{{ route('laporan.update',['id'=>$lapors->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div>
                                        <label for="role"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <select name="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="{{ $lapors->status }}" selected>{{ $lapors->status }}
                                            </option>
                                            <option disabled>Choose a Status</option>
                                            <option value="Diterima">Diterima</option>
                                            <option value="Ditolak">Ditolak</option>
                                            <option value="Dalam Penanganan">Dalam Penanganan</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Detail modal -->
                <div id="detail-modal{{ $lapors->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Detail Laporan
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="detail-modal{{ $lapors->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="flex flex-col items-center rounded-lg md:flex-row md:max-w-xl">
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                    src="http://127.0.0.1:8000/assets/storange/image_laporan/{{ $lapors->foto }}" alt="Foto Laporan">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $lapors->lokasi }}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Koordinat : {{ $lapors->latitude }}, {{ $lapors->longitude }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Keterangan : {{ $lapors->keterangan }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kerusakan : {{ $lapors->kerusakan }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status : <span class="p-2 rounded-xl ">{{ $lapors->status }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
