<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\Barang\BarangStoreRequest;
use App\Http\Requests\Barang\BarangUpdateRequest;
use App\Services\Barang\BarangService;

class BarangController extends Controller
{
    private $name = 'barang';
    public function __construct(
        protected BarangService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $barangs = $this->service->index();
        return view('dashboard.barang.index', [
            'barangs' => $barangs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unique_id = $this->service->getUniqueId();
        return view('dashboard.barang.create', [
            'unique_id' => $unique_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $this->service->store($input);
        return redirect()->route('barang.index')->withSuccess("Data $this->name berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang): View
    {
        return view('dashboard.barang.show', [
            'barang' => $barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang): View
    {
        return view('dashboard.barang.edit', [
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangUpdateRequest $request, Barang $barang): RedirectResponse
    {
        $input = $request->validated();
        $this->service->update($input, $barang);
        return redirect()->route('barang.index')->withSuccess("Data $this->name berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $data = $this->service->destroy($barang);
        if ($data) {
            return redirect()->route('barang.index')->withSuccess("Data $this->name berhasil dihapus.");
        } else {
            return redirect()->route('barang.index')->withError("Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.");
        }
    }
}
