<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    // function tampil()
    // {

    //     $pertanyaan = Pertanyaan::get();

    //     return view('survei');
    // }

    function tampilpertanyaan()
    {
        $pertanyaan = Pertanyaan::get();

        return view('survei', compact('pertanyaan'));

        
    }

    function submit(Request $request)
    {
        $survey = new Survey();
        $survey->usia = $request->usia;
        $survey->jpasien = $request->jpasien;
        $survey->jkelamin = $request->jkelamin;
        $survey->pendidikan = $request->pendidikan;
        $survey->pekerjaan = $request->pekerjaan;
        $survey->jlayanan = $request->jlayanan;
        $survey->tanggal = $request->tanggal;
        $survey->kritik = $request->kritik;
        $survey->save();

        return redirect()->route('survey.tampil')->with('success', 'Survey berhasil disimpan.');
    }
}
