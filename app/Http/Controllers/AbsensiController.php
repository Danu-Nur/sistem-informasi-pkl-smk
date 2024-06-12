<?php

namespace App\Http\Controllers;

use App\Models\Absensi_Models;
use App\Models\Jadwal_Models;
use App\Models\Siswa_Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;

        if (in_array($userRole, ['PEMBIMBING SEKOLAH', 'PEMBIMBING INDUSTRI'])) {
            $column = $this->getRoleColumn($userRole);

            // Ambil semua data absensi yang terkait dengan pengguna yang sedang login
            $data_absensi_dump = Absensi_Models::whereHas('pkl', function ($query) use ($userId, $column) {
                $query->where($column, $userId);
            });

            $data_absensi = $data_absensi_dump->with(['pkl', 'jadwal'])->get();

            // Ambil semua jadwal yang tidak ada di tabel absensi untuk pengguna yang sedang login
            $absensiJadwalIds = $data_absensi_dump->pluck('jadwal_id')->toArray();

            $data_jadwal = Jadwal_Models::with('pkl.siswa')
                ->whereHas('pkl', function ($query) use ($userId, $column) {
                    $query->where($column, $userId);
                })
                ->whereNotIn('id', $absensiJadwalIds)
                ->get();
        } elseif ($userRole == 'SISWA') {
            $data_absensi_dump = Absensi_Models::whereHas('pkl', function ($query) use ($userId) {
                $query->whereHas('siswa', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            });

            $data_absensi = $data_absensi_dump->with(['pkl', 'jadwal'])->get();

            // Ambil semua jadwal yang tidak ada di tabel absensi untuk pengguna yang sedang login
            $absensiJadwalIds = $data_absensi_dump->pluck('jadwal_id')->toArray();

            $data_jadwal = Jadwal_Models::with('pkl.siswa')
                ->whereHas('pkl', function ($query) use ($userId) {
                    $query->whereHas('siswa', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    });
                })
                ->whereNotIn('id', $absensiJadwalIds)
                ->get();
        } else {
            // Default case for other roles
            $absensiJadwalIds = Absensi_Models::pluck('jadwal_id')->toArray();

            // Get all Jadwal that do not have corresponding Absensi records
            $data_jadwal = Jadwal_Models::with('pkl.siswa')
                ->whereNotIn('id', $absensiJadwalIds)
                ->get();
            $data_absensi = Absensi_Models::with(['pkl', 'jadwal'])->get();
        }

        return view('Data-Absensi.index', compact('data_jadwal', 'data_absensi', 'userRole'));
    }

    private function getRoleColumn($role)
    {
        $roleColumnMap = [
            'PEMBIMBING SEKOLAH' => 'psekolah_id',
            'PEMBIMBING INDUSTRI' => 'pindustri_id',
        ];

        return $roleColumnMap[$role] ?? null;
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
        $userRole = Auth::user()->role;
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
        $jadwal = $tanggal . ' ' . $jam;

        $statusAbsen = 'Tepat Waktu';
        $tanggalabsen = date('Y-m-d');
        $waktuabsen =  date('H:i:s');
        $absen_sekarang = $tanggalabsen . ' ' . $waktuabsen;
        if ($absen_sekarang > $jadwal) {
            $statusAbsen = 'Terlambat';
        }
        // if ($tanggalabsen > $tanggal && $waktuabsen > $jam) {
        //     $statusAbsen = 'Terlambat';
        // }

        // if ($tanggalabsen < $tanggal && $waktuabsen > $jam) {
        //     $statusAbsen = 'Terlambat';
        // }

        // if ($tanggalabsen > $tanggal && $waktuabsen < $jam) {
        //     $statusAbsen = 'Terlambat';
        // }

        $validateData['tanggal_absen'] = $tanggalabsen;
        $validateData['waktu_absen'] = $waktuabsen;
        $validateData['status_absen'] = $statusAbsen;

        Absensi_Models::create($validateData);

        toastr()->success('Absen Successfully');

        if ($userRole === 'ADMIN') {
            return redirect()->route('admin.absensi.index');
        } else {
            return redirect()->route('siswa.absensi.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal_Models $absensi)
    {
        $userRole = Auth::user()->role;
        $absensi->load('pkl.siswa');
        return view('Data-Absensi.add', compact('absensi', 'userRole'));
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
