@extends('layouts.app')
@section('content')
    @if (auth()->user()->role === 'Administrator')
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
                    <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Barang</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('barang.index') }}" class="text-white">Barang</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a>Data</a></li>
                    </ul>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <!-- tombol entri data -->
                    <a href="{{ route('barang.create') }}" class="btn btn-secondary btn-round">
                        <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <!-- judul tabel -->
                <div class="card-title">Data Barang</div>
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
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Ukuran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data -->
                            @foreach ($barangs as $index => $item)
                                <tr>
                                    <td width="50" class="text-center">{{ $index + 1 }}</td>
                                    <td width="100" class="text-center">{{ $item->id_barang }}</td>
                                    <td width="200">{{ $item->nama_barang }}</td>
                                    <td width="200">{{ $item->kategori->name }}</td>
                                    <td width="80" class="text-right">{{ $item->stok }}</td>
                                    <td width="100">{{ $item->satuan }}</td>
                                    <td width="100">{{ $item->ukuran }} ml</td>
                                    <td width="100" class="text-center">
                                        <div>
                                            <!-- tombol detail data -->
                                            <a href="{{ route('barang.show', $item->id_barang) }}" class="btn btn-icon btn-round btn-primary btn-sm mr-md-1" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fas fa-clone fa-sm"></i>
                                            </a>
                                            <!-- tombol ubah data -->
                                            <a href="{{ route('barang.edit', $item->id_barang) }}" class="btn btn-icon btn-round btn-secondary btn-sm mr-md-1" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                <i class="fas fa-pencil-alt fa-sm"></i>
                                            </a>
                                            <!-- tombol hapus data -->
                                            <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" id="delete-data-{{$item->id_barang}}">Delete</button>
                                            </form>

                                            <a href="#"
                                                onclick="if (confirm('Anda yakin ingin menghapus data barang {{ $item->nama_barang }}?')) { document.getElementById('delete-data-{{$item->id_barang}}').click(); }"
                                                class="btn btn-icon btn-round btn-danger btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Hapus"
                                            >
                                                <i class="fas fa-trash fa-sm"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
