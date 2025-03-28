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
                            <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a>
                            </li>
                            <li class="separator"><i class="flaticon-right-arrow"></i></li>
                            <li class="nav-item"><a href="{{ route('barang.index') }}" class="text-white">Barang</a></li>
                            <li class="separator"><i class="flaticon-right-arrow"></i></li>
                            <li class="nav-item"><a>Detail</a></li>
                        </ul>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <!-- tombol kembali ke halaman data barang -->
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary btn-round">
                            <span class="btn-label"><i class="far fa-arrow-alt-circle-left mr-2"></i></span> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <!-- judul form -->
                            <div class="card-title">Detail Data Barang</div>
                        </div>
                        <!-- detail data -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td width="120">ID Barang</td>
                                    <td width="10">:</td>
                                    <td>{{ $barang->id_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ $barang->kategori->name }}</td>
                                </tr>
                                <tr>
                                    <td>Stok Minimum</td>
                                    <td>:</td>
                                    <td>{{ $barang->stok_minimum }}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>{{ $barang->stok }}</td>
                                </tr>
                                <tr>
                                    <td>Satuan</td>
                                    <td>:</td>
                                    <td>{{ $barang->satuan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

