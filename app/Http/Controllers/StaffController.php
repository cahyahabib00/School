<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $kepalaSekolah = Staff::kepalaSekolah()->where('status', 'aktif')->get();
        $guru = Staff::guru()->where('status', 'aktif')->get();
        $karyawan = Staff::karyawan()->where('status', 'aktif')->get();
        
        return view('staff.index', compact('kepalaSekolah', 'guru', 'karyawan'));
    }
    
    public function show($id)
    {
        $staff = Staff::where('id', $id)->where('status', 'aktif')->firstOrFail();
        return view('staff.show', compact('staff'));
    }
}
