<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GrupController extends Controller
{
    function tampil()
    {
        $grup = Grup::get();
        if (is_null(Auth::user())) {
            return redirect('/login');
        } else {
            return view('manajemen-grup.tampil', compact('grup'));
        }
    }

    function tambah()
    {
        return view('manajemen-grup.tambah');
    }

    function submit(Request $request)
    {

        Session::flash('nama_grup', $request->nama_grup);

        $request->validate([
            'nama_grup' => 'required'
        ], [
            'nama_grup.required' => 'Nama Grup Wajib Diisi!'
        ]);

        $grup = new Grup();
        $grup->nama_grup = $request->nama_grup;
        $grup->save();

        return redirect()->route('manajemen-grup.tampil')->with('success', 'Data berhasil disimpan.');
    }

    function edit($id)
    {
        $grup = Grup::find($id);
        return view('manajemen-grup.edit', compact('grup'));
    }

    function exedit(Request $request, $id)
    {
        $grup = Grup::find($id);
        $grup->nama_grup = $request->nama_grup;
        $grup->update();

        return redirect()->route('manajemen-grup.tampil')->with('success', 'Data berhasil di edit.');
    }

    function hapus($id)
    {
        $grup = Grup::find($id);
        $grup->delete();

        return redirect()->route('manajemen-grup.tampil');
    }
}
