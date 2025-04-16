@extends('layouts.app')
@section('content')
    @session('success')
        <div class="alert alert-notify alert-secondary alert-dismissible fade show" role="alert">
            <span data-notify="icon" class="fas fa-check"></span>
            <span data-notify="title" class="text-secondary">Sukses!</span>
            <span data-notify="message">{{ $value }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsession
    @session('error')
        <div class="alert alert-notify alert-danger alert-dismissible fade show" role="alert">
            <span data-notify="icon" class="fas fa-times"></span>
            <span data-notify="title" class="text-danger">Gagal!</span>
            <span data-notify="message">{{ $value }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsession
    <div class="panel-header bg-secondary-gradient">
        <div class="page-inner py-45">
            <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                <div class="page-header text-white">
                    <!-- judul halaman -->
                    <h4 class="page-title text-white"><i class="fas fa-file-export mr-2"></i> Laporan Barang Keluar</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a>
                        </li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('laporan-barang-keluar.index') }}"
                                class="text-white">Laporan</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a>Barang Keluar</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <!-- judul form -->
                <div class="card-title">Filter Data Barang Keluar</div>
            </div>
            <!-- form filter data -->
            <div class="card-body">
                <form action="{{ route('laporan-barang-keluar.index') }}" method="get" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Awal <span class="text-danger">*</span></label>
                                <input type="text" name="tanggal_awal" class="form-control date-picker"
                                    value="{{ Request::get('tanggal_awal') }}" autocomplete="off" required>
                                <div class="invalid-feedback">Tanggal awal tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Akhir <span class="text-danger">*</span></label>
                                <input type="text" name="tanggal_akhir" class="form-control date-picker"
                                    value="{{ Request::get('tanggal_akhir') }}" autocomplete="off" required>
                                <div class="invalid-feedback">Tanggal akhir tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-lg-2 pr-0">
                            <div class="form-group pt-3">
                                <!-- tombol tampil data -->
                                <input type="submit" value="Tampilkan" class="btn btn-secondary btn-round btn-block mt-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (count($barang_keluars) > 0)
            <div class="card">
                <!-- tampilkan laporan stok seluruh barang -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- judul tabel -->
                    @php
                        $tanggalAwal = request('tanggal_awal');
                        $tanggalAkhir = request('tanggal_akhir');
                        $settedTanggal = isset($tanggalAwal) and isset($tanggalAkhir);
                    @endphp
                    @if ($settedTanggal)
                        <div class="card-title">
                            <i class="fas fa-file-alt mr-2"></i>
                            Laporan Data Barang Keluar Tanggal <strong> {{ $tanggalAwal }} </strong> s.d. <strong>{{ $tanggalAkhir }} </strong>
                        </div>
                    @else
                        <div class="card-title">
                            <i class="fas fa-file-alt mr-2"></i> Laporan Data Barang Keluar
                        </div>
                    @endif
                    <!-- tombol cetak dan export laporan -->
                    <div>
                        <a href="{{ route('laporan-barang-keluar.export-pdf', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}" target="_blank"
                            class="btn btn-warning btn-round btn-sm mr-2">
                            <span class="btn-label"><i class="fa fa-print mr-2"></i></span> Cetak
                        </a>
                        <a href="{{ route('laporan-barang-keluar.export-excel', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}" target="_blank"
                            class="btn btn-success btn-round btn-sm">
                            <span class="btn-label"><i class="fa fa-file-excel mr-2"></i></span> Export
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- tabel untuk menampilkan data dari database -->
                        <table id="basic-datatables" class="display table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">ID Keluar</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Barang</th>
                                    <th class="text-center">Harga Barang</th>
                                    <th class="text-center">Varian</th>
                                    <th class="text-center">Jumlah Keluar</th>
                                    <th class="text-center">Ukuran</th>
                                    <th class="text-center">Penerima Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tampilkan data -->
                                @foreach ($barang_keluars as $index => $item)
                                    <tr>
                                        <td width="50" class="text-center">{{ $index + 1 }}</td>
                                        <td width="100" class="text-center">{{ $item->id_keluar }}</td>
                                        <td width="200" class="text-center">{{ date('d-m-Y', strtotime($item->nama_barang)) }}</td>
                                        <td width="200" class="text-center">{{ $item->barangTable->id_barang }} - {{ $item->barangTable->nama_barang }}</td>
                                        <td width="100" class="text-center">{{ $item->barangTable->harga_barang }}</td>
                                        <td width="100" class="text-center">{{ $item->barangTable->nama_varian }}</td>
                                        <td width="100" class="text-center">{{ $item->jumlah }}</td>
                                        <td width="100" class="text-center">{{ $item->barangTable->ukuran }} ml</td>
                                        <td width="100" class="text-center">{{ $item->penerima_keluar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

