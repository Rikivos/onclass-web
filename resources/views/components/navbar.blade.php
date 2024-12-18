<nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="/images/ump.svg" alt="UMP Logo" class="h-12 mr-6">
        </div>

        <!-- Links -->
        <ul class="flex space-x-6">
            <li><a href="/" class="text-black font-semibold">Home</a></li>
            <li><a href="/dashboard" class="text-gray-600 hover:text-black">Dashboard</a></li>
            <li><a href="{{ route('mycourse') }}" class="text-gray-600 hover:text-black">Mentoring</a></li>
            <li><a href="/logbook" class="text-gray-600 hover:text-black">Logbook</a></li>
        </ul>

        <!-- Actions -->
        <div class="flex items-center space-x-4">
            <button class="text-gray-600 hover:text-black">
                <i class="fas fa-bell"></i> <!-- Ikon Notifikasi -->
            </button>
            <button class="text-gray-600 hover:text-black">
                <i class="fas fa-comment"></i> <!-- Ikon Chat -->
            </button>
            <div class="relative">
                <button class="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center profile-button">
                    <span class="text-gray-700 font-bold">WP</span>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white shadow rounded hidden dropdown-menu">
                    <a href="/profile" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf <!-- Token CSRF untuk keamanan -->
                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-600 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>