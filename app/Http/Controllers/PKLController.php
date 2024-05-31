<?php

namespace App\Http\Controllers;

use App\Models\PKL_Models;
use App\Models\Siswa_Models;
use App\Models\User;
use Illuminate\Http\Request;

class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pkl = PKL_Models::with(['pembimbingSekolah', 'pembimbingIndustri', 'siswa'])->get();
        return view('Data-PKL.index', compact('data_pkl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_siswa = Siswa_Models::all();
        $data_psekolah = User::where('role', 'PEMBIMBING SEKOLAH')->get();
        $data_pindustri = User::where('role', 'PEMBIMBING INDUSTRI')->get();
        return view(
            'Data-PKL.add',
            compact(
                'data_siswa',
                'data_psekolah',
                'data_pindustri'
            )
        );
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
            'nama_pkl' => 'required|string|max:255',
            'alamat_pkl' => 'required',
            'lokasi_pkl' => 'required|max:255',
            'siswa_id' => 'required',
            'psekolah_id' => 'required',
            'pindustri_id' => 'required',
        ]);

        PKL_Models::create($validateData);

        toastr()->success('Create Data Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PKL_Models $pkl)
    {
        $data_siswa = Siswa_Models::all();
        $data_psekolah = User::where('role', 'PEMBIMBING SEKOLAH')->get();
        $data_pindustri = User::where('role', 'PEMBIMBING INDUSTRI')->get();
        return view('Data-PKL.edit', compact(
            'pkl',
            'data_siswa',
            'data_psekolah',
            'data_pindustri'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PKL_Models $pkl)
    {
        $validateData = $request->validate([
            'nama_pkl' => 'required|string|max:255',
            'alamat_pkl' => 'required',
            'lokasi_pkl' => 'required|max:255',
            'siswa_id' => 'required',
            'psekolah_id' => 'required',
            'pindustri_id' => 'required',
        ]);

        $pkl->update($validateData);

        toastr()->success('Update Data Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PKL_Models $pkl)
    {
        $pkl->delete();

        toastr()->success('Deleted Data Successfully');
        return redirect()->back();
    }
}
