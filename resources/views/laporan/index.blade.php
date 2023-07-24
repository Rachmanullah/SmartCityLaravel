@extends('layout')
@section('content')
<div class="mb-5">
    <h1 class="font-TitilliumWeb-Bold text-4xl">Data Laporan</h1>
</div>

<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Tambah
</button>
@if (session('message'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success alert!</span>{{ session('message') }}
</div>
@elseif (session('error'))
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Danger alert!</span> {{ session('error') }}
</div>
@endif
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Data Role</h3>
                <form class="space-y-6" action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="role"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <input type="text" name="role" id="role" placeholder="Masukkan Role Baru"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required autocomplete="off">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    No
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Foto
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Nama Pelopor
                </th>
                <th scope="col" class="px-6 py-3" colspan="2">
                    Koordinat
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Detail Lokasi
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3" rowspan="2">
                    Kerusakan
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
                    <img class="w-32 h-32"
                        src="http://127.0.0.1:8000/assets/storange/image_laporan/{{ $lapors->foto ? $lapors->foto : 'user.jpeg' }}"
                        alt="foto" />
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
                    {{ $lapors->keterangan }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->kerusakan }}
                </td>
                <td class="px-6 py-4">
                    {{ $lapors->status }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" data-modal-target="update-modal{{ $lapors->id }}" data-modal-toggle="update-modal{{ $lapors->id }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
                    <a href="{{ route('laporan.delete',['id'=>$lapors->id]) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
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
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Status Laporan</h3>
                                <form class="space-y-6" action="{{ route('role.update',['id'=>$lapors->id]) }}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div>
                                        <label for="role"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <select name="role"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="{{ $lapors->status }}" selected>{{ $lapors->status }}</option>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
