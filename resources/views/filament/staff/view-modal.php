<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Foto Profil -->
        <div class="md:col-span-1">
            <div class="text-center">
                @if($record->foto)
                    <img src="{{ Storage::url($record->foto) }}" 
                         alt="{{ $record->nama }}" 
                         class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-gray-200">
                @else
                    <div class="w-32 h-32 rounded-full mx-auto bg-gray-200 flex items-center justify-center border-4 border-gray-200">
                        <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                @endif
                
                <h3 class="mt-4 text-lg font-semibold text-gray-900">{{ $record->nama }}</h3>
                <p class="text-sm text-gray-600">{{ $record->jabatan }}</p>
                
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-2
                    @if($record->kategori === 'kepala_sekolah') bg-green-100 text-green-800
                    @elseif($record->kategori === 'guru') bg-blue-100 text-blue-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                    {{ \App\Models\Staff::getKategoriOptions()[$record->kategori] ?? $record->kategori }}
                </span>
                
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1 ml-1
                    @if($record->status === 'aktif') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst(str_replace('_', ' ', $record->status)) }}
                </span>
            </div>
        </div>
        
        <!-- Informasi Detail -->
        <div class="md:col-span-2">
            <!-- Tugas dan Tanggung Jawab -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-gray-900 mb-2">Tugas dan Tanggung Jawab</h4>
                @if($record->tugas && count($record->tugas) > 0)
                    <ul class="space-y-1">
                        @foreach($record->tugas as $tugas)
                            <li class="flex items-start">
                                <svg class="w-4 h-4 text-green-500 mt-1 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700">{{ is_array($tugas) ? $tugas['tugas'] ?? $tugas : $tugas }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 italic">Belum ada tugas yang ditentukan</p>
                @endif
            </div>
            
            <!-- Deskripsi -->
            @if($record->deskripsi)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Deskripsi</h4>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $record->deskripsi }}</p>
                </div>
            @endif
            
            <!-- Informasi Tambahan -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Tambahan</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="font-medium text-gray-600">Bergabung:</span>
                        <span class="text-gray-900">{{ $record->created_at->format('d M Y') }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Terakhir Diperbarui:</span>
                        <span class="text-gray-900">{{ $record->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>