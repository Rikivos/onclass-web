<div class="flex h-400 h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white text-gray-800 p-4 border-r shadow-md">

        <!-- Menu Items -->
        <ul>
            <li class="mb-4 flex items-center">
                <i class="fas fa-home text-gray-500 mr-2"></i>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
            </li>
            <li class="mb-4 flex items-center">
                <i class="fas fa-file-alt text-gray-500 mr-2"></i>
                <a href="{{ route('admin.data') }}" class="text-gray-700 hover:text-blue-600 font-medium">Data</a>
            </li>

            <li class="mb-4 flex items-center">
                <i class="fas fa-chart-bar text-gray-500 mr-2"></i>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Laporan</a>
            </li>
        </ul>
    </aside>
</div>
