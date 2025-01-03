@extends('layouts.app')

@section('content')
<div class="bg-blue-600 text-white">
    <div class="container mx-auto flex justify-center items-center py-4 px-6">
        <a href="/mentor/mentoring" class="text-lg font-bold mx-4 underline">Mentoring</a>
        <a href="/mentor/participant" class="text-lg font-bold mx-4">Participants</a>
    </div>
</div>

<div class="container mx-auto p-4">
    <div class="text-left mb-8">
        <h1 class="text-3xl font-bold mb-4">Mentoring</h1>
    </div>

    <div x-data="mentoringForm" class="accordion bg-white shadow rounded-lg p-6">
        <div class="flex justify-end items-center mb-4">
            <button id="expandAllBtn" class="text-blue-500 hover:underline">Expand all</button>
        </div>

        <div class="accordion-item border rounded-lg mb-6">
            <h2 class="accordion-header flex justify-between items-center px-4 py-3 bg-gray-100">
                <button class="accordion-button text-left text-lg font-semibold flex items-center focus:outline-none">
                    <span class="ml-2">General</span>
                </button>
                <button @click="showForm = !showForm" class="add-form-button text-blue-500 hover:underline">
                    Add Activity or Resources
                </button>
            </h2>
            <div x-show="showForm" class="accordion-collapse p-6 bg-white border-t">
                <form @submit.prevent="submitForm" class="space-y-6">
                    <!-- Module Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Module Title</label>
                        <input x-model="formData.module_title" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required />
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea x-model="formData.content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">File</label>
                        <div id="file-upload-area"
                            class="mt-1 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-4 cursor-pointer hover:border-blue-500">
                            <input type="file" @change="handleFileChange" multiple>
                        </div>
                        <p x-text="fileName" class="mt-2 text-sm text-gray-500"></p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" @click="showForm = false" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Existing Modules -->
        @foreach ($modules as $key => $module)
        <div class="accordion-item outline-2 outline outline-gray-200 rounded-lg mb-6">
            <h2 class="accordion-header">
                <button class="accordion-button w-full text-left bg-white p-4 flex items-center focus:outline-none"
                    type="button" data-target="#module{{ $key }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31"
                        fill="none" class="accordion-icon transition-transform duration-300">
                        <circle cx="15" cy="15.5" r="14" stroke="black" stroke-width="1.5" />
                        <path d="M11 6 L19 15.5 L11 25" stroke="black" stroke-width="1.875" stroke-linecap="round"
                            stroke-linejoin="round" class="arrow-path" />
                    </svg>
                    <span class="text-lg font-semibold ml-2">{{ $module->module_title }}</span>
                </button>
            </h2>
            <div id="module{{ $key }}" class="accordion-collapse hidden">
                <div class="accordion-body p-4">
                    <p>{{ $module->content }}</p>
                    @if (!empty($module->file_path))
                    <a href="{{ $module->module_file_url }}" class="text-blue-500 hover:underline flex items-center gap-2">
                        <img src="/images/pdf-icon.svg" alt="PDF Icon" class="w-5 h-5">
                        Download Module
                    </a>
                    @else
                    <br>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('mentoringForm', () => ({
            showForm: false,
            file: null,
            fileName: '',
            formData: {
                module_title: '',
                content: '',
                course_id: '{{ $course->course_id }}',
            },
            handleFileChange(event) {
                const files = event.target.files;
                if (files.length > 0) {
                    this.file = files[0];
                    this.fileName = this.file.name;
                } else {
                    this.file = null;
                    this.fileName = '';
                }
            },
            async submitForm() {
                try {
                    const formData = new FormData();
                    formData.append('module_title', this.formData.module_title);
                    formData.append('content', this.formData.content);
                    formData.append('course_id', this.formData.course_id);
                    if (this.file) {
                        formData.append('file_path', this.file);
                    }

                    const response = await axios.post('{{ route("module.store") }}', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                    });

                    alert('Module created successfully');
                    window.location.reload();
                } catch (error) {
                    console.error(error);
                    alert('An error occurred');
                }
            },
        }));
    });

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
</script>
@endsection