@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">Kelompok 1</h1>
    </div>

    <!-- Mentoring Enrollment Section -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Enrolment Option</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 items-center">
            <!-- Left Section: Group Info -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <img src="/images/Rectangle.svg" alt="Group Image" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Kelompok 1</h3>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <img src="/images/user.svg" alt="Mentor Icon" class="w-8 h-8 rounded-full">
                        <span>Wahyu Prihatmoko</span>
                    </div>
                </div>
            </div>
            
            <!-- Middle Divider -->
            <div class="hidden md:block w-px h-full bg-gray-300"></div>
            
            <!-- Right Section: Enroll Button -->
            <div class="flex flex-col items-center justify-center  rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-center">Self Enroll</h3>
                <p class="text-sm text-gray-500 mb-6 text-center">Enroll to access</p>
                <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                    Enroll
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
