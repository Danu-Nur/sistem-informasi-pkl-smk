<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan_Models;
use App\Models\Penilaian_Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::id();
        $userRole = Auth::user()->role;
        if ($userRole == 'ADMIN') {
            $nilaiKegiatanIds = Penilaian_Models::pluck('kegiatan_id')->toArray();
            $data_kegiatan = Kegiatan_Models::with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();
            $data_nilai = Penilaian_Models::with(['siswa', 'kegiatan.jadwal.pkl'])->get();
        } elseif ($userRole == 'PEMBIMBING SEKOLAH'){
            $nilaiKegiatanIds = Penilaian_Models::whereHas('kegiatan', function ($query) use ($idUser) {
                $query->whereHas('pkl', function ($query) use ($idUser) {
                    $query->where('psekolah_id', $idUser);
                });
            })->pluck('kegiatan_id')->toArray();
            $data_kegiatan = Kegiatan_Models::whereHas('pkl', function ($query) use ($idUser) {
                $query->where('psekolah_id', $idUser);
            })->with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();
            $data_nilai = Penilaian_Models::whereHas('kegiatan', function ($query) use ($idUser) {
                $query->whereHas('pkl', function ($query) use ($idUser) {
                    $query->where('psekolah_id', $idUser);
                });
            })->with(['siswa', 'kegiatan.jadwal.pkl'])->get();
        }
        else {
            $nilaiKegiatanIds = Penilaian_Models::whereHas('kegiatan', function ($query) use ($idUser) {
                $query->whereHas('pkl', function ($query) use ($idUser) {
                    $query->where('pindustri_id', $idUser);
                });
            })->pluck('kegiatan_id')->toArray();
            $data_kegiatan = Kegiatan_Models::whereHas('pkl', function ($query) use ($idUser) {
                $query->where('pindustri_id', $idUser);
            })->with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();
            $data_nilai = Penilaian_Models::whereHas('kegiatan', function ($query) use ($idUser) {
                $query->whereHas('pkl', function ($query) use ($idUser) {
                    $query->where('pindustri_id', $idUser);
                });
            })->with(['siswa', 'kegiatan.jadwal.pkl'])->get();
        }

        return view('Data-Nilai.index', compact('data_kegiatan', 'data_nilai', 'idUser', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roleUser = Auth::user()->role;
        $validateData = $request->validate([
            'siswa_id' => 'required',
            'kegiatan_id' => 'required',
            'nilai_pkl' => 'required',
            'nilai_sikap' => 'required',
            'keterangan' => 'required',
        ]);

        // dd($validateData);

        Penilaian_Models::create($validateData);
        toastr()->success('Save Nilai Successfully!');
        if ($roleUser == 'ADMIN') {
            return redirect()->route('admin.nilai.index');
        } else {
            return redirect()->route('pindustri.nilai.index');
        }
    }

    /**
     * D,
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan_Models $nilai)
    {
        $roleUser = Auth::user()->role;
        return view('Data-Nilai.add', compact('nilai', 'roleUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian_Models $nilai)
    {
        $roleUser = Auth::user()->role;
        $nilai->load(['siswa', 'kegiatan.jadwal.pkl'])->get();
        return view('Data-Nilai.edit', compact('nilai', 'roleUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian_Models $nilai)
    {
        $roleUser = Auth::user()->role;
        $validateData = $request->validate([
            'siswa_id' => 'required',
            'kegiatan_id' => 'required',
            'nilai_pkl' => 'required',
            'nilai_sikap' => 'required',
            'keterangan' => 'required',
        ]);

        // dd($validateData);

        $nilai->update($validateData);

        toastr()->success('Update Nilai Successfully!');
        if ($roleUser == 'ADMIN') {
            return redirect()->route('admin.nilai.index');
        } else {
            return redirect()->route('pindustri.nilai.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian_Models $nilai)
    {
        $nilai->delete();
        toastr()->success('Deleted Data Successfully');
        return redirect()->back();
    }
}
