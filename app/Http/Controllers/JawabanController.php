<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Survey;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    function tampiljawaban()
    {
        $jawaban = Jawaban::get();
        $survey = Survey::get();

        $jumlahA = Jawaban::where('jawaban', 'A')->count();
        $jumlahB = Jawaban::where('jawaban', 'B')->count();
        $jumlahC = Jawaban::where('jawaban', 'C')->count();
        $jumlahD = Jawaban::where('jawaban', 'D')->count();
        $totRespon = Survey::count();

        return view('beranda', compact('jawaban','jumlahA', 'jumlahB', 'jumlahC', 'jumlahD', 'totRespon'));
    }
    

    function tampilgrafikkeseluruhan()
    {
        $jawaban = Jawaban::get();
        $survey = Survey::get();

        $jumlahA = Jawaban::where('jawaban', 'A')->count();
        $jumlahB = Jawaban::where('jawaban', 'B')->count();
        $jumlahC = Jawaban::where('jawaban', 'C')->count();
        $jumlahD = Jawaban::where('jawaban', 'D')->count();
        $totRespon = Survey::count();

        $totalJawaban = $jumlahA + $jumlahB + $jumlahC + $jumlahD;

        $persenA = $totalJawaban > 0 ? ($jumlahA / $totalJawaban) * 100 : 0;
        $persenB = $totalJawaban > 0 ? ($jumlahB / $totalJawaban) * 100 : 0;
        $persenC = $totalJawaban > 0 ? ($jumlahC / $totalJawaban) * 100 : 0;
        $persenD = $totalJawaban > 0 ? ($jumlahD / $totalJawaban) * 100 : 0;

        $persenA = round($persenA);
        $persenB = round($persenB);
        $persenC = round($persenC);
        $persenD = round($persenD);

        $totalPersen = $persenA + $persenB + $persenC + $persenD;

        if ($totalPersen !== 100) {
            $difference = 100 - $totalPersen;

            if ($persenA > 0) {
                $persenA += $difference;
            } else if ($persenB > 0) {
                $persenB += $difference;
            } else if ($persenC > 0) {
                $persenC += $difference;
            } else if ($persenD > 0) {
                $persenD += $difference;
            }
        }

        return view('hasil.grafik-keseluruhan', compact('jawaban','jumlahA', 'jumlahB', 'jumlahC', 'jumlahD', 'totRespon', 'persenA', 'persenB', 'persenC', 'persenD'));
    }

    function tampilpersenpertanyaan()
    {
        $jawaban = Jawaban::get();
        $survey = Survey::get();

        $jumlahA = Jawaban::where('jawaban', 'A')->count();
        $jumlahB = Jawaban::where('jawaban', 'B')->count();
        $jumlahC = Jawaban::where('jawaban', 'C')->count();
        $jumlahD = Jawaban::where('jawaban', 'D')->count();
        $totRespon = Survey::count();

        return view('hasil.persentase-pertanyaan', compact('jawaban','jumlahA', 'jumlahB', 'jumlahC', 'jumlahD', 'totRespon'));
    }

    function tampillaporan()
    {
        $jawaban = Jawaban::get();
        $survey = Survey::get();

        $jumlahA = Jawaban::where('jawaban', 'A')->count();
        $jumlahB = Jawaban::where('jawaban', 'B')->count();
        $jumlahC = Jawaban::where('jawaban', 'C')->count();
        $jumlahD = Jawaban::where('jawaban', 'D')->count();
        $totRespon = Survey::count();

        return view('hasil.laporan', compact('jawaban','jumlahA', 'jumlahB', 'jumlahC', 'jumlahD', 'totRespon'));
    }
}