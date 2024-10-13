<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function tampilLogin()
    {
        return view('login-admin');
    }

    function menu()
    {

        if (is_null(Auth::user())) {
            return redirect('/login');
        } else {
            return redirect('/beranda');
        }
    }

    function submitLogin(Request $request)
    {
        $data = $request->only('username', 'password');

        if (Auth::attempt($data)) {
            return redirect('admin');
            exit();
        } else {
            return redirect()->back()->with('Gagal', 'Usernama atau Password Anda Salah!!');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
