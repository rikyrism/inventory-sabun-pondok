<?php

namespace App\Http\Controllers\BarangMasuk;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\BarangMasuk\BarangMasukStoreRequest;
use App\Services\BarangMasuk\BarangMasukService;

class BarangMasukController extends Controller
{
    private $name = 'barang masuk';
    public function __construct(
        protected BarangMasukService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $barang_masuks = $this->service->index();
        return view('dashboard.barang-masuk.index', [
            'barang_masuks' => $barang_masuks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unique_id = $this->service->getUniqueId();
        $barangs = Barang::get();
        return view('dashboard.barang-masuk.create', [
            'unique_id' => $unique_id,
            'barangs' => $barangs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangMasukStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $barang = Barang::find($input['barang']);
        $this->service->store($input);
        return redirect()->route('barang-masuk.index')
            ->with('success', "Data Barang Masuk {$barang->nama_barang} ({$input['jumlah']} pcs) berhasil disimpan.")
            ->with('notification', [
                'message' => "Barang Masuk {$barang->nama_barang} ({$input['jumlah']} pcs) berhasil ditambahkan",
                'type' => 'success',
                'category' => 'Transaksi'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk): RedirectResponse
    {
        // Get the barang name before deleting
        $nama_barang = $barangMasuk->barangTable->nama_barang ?? 'Unknown';
        
        $data = $this->service->destroy($barangMasuk);
        if ($data) {
            return redirect()->route('barang-masuk.index')
                ->with('success', "Data $this->name berhasil dihapus.")
                ->with('notification', [
                    'message' => "Barang Masuk {$nama_barang} berhasil dihapus",
                    'type' => 'success',
                    'category' => 'Transaksi'
                ]);
        } else {
            return redirect()->route('barang-masuk.index')
                ->with('error', "Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.")
                ->with('notification', [
                    'message' => "Barang Masuk {$nama_barang} tidak dapat dihapus",
                    'type' => 'danger',
                    'category' => 'Transaksi'
                ]);
        }
    }
}
