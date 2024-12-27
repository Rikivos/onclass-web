<div class="border rounded-lg p-4 bg-white shadow">
    <div class="bg-white p-6 container mx-auto">
        <div class="space-y-6">
            <div class="flex overflow-hidden">
                <!-- Image Section -->
                <div class="w-1/2 p-4">
                    <button id="openEdit"
                        class="px-4 py-2 bg-yellow-500 text-white text-sm font-semibold rounded hover:bg-yellow-600">
                        Edit
                    </button>
                    <button class="px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded hover:bg-red-600">
                        Hapus
                    </button>
                    <img src="/images/logbook.svg" alt="Activity Image" class="w-full h-auto object-cover rounded mt-4">
                </div>
                <!-- Content Section -->
                <div class="w-2/3 p-6 mt-10">
                    <div class="border border-gray-300 overflow-hidden bg-gray-200">
                        <div class="grid grid-cols-3 gap-4 p-4 border-b border-gray-500">
                            <div class="col-span-1 text-gray-600 font-medium">Kegiatan</div>
                            <div class="col-span-2">Sejarah Muhammadiyah</div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4 border-b border-gray-500">
                            <div class="col-span-1 text-gray-600 font-medium">Tanggal</div>
                            <div class="col-span-2">27 Maret 2023</div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4 border-b border-gray-500">
                            <div class="col-span-1 text-gray-600 font-medium">Waktu</div>
                            <div class="col-span-2">10:00 - 12:00</div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4 border-b border-gray-500">
                            <div class="col-span-1 text-gray-600 font-medium">Persetujuan</div>
                            <div class="col-span-2">
                                <span
                                    class="border-b border-gray-400 px-3 py-1 text-sm font-semibold rounded-full
                                   @if ($i == 0) bg-green-100 text-green-600
                                            @elseif ($i == 1) bg-red-100 text-red-600
                                            @else bg-yellow-100 text-yellow-600 @endif">
                                    @if ($i == 0)
                                        Disetujui
                                    @elseif ($i == 1)
                                        Ditolak
                                    @else
                                        Proses
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4">
                            <div class="col-span-1 text-gray-600 font-medium">Uraian Kegiatan</div>
                            <div class="col-span-2 text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed elit eu
                                augue tincidunt pharetra nec vel ligula.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed elit eu
                                augue tincidunt pharetra nec vel ligula.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed elit eu
                                augue tincidunt pharetra nec vel ligula.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed elit eu
                                augue tincidunt pharetra nec vel ligula.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
