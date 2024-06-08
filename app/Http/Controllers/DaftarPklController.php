<?php

namespace App\Http\Controllers;

use App\Models\Siswa_Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPklController extends Controller
{
    public function index()
    {
        $idusersiswa = Auth::id();
        $nameusersiswa = Auth::user()->name;
        $emailusersiswa = Auth::user()->email;
        $cekdaftarpkl = Siswa_Models::where('user_id', $idusersiswa)->get();
        return view('Daftar-PKL.index', compact('idusersiswa', 'nameusersiswa', 'emailusersiswa', 'cekdaftarpkl'));
    }
}
