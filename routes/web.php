<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::view('/', 'home')->name('home');
Route::view('/profil', 'profil')->name('profil');
Route::view('/kegiatan', 'kegiatan')->name('kegiatan');
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/kontak', 'kontak')->name('kontak');

// Staff Routes
Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staff/{id}', [StaffController::class, 'show'])->name('staff.show');
