@extends('layout')
@section('content')
<div class="mb-10">
    <h1 class="font-TitilliumWeb-Bold text-4xl">Dashboard</h1>
</div>
<div class="grid grid-cols-6 gap-4">
    <div class="col-span-2 p-8 shadow-lg shadow-black rounded-md">
        <div class="grid grid-cols-2">
            <div class="col-rows-1  grid justify-start">
                <h1 class="font-TitilliumWeb-Regular text-2xl">User</h1>
                <p class="font-TitilliumWeb-BoldItalic text-3xl">30</p>
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
                <p class="font-TitilliumWeb-BoldItalic text-3xl">30</p>

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
                <p class="font-TitilliumWeb-BoldItalic text-3xl">30</p>

            </div>
            <div class="col-rows-2 grid justify-end">
                <i class="fa-solid fa-check text-center text-7xl"></i>
            </div>
        </div>
    </div>
    <div class="mt-10 ">
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
    </div>
</div>
@endsection
