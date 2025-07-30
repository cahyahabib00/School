<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $staff->nama }} - Profil Staff</title>
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
                    <a href="/staff" class="py-4 px-2 text-blue-500 hover:text-blue-700 transition duration-300">Staff</a>
                    <a href="/kegiatan" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Kegiatan</a>
                    <a href="/galeri" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Galeri</a>
                    <a href="/kontak" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('staff.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Staff</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $staff->nama }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <!-- Photo Section -->
                <div class="md:w-1/3 bg-gradient-to-br from-blue-50 to-blue-100 p-8 text-center">
                    @if($staff->foto)
                        <img src="{{ Storage::url($staff->foto) }}" 
                             alt="{{ $staff->nama }}" 
                             class="w-48 h-48 rounded-full mx-auto object-cover border-8 border-white shadow-lg">
                    @else
                        <div class="w-48 h-48 rounded-full mx-auto bg-gray-200 flex items-center justify-center border-8 border-white shadow-lg">
                            <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <h1 class="mt-6 text-2xl font-bold text-gray-800">{{ $staff->nama }}</h1>
                    <p class="text-lg text-gray-600 mt-2">{{ $staff->jabatan }}</p>
                    
                    <div class="mt-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            @if($staff->kategori === 'kepala_sekolah') bg-green-100 text-green-800
                            @elseif($staff->kategori === 'guru') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ \App\Models\Staff::getKategoriOptions()[$staff->kategori] ?? $staff->kategori }}
                        </span>
                    </div>
                    
                    <div class="mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            @if($staff->status === 'aktif') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst(str_replace('_', ' ', $staff->status)) }}
                        </span>
                    </div>
                </div>
                
                <!-- Details Section -->
                <div class="md:w-2/3 p-8">
                    <!-- Description -->
                    @if($staff->deskripsi)
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tentang</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $staff->deskripsi }}</p>
                    </div>
                    @endif
                    
                    <!-- Tugas dan Tanggung Jawab -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tugas dan Tanggung Jawab</h2>
                        @if($staff->tugas && count($staff->tugas) > 0)
                            <div class="grid grid-cols-1 gap-3">
                                @foreach($staff->tugas as $tugas)
                                <div class="flex items-start bg-gray-50 p-4 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ is_array($tugas) ? $tugas['tugas'] ?? $tugas : $tugas }}</span>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic">Belum ada tugas yang ditentukan</p>
                        @endif
                    </div>
                    
                    <!-- Informasi Tambahan -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Tambahan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Bergabung</p>
                                    <p class="text-gray-900">{{ $staff->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Terakhir Diperbarui</p>
                                    <p class="text-gray-900">{{ $staff->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Back Button -->
                    <div class="mt-8">
                        <a href="{{ route('staff.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Kembali ke Daftar Staff
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2025 Sekolah. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</body>
</html>