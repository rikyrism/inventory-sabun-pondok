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
                    <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Jadwal Produksi</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('produksi.index') }}" class="text-white">Jadwal Produksi</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a>Data</a></li>
                    </ul>
                </div>
                @if (auth()->user()->role === 'Administrator')
                    <div class="ml-md-auto py-2 py-md-0">
                        <!-- tombol entri data -->
                        <a href="{{ route('produksi.create') }}" class="btn btn-secondary btn-round">
                            <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <!-- judul tabel -->
                <div class="card-title">Data Jadwal Produksi</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- tabel untuk menampilkan data dari database -->
                    <table id="basic-datatables" class="display table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">ID Produksi</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Status</th>
                                @if (auth()->user()->role === 'Administrator')
                                    <th class="text-center">Aksi</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data -->
                            @foreach ($produksis as $index => $item)
                                <tr>
                                    <td width="50" class="text-center">{{ $index + 1 }}</td>
                                    <td width="100" class="text-center">{{ $item->unique_id }}</td>
                                    <td width="200">{{ $item->nama_barang }}</td>
                                    <td width="80" class="text-right">{{ $item->jumlah }}</td>
                                    <td width="100">{{ $item->satuan }}</td>
                                    <td width="100" class="text-center">{{ $item->tanggal }}</td>
                                    <td width="100" class="text-center">{{ $item->status }}</td>

                                    @if (auth()->user()->role === 'Administrator')
                                        <td width="100" class="text-center">
                                            <div>
                                                <!-- tombol detail data -->
                                                <a href="{{ route('produksi.show', $item->id) }}" class="btn btn-icon btn-round btn-primary btn-sm mr-md-1" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="fas fa-clone fa-sm"></i>
                                                </a>
                                                <!-- tombol ubah data -->
                                                <a href="{{ route('produksi.edit', $item->id) }}" class="btn btn-icon btn-round btn-secondary btn-sm mr-md-1" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                                </a>
                                                <!-- tombol hapus data -->
                                                <form action="{{ route('produksi.destroy', $item->id) }}" method="POST" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" id="delete-data-{{$item->id}}">Delete</button>
                                                </form>

                                                <a href="#"
                                                    onclick="if (confirm('Anda yakin ingin menghapus data produksi {{ $item->nama_barang }}?')) { document.getElementById('delete-data-{{$item->id}}').click(); }"
                                                    class="btn btn-icon btn-round btn-danger btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus"
                                                >
                                                    <i class="fas fa-trash fa-sm"></i>
                                                </a>
                                            </div>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
