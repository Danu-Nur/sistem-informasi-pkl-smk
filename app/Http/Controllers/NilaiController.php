<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan_Models;
use App\Models\Penilaian_Models;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaiKegiatanIds = Penilaian_Models::pluck('kegiatan_id')->toArray();
        $data_kegiatan = Kegiatan_Models::with(['siswa', 'pkl', 'jadwal', 'absensi'])->whereNotIn('id', $nilaiKegiatanIds)->get();
        $data_nilai = Penilaian_Models::with(['siswa', 'kegiatan.jadwal.pkl'])->get();
        return view('Data-Nilai.index', compact('data_kegiatan', 'data_nilai'));
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
        return redirect()->route('admin.nilai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan_Models $nilai)
    {
        return view('Data-Nilai.add', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian_Models $nilai)
    {
        $nilai->load(['siswa', 'kegiatan.jadwal.pkl'])->get();
        return view('Data-Nilai.edit', compact('nilai'));
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
        return redirect()->route('admin.nilai.index');
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
