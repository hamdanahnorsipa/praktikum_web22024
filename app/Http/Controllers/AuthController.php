<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //fungsi login login
    public function login(Request $request)
    {
        $credentials = $request->only('username','password');
        //cek user pada database
        if(Auth::attempt($credentials))
        {
            //simpan data user apabila ditemukan
            $request->session()->regenerate();
            return redirect()->route('home');
        }else {
            dd('user tidak ditemukan');
        }
    }

    //fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginView');
    }
}
