<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'tugas',
        'jabatan',
        'kategori', // kepala_sekolah, guru, karyawan
        'status',
        'deskripsi'
    ];

    protected $casts = [
        'tugas' => 'array'
    ];
    
    // Accessor untuk format tugas yang lebih baik
    public function getTugasListAttribute()
    {
        return is_array($this->tugas) ? $this->tugas : [];
    }
    
    // Mutator untuk handle tugas dari repeater
    public function setTugasAttribute($value)
    {
        if (is_array($value)) {
            // Extract just the 'tugas' value from repeater format
            $tugasList = array_map(function($item) {
                return is_array($item) && isset($item['tugas']) ? $item['tugas'] : $item;
            }, $value);
            $this->attributes['tugas'] = json_encode(array_filter($tugasList));
        } else {
            $this->attributes['tugas'] = $value;
        }
    }

    // Konstanta untuk kategori staff
    const KATEGORI_KEPALA_SEKOLAH = 'kepala_sekolah';
    const KATEGORI_GURU = 'guru';
    const KATEGORI_KARYAWAN = 'karyawan';

    public static function getKategoriOptions(): array
    {
        return [
            self::KATEGORI_KEPALA_SEKOLAH => 'Kepala Sekolah',
            self::KATEGORI_GURU => 'Guru',
            self::KATEGORI_KARYAWAN => 'Karyawan',
        ];
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeKepalaSekolah($query)
    {
        return $query->where('kategori', self::KATEGORI_KEPALA_SEKOLAH);
    }

    public function scopeGuru($query)
    {
        return $query->where('kategori', self::KATEGORI_GURU);
    }

    public function scopeKaryawan($query)
    {
        return $query->where('kategori', self::KATEGORI_KARYAWAN);
    }
}