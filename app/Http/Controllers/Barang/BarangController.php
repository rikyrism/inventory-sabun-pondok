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
        $kategoris = $this->service->kategoris();
        return view('dashboard.barang.create', [
            'unique_id' => $unique_id,
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangStoreRequest $request): RedirectResponse
    {
        try {
            $input = $request->validated();
            $this->service->store($input);
            
            // Tambahkan notifikasi di session
            return redirect()->route('barang.index')
                ->with('success', "Data Barang {$input['nama_barang']} berhasil disimpan.")
                ->with('notification', [
                    'message' => "Barang {$input['nama_barang']} berhasil ditambahkan",
                    'type' => 'success',
                    'category' => 'Master'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('barang.create')
                ->withInput()
                ->with('error', "Data Barang {$request->nama_barang} Sudah Ada!");
        } catch (\Exception $e) {
            return redirect()->route('barang.create')
                ->withInput()
                ->with('error', "Terjadi kesalahan: " . $e->getMessage());
        }
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
        $kategoris = $this->service->kategoris();

        return view('dashboard.barang.edit', [
            'barang' => $barang,
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangUpdateRequest $request, Barang $barang): RedirectResponse
    {
        try {
            $input = $request->validated();
            $this->service->update($input, $barang);
            return redirect()->route('barang.index')
                ->with('success', "Data Barang {$input['nama_barang']} berhasil diubah.")
                ->with('notification', [
                    'message' => "Barang {$input['nama_barang']} berhasil diubah",
                    'type' => 'success',
                    'category' => 'Master'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Nama Barang ({$request->nama_barang}) Sudah Ada!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Terjadi kesalahan: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $data = $this->service->destroy($barang);
        if ($data) {
            return redirect()->route('barang.index')
                ->with('success', "Data Barang {$barang->nama_barang} berhasil dihapus.")
                ->with('notification', [
                    'message' => "Barang {$barang->nama_barang} berhasil dihapus",
                    'type' => 'success',
                    'category' => 'Master'
                ]);
        } else {
            return redirect()->route('barang.index')
                ->with('error', "Data Barang {$barang->nama_barang} tidak bisa dihapus karena sudah tercatat pada Data Transaksi.")
                ->with('notification', [
                    'message' => "Barang {$barang->nama_barang} tidak dapat dihapus karena terdapat di transaksi",
                    'type' => 'danger',
                    'category' => 'Master'
                ]);
        }
    }
}
