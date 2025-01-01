@extends('layouts.app')

@section('content')
<div class="bg-blue-600 text-white">
    <div class="container mx-auto flex justify-center items-center py-4 px-6">
        <a href="/mentor/mentoring" class="text-lg font-bold mx-4 underline">Mentoring</a>
        <a href="/mentor/participant" class="text-lg font-bold mx-4">Participants</a>
    </div>
</div>

<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">Mentoring</h1>
    </div>

    <!-- Accordion Section -->
    <div class="accordion bg-white shadow rounded-lg p-6 ">
        <div class="flex justify-end items-center mb-4">
            <button id="expandAllBtn" class="text-blue-500 hover:underline">Expand all</button>
        </div>

        <div class="accordion-item border rounded-lg mb-6">
            <h2 class="accordion-header flex justify-between items-center px-4 py-3 bg-gray-100">
                <button
                    class="accordion-button text-left text-lg font-semibold flex items-center focus:outline-none">
                    <span class="ml-2">General</span>
                </button>
                <button
                    class="add-form-button text-blue-500 hover:underline">
                    Add Activity or Resources
                </button>
            </h2>
            <div id="general" class="accordion-collapse hidden p-6 bg-white border-t">
                <form class="space-y-6">
                    <!-- General Section -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Files</label>
                        <div id="file-upload-area"
                            class="mt-1 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-4 cursor-pointer hover:border-blue-500">
                            <span id="upload-message" class="text-gray-500">Drag and drop file here to add item</span>
                            <input id="file-input" type="file" class="hidden" multiple>
                        </div>
                        <div id="file-list" class="mt-4 space-y-2"></div>
                    </div>
        
                    <!-- Availability Section -->
                    <fieldset class="space-y-4">
                        <legend class="text-sm font-semibold text-gray-700">Availability</legend>
                        <div class="flex items-center space-x-4">
                            <label class="block text-sm font-medium text-gray-700">Allow submission from</label>
                            <input type="datetime-local" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="flex items-center space-x-4">
                            <label class="block text-sm font-medium text-gray-700">Due date</label>
                            <input type="datetime-local" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    </fieldset>
        
                    <!-- Submission Types Section -->
                    <fieldset class="space-y-4">
                        <legend class="text-sm font-semibold text-gray-700">Submission types</legend>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="online-text" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="online-text" class="ml-2 text-sm text-gray-700">Online text</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="file-submissions" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                                <label for="file-submissions" class="ml-2 text-sm text-gray-700">File submissions</label>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label class="block text-sm font-medium text-gray-700">Maximum number of upload files</label>
                            <input type="number" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="20" />
                        </div>
                        <div class="flex items-center space-x-4">
                            <label class="block text-sm font-medium text-gray-700">Maximum number of upload files (MB)</label>
                            <select class="block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <option>Site upload limit (8MB)</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label class="block text-sm font-medium text-gray-700">Accept file types</label>
                            <select class="block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <option>PDF</option>
                            </select>
                        </div>
                    </fieldset>
        
                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- General Section -->
        <div class="accordion-item outline outline-2 outline-gray-200 rounded-lg mb-6">
            <h2 class="accordion-header">
                <button class="accordion-button w-full text-left bg-white p-4 flex items-center focus:outline-none"
                    type="button" data-target="#general">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31"
                        fill="none" class="accordion-icon transition-transform duration-300">
                        <circle cx="15" cy="15.5" r="14" stroke="black" stroke-width="1.5" />
                        <path d="M11 6 L19 15.5 L11 25" stroke="black" stroke-width="1.875" stroke-linecap="round"
                            stroke-linejoin="round" class="arrow-path" />
                    </svg>
                    <span class="text-lg font-semibold ml-2">General</span>
                </button>
            </h2>
            <div id="general" class="accordion-collapse hidden">
                <div class="accordion-body p-4">
                    <p>Konten sesi 2 akan ditambahkan di sini.</p>
                </div>
            </div>
        </div>

        <!-- Sesi 1 -->
        <div class="accordion-item outline-2 outline outline-gray-200 rounded-lg mb-6">
            <h2 class="accordion-header">
                <button class="accordion-button w-full text-left bg-white p-4 flex items-center focus:outline-none"
                    type="button" data-target="#sesi1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31"
                        fill="none" class="accordion-icon transition-transform duration-300">
                        <circle cx="15" cy="15.5" r="14" stroke="black" stroke-width="1.5" />
                        <path d="M11 6 L19 15.5 L11 25" stroke="black" stroke-width="1.875" stroke-linecap="round"
                            stroke-linejoin="round" class="arrow-path" />
                    </svg>
                    <span class="text-lg font-semibold ml-2">Sesi 1</span>
                </button>
            </h2>
            <div id="sesi1" class="accordion-collapse hidden">
                <div class="accordion-body p-4">
                    <p class="mb-4">
                        Assalamu'alaikum Wr. Wb.<br>
                        Salam sehat dan bahagia selalu...<br><br>
                        Mata kuliah Kewirausahaan Berbasis Program Studi pertemuan pertama akan membahas kontrak
                        perkuliahan dan Pemahaman Dasar Kewirausahaan.
                    </p>
                    <p class="mb-4">
                        Pada pertemuan ini juga akan membahas Teori dan Konsep Kewirausahaan: Definisi, karakteristik
                        wirausahawan, dan peran kewirausahaan dalam perekonomian, Sejarah dan Perkembangan
                        Kewirausahaan: Evolusi kewirausahaan dalam industri teknologi, Tren Kewirausahaan Teknologi:
                        Studi kasus startup teknologi di Indonesia dan global.
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
        </div>

        <!-- Sesi 2 -->
        <div class="accordion-item outline-2 outline outline-gray-200 rounded-lg mb-6">
            <h2 class="accordion-header">
                <button class="accordion-button w-full text-left bg-white p-4 flex items-center focus:outline-none"
                    type="button" data-target="#sesi2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31"
                        fill="none" class="accordion-icon transition-transform duration-300">
                        <circle cx="15" cy="15.5" r="14" stroke="black" stroke-width="1.5" />
                        <path d="M11 6 L19 15.5 L11 25" stroke="black" stroke-width="1.875" stroke-linecap="round"
                            stroke-linejoin="round" class="arrow-path" />
                    </svg>
                    <span class="text-lg font-semibold ml-2">Sesi 2</span>
                </button>
            </h2>
            <div id="sesi2" class="accordion-collapse hidden">
                <div class="accordion-body p-4">
                    <p>Konten sesi 2 akan ditambahkan di sini.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-target'));
            const icon = this.querySelector('.accordion-icon');

            // Toggle visibility of the content
            target.classList.toggle('hidden');

            // Rotate the icon
            if (target.classList.contains('hidden')) {
                icon.style.transform = 'rotate(0deg)'; // Panah ke kanan
            } else {
                icon.style.transform = 'rotate(90deg)'; // Panah ke bawah
            }
        });
    });
    document.querySelector('.add-form-button').addEventListener('click', function () {
        const formContainer = document.getElementById('general');
        formContainer.classList.toggle('hidden');
    });

    const fileUploadArea = document.getElementById('file-upload-area');
    const fileInput = document.getElementById('file-input');
    const fileList = document.getElementById('file-list');
    const uploadMessage = document.getElementById('upload-message');

    // Open file dialog when area is clicked
    fileUploadArea.addEventListener('click', () => {
        fileInput.click();
    });

    // Handle file input change
    fileInput.addEventListener('change', (event) => {
        handleFiles(event.target.files);
    });

    // Handle drag and drop
    fileUploadArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        fileUploadArea.classList.add('border-blue-500');
    });

    fileUploadArea.addEventListener('dragleave', () => {
        fileUploadArea.classList.remove('border-blue-500');
    });

    fileUploadArea.addEventListener('drop', (event) => {
        event.preventDefault();
        fileUploadArea.classList.remove('border-blue-500');
        const files = event.dataTransfer.files;
        handleFiles(files);
    });

    // Function to handle files
    function handleFiles(files) {
        fileList.innerHTML = ''; // Clear existing file list
        Array.from(files).forEach((file) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center space-x-2';
            fileItem.innerHTML = `
                <span class="text-sm text-gray-700">${file.name}</span>
                <span class="text-xs text-gray-500">(${(file.size / 1024).toFixed(2)} KB)</span>
            `;
            fileList.appendChild(fileItem);
        });
        uploadMessage.textContent = 'Files added successfully!';
    }
</script>
@endsection