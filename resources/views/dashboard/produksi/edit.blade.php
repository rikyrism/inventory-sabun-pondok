@extends('layouts.app')
@section('content')
    @if (auth()->user()->role === 'Administrator')
    <div class="panel-header bg-secondary-gradient">
        <div class="page-inner py-45">
            <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                <div class="page-header text-white">
                    <!-- judul halaman -->
                    <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Jadwal Produksi</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('produksi.index') }}" class="text-white">Jadwal Produksi</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a>Ubah</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <!-- judul form -->
                <div class="card-title">Ubah Data Jadwal Produksi</div>
            </div>
            <!-- form entri data -->
            <form action="{{ route('produksi.update', $produksi->id_produksi) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>ID Produksi <span class="text-danger">*</span></label>
                                <!-- tampilkan "id_barang" -->
                                <input type="text" class="form-control" value="{{ $produksi->id_produksi }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>ID Barang <span class="text-danger">*</span></label>
                                <!-- tampilkan "id_barang" -->
                                <input type="text" class="form-control" value="{{ $produksi->barangTable->id_barang }}" readonly>
                            </div>


                            <div class="form-group">
                                <label>Nama Barang <span class="text-danger">*</span></label>
                                <input type="text" name="nama_barang" class="form-control" autocomplete="off" value="{{ $produksi->nama_barang}}" required>
                                <div class="invalid-feedback">Nama barang tidak boleh kosong.</div>
                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Jumlah <span class="text-danger">*</span></label>
                                <input type="text" name="jumlah" class="form-control" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="{{ $produksi->jumlah }}" required>
                                <div class="invalid-feedback">Jumlah tidak boleh kosong.</div>
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Satuan <span class="text-danger">*</span></label>
                                <input type="text" name="satuan" class="form-control" autocomplete="off" value="{{ $produksi->satuan }}" required>
                                <div class="invalid-feedback">Satuan tidak boleh kosong.</div>
                                @error('satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" value="{{ $produksi->tanggal }}" class="form-control" autocomplete="off" required>
                                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select id="status" name="status" class="form-control chosen-select" autocomplete="off" required>
                                    <option value="Proses" {{ $produksi->status === 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="Selesai" {{ $produksi->status === 'Selesai' ? 'selected' : '' }}">Selesai</option>
                                </select>
                                <div class="invalid-feedback">Status tidak boleh kosong.</div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card-action">
                        <!-- tombol simpan data -->
                        <input type="submit" name="simpan" value="Simpan"
                            class="btn btn-secondary btn-round pl-4 pr-4 mr-2">
                        <!-- tombol kembali ke halaman data jadwal produksi -->
                        <a href="{{ route('produksi.index') }}" class="btn btn-default btn-round pl-4 pr-4">Batal</a>
                    </div>
            </form>
        </div>
    </div>
    @endif
@endsection
