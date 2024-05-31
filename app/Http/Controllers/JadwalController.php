<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Models;
use App\Models\PKL_Models;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_jadwal = Jadwal_Models::with('pkl')->get();
        return view('Data-Jadwal.index', compact('data_jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_pkl = PKL_Models::all();
        return view('Data-Jadwal.add', compact('data_pkl'));
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
            'tanggal_id' => 'required',
            'jam_id' => 'required',
        ]);

        Jadwal_Models::create($validateData);

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
    public function edit(Jadwal_Models $jadwal)
    {
        $data_pkl = PKL_Models::all();
        return view('Data-Jadwal.edit', compact('data_pkl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal_Models $jadwal)
    {
        $validateData = $request->validate([
            'pkl_id' => 'required',
            'tanggal_id' => 'required',
            'jam_id' => 'required',
        ]);

        $jadwal->update($validateData);

        toastr()->success('Update Data Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal_Models $jadwal)
    {
        $jadwal->delete();

        toastr()->success('Deleted Data Successfully');
        return redirect()->back();
    }
}
