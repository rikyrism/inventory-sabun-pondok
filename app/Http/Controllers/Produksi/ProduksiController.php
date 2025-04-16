<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\Produksi\ProduksiStoreRequest;
use App\Http\Requests\Produksi\ProduksiUpdateRequest;
use App\Services\Produksi\ProduksiService;

class ProduksiController extends Controller
{
    private $name = 'produksi';
    public function __construct(
        protected ProduksiService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $produksis = $this->service->index();
        return view('dashboard.produksi.index', [
            'produksis' => $produksis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unique_id = $this->service->getUniqueId();
        return view('dashboard.produksi.create', [
            'unique_id' => $unique_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduksiStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $this->service->store($input);
        return redirect()->route('produksi.index')->withSuccess("Data $this->name berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Produksi $produksi): View
    {
        return view('dashboard.produksi.show', [
            'produksi' => $produksi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksi $produksi): View
    {
        return view('dashboard.produksi.edit', [
            'produksi' => $produksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduksiUpdateRequest $request, Produksi $produksi): RedirectResponse
    {
        $input = $request->validated();
        $this->service->update($input, $produksi);
        return redirect()->route('produksi.index')->withSuccess("Data $this->name berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produksi $produksi): RedirectResponse
    {
        $data = $this->service->destroy($produksi);
        if ($data) {
            return redirect()->route('produksi.index')->withSuccess("Data $this->name berhasil dihapus.");
        } else {
            return redirect()->route('produksi.index')->withError("Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.");
        }
    }
}
