<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/profil', 'profil')->name('profil');
Route::view('/kegiatan', 'kegiatan')->name('kegiatan');
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/kontak', 'kontak')->name('kontak');
