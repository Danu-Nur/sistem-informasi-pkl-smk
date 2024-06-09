<?php

namespace App\Http\Controllers;

use App\Models\Siswa_Models;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $idUser = Auth::id();
        $user = User::where('id', $idUser)->first();
        return view('profile.profile', compact('user'));
    }

    public function update(Request $request, User $profile)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|string|email|max:225|unique:users,email,' . $profile->id,

        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        }
        $profile->update($validatedData);

        $siswa = Siswa_Models::where('user_id', $profile->id)->first();
        if ($siswa) {
            $siswa->nama_siswa = $validatedData['name'];
            $siswa->email = $validatedData['email'];
            $siswa->save();
        }

        toastr()->success('Update Data Successfully');
        return redirect()->back();
    }
}
