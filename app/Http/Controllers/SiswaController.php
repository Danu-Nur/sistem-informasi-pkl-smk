<?php

namespace App\Http\Controllers;

use App\Models\Siswa_Models;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $idUserSiswa = Siswa_Models::pluck('user_id')->toArray();
        $data_user = User::where('role', 'SISWA')->whereNotIn('id', $idUserSiswa)->get();
        return view('Data-Siswa.add', compact('data_user', 'idUserSiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $roleAdmin = Auth::user()->role;

        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama_siswa' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255|unique:tb_siswa,nomor_induk',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_siswa,email',
            'telp' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            // 'username' => 'required|string|max:255|unique:tb_siswa,username',
            // 'password' => 'required',
        ]);
        // Hash the password before saving


        // Create the Siswa_Models instance with the validated data
        Siswa_Models::create($validatedData);

        $user = User::findOrFail($validatedData['user_id']);
        $user->name = $validatedData['nama_siswa'];
        $user->email = $validatedData['email'];
        // if ($request->filled('password')) {
        //     $validatedData['password'] = bcrypt($request->password);
        // } else {
        //     // Remove the password field if it's not being updated
        //     unset($validatedData['password']);
        // }
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

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
    public function edit(Siswa_Models $siswa)
    {
        $data_user = User::where('role', 'SISWA')->get();
        return view('Data-Siswa.edit', compact('siswa', 'data_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa_Models $siswa)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama_siswa' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255|unique:tb_siswa,nomor_induk,' . $siswa->id,
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_siswa,email,' . $siswa->id,
            'telp' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',

        ]);

        // Update the Siswa_Models instance with the validated data
        $siswa->update($validatedData);

        $user = User::findOrFail($validatedData['user_id']);
        $user->name = $validatedData['nama_siswa'];
        $user->email = $validatedData['email'];
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        toastr()->success('Update Data Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa_Models $siswa)
    {
        $siswa->delete();
        toastr()->success('Deleted Data Successfully');
        return redirect()->back();
    }
}
