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
        $this->service->store($input);
        return redirect()->route('barang-masuk.index')->withSuccess("Data $this->name berhasil disimpan.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk): RedirectResponse
    {
        $data = $this->service->destroy($barangMasuk);
        if ($data) {
            return redirect()->route('barang-masuk.index')->withSuccess("Data $this->name berhasil dihapus.");
        } else {
            return redirect()->route('barang-masuk.index')->withError("Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.");
        }
    }
}
