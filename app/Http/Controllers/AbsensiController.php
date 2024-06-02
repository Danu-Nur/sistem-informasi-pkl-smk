<?php

namespace App\Http\Controllers;

use App\Models\Absensi_Models;
use App\Models\Jadwal_Models;
use App\Models\Siswa_Models;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_jadwal = Jadwal_Models::with('pkl.siswa')->get();
        $data_absensi = Absensi_Models::with(['pkl', 'jadwal'])->get();
        return view('Data-Absensi.index', compact('data_jadwal','data_absensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data_siswa = Siswa_Models::all();
        // $data_pkl = Siswa_Models::all();
        // $data_jadwal = Siswa_Models::all();

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
    public function show(Jadwal_Models $absensi)
    {
        $absensi->load('pkl.siswa');
        return view('Data-Absensi.add', compact('absensi'));
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
