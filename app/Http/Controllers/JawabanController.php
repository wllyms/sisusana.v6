<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Exports\SurveyExport;
use App\Exports\RekapKritikExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    // tampilan beranda
    function tampiljawaban()
    {
        // var_dump(Auth::user());
        $jawaban = Jawaban::get();
        $survey = Survey::get();

        $jumlahA = Jawaban::where('jawaban', 'A')->count();
        $jumlahB = Jawaban::where('jawaban', 'B')->count();
        $jumlahC = Jawaban::where('jawaban', 'C')->count();
        $jumlahD = Jawaban::where('jawaban', 'D')->count();
        $totRespon = Survey::count();

        if (is_null(Auth::user())) {
            return redirect('/login');
        } else {
            return view('beranda', compact('jawaban', 'jumlahA', 'jumlahB', 'jumlahC', 'jumlahD', 'totRespon'));
        }
    }

    // tampilan grafik keseluruhan
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

        return view('hasil.grafik-keseluruhan', compact('jawaban', 'jumlahA', 'jumlahB', 'jumlahC', 'jumlahD', 'totRespon', 'persenA', 'persenB', 'persenC', 'persenD'));
    }

    //tampilan data grafik per pertanyaan
    function tampilpersenpertanyaan(Request $request)
    {
        $startDate = $request->input('dtanggal');
        $endDate = $request->input('stanggal');
        $layanan = $request->input('jlayanan');
    
        if ($endDate) {
            $endDate = date('Y-m-d 23:59:59', strtotime($endDate));
        }
    
        $pertanyaan = Pertanyaan::with(['jawaban' => function ($query) use ($startDate, $endDate, $layanan) {
            if ($startDate && $endDate) {
                $query->whereBetween('tjawaban.created_at', [$startDate, $endDate]);
            }
    
            if ($layanan) {
                $query->join('tsurvey', 'tjawaban.survey_id', '=', 'tsurvey.id')
                    ->where('tsurvey.jlayanan', $layanan);
            }
        }])->get();
    
        $dataPersentase = [];
    
        foreach ($pertanyaan as $pertanyaanItem) {
            $jawaban = $pertanyaanItem->jawaban;
    
            $jumlahA = $jawaban->where('jawaban', 'A')->count();
            $jumlahB = $jawaban->where('jawaban', 'B')->count();
            $jumlahC = $jawaban->where('jawaban', 'C')->count();
            $jumlahD = $jawaban->where('jawaban', 'D')->count();
            $totRespon = $jawaban->count();
    
            $totalJawaban = $jumlahA + $jumlahB + $jumlahC + $jumlahD;
    
            $persenA = $totalJawaban > 0 ? ($jumlahA / $totalJawaban) * 100 : 0;
            $persenB = $totalJawaban > 0 ? ($jumlahB / $totalJawaban) * 100 : 0;
            $persenC = $totalJawaban > 0 ? ($jumlahC / $totalJawaban) * 100 : 0;
            $persenD = $totalJawaban > 0 ? ($jumlahD / $totalJawaban) * 100 : 0;
    
            if ($totalJawaban > 0) {
                $totalNilai = ($jumlahA * 4) + ($jumlahB * 3) + ($jumlahC * 2) + ($jumlahD * 1);
                $nilaiMaksimum = $totalJawaban * 4;
                $rataRataPersen = ($totalNilai / $nilaiMaksimum) * 100;
                $ikm = ($totalNilai / $totRespon) * 25;
            } else {
                $rataRataPersen = 0;
                $ikm = 0;
            }
    
            $dataPersentase[] = [
                'pertanyaan' => $pertanyaanItem,
                'jumlahA' => $jumlahA,
                'jumlahB' => $jumlahB,
                'jumlahC' => $jumlahC,
                'jumlahD' => $jumlahD,
                'persenA' => round($persenA),
                'persenB' => round($persenB),
                'persenC' => round($persenC),
                'persenD' => round($persenD),
                'rataRata' => round($rataRataPersen, 2),
                'ikm' => round($ikm, 2),
            ];
        }
    
        return view('hasil.persentase-pertanyaan', compact('dataPersentase', 'totRespon', 'startDate', 'endDate', 'layanan'));
    }
    
    

    //tampilan laporan
    function tampillaporan(Request $request)
    {
        $dtanggal = $request->input('dtanggal');
        $stanggal = $request->input('stanggal');
        $layanan = $request->input('layanan');

        $query = Survey::query();

        // Menangani format tanggal
        if ($dtanggal && $stanggal) {
            // Menyesuaikan waktu akhir untuk stanggal
            $stanggal = \Carbon\Carbon::parse($stanggal)->endOfDay(); // Mengatur waktu ke akhir hari
            $query->whereBetween('created_at', [$dtanggal, $stanggal]);
        }

        if ($layanan) {
            $query->where('jlayanan', $layanan);
        }

        $survey = $query->get();

        $totRespon = $survey->count();

        return view('hasil.laporan', compact('survey', 'totRespon'));
    }


    //tampilan detail laporan
    function detaillaporan($id)
    {
        $survey = Survey::findOrFail($id);
        $jawaban = Jawaban::where('survey_id', $id)->get();

        return view('hasil.detail-laporan', compact('survey', 'jawaban'));
    }

    //tampilan cetak detail laporan
    public function cetakdetail($id)
    {
        $survey = Survey::findOrFail($id);
        $jawaban = Jawaban::where('survey_id', $id)->get();
        $tanggalWaktu = now()->locale('id')->isoFormat('D MMMM YYYY HH:mm:ss');

        return view('hasil.cetak-detail', compact('survey', 'jawaban', 'tanggalWaktu'));
    }

    //tampilan detail rekam semua kuisioner
    function detailrekapsemua()
    {
        $survey = Survey::with('jawaban')
            ->orderByRaw("FIELD(jlayanan, 'Instalasi Gawat Darurat', 'MCU', 'Pendaftaran', 'Penunjang', 'Instalasi Rawat Inap', 'Instalasi Rawat Jalan')")
            ->get();
        $pertanyaan = Pertanyaan::get();
        $totalResponden = Survey::count();

        $totalNilaiPerPertanyaan = [];
        $NRRPerPertanyaan = [];
        $NRRTertimbangPerPertanyaan = [];
        $IKMPerPertanyaan = [];

        $survey->each(function ($surv) use (&$totalNilaiPerPertanyaan) {
            $surv->jawaban->each(function ($jawab) use (&$totalNilaiPerPertanyaan) {
                switch ($jawab->jawaban) {
                    case 'A':
                        $jawab->jawaban = 4;
                        break;
                    case 'B':
                        $jawab->jawaban = 3;
                        break;
                    case 'C':
                        $jawab->jawaban = 2;
                        break;
                    case 'D':
                        $jawab->jawaban = 1;
                        break;
                    default:
                        $jawab->jawaban = 0;
                }

                $pertanyaanId = $jawab->pertanyaan_id;
                if (!isset($totalNilaiPerPertanyaan[$pertanyaanId])) {
                    $totalNilaiPerPertanyaan[$pertanyaanId] = 0;
                }
                $totalNilaiPerPertanyaan[$pertanyaanId] += $jawab->jawaban;
            });
        });

        foreach ($totalNilaiPerPertanyaan as $pertanyaanId => $totalNilai) {
            $NRRPerPertanyaan[$pertanyaanId] = ($totalResponden > 0) ? $totalNilai / $totalResponden : 0;
        }

        foreach ($NRRPerPertanyaan as $pertanyaanId => $NRR) {
            $NRRTertimbangPerPertanyaan[$pertanyaanId] = $NRR * (1 / $pertanyaan->count());
            $totalNRRTertimbang = array_sum($NRRTertimbangPerPertanyaan);
        }

        foreach ($NRRTertimbangPerPertanyaan as $pertanyaanId => $NRRTertimbang) {
            $IKMPerPertanyaan[$pertanyaanId] = $NRRTertimbang * 25;
        }

        // Mengirim data ke view
        return view('hasil.rekap-survey', compact('survey', 'pertanyaan', 'totalNilaiPerPertanyaan', 'NRRPerPertanyaan', 'NRRTertimbangPerPertanyaan', 'IKMPerPertanyaan', 'totalNRRTertimbang'));
    }


    //tampilan detail rekap semua kritik
    public function detailrekapkritik()
    {
        $survey = Survey::with('jawaban')->get();
        $pertanyaan = Pertanyaan::get();

        $nrrPerResponden = $survey->map(function ($data) {
            $totalNilai = $data->jawaban->sum(function ($jawaban) {
                return match ($jawaban->jawaban) {
                    'A' => 4,
                    'B' => 3,
                    'C' => 2,
                    'D' => 1,
                    default => 0,
                };
            });
            $jumlahJawaban = $data->jawaban->count();

            $nrr = $jumlahJawaban > 0 ? ($totalNilai / $jumlahJawaban) * 25 : 0;
            return [
                'responden_id' => $data->id,
                'nrr' => $nrr,
                'layanan' => $data->jlayanan,
                'usia' => $data->usia,
                'kritik' => $data->kritik,
            ];
        })->toArray();


        return view('hasil.rekap-kritik', compact('nrrPerResponden', 'pertanyaan'));
    }

    public function exportKritikExcel()
    {
        $tanggalWaktu = Carbon::now()->locale('id')->translatedFormat('d-m-Y');
        $fileName = $tanggalWaktu . '_Laporan_Rekap_Kritik.xlsx';

        return Excel::download(new RekapKritikExport, $fileName);
    }

    public function exportKritikPDF()
    {
        $survey = Survey::with('jawaban')->get();
        $pertanyaan = Pertanyaan::get();

        $nrrPerResponden = $survey->map(function ($data) {
            $totalNilai = $data->jawaban->sum(function ($jawaban) {
                return match ($jawaban->jawaban) {
                    'A' => 4,
                    'B' => 3,
                    'C' => 2,
                    'D' => 1,
                    default => 0,
                };
            });
            $jumlahJawaban = $data->jawaban->count();

            $nrr = $jumlahJawaban > 0 ? ($totalNilai / $jumlahJawaban) * 25 : 0;
            return [
                'responden_id' => $data->id,
                'nrr' => $nrr,
                'layanan' => $data->jlayanan,
                'usia' => $data->usia,
                'kritik' => $data->kritik,
            ];
        })->toArray();


        return view('hasil.cetak-rekap-kritik', compact('nrrPerResponden', 'pertanyaan'));
    }
    

    public function exportSurveyExcel()
    {
        $tanggalWaktu = Carbon::now()->locale('id')->translatedFormat('d-m-Y');
        $fileName = $tanggalWaktu . '_Laporan_Rekap_Kuisioner.xlsx';

        return Excel::download(new SurveyExport, $fileName);
    }

    function exportSurveyPDF()
    {
        $survey = Survey::with('jawaban')->get();
        $pertanyaan = Pertanyaan::get();
        $totalResponden = Survey::count();

        $totalNilaiPerPertanyaan = [];

        $totalPertanyaan = $pertanyaan->count();

        $totalNilaiPerPertanyaan = [];
        $NRRPerPertanyaan = [];
        $NRRTertimbangPerPertanyaan = [];
        $IKMPerPertanyaan = [];

        $survey->each(function ($surv) use (&$totalNilaiPerPertanyaan) {
            $surv->jawaban->each(function ($jawab) use (&$totalNilaiPerPertanyaan) {
                switch ($jawab->jawaban) {
                    case 'A':
                        $jawab->jawaban = 4;
                        break;
                    case 'B':
                        $jawab->jawaban = 3;
                        break;
                    case 'C':
                        $jawab->jawaban = 2;
                        break;
                    case 'D':
                        $jawab->jawaban = 1;
                        break;
                    default:
                        $jawab->jawaban = 0;
                }

                $pertanyaanId = $jawab->pertanyaan_id;
                if (!isset($totalNilaiPerPertanyaan[$pertanyaanId])) {
                    $totalNilaiPerPertanyaan[$pertanyaanId] = 0;
                }
                $totalNilaiPerPertanyaan[$pertanyaanId] += $jawab->jawaban;
            });
        });

        foreach ($totalNilaiPerPertanyaan as $pertanyaanId => $totalNilai) {
            $NRRPerPertanyaan[$pertanyaanId] = ($totalResponden > 0) ? $totalNilai / $totalResponden : 0;
        }

        foreach ($NRRPerPertanyaan as $pertanyaanId => $NRR) {
            $NRRTertimbangPerPertanyaan[$pertanyaanId] = $NRR * (1 / $totalPertanyaan);
            $totalNRRTertimbang = array_sum($NRRTertimbangPerPertanyaan);
        }

        foreach ($NRRTertimbangPerPertanyaan as $pertanyaanId => $NRRTertimbang) {
            $IKMPerPertanyaan[$pertanyaanId] = $NRRTertimbang * 25;
        }


        return view('hasil.cetak-rekap-survey', compact('survey', 'pertanyaan', 'totalNilaiPerPertanyaan', 'NRRPerPertanyaan', 'NRRTertimbangPerPertanyaan', 'IKMPerPertanyaan', 'totalNRRTertimbang'));
    }

    function hapuslaporan($id)
    {
        $survey = Survey::findOrFail($id);

        Jawaban::where('survey_id', $id)->delete();

        $survey->delete();

        return redirect()->route('hasil.tampillaporan');
    }
}
