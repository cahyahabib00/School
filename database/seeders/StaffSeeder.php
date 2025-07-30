<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kepala Sekolah
        Staff::create([
            'nama' => 'Dr. Ahmad Susanto, S.Pd., M.M.',
            'jabatan' => 'Kepala Sekolah',
            'kategori' => 'kepala_sekolah',
            'tugas' => [
                'Memimpin dan mengelola sekolah',
                'Mengembangkan visi dan misi sekolah',
                'Mengkoordinasikan seluruh kegiatan sekolah',
                'Membina hubungan dengan masyarakat'
            ],
            'status' => 'aktif',
            'deskripsi' => 'Kepala sekolah yang berpengalaman lebih dari 15 tahun dalam bidang pendidikan.'
        ]);

        // Guru
        Staff::create([
            'nama' => 'Siti Rahayu, S.Pd.',
            'jabatan' => 'Guru Matematika',
            'kategori' => 'guru',
            'tugas' => [
                'Mengajar mata pelajaran Matematika',
                'Membimbing siswa dalam olimpiade Matematika',
                'Menyusun soal ulangan dan ujian',
                'Melakukan remedial untuk siswa yang tertinggal'
            ],
            'status' => 'aktif',
            'deskripsi' => 'Guru Matematika berprestasi dengan berbagai penghargaan tingkat provinsi.'
        ]);

        Staff::create([
            'nama' => 'Budi Santoso, S.Pd.',
            'jabatan' => 'Guru Bahasa Indonesia',
            'kategori' => 'guru',
            'tugas' => [
                'Mengajar mata pelajaran Bahasa Indonesia',
                'Membina ekstrakurikuler jurnalistik',
                'Mengkoordinasikan acara literasi sekolah',
                'Menjadi wali kelas IX-A'
            ],
            'status' => 'aktif',
            'deskripsi' => 'Guru yang aktif dalam pengembangan literasi dan menulis kreatif.'
        ]);

        // Karyawan
        Staff::create([
            'nama' => 'Rina Marlina, S.E.',
            'jabatan' => 'Staff Tata Usaha',
            'kategori' => 'karyawan',
            'tugas' => [
                'Mengelola administrasi sekolah',
                'Mengurus dokumen siswa dan guru',
                'Menangani keuangan sekolah',
                'Melayani keperluan administrasi orang tua siswa'
            ],
            'status' => 'aktif',
            'deskripsi' => 'Staff administrasi yang handal dalam mengelola dokumen dan keuangan sekolah.'
        ]);

        Staff::create([
            'nama' => 'Joko Supriyanto',
            'jabatan' => 'Petugas Kebersihan',
            'kategori' => 'karyawan',
            'tugas' => [
                'Menjaga kebersihan lingkungan sekolah',
                'Merawat taman dan halaman sekolah',
                'Memelihara fasilitas sekolah',
                'Membantu dalam acara-acara sekolah'
            ],
            'status' => 'aktif',
            'deskripsi' => 'Petugas kebersihan yang dedikasi tinggi untuk menjaga lingkungan sekolah.'
        ]);
    }
}
