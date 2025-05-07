@extends('layouts.app')
@section('content')
    @if (auth()->user()->role === 'Administrator')
    <div class="panel-header bg-secondary-gradient">
        <div class="page-inner py-45">
            <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                <div class="page-header text-white">
                    <!-- judul halaman -->
                    <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Barang</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('barang.index') }}" class="text-white">Barang</a></li>
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
                <div class="card-title">Ubah Data Barang</div>
            </div>
            <!-- form entri data -->
            <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>ID Barang <span class="text-danger">*</span></label>
                                <!-- tampilkan "id_barang" -->
                                <input type="text" class="form-control" value="{{ $barang->id_barang }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Barang <span class="text-danger">*</span></label>
                                <input type="text" name="nama_barang" class="form-control" autocomplete="off" value="{{ $barang->nama_barang}}" required>
                                <div class="invalid-feedback">Nama barang tidak boleh kosong.</div>
                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kategori <span class="text-danger">*</span></label>
                                <select id="id-kategori" name="kategori" class="form-control chosen-select" autocomplete="off" required>
                                    <option selected disabled value="">-- Pilih --</option>
                                    @foreach ($kategoris as $item)
                                        <option value="{{ $item->id_kategori }}" {{ isset($barang->kategori) ? ($barang->kategori === $item->id_kategori ? 'selected' : '') : ''  }}>{{$item->id_kategori}} - {{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Kategori tidak boleh kosong.</div>
                                @error('id_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Stok Minimum <span class="text-danger">*</span></label>
                                <input type="text" name="stok_minimum" class="form-control" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="{{ $barang->stok_minimum }}" required>
                                <div class="invalid-feedback">Stok minimum tidak boleh kosong.</div>
                                @error('stok_minimum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Ukuran <span class="text-danger">*</span></label>
                                <input type="number" name="ukuran" class="form-control" autocomplete="off" value="{{ $barang->ukuran }}" required>
                                <div class="invalid-feedback">Ukuran tidak boleh kosong.</div>
                                @error('ukuran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Harga Barang <span class="text-danger">*</span></label>
                                <input type="number" name="harga_barang" class="form-control" autocomplete="off" value="{{ $barang->harga_barang }}" required>
                                <div class="invalid-feedback">Harga barang tidak boleh kosong.</div>
                                @error('harga_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Varian<span class="text-danger">*</span></label>
                                <input type="text" name="nama_varian" class="form-control" autocomplete="off" value="{{ $barang->nama_varian }}" required>
                                <div class="invalid-feedback">Nama varian tidak boleh kosong.</div>
                                @error('nama_varian')
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
                        <!-- tombol kembali ke halaman data barang -->
                        <a href="{{ route('barang.index') }}" class="btn btn-default btn-round pl-4 pr-4">Batal</a>
                    </div>
            </form>
        </div>
    </div>
    @endif
    
    @if(session('error'))
    <script>
        // Tampilkan popup error duplikat dengan simbol silang merah
        $(document).ready(function() {
            showDuplicatePopup("{{ session('error') }}");
        });
    </script>
    @endif
@endsection
