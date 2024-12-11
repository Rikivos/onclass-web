@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">Site Mentoring</h1>
    </div>

    <!-- Announcement Section -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">Site Announcements</h2>
        <div class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
            <img src="/images/pdf.svg" alt="Announcement Icon" class="w-8 h-8">
            <p class="text-gray-600">Kelompok mentoring mahasiswa angkatan 2024</p>
        </div>
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Daftar Kelompok</h2>
            <div class="grid grid-cols-3 gap-6">
                <!-- Group Card Example -->
                @for ($i = 1; $i <= 9; $i++)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="/images/Rectangle.svg" alt="Group Image" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Kelompok {{ $i }}</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <img src="/images/user.svg" alt="Mentor Icon" class="w-15 h-15">
                            <span>Wahyu Pratama</span>
                        </div>
                        <div class="text-sm text-gray-500 ml-14">Mentor</div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Group List Section -->
    
</div>
@endsection
