<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->role === 'ADMIN') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'PEMBIMBING SEKOLAH') {
                return redirect()->intended('/psekolah/absensi');
            } elseif ($user->role === 'PEMBIMBING INDUSTRI') {
                return redirect()->intended('/pindustri/absensi');
            } else {
                return redirect()->intended('/siswa/daftar');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
