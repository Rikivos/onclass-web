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
        <div class="grid grid-cols-4 gap-4">
            <!-- Calendar Sidebar -->
            <div class="col-span-1">
                <div class="mb-4">
                    <h3 class="text-lg font-bold">Agenda</h3>
                    <ul class="text-sm text-gray-600">
                        <li class="text-red-500">● Meeting internal (09:00)</li>
                        <li class="text-blue-500">● Submission project (14:00)</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Tugas</h3>
                    <ul class="text-sm text-gray-600">
                        <li class="text-green-500">● Submit proposal</li>
                    </ul>
                </div>
            </div>

            <!-- Calendar Main -->
            <div class="col-span-3">
                <div class="flex justify-between items-center mb-4">
                </div>
                <div class="border rounded-lg p-4 bg-gray-50">
                    <!-- Kalender Kosong -->
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
