@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex  bg-gray-200">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Data Content -->
        <div class="w-3/4 p-4 justify-between items-center container mx-auto">
            <div x-data="courseManager()">
                <!-- Kelola Kelas -->
                <div class="bg-white shadow-md rounded-md p-4 mt-6">
                    <!-- Judul -->
                    <h2 class="text-xl font-bold mb-4">Kelola Kelas</h2>

                    <!-- Tombol Tambah dan Pencarian -->

                    <!-- Header dengan Tombol Tambah -->
                    <div class="flex justify-between items-center mb-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded flex items-center"
                            @click="showAddModal = true; newCourse = { course_title: '', mentor: { name: '' } };">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah
                        </button>
                        <div class="relative">
                            <input type="text" placeholder="Search" class="border rounded-md px-3 py-2 pl-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 absolute top-2.5 left-3 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m1.35-6.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Modal Tambah Data Kelas -->
                    <div x-show="showAddModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
                        style="display: none;" x-transition>
                        <div class="bg-white p-6 rounded shadow-md w-1/3">
                            <h2 class="text-lg font-semibold mb-4">Tambah Data</h2>
                            <form @submit.prevent="addData()">
                                <div class="mb-4">
                                    <label for="add_course_title" class="block text-sm font-medium text-gray-700">Judul
                                        Kelompok</label>
                                    <input type="text" id="add_course_title" x-model="newCourse.course_title"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                        placeholder="Masukkan judul kelompok" />
                                </div>
                                <div class="mb-4">
                                    <label for="add_mentor_name"
                                        class="block text-sm font-medium text-gray-700">Mentor</label>
                                    <select id="add_mentor_name" x-model="newCourse.mentor_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="" disabled selected>Pilih Mentor</option>
                                        @foreach ($mentors as $mentor)
                                            <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" class="bg-gray-300 text-black px-4 py-2 rounded mr-2"
                                        @click="showAddModal = false">
                                        Batal
                                    </button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabel Kelas -->
                    <table class="w-full table-auto mt-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left p-2">Kelompok</th>
                                <th class="text-left p-2">Jumlah</th>
                                <th class="text-left p-2">Mentor</th>
                                <th class="text-left p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="p-2">{{ $course->course_title }}</td>
                                    <td class="p-2">{{ $course->users_count }}</td>
                                    <td class="p-2">{{ $course->mentor->name ?? 'Tidak ada mentor' }}</td>
                                    <td class="p-2">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded"
                                            @click="editCourse = { id: '{{ $course->id }}', course_title: '{{ $course->course_title }}', mentor: { name: '{{ $course->mentor->name ?? '' }}' }}; showEditModal = true;">
                                            Edit
                                        </button>
                                        <button class="bg-red-500 text-white px-4 py-2 rounded"
                                            @click="deleteData('{{ $course->id }}')">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Edit Data Kelas -->
                    <div x-show="showEditModal"
                        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
                        style="display: none;" x-transition>
                        <div class="bg-white p-6 rounded shadow-md w-1/3">
                            <h2 class="text-lg font-semibold mb-4">Edit Data</h2>
                            <form @submit.prevent="updateData()">
                                <div class="mb-4">
                                    <label for="edit_course_title" class="block text-sm font-medium text-gray-700">Judul
                                        Kelompok</label>
                                    <input type="text" id="edit_course_title" x-model="editCourse.course_title"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                                </div>
                                <div class="mb-4">
                                    <label for="edit_mentor_name"
                                        class="block text-sm font-medium text-gray-700">Mentor</label>
                                    <select id="edit_mentor_name" x-model="editCourse.mentor_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="" disabled>Pilih Mentor</option>
                                        @foreach ($mentors as $mentor)
                                            <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-gray-300 text-black px-4 py-2 rounded mr-2"
                                        @click="showEditModal = false">
                                        Batal
                                    </button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function courseManager() {
            return {
                showAddModal: false,
                showEditModal: false,
                editCourse: {
                    course_title: '',
                    mentor_id: null, // ID mentor untuk dropdown
                },
                newCourse: {
                    course_title: '',
                    mentor_id: null, // ID mentor untuk dropdown
                },

                addData() {
                    // Simpan data ke backend melalui AJAX
                    // Contoh placeholder
                    this.showAddModal = false;
                    Swal.fire('Berhasil!', 'Data berhasil ditambahkan.', 'success');
                },

                updateData() {
                    // Perbarui data ke backend melalui AJAX
                    // Contoh placeholder
                    this.showEditModal = false;
                    Swal.fire('Berhasil!', 'Data berhasil diperbarui.', 'success');
                },

                deleteData(courseId) {
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: 'Data akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Hapus data di backend melalui AJAX
                            // Contoh placeholder
                            Swal.fire('Berhasil!', 'Data berhasil dihapus.', 'success');
                        }
                    });
                }
            };
        }
    </script>
@endsection
