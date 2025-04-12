@extends('layouts.app')
@section('content')
    @session('success')
        <div class="alert alert-notify alert-secondary alert-dismissible fade show" role="alert">
            <span data-notify="icon" class="fas fa-user-alt"></span>
            <span data-notify="title" class="text-secondary">Hi! {{ auth()->user()->nama_user }}. </span>
            <span data-notify="message">{{ $value }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsession
    <div class="panel-header bg-secondary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                <div class="page-header text-white">
                    <!-- judul halaman -->
                    <h4 class="page-title text-white"><i class="fas fa-home mr-2"></i> Dashboard</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--2">
            <!-- menampilkan informasi jumlah data barang -->
            <div class="col-sm-12 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big2 text-center">
                                    <i class="flaticon-box-2 text-secondary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data Barang</p>

                                    <!-- tampilkan data -->
                                    <h4 class="card-title">{{ number_format($count['barang'], 0, '', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menampilkan informasi jumlah data barang masuk -->
            <div class="col-sm-12 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big2 text-center">
                                    <i class="flaticon-inbox text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data Barang Masuk</p>

                                    <!-- tampilkan data -->
                                    <h4 class="card-title">{{ number_format($count['barangMasuk'], 0, '', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menampilkan informasi jumlah data barang keluar -->
            <div class="col-sm-12 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big2 text-center">
                                    <i class="flaticon-archive text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data Barang Keluar</p>

                                    <!-- tampilkan data -->
                                    <h4 class="card-title">{{ number_format($count['barangKeluar'], 0, '', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- menampilkan informasi stok barang yang telah mencapai batas minimum -->
        <div class="card">
            <div class="card-header">
                <!-- judul tabel -->
                <div class="card-title"><i class="fas fa-info-circle mr-2"></i> Stok barang telah mencapai batas minimum
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
                                <th class="text-center">Stok</th>
                                <th class="text-center">Ukuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $index => $item)
                                <tr>
                                    <td width="50" class="text-center">{{ $index + 1 }}</td>
                                    <td width="80" class="text-center">{{ $item->id_barang }}</td>
                                    <td width="200">{{ $item->nama_barang }}</td>
                                    <td width="70" class="text-right">
                                        <span class="badge badge-warning">{{ $item->stok }}</span>
                                    </td>
                                    <td width="70">{{ $item->ukuran }} ml</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

