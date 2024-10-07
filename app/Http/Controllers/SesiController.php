<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login-admin');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi!!',
            'password.required' => 'Password wajib diisi!!'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('admin');
            exit();
        } else {
            return redirect()->back()->with('Gagal', 'Usernama atau Password Anda Salah!!')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return view('login-admin');
    }
}