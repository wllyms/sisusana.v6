<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Grup;
use App\Models\Survey;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    function tampilpertanyaan()
    {
        $pertanyaan = Pertanyaan::get();
        $grup = Grup::get();

        return view('survei', compact('pertanyaan', 'grup'));
    }

    function submit(Request $request)
    {
        // Validasi input
        $request->validate([
            'usia' => 'required|string',
            'jpasien' => 'required|string',
            'jkelamin' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'jlayanan' => 'required|string',
            'tanggal' => 'required|date',
            'kritik' => 'nullable|string',
            'jawaban' => 'required|array', // Validasi bahwa jawaban harus berupa array
            'jawaban.*' => 'required|string', // Validasi jawaban individual
        ]);

        // Simpan data survei
        $survey = new Survey();
        $survey->usia = $request->usia;
        $survey->jpasien = $request->jpasien;
        $survey->jkelamin = $request->jkelamin;
        $survey->pendidikan = $request->pendidikan;
        $survey->pekerjaan = $request->pekerjaan;
        $survey->jlayanan = $request->jlayanan;
        $survey->tanggal = $request->tanggal;

        // Set tanggal ke waktu saat ini
        // $survey->tanggal = Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d');

        $survey->kritik = $request->kritik;
        $survey->save();

        // Ambil ID survei yang baru disimpan
        $surveyId = $survey->id;

        // Cek apakah jawaban ada sebelum melakukan iterasi
        if ($request->filled('jawaban')) {
            // Simpan jawaban ke tabel jawaban
            foreach ($request->jawaban as $pertanyaanId => $jawaban) {
                $jawabanModel = new Jawaban();
                $jawabanModel->survey_id = $surveyId; // Set survey_id
                $jawabanModel->pertanyaan_id = $pertanyaanId; // Set pertanyaan_id
                $jawabanModel->jawaban = $jawaban; // Set jawaban
                $jawabanModel->save();
            }
        }

        return redirect()->route('survey.tampil')->with('success', 'Survey berhasil disimpan.');
    }

    // private function generateSeasonId()
    // {
    //     // Ambil season_id maksimum dari tabel tsurvey
    //     $maxSeasonId = DB::table('tsurvey')->max('survey_id');

    //     if (!is_null($maxSeasonId)) {
    //         // Jika ada season_id, ambil angka dari ID yang ada dan tambahkan 1
    //         $lastNumber = (int) $maxSeasonId; // Tidak perlu substr, langsung ambil angkanya
    //         $newNumber = $lastNumber + 1;
    //         return $newNumber; // Kembalikan angka baru
    //     } else {
    //         // Jika tabel kosong, kembalikan "1" sebagai ID pertama
    //         return "1";
    //     }
    // }
}
