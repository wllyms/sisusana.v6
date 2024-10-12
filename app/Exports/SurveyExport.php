<?php

namespace App\Exports;

use App\Models\Survey;
use App\Models\Pertanyaan;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;

class SurveyExport implements FromView, WithStyles, WithHeadings
{
    public function view(): View
    {
        $survey = Survey::with('jawaban')->get();
        $pertanyaan = Pertanyaan::get();
        $totalResponden = Survey::count();
        
        $totalNilaiPerPertanyaan = [];
        $totalPertanyaan = $pertanyaan->count();
        $NRRPerPertanyaan = [];
        $NRRTertimbangPerPertanyaan = [];
        $IKMPerPertanyaan = [];

        // Logika perhitungan sesuai controller
        $survey->each(function ($surv) use (&$totalNilaiPerPertanyaan) {
            $surv->jawaban->each(function ($jawab) use (&$totalNilaiPerPertanyaan) {
                switch ($jawab->jawaban) {
                    case 'A': $jawab->jawaban = 4; break;
                    case 'B': $jawab->jawaban = 3; break;
                    case 'C': $jawab->jawaban = 2; break;
                    case 'D': $jawab->jawaban = 1; break;
                    default: $jawab->jawaban = 0;
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
        }

        foreach ($NRRTertimbangPerPertanyaan as $pertanyaanId => $NRRTertimbang) {
            $IKMPerPertanyaan[$pertanyaanId] = $NRRTertimbang * 25;
        }

        $totalNRRTertimbang = array_sum($NRRTertimbangPerPertanyaan);

        return view('hasil.cetak-survey-excel', compact(
            'survey', 'pertanyaan', 'totalNilaiPerPertanyaan',
            'NRRPerPertanyaan', 'NRRTertimbangPerPertanyaan',
            'IKMPerPertanyaan', 'totalNRRTertimbang'
        ));
    }

    public function headings(): array
    {
        return [
            'ID', 'Pertanyaan', 'Total Nilai', 'NRR', 'NRR Tertimbang', 'IKM'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:L1')->getFill()->getStartColor()->setARGB('ADD8E6'); // Warna biru muda

        $sheet->getStyle('A1:L1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->getColumnDimension('A')->setWidth(16);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(10);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(10);
        $sheet->getColumnDimension('I')->setWidth(10);
        $sheet->getColumnDimension('J')->setWidth(10);
        $sheet->getColumnDimension('K')->setWidth(10);
        $sheet->getColumnDimension('L')->setWidth(10);

        $sheet->getStyle('A2:L' . $sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A1:L' . $sheet->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->getStyle('A' . ($sheet->getHighestRow() - 3) . ':L' . ($sheet->getHighestRow() - 3))->getFont()->setBold(true);
        $sheet->getStyle('A' . ($sheet->getHighestRow() - 2) . ':L' . ($sheet->getHighestRow() - 2))->getFont()->setBold(true);
        $sheet->getStyle('A' . ($sheet->getHighestRow() - 1) . ':L' . ($sheet->getHighestRow() - 1))->getFont()->setBold(true);
        $sheet->getStyle('A' . $sheet->getHighestRow() . ':L' . $sheet->getHighestRow())->getFont()->setBold(true);
    }
}

