<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\Barang\BarangExport;
use App\Exports\BarangMasuk\BarangMasukExport;
use App\Exports\BarangKeluar\BarangKeluarExport;

use App\Services\Laporan\LaporanService;

class LaporanController extends Controller
{
    public function __construct(
        protected LaporanService $service
    ) {}

    // laporan stok
    public function laporanStokIndex(): view
    {
        $barangs = $this->service->getdatabarang();
        return view('dashboard.laporan.stok.index', [
            'barangs' => $barangs,
        ]);
    }

    public function laporanStokExportPdf()
    {
        $barangs = $this->service->getDataBarang();
        $pdf = Pdf::loadView('dashboard.laporan.stok.exports.export-pdf', compact('barangs'));
        $pdf->setOption(['isRemoteEnabled' => true]);
        $fileName = 'Laporan Stok - '. (string) time(). '.pdf';
        return $pdf->download($fileName);
    }

    public function  laporanStokExportExcel()
    {
        $fileName = 'Laporan Stok - '. (string) time(). '.xlsx';
        return Excel::download(new BarangExport, $fileName);
    }

    // laporan barang masuk
    public function laporanBarangMasukIndex(Request $request): view
    {
        $barang_masuks = $this->service->getDataBarangMasukFilter($request);
        return view('dashboard.laporan.barang-masuk.index', [
            'barang_masuks' => $barang_masuks,
        ]);
    }

    public function laporanBarangMasukExportPdf(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        if (isset($tanggal_awal) and isset($tanggal_akhir)) {
            $start_date = date('Y-m-d', strtotime($tanggal_awal));
            $end_date = date('Y-m-d', strtotime($tanggal_akhir));

            $barang_masuks = $this->service->getDataBarangMasuk($start_date, $end_date);
            $pdf = Pdf::loadView('dashboard.laporan.barang-masuk.exports.export-pdf', compact('barang_masuks', 'tanggal_awal', 'tanggal_akhir'));
            $pdf->setOption(['isRemoteEnabled' => true]);
            $fileName = 'Laporan Data Barang Masuk - '. (string) time(). '.pdf';
            return $pdf->download($fileName);
        }
    }

    public function laporanBarangMasukExportExcel(Request $request)
    {
        $start_date = $request->tanggal_awal;
        $end_date = $request->tanggal_akhir;

        if (isset($start_date) and isset($end_date)) {
            $fileName = 'Laporan Data Barang Masuk - '. (string) time(). '.xlsx';
            return Excel::download(new BarangMasukExport($start_date, $end_date), $fileName);
        }
    }


    // laporan barang keluar
    public function laporanBarangKeluarIndex(Request $request): view
    {
        $barang_keluars = $this->service->getDataBarangKeluarFilter($request);
        return view('dashboard.laporan.barang-keluar.index', [
            'barang_keluars' => $barang_keluars,
        ]);
    }

    public function laporanBarangKeluarExportPdf(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        if (isset($tanggal_awal) and isset($tanggal_akhir)) {
            $start_date = date('Y-m-d', strtotime($tanggal_awal));
            $end_date = date('Y-m-d', strtotime($tanggal_akhir));

            $barang_keluars = $this->service->getDataBarangKeluar($start_date, $end_date);
            $pdf = Pdf::loadView('dashboard.laporan.barang-keluar.exports.export-pdf', compact('barang_keluars', 'tanggal_awal', 'tanggal_akhir'));
            $pdf->setOption(['isRemoteEnabled' => true]);
            $fileName = 'Laporan Data Barang Keluar - '. (string) time(). '.pdf';
            return $pdf->download($fileName);
        }
    }

    public function laporanBarangKeluarExportExcel(Request $request)
    {
        $start_date = $request->tanggal_awal;
        $end_date = $request->tanggal_akhir;

        if (isset($start_date) and isset($end_date)) {
            $fileName = 'Laporan Data Barang Keluar - '. (string) time(). '.xlsx';
            return Excel::download(new BarangKeluarExport($start_date, $end_date), $fileName);
        }
    }
}
