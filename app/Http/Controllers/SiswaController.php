<?php

namespace App\Http\Controllers;

use App\Models\Siswa_Models;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = Siswa_Models::all();
        return view('Data-Siswa.index', compact('data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Siswa.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255|unique:tb_siswa,nomor_induk',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_siswa,email',
            'telp' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'username' => 'required|string|max:255|unique:tb_siswa,username',
            'password' => 'required',
        ]);

        // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the Siswa_Models instance with the validated data
        Siswa_Models::create($validatedData);

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
