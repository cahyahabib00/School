@extends('layouts.app')
@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Galeri Sekolah</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Loop galeri di sini -->
        <div class="bg-white rounded shadow p-2">
            <img src="/storage/galeri/foto.jpg" alt="Galeri" class="rounded max-w-full mb-2">
            <div class="text-sm text-gray-700">Judul Foto</div>
        </div>
        <!-- End loop -->
    </div>
</div>
@endsection 