<?php

namespace App\Http\Controllers;

use App\Models\Absensi_Models;
use App\Models\Kegiatan_Models;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;

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
        $idUser = Auth::id();
        $roleUser = Auth::user()->role;

        $kegiatanAbsensiIds = Kegiatan_Models::pluck('absensi_id')->toArray();
        $queryKegiatanModel =  Kegiatan_Models::whereHas('pkl', function ($query) use ($idUser) {
            $query->whereHas('siswa', function ($query) use ($idUser) {
                $query->where('user_id', $idUser);
            });
        });

        if ($roleUser == 'ADMIN') {
            $data_kegiatan = Kegiatan_Models::with(['siswa', 'pkl', 'jadwal', 'absensi'])->get();
        } else {

            $data_kegiatan = $queryKegiatanModel->with(['siswa', 'pkl', 'jadwal', 'absensi'])->get();
        }

        $data_absensi = Absensi_Models::whereHas('pkl', function ($query) use ($idUser) {
            $query->whereHas('siswa', function ($query) use ($idUser) {
                $query->where('user_id', $idUser);
            });
        })->with(['pkl', 'jadwal'])
            ->whereNotIn('id', $kegiatanAbsensiIds)
            ->get();

        return view('Data-Kegiatan.index', compact('roleUser', 'data_absensi', 'data_kegiatan'));
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
            'pkl_id' => 'required',
            'siswa_id' => 'required',
            'jadwal_id' => 'required',
            'absensi_id' => 'required',
            'dokumentasi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validating that it is an image
            'keterangan' => 'required|string',  // If 'keterangan' is optional
        ]);

        $validateData['dokumentasi'] = $this->uploadImage($request, 'dokumentasi', 'uploads/dokumentasi');

        Kegiatan_Models::create($validateData);

        toastr()->success('Data saved successfully.');
        if ($roleUser === 'ADMIN') {
            return redirect()->route('admin.kegiatan.index');
        } else {
            return redirect()->route('siswa.kegiatan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi_Models $kegiatan)
    {
        $idUser = Auth::id();
        $roleUser = Auth::user()->role;
        return view('Data-Kegiatan.add', compact('kegiatan', 'roleUser'));
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
