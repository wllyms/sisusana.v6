<?php

//RekapKritikExport

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Survey;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RekapKritikExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithStyles, WithEvents
{
    public function collection()
    {
        return Survey::with('jawaban')->get();
    }

    public function map($survey): array
    {
        $totalNilai = 0;
        $jumlahJawaban = 0;

        foreach ($survey->jawaban as $jawaban) {
            switch ($jawaban->jawaban) {
                case 'A':
                    $totalNilai += 4;
                    break;
                case 'B':
                    $totalNilai += 3;
                    break;
                case 'C':
                    $totalNilai += 2;
                    break;
                case 'D':
                    $totalNilai += 1;
                    break;
            }
            $jumlahJawaban++;
        }

        $nrr = $jumlahJawaban > 0 ? ($totalNilai / $jumlahJawaban) * 25 : 0;

        return [
            $survey->id,
            $survey->usia,
            $survey->jlayanan,
            number_format($nrr, 1),
            $survey->kritik
        ];
    }

    public function headings(): array
    {
        return [
            'No. Responden',
            'Usia',
            'Layanan',
            'NRR Survey',
            'Kritik dan Saran'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 10,
            'C' => 20,
            'D' => 12,
            'E' => 115,
        ];
    }



    public function styles(Worksheet $sheet): array
    {
        // Gaya untuk header (baris 4)
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        // Gaya untuk semua kolom (rata tengah)
        $sheet->getStyle('A:E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Border untuk seluruh data
        $sheet->getStyle('A1:E' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFADD8E6'], // Warna biru muda (hex: #ADD8E6)
                    ]
                ]);
            }
        ];
    }
}








