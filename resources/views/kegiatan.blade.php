@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Kegiatan Sekolah</h2>
    <div class="space-y-6">
        <!-- Loop kegiatan di sini -->
        <div class="bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Judul Kegiatan</h3>
            <p class="text-gray-600 text-sm mb-2">Tanggal: 2024-01-01</p>
            <p class="text-gray-700 mb-2">Deskripsi singkat kegiatan...</p>
            <img src="/storage/kegiatan/foto.jpg" alt="Foto Kegiatan" class="rounded max-w-full">
        </div>
        <!-- End loop -->
    </div>
</div>
@endsection 