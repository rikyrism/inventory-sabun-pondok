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
                    <h4 class="page-title text-white"><i class="fas fa-file-signature mr-2"></i> Laporan Stok</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('laporan-stok.index') }}" class="text-white">Laporan</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a>Stok</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="card">

             <!-- tampilkan laporan stok seluruh barang -->
            <div class="card-header d-flex justify-content-between align-items-center">
                 <!-- judul tabel -->
                 <div class="card-title"><i class="fas fa-file-alt mr-2"></i> Laporan Stok Seluruh Barang</div>
                 <!-- tombol cetak dan export laporan -->
                 <div>
                     <a href="{{ route('laporan-stok.export-pdf') }}" target="_blank"
                         class="btn btn-warning btn-round btn-sm mr-2">
                         <span class="btn-label"><i class="fa fa-print mr-2"></i></span> Cetak
                     </a>
                     <a href="{{ route('laporan-stok.export-excel') }}" target="_blank"
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
                                <th class="text-center">ID Barang</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Harga Barang</th>
                                <th class="text-center">Varian</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Ukuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data -->
                            @foreach ($barangs as $index => $item)
                                <tr>
                                    <td width="50" class="text-center">{{ $index + 1 }}</td>
                                    <td width="100" class="text-center">{{ $item->id_barang }}</td>
                                    <td width="200" class="text-center">{{ $item->nama_barang }}</td>
                                    <td width="200" class="text-center">{{ $item->harga_barang }}</td>
                                    <td width="200" class="text-center">{{ $item->nama_varian }}</td>
                                    <td width="200" class="text-center">{{ $item->kategoriTable->nama_kategori }}</td>
                                    <td width="100" class="text-center">
                                        @if ($item->stok <= $item->stok_minimum)
                                            <span class="badge badge-warning">{{ $item->stok }}</span>
                                        @else
                                            {{ $item->stok }}
                                        @endif
                                    </td>
                                    <td width="100" class="text-center">{{ $item->ukuran }} ml</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
