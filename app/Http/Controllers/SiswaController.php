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
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Remove the password field if it's not being updated
            unset($validatedData['password']);
        }

        // Create the Siswa_Models instance with the validated data
        Siswa_Models::create($validatedData);

        $user = User::findOrFail($validatedData['user_id']);
        $user->name = $validatedData['nama_siswa'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
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
        return view('Data-Siswa.edit', compact('siswa'));
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
            'nama_siswa' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255|unique:tb_siswa,nomor_induk,' . $siswa->id,
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_siswa,email,' . $siswa->id,
            'telp' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'username' => 'required|string|max:255|unique:tb_siswa,username,' . $siswa->id,

        ]);
        // dd($request->filled('password'));
        // Hash the password if it's being updated
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Remove the password field if it's not being updated
            unset($validatedData['password']);
        }

        // Update the Siswa_Models instance with the validated data
        $siswa->update($validatedData);

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
