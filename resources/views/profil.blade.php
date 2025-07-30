@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold mb-6 text-blue-700">Profil Sekolah SLB Harapan Bangsa</h2>

    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Visi</h3>
        <p class="text-gray-700 leading-relaxed">
            Menjadi sekolah luar biasa yang unggul dalam memberikan layanan pendidikan yang inklusif, berkarakter, dan berbasis keterampilan hidup untuk peserta didik berkebutuhan khusus.
        </p>
    </div>

    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Misi</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Menyelenggarakan pendidikan yang adaptif dan ramah anak berkebutuhan khusus.</li>
            <li>Meningkatkan kemampuan akademik dan keterampilan fungsional peserta didik.</li>
            <li>Menumbuhkan sikap mandiri, percaya diri, dan bertanggung jawab.</li>
            <li>Melibatkan orang tua dan masyarakat dalam proses pendidikan inklusif.</li>
        </ul>
    </div>

    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Sejarah Singkat</h3>
        <p class="text-gray-700 leading-relaxed">
            SLB Harapan Bangsa didirikan pada tahun 2005 sebagai bentuk kepedulian terhadap anak-anak berkebutuhan khusus di wilayah Lampung Selatan. Seiring berjalannya waktu, sekolah ini berkembang menjadi lembaga pendidikan yang memberikan layanan untuk berbagai kategori disabilitas, termasuk tunarungu, tunanetra, tunagrahita, dan autisme ringan. Dengan tenaga pendidik yang profesional dan berdedikasi, SLB Harapan Bangsa terus berupaya meningkatkan kualitas layanan pendidikannya.
        </p>
    </div>

    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Struktur Organisasi</h3>
        <img src="{{ asset('storage/struktur_organisasi/struktur.jpg') }}" alt="Struktur Organisasi" class="rounded shadow max-w-full border">
        <p class="text-sm text-gray-500 mt-2">* Gambar struktur organisasi ini merupakan ilustrasi dan dapat berubah sewaktu-waktu.</p>
    </div>

    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Fasilitas</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Ruang kelas khusus (ramah disabilitas)</li>
            <li>Ruang terapi wicara dan okupasi</li>
            <li>Laboratorium komputer adaptif</li>
            <li>Area bermain dan olahraga yang aman</li>
            <li>Perpustakaan dengan buku-buku braille dan audio book</li>
            <li>Asrama untuk siswa luar daerah (opsional)</li>
        </ul>
    </div>
</div>
@endsection
