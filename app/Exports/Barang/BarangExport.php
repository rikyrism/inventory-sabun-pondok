<?php

namespace App\Exports\Barang;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangExport implements FromView, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view(): View
    {
        $barangs = Barang::orderBy('id')->get();
        return view('dashboard.laporan.stok.exports.export-excel', [
            'barangs' => $barangs
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Apply styles to the title row
        $sheet->mergeCells('A1:E1'); // Merge the title across the columns
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center'); // Center align the title
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16); // Set title font style similar to <h4>

        // Style the header row
        $sheet->getStyle('A2:E2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A2:E2')->getFill()->getStartColor()->setARGB('6861ce'); // Background color
        $sheet->getStyle('A2:E2')->getFont()->getColor()->setARGB('FFFFFF'); // Text color (white)
        $sheet->getStyle('A2:E2')->getFont()->setBold(true); // Make font bold

        // Center align the text in the header row
        $sheet->getStyle('A2:E2')->getAlignment()->setHorizontal('center');
    }
}
