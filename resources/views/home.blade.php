@extends('layouts.app')

@section('content')
<section class="bg-white py-16 px-6 md:px-16 lg:flex items-center justify-between">
    <!-- Left Text Section -->
    <div class="max-w-xl mb-10 lg:mb-0">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            Sekolah Luar Biasa yang Peduli dan Inklusif
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            Selamat datang di website resmi SLB kami. Kami berkomitmen memberikan pendidikan terbaik yang ramah, inklusif, dan sesuai kebutuhan anak-anak istimewa.
        </p>
        <div class="flex items-center gap-4">
            <a href="/kegiatan" class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-purple-700 transition">
                Lihat Kegiatan
            </a>
            <a href="/profil-sekolah" class="text-purple-600 font-medium hover:underline">Tentang Sekolah</a>
        </div>
    </div>
</section>
@endsection
