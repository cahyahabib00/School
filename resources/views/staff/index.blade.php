<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Staff - Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="/" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-500 text-lg">Sekolah</span>
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Beranda</a>
                    <a href="/profil" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Profil</a>
                    <a href="/staff" class="py-4 px-2 text-blue-500 border-b-4 border-blue-500 font-semibold">Staff</a>
                    <a href="/kegiatan" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Kegiatan</a>
                    <a href="/galeri" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Galeri</a>
                    <a href="/kontak" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Profil Staff Sekolah</h1>
            <p class="text-xl opacity-90">Kenali tim edukatif yang berdedikasi untuk pendidikan terbaik</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Kepala Sekolah Section -->
        @if($kepalaSekolah->count() > 0)
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Kepala Sekolah</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($kepalaSekolah as $staff)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6 text-center">
                        @if($staff->foto)
                            <img src="{{ Storage::url($staff->foto) }}" 
                                 alt="{{ $staff->nama }}" 
                                 class="w-32 h-32 rounded-full mx-auto object-cover mb-4">
                        @else
                            <div class="w-32 h-32 rounded-full mx-auto bg-gray-200 flex items-center justify-center mb-4">
                                <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $staff->nama }}</h3>
                        <p class="text-gray-600 mb-4">{{ $staff->jabatan }}</p>
                        @if($staff->deskripsi)
                            <p class="text-sm text-gray-500 mb-4">{{ Str::limit($staff->deskripsi, 100) }}</p>
                        @endif
                        <a href="{{ route('staff.show', $staff->id) }}" 
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Lihat Profil
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Guru Section -->
        @if($guru->count() > 0)
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Guru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($guru as $staff)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-6 text-center">
                        @if($staff->foto)
                            <img src="{{ Storage::url($staff->foto) }}" 
                                 alt="{{ $staff->nama }}" 
                                 class="w-24 h-24 rounded-full mx-auto object-cover mb-4">
                        @else
                            <div class="w-24 h-24 rounded-full mx-auto bg-gray-200 flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $staff->nama }}</h3>
                        <p class="text-gray-600 mb-4">{{ $staff->jabatan }}</p>
                        <a href="{{ route('staff.show', $staff->id) }}" 
                           class="inline-block bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition duration-300">
                            Lihat Profil
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Karyawan Section -->
        @if($karyawan->count() > 0)
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Karyawan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($karyawan as $staff)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="p-4 text-center">
                        @if($staff->foto)
                            <img src="{{ Storage::url($staff->foto) }}" 
                                 alt="{{ $staff->nama }}" 
                                 class="w-20 h-20 rounded-full mx-auto object-cover mb-3">
                        @else
                            <div class="w-20 h-20 rounded-full mx-auto bg-gray-200 flex items-center justify-center mb-3">
                                <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $staff->nama }}</h3>
                        <p class="text-gray-600 mb-3 text-sm">{{ $staff->jabatan }}</p>
                        <a href="{{ route('staff.show', $staff->id) }}" 
                           class="inline-block bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition duration-300">
                            Lihat Profil
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2025 Sekolah. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</body>
</html>