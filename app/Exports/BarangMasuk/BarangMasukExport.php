<?php

namespace App\Exports\BarangMasuk;

use App\Models\BarangMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangMasukExport implements FromView, WithStyles, ShouldAutoSize
{
    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->tanggal_awal = date('Y-m-d', strtotime($start_date));
        $this->tanggal_akhir = date('Y-m-d', strtotime($end_date));
    }

    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view(): View
    {
        $data = new BarangMasuk;
        $barang_masuks = $data->whereDate('tanggal', '>=', $this->tanggal_awal)->whereDate('tanggal', '<=', $this->tanggal_akhir)->orderBy('id')->get();
        return view('dashboard.laporan.barang-masuk.exports.export-excel', [
            'barang_masuks' => $barang_masuks,
            'tanggal_awal' => $this->start_date,
            'tanggal_akhir' => $this->end_date,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Apply styles to the title row
        $sheet->mergeCells('A1:F1'); // Merge the title across the columns
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center'); // Center align the title
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16); // Set title font style similar to <h4>
        $sheet->mergeCells('A2:F2'); // Merge the title across the columns
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');

        // Style the header row
        $sheet->getStyle('A3:F3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A3:F3')->getFill()->getStartColor()->setARGB('6861ce'); // Background color
        $sheet->getStyle('A3:F3')->getFont()->getColor()->setARGB('FFFFFF'); // Text color (white)
        $sheet->getStyle('A3:F3')->getFont()->setBold(true); // Make font bold

        // Center align the text in the header row
        $sheet->getStyle('A3:F3')->getAlignment()->setHorizontal('center');
    }
}
