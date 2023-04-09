<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('login.login');
    }
    public function postmasuk(Request $request)
    {
        $jumlah = $_POST["box1"] . $_POST["box2"] . $_POST["box3"] . $_POST["box4"] . $_POST["box5"] . $_POST["box6"];

        // $data = DB::table('penggunas')->where('pin', '=', $jumlah);
        // if ($data == TRUE) {
        //     return redirect('dashboard');
        // }
        // dd($jumlah);
        if (Auth::Attempt(['pin' => $jumlah])) {
            return redirect('dashboard');
        }
        echo $jumlah;
        // if (Auth::attempt($request->only('pin'))) {
        //     return redirect('dashboard');
        // }
        // dd($jumlah);
    }
}
