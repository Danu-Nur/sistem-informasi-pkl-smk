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
        // $data_jadwal = Jadwal_Models::with('pkl.siswa')->whereDoesntHave('absensi')
        //     ->get();;
        $absensiJadwalIds = Absensi_Models::pluck('jadwal_id')->toArray();

        // Get all Jadwal that do not have corresponding Absensi records
        $data_jadwal = Jadwal_Models::with('pkl.siswa')
            ->whereNotIn('id', $absensiJadwalIds)
            ->get();
        $data_absensi = Absensi_Models::with(['pkl', 'jadwal'])->get();
        return view('Data-Absensi.index', compact('data_jadwal', 'data_absensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'pkl_id' => 'required',
            'jadwal_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'lokasi_absen' => 'required',
            'link_absen' => 'required',
        ]);

        $tanggal = $request->tanggal;
        $jam = $request->jam;

        $statusAbsen = 'Tepat Waktu';
        $tanggalabsen = date('Y-m-d');
        $waktuabsen =  date('H:i:s');

        if ($tanggalabsen > $tanggal && $waktuabsen > $jam) {
            $statusAbsen = 'Terlambat';
        }

        if ($tanggalabsen < $tanggal && $waktuabsen > $jam) {
            $statusAbsen = 'Terlambat';
        }

        $validateData['tanggal_absen'] = $tanggalabsen;
        $validateData['waktu_absen'] = $waktuabsen;
        $validateData['status_absen'] = $statusAbsen;

        Absensi_Models::create($validateData);

        toastr()->success('Absen Successfully');
        return redirect()->route('admin.absensi.index');
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
    public function destroy(Absensi_Models $absensi)
    {
        $absensi->delete();
        toastr()->success('Delete data Successfully');
        return redirect()->back();
    }
}
