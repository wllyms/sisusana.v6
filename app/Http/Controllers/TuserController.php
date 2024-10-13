<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TuserController extends Controller
{
    function tampil()
    {
        $user = User::get();
        if (is_null(Auth::user())) {
            return redirect()->to('/login');
        } else {
            return view('manajemen-user.tampil', compact('user'));
        }
    }

    function tambah()
    {
        return view('manajemen-user.tambah');
    }

    function submit(Request $request)
    {

        Session::flash('ses_user', $request->ses_user);

        $request->validate([
            'username'      => 'required',
            'password'      => 'required',
            'nama_lengkap'  => 'required',
            'email'         => 'required',
            'level'         => 'required'
        ], [
            'username.required'     => 'Username Wajib Diisi!',
            'password.required'     => 'Password Wajib Diisi!',
            'nama_lengkap.required' => 'Nama Lengkap Wajib Diisi!',
            'email.required'        => 'Email Wajib Diisi!',
            'level.required'        => 'Level Wajib Diisi!'
        ]);

        $user = new User();
        $user->username             = $request->username;
        $user->password             = $request->password;
        $user->nama_lengkap         = $request->nama_lengkap;
        $user->email                = $request->email;
        $user->level                = $request->level;
        $user->save();

        return redirect()->route('manajemen-user.tampil')->with('success', 'Data berhasil di tambah.');
    }

    function edit($id)
    {
        $user = User::find($id);
        return view('manajemen-user.edit', compact('user'));
    }

    function exedit(Request $request, $id)
    {
        $user = User::find($id);
        $user->username             = $request->username;
        $user->password             = $request->password;
        $user->nama_lengkap         = $request->nama_lengkap;
        $user->email                = $request->email;
        $user->level                = $request->level;
        $user->update();

        return redirect()->route('manajemen-user.tampil')->with('success', 'Data berhasil di edit.');
    }

    function hapus($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('manajemen-user.tampil');
    }
}
