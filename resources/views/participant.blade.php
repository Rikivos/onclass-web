@extends('layouts.app')

@section('content')
<div class="bg-blue-600 text-white">
    <div class="container mx-auto flex justify-center items-center py-4 px-6">
        <a href="/mentoring" class="text-lg font-bold mx-4">Mentoring</a>
        <a href="/participant" class="text-lg font-bold mx-4 underline">Participants</a>
    </div>
</div>

<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">Kelompok 1</h1>
        
    </div>

    <!-- Participants Table -->
    <div class="bg-white shadow rounded-lg p-6">
        <table class="min-w-full border-collapse border border-gray-300">
            <h2 class="text-xl font-semibold">Participants</h2>
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-6 border border-gray-300 text-left">Name Participants</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">NIM</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">Roles</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-6 border border-gray-300 flex items-center">
                        <img src="/images/user.svg" alt="Avatar" class="w-8 h-8 rounded-full mr-4">
                        Wahyu Prihatmoko
                    </td>
                    <td class="py-3 px-6 border border-gray-300">2103040130</td>
                    <td class="py-3 px-6 border border-gray-300">Students</td>
                </tr>
                @endfor
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex justify-center mt-4">
            <nav>
                <ul class="flex items-center space-x-2">
                    <li><a href="#" class="px-3 py-2  hover:bg-gray-100">&lt;</a></li>
                    <li><a href="#" class="px-3 py-2  hover:bg-gray-100">1</a></li>
                    <li><a href="#" class="px-3 py-2  hover:bg-gray-100">2</a></li>
                    <li><a href="#" class="px-3 py-2  hover:bg-gray-100">3</a></li>
                    <li><a href="#" class="px-3 py-2 hover:bg-gray-100">&gt;</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
