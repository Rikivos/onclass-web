@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex  bg-gray-200">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Data Content -->
    <div class="w-3/4 p-4 justify-between items-center container mx-auto">
            <!-- Table -->
            <div class="bg-white shadow-md rounded-md p-4">
                <!-- Judul -->
                <h2 class="text-xl font-bold mb-4">Kehadiran Mentoring</h2>
                <hr class="my-6 border-b border-gray-300">
                <div class="flex justify-end items-center mb-4">
                    <label for="tahun" class="text-sm font-medium text-gray-700 mr-2">Tahun Akademik</label>
                    <div class="relative">
                        <input type="number" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="2024" />
                    </div>
                </div>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Pilih</button>

                <div class="flex justify-start items-center mt-4 mb-4">
                    <text class="text-md font-bold text-black mr-2">Keterangan</text>
                </div>
                <div class="flex justify-start items-center mb-4">
                    <text class="text-md font-bold text-black mr-2">Untuk melihat rekap presensi dalam bentuk file pdf</text>
                </div>
                
                <!-- Tombol Tambah dan Pencarian -->
                <div class="flex justify-end items-center mb-4">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="border rounded-md px-3 py-2 pl-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 absolute top-2.5 left-3 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m1.35-6.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Tabel -->
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="text-left p-2">Kelompok</th>
                            <th class="text-left p-2">Jumlah Peserta</th>
                            <th class="text-left p-2">Mentor</th>
                            <th class="text-left p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2"></td>
                            <td class="p-2"></td>
                            <td class="p-2"></td>
                            <td class="p-2">
                                <button class="bg-red-500 text-white px-4 py-2 rounded">
                                    Download
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection