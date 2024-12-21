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
            <h2 class="text-xl font-bold mb-4">Kelola Mentor</h2>
            
            <!-- Tombol Tambah dan Pencarian -->
            <div class="flex justify-between items-center mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah
                </button>
                <div class="relative">
                    <input type="text" placeholder="Search" class="border rounded-md px-3 py-2 pl-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute top-2.5 left-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.35-6.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </div>
            </div>
            
            <!-- Tabel -->
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left p-2">Kelompok</th>
                        <th class="text-left p-2">Mentor</th>
                        <th class="text-left p-2">Unduh Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        
        <div class="bg-white shadow-md rounded-md p-4 mt-6">
            <!-- Judul -->
            <h2 class="text-xl font-bold mb-4">Kelola Kelas</h2>
            
            <!-- Tombol Tambah dan Pencarian -->
            <div class="flex justify-between items-center mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah
                </button>
                <div class="relative">
                    <input type="text" placeholder="Search" class="border rounded-md px-3 py-2 pl-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute top-2.5 left-3 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.35-6.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </div>
            </div>
            
            <!-- Tabel -->
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left p-2">Kelompok</th>
                        <th class="text-left p-2">Mentor</th>
                        <th class="text-left p-2">Unduh Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">aa</td>
                        <td class="p-2">aa</td>
                        <td class="p-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
