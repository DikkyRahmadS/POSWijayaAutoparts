<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('login.login');
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toast('Login Berhasil!', 'success', 'top-right');
            return redirect()->intended('dashboard');
        }

        toast('Email atau Password Salah!', 'error', 'top-right');
        return back();
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/masuk');
    }
}
