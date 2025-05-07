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
        try {
            $input = $request->validated();
            $this->service->store($input);
            
            return redirect()->route('produksi.index')
                ->with('success', "Data $this->name berhasil disimpan.")
                ->with('notification', [
                    'message' => "Produksi ({$input['nama_barang']}) Berhasil",
                    'type' => 'success',
                    'category' => 'Produksi'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Produksi ({$request->nama_barang}) Sudah Ada!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Terjadi kesalahan: " . $e->getMessage());
        }
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
        try {
            $input = $request->validated();
            $this->service->update($input, $produksi);
            return redirect()->route('produksi.index')
                ->with('success', "Data $this->name berhasil diubah.")
                ->with('notification', [
                    'message' => "Produksi ({$input['nama_barang']}) Berhasil",
                    'type' => 'success',
                    'category' => 'Produksi'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Produksi ({$request->nama_barang}) Sudah Ada!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Terjadi kesalahan: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produksi $produksi): RedirectResponse
    {
        $data = $this->service->destroy($produksi);
        $namaBarang = $produksi->nama_barang;
        
        if ($data) {
            return redirect()->route('produksi.index')
                ->with('success', "Data $this->name berhasil dihapus.")
                ->with('notification', [
                    'message' => "Produksi ({$namaBarang}) Berhasil Dihapus",
                    'type' => 'success',
                    'category' => 'Produksi'
                ]);
        } else {
            return redirect()->route('produksi.index')
                ->with('error', "Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.")
                ->with('notification', [
                    'message' => "Produksi ({$namaBarang}) Tidak Dapat Dihapus",
                    'type' => 'danger',
                    'category' => 'Produksi'
                ]);
        }
    }
}
