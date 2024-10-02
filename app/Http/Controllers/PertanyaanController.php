<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PertanyaanController extends Controller
{
    function tampil()
    {
        $pertanyaan = Pertanyaan::get();

        return view('manajemen-pertanyaan.tampil', compact('pertanyaan'));
    }

    function tambah()
    {
        return view('manajemen-pertanyaan.tambah');
    }

    function submit(Request $request)
    {
        $pertanyaan = new Pertanyaan();
        $pertanyaan->grup_id = $request->select_grup;
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();

        return redirect()->route('manajemen-pertanyaan.tampil')->with('success', 'Data berhasil disimpan.');
    }

    public function select_grup()
    {
        $grup = Grup::all();
        return view('manajemen-pertanyaan.tambah', compact('grup'));
    }

    function edit($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $grup = Grup::all(); // Ambil semua grup

        return view('manajemen-pertanyaan.edit', compact('pertanyaan', 'grup'));
    }

    function exedit(Request $request, $id)
    {
        $pertanyaan = Pertanyaan::find($id);

        $pertanyaan->grup_id = $request->select_grup;
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->update();

        return redirect()->route('manajemen-pertanyaan.tampil')->with('success', 'Data berhasil di edit.');
    }

    function hapus($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();

        return redirect()->route('manajemen-pertanyaan.tampil');
    }
}
