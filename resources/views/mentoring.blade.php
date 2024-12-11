@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">Kelompok 1</h1>
    </div>

    <!-- Collapsible Section -->
    <div class="bg-white shadow rounded-lg p-6">
        <!-- Expand All Button -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold"></h2>
            <button class="text-blue-500 hover:underline">Expand all</button>
        </div>

        <div class="mb-6">
            <button class="w-full text-left bg-gray-100 p-4 rounded-lg focus:outline-none" onclick="toggleCollapse('general')">
                <span class="text-gray-500">&#9662;</span>
                <span class="text-lg font-semibold">General</span>   
            </button>
            <div id="general" class="mt-4 hidden">
                <p>Konten sesi 2 akan ditambahkan di sini.</p>
            </div>
        </div>

        <!-- Sesi 1 -->
        <div class="mb-6">
            <button class="w-full text-left bg-gray-100 p-4 rounded-lg focus:outline-none" onclick="toggleCollapse('sesi1')">
                <span class="text-gray-500">&#9662;</span>
                <span class="text-lg font-semibold">Sesi 1</span>               
            </button>
            <div id="sesi1" class="mt-4 hidden">
                <p class="mb-4">
                    Assalamu'alaikum Wr. Wb.<br>
                    Salam sehat dan bahagia selalu...<br><br>
                    Mata kuliah Kewirausahaan Berbasis Program Studi pertemuan pertama akan membahas kontrak perkuliahan dan Pemahaman Dasar Kewirausahaan.
                </p>
                <p class="mb-4">
                    Pada pertemuan ini juga akan membahas Teori dan Konsep Kewirausahaan: Definisi, karakteristik wirausahawan, dan peran kewirausahaan dalam perekonomian, Sejarah dan Perkembangan Kewirausahaan: Evolusi kewirausahaan dalam industri teknologi, Tren Kewirausahaan Teknologi: Studi kasus startup teknologi di Indonesia dan global.
                </p>
                <p class="mb-4">
                    Silakan unduh dokumen kontrak perkuliahan dan materi Pemahaman Dasar Kewirausahaan...!
                </p>
                <div class="mt-4">
                    <a href="#" class="flex items-center gap-2 text-blue-500 hover:underline">
                        <img src="/images/pdf-icon.svg" alt="PDF Icon" class="w-5 h-5">
                        Tugas Sesi 1 - Kumpulkan tugas dalam bentuk PDF
                    </a>
                </div>
            </div>
        </div>

        <!-- Sesi 2 -->
        <div class="mb-6">
            <button class="w-full text-left bg-gray-100 p-4 rounded-lg focus:outline-none" onclick="toggleCollapse('sesi2')">
                <span class="text-gray-500">&#9662;</span>
                <span class="text-lg font-semibold">Sesi 2</span>
                
            </button>
            <div id="sesi2" class="mt-4 hidden">
                <p>Konten sesi 2 akan ditambahkan di sini.</p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleCollapse(id) {
        const section = document.getElementById(id);
        if (section.classList.contains('hidden')) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    }
</script>
@endsection
