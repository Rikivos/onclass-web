@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen py-8">
        <div class="container mx-auto">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Logbook</h1>
                <button
                    id="openModal"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-500">
                    Tambah Kegiatan
                </button>
            </div>

            <!-- Outer Activity Container -->
            <div class="bg-white p-6 rounded-lg shadow">
                <!-- Activity Cards -->
                <div class="space-y-6">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="bg-white shadow-lg rounded-lg flex overflow-hidden border border-gray-300">
                            <!-- Image Section -->
                            <div class="w-1/4">
                                <img src="/images/logbook.svg" alt="Activity Image" class="w-full h-full object-cover">
                            </div>

                            <!-- Content Section -->
                            <div class="p-6 w-3/4">
                                <h2 class="text-xl font-bold mb-2">Kegiatan: Sejarah Muhammadiyah</h2>
                                <p class="text-gray-700 mb-1"><strong>Tanggal:</strong> 27 Maret 2023</p>
                                <p class="text-gray-700 mb-1"><strong>Waktu:</strong> 10:00 - 12:00</p>

                                <div class="mb-3">
                                    <span
                                        class="px-3 py-1 text-sm font-semibold rounded-full
                                        @if ($i == 0) bg-green-100 text-green-600 
                                        @elseif ($i == 1) bg-red-100 text-red-600 
                                        @else bg-yellow-100 text-yellow-600 @endif">
                                        @if ($i == 0)
                                            Disetujui
                                        @elseif ($i == 1)
                                            Ditolak
                                        @else
                                            Proses
                                        @endif
                                    </span>
                                </div>

                                <p class="text-gray-700">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed elit eu augue
                                    tincidunt pharetra nec vel ligula. <a href="#"
                                        class="text-blue-500 underline">selengkapnya...</a>
                                </p>
                            </div>
                        </div>
                        <!-- Add separator -->
                        @if ($i < 2)
                            <hr class="my-6 border-gray-300">
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div
        id="modal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg w-1/2 shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Tambahkan Kegiatan Mentoring</h2>

            <form>
                <!-- Nama Kegiatan -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium mb-1">Nama Kegiatan</label>
                    <input
                        type="text"
                        id="nama"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Tanggal -->
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium mb-1">Tanggal</label>
                    <input
                        type="date"
                        id="tanggal"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Waktu -->
                <div class="mb-4">
                    <label for="waktu" class="block text-sm font-medium mb-1">Waktu</label>
                    <div class="flex items-center space-x-2">
                        <input
                            type="time"
                            class="w-1/2 border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                        <span>s/d</span>
                        <input
                            type="time"
                            class="w-1/2 border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Uraian Mentoring -->
                <div class="mb-4">
                    <label for="uraian" class="block text-sm font-medium mb-1">Uraian Mentoring</label>
                    <textarea
                        id="uraian"
                        rows="4"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Media Kamera -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Media Kamera</label>
                    <button
                        type="button"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Kamera
                    </button>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-2">
                    <button
                        type="button"
                        id="closeModal"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Selesai
                    </button>
                </div>
            </form>
        </div>
    </div>    
@endsection
