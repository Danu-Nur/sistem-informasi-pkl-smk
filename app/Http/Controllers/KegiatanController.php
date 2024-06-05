<?php

namespace App\Http\Controllers;

use App\Models\Absensi_Models;
use App\Models\Kegiatan_Models;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class KegiatanController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatanAbsensiIds = Kegiatan_Models::pluck('absensi_id')->toArray();
        $data_absensi = Absensi_Models::with(['pkl', 'jadwal'])
            ->whereNotIn('id', $kegiatanAbsensiIds)
            ->get();

        $data_kegiatan = Kegiatan_Models::with(['siswa', 'pkl', 'jadwal', 'absensi'])->get();
        return view('Data-Kegiatan.index', compact('data_absensi', 'data_kegiatan'));
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
            'pkl_id' => 'required',
            'siswa_id' => 'required',
            'jadwal_id' => 'required',
            'absensi_id' => 'required',
            'dokumentasi' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validating that it is an image
            'keterangan' => 'sometimes|string|max:255',  // If 'keterangan' is optional
        ]);

        $validateData['dokumentasi'] = $this->uploadImage($request, 'dokumentasi', 'uploads/dokumentasi');

        Kegiatan_Models::create($validateData);

        toastr()->success('Data saved successfully.');

        return redirect()->route('admin.kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi_Models $kegiatan)
    {
        return view('Data-Kegiatan.add', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
