<?php

namespace App\Http\Controllers\BarangKeluar;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\BarangKeluar\BarangKeluarStoreRequest;
use App\Services\BarangKeluar\BarangKeluarService;

class BarangKeluarController extends Controller
{
    private $name = 'barang keluar';
    public function __construct(
        protected BarangKeluarService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $barang_keluars = $this->service->index();
        return view('dashboard.barang-keluar.index', [
            'barang_keluars' => $barang_keluars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unique_id = $this->service->getUniqueId();
        $barangs = Barang::get();
        return view('dashboard.barang-keluar.create', [
            'unique_id' => $unique_id,
            'barangs' => $barangs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangKeluarStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $this->service->store($input);
        return redirect()->route('barang-keluar.index')->withSuccess("Data $this->name berhasil disimpan.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar): RedirectResponse
    {
        $data = $this->service->destroy($barangKeluar);
        if ($data) {
            return redirect()->route('barang-keluar.index')->withSuccess("Data $this->name berhasil dihapus.");
        } else {
            return redirect()->route('barang-keluar.index')->withError("Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.");
        }
    }
}
