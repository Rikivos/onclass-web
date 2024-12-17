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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                <a href="{{ route('courses.show', $course->course_slug) }}" class="block">
                    <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="/images/Rectangle.svg" alt="Group Image" class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">{{ $course->course_title }}</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <img src="/images/user.svg" alt="Mentor Icon" class="w-8 h-8 rounded-full">
                                <span>{{ $course->mentor_id }}</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Group List Section -->
</div>
@endsection
