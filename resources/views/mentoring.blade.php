@extends('layouts.app')

@section('content')
<div class="bg-blue-600 text-white">
    <div class="container mx-auto flex justify-center items-center py-4 px-6">
        <a href="/mentoring" class="text-lg font-bold mx-4 underline">Mentoring</a>
        <a href="/participant" class="text-lg font-bold mx-4">Participants</a>
    </div>
</div>

<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">{{ $course->course_title}}</h1>
    </div>

    <!-- Collapsible Section -->
    <div class="bg-white shadow rounded-lg p-6">
        <!-- Expand All Button -->
        <div class="flex justify-between items-center mb-4">
            <button id="expandAllBtn" class="text-blue-500 hover:underline">Expand all</button>
        </div>

        <!-- General Section -->
        <div class="mb-6">
            <button class="w-full text-left bg-gray-100 p-4 rounded-lg flex items-center focus:outline-none" onclick="toggleCollapse('general')">
                <span id="icon-general" class="text-gray-500 mr-2">&#9654;</span>
                <span class="text-lg font-semibold">General</span>   
            </button>
            <div id="general" class="mt-4 hidden">
                <p>Konten sesi 2 akan ditambahkan di sini.</p>
            </div>
        </div>

        <!-- Sesi 1 -->
        <div class="mb-6">
            <button class="w-full text-left bg-gray-100 p-4 rounded-lg flex items-center focus:outline-none" onclick="toggleCollapse('sesi1')">
                <span id="icon-sesi1" class="text-gray-500 mr-2">&#9654;</span>
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
            <button class="w-full text-left bg-gray-100 p-4 rounded-lg flex items-center focus:outline-none" onclick="toggleCollapse('sesi2')">
                <div id="general" class="mt-4 hidden">
                    <p>Konten sesi 2 akan ditambahkan di sini.</p>
                </div>
                <span id="icon-sesi2" class="text-gray-500 mr-2">&#9654;</span>
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
        const icon = document.getElementById(`icon-${id}`);

        if (section.classList.contains('hidden')) {
            section.classList.remove('hidden');
            icon.innerHTML = '&#9662;';
        } else {
            section.classList.add('hidden');
            icon.innerHTML = '&#9654;';
        }
    }

    document.getElementById('expandAllBtn').addEventListener('click', () => {
        const sections = ['general', 'sesi1', 'sesi2'];
        const isAllExpanded = sections.every(id => !document.getElementById(id).classList.contains('hidden'));

        sections.forEach(id => {
            const section = document.getElementById(id);
            const icon = document.getElementById(`icon-${id}`);

            if (isAllExpanded) {
                section.classList.add('hidden');
                icon.innerHTML = '&#9654;';
            } else {
                section.classList.remove('hidden');
                icon.innerHTML = '&#9662;';
            }
        });
    });
</script>
@endsection
