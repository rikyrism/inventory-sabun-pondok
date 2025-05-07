<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\Kategori\KategoriStoreRequest;
use App\Http\Requests\Kategori\KategoriUpdateRequest;
use App\Services\Kategori\KategoriService;

class KategoriController extends Controller
{
    private $name = 'kategori';
    public function __construct(
        protected KategoriService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kategoris = $this->service->index();
        return view('dashboard.kategori.index', [
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unique_id = $this->service->getUniqueId();

        return view('dashboard.kategori.create', [
            'unique_id' => $unique_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriStoreRequest $request): RedirectResponse
    {
        try {
            $input = $request->validated();
            $this->service->store($input);
            return redirect()->route('kategori.index')
                ->with('success', "Data Kategori {$input['nama_kategori']} berhasil disimpan.")
                ->with('notification', [
                    'message' => "Kategori {$input['nama_kategori']} berhasil ditambahkan",
                    'type' => 'success',
                    'category' => 'Master'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('kategori.index')
                ->with('error', "Data Kategori {$request->nama_kategori} Sudah Ada!");
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')
                ->with('error', "Terjadi kesalahan: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori): View
    {
        return view('dashboard.kategori.show', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori): View
    {
        return view('dashboard.kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriUpdateRequest $request, Kategori $kategori): RedirectResponse
    {
        try {
            $input = $request->validated();
            $this->service->update($input, $kategori);
            return redirect()->route('kategori.index')
                ->with('success', "Data Kategori {$input['nama_kategori']} berhasil diubah.")
                ->with('notification', [
                    'message' => "Kategori {$input['nama_kategori']} berhasil diubah",
                    'type' => 'success',
                    'category' => 'Master'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Nama Kategori ({$request->nama_kategori}) Sudah Ada!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Terjadi kesalahan: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $data = $this->service->destroy($kategori);
        if ($data) {
            return redirect()->route('kategori.index')
                ->with('success', "Data Kategori {$kategori->nama_kategori} berhasil dihapus.")
                ->with('notification', [
                    'message' => "Kategori {$kategori->nama_kategori} berhasil dihapus",
                    'type' => 'success',
                    'category' => 'Master'
                ]);
        } else {
            return redirect()->route('kategori.index')
                ->with('error', "Data Kategori {$kategori->nama_kategori} tidak bisa dihapus karena sudah tercatat pada Data Transaksi.")
                ->with('notification', [
                    'message' => "Kategori {$kategori->nama_kategori} tidak dapat dihapus karena terdapat di transaksi",
                    'type' => 'danger',
                    'category' => 'Master'
                ]);
        }
    }
}
