@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Heading -->
        <div class="p-6 mb-6">
            <h1 class="text-2xl font-bold">Hi, Wahyu! 👋</h1>
        </div>

        <!-- Timeline Section -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Timeline</h2>
            <div class="flex justify-center items-center h-40 bg-white rounded-lg outline outline-2 outline-gray-200">
                <img src="/images/timeline.svg" alt="No Activities" class="w-16 h-16">
                <p class="text-gray-500 mt-2">No activities require action</p>
            </div>

            <!-- Calendar Section -->
            <h2 class="text-xl font-semibold mb-4">Calendar</h2>
            <div class="grid grid-cols-4 gap-4 p-4 bg-white rounded-lg shadow-md outline outline-2 outline-gray-200">
                <!-- Sidebar Agenda & Tugas -->
                <div class="col-span-1 p-4 bg-white rounded-lg shadow-md ">
                    <!-- Mini Calendar -->
                    <div id="mini-calendar" class="mb-4"></div>  

                    <!-- Agenda & Tugas -->
                    <div class="flex items-center mb-4">
                        <!-- Gambar -->
                        <img src="/images/agenda.svg" alt="Agenda & Tugas" class="w-8 h-8 mr-4">
                        <!-- Teks -->
                        <h3 class="text-lg font-bold">Agenda & Tugas</h3>
                    </div>
                    <ul>
                        <li class="text-green-500">● Daily Standup <span class="float-right">08:00</span></li>
                        <li class="text-red-500">● Budget Review <span class="float-right">09:00</span></li>
                        <li class="text-yellow-500">● Sasha Jay 121 <span class="float-right">10:00</span></li>
                        <li class="text-blue-500">● Web Team Progress Update <span class="float-right">11:00</span></li>
                        <li class="text-gray-500">● Social team briefing <span class="float-right">12:00</span></li>
                    </ul>
                </div>


                <!-- Kalender -->
                <div class="col-span-3">
                    <div id="main-calendar"></div>
                </div>
            </div>

        </div>
    </div>
@endsection
