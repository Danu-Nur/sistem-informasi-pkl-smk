<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan_Models;
use App\Models\Penilaian_Models;
use App\Models\PKL_Models;
use App\Models\Siswa_Models;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::id();
        $roleUser = Auth::user()->role;
        if ($roleUser == 'ADMIN') {
            // $nilaiKegiatanIds = Penilaian_Models::pluck('kegiatan_id')->toArray();
            // $data_kegiatan = Kegiatan_Models::with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();
            // $data_nilai = Penilaian_Models::with(['siswa', 'kegiatan.jadwal.pkl', 'kegiatan.absensi'])->get();


            $dataSiswaPkl = Siswa_Models::whereHas('pkl')->get();
            return view('Data-Laporan.index', compact('dataSiswaPkl', 'roleUser'));
        } elseif ($roleUser == "PEMBIMBING INDUSTRI") {
            $dataSiswaPkl = Siswa_Models::whereHas('pkl', function ($query) use ($idUser) {
                $query->where('pindustri_id', $idUser);
            })->get();
            return view('Data-Laporan.index', compact('dataSiswaPkl', 'roleUser'));
        } elseif ($roleUser == "PEMBIMBING SEKOLAH") {
            $dataSiswaPkl = Siswa_Models::whereHas('pkl', function ($query) use ($idUser) {
                $query->where('psekolah_id', $idUser);
            })->get();
            return view('Data-Laporan.index', compact('dataSiswaPkl', 'roleUser'));
        } else {
            $nilaiKegiatanIds = Penilaian_Models::whereHas('siswa', function ($query) use ($idUser) {
                $query->where('user_id', $idUser);
            })->pluck('kegiatan_id')->toArray();

            $data_kegiatan = Kegiatan_Models::whereHas('siswa', function ($query) use ($idUser) {
                $query->where('user_id', $idUser);
            })->with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();

            $data_nilai = Penilaian_Models::whereHas('siswa', function ($query) use ($idUser) {
                $query->where('user_id', $idUser);
            })->with(['siswa', 'kegiatan.jadwal.pkl', 'kegiatan.absensi'])->get();
            return view('Data-laporan.siswa', compact('data_kegiatan', 'data_nilai', 'idUser', 'roleUser'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idUser = Auth::id();
        $data_siswa = PKL_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->with(['siswa', 'pembimbingSekolah', 'pembimbingIndustri'])->first();
        $data_nilai = Penilaian_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->with(['siswa', 'kegiatan.jadwal.pkl', 'kegiatan.absensi'])->get();
        // Convert the collection to array
        $data_siswa->toArray();
        $data_nilai->toArray();

        // Pass the data array to the view
        $pdf = PDF::loadView('Data-Laporan.print', compact('data_nilai', 'data_siswa'));
        return $pdf->download('laporan.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $laporan)
    {
        $idUser = $laporan->id;
        $roleUser = Auth::user()->role;
        $nilaiKegiatanIds = Penilaian_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->pluck('kegiatan_id')->toArray();

        $data_kegiatan = Kegiatan_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();

        $data_nilai = Penilaian_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->with(['siswa', 'kegiatan.jadwal.pkl', 'kegiatan.absensi'])->get();
        return view('Data-laporan.siswa', compact('data_kegiatan', 'data_nilai', 'idUser', 'roleUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $laporan)
    {

        $idUser = $laporan->id;
        $data_siswa = PKL_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->with(['siswa', 'pembimbingSekolah', 'pembimbingIndustri'])->first();
        $data_nilai = Penilaian_Models::whereHas('siswa', function ($query) use ($idUser) {
            $query->where('user_id', $idUser);
        })->with(['siswa', 'kegiatan.jadwal.pkl', 'kegiatan.absensi'])->get();

        // Convert the collection to array
        $data_siswa->toArray();
        $data_nilai->toArray();

        // Pass the data array to the view
        $pdf = PDF::loadView('Data-Laporan.print', compact('data_nilai', 'data_siswa'));
        return $pdf->download('laporan.pdf');

        // return view('Data-Laporan.print', compact('data_nilai', 'data_siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
