<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sekolah') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans antialiased">
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-700">{{ config('app.name', 'Sekolah') }}</a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex gap-6 text-gray-700 font-medium">
                <li><a href="/" class="hover:text-blue-600 transition">Beranda</a></li>
                <li><a href="/profil" class="hover:text-blue-600 transition">Profil</a></li>
                <li><a href="/kegiatan" class="hover:text-blue-600 transition">Kegiatan</a></li>
                <li><a href="/galeri" class="hover:text-blue-600 transition">Galeri</a></li>
                <li><a href="/kontak" class="hover:text-blue-600 transition">Kontak</a></li>
            </ul>

            <!-- Mobile Button -->
            <button onclick="toggleMenu()" class="md:hidden text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <ul class="flex flex-col gap-3 text-gray-700 font-medium">
                <li><a href="/" class="hover:text-blue-600 transition">Beranda</a></li>
                <li><a href="/profil" class="hover:text-blue-600 transition">Profil</a></li>
                <li><a href="/kegiatan" class="hover:text-blue-600 transition">Kegiatan</a></li>
                <li><a href="/galeri" class="hover:text-blue-600 transition">Galeri</a></li>
                <li><a href="/kontak" class="hover:text-blue-600 transition">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-1 container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} {{ config('app.name', 'Sekolah') }}. All rights reserved.
    </footer>
</body>
</html>
