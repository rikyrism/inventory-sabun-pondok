@extends('layouts.app')
@section('content')
    @if (auth()->user()->role === 'Administrator')
    <div class="panel-header bg-secondary-gradient">
        <div class="page-inner py-45">
            <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                <div class="page-header text-white">
                    <!-- judul halaman -->
                    <h4 class="page-title text-white"><i class="fas fa-sign-out-alt mr-2"></i> Barang Keluar</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('barang-keluar.index') }}" class="text-white">Barang Keluar</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a>Data</a></li>
                    </ul>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <!-- tombol entri data -->
                    <a href="{{ route('barang-keluar.create') }}" class="btn btn-secondary btn-round">
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
                <div class="card-title">Data Barang Keluar</div>
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
                                <th class="text-center">Varian</th>
                                <th class="text-center">Jumlah Keluar</th>
                                <th class="text-center">Ukuran</th>
                                <th class="text-center">Penerima Keluar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data -->
                            @foreach ($barang_keluars as $index => $item)
                                <tr>
                                    <td width="50" class="text-center">{{ $index + 1 }}</td>
                                    <td width="100" class="text-center">{{ $item->id_keluar }}</td>
                                    <td width="200" class="text-center">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                    <td width="200" class="text-center">{{ $item->barangTable->id_barang }} - {{ $item->barangTable->nama_barang }}</td>
                                    <td width="100" class="text-center">{{ $item->barangTable->nama_varian }}</td>
                                    <td width="100" class="text-center">{{ $item->jumlah }}</td>
                                    <td width="100" class="text-center">{{ $item->barangTable->ukuran }} ml</td>
                                    <td width="100" class="text-center">{{ $item->penerima_keluar }}</td>
                                    <td width="100" class="text-center">
                                        <div>
                                            <!-- tombol hapus data -->
                                            <form action="{{ route('barang-keluar.destroy', $item->id_keluar) }}" method="POST" style="display:none;" data-item-name="{{ $item->barangTable->nama_barang }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" id="delete-data-{{$item->id_keluar}}">Delete</button>
                                            </form>

                                            <a href="#"
                                                onclick="event.preventDefault(); showDeleteConfirmPopup('Anda yakin ingin menghapus data barang keluar {{ $item->barangTable->nama_barang }}?', function() { document.getElementById('delete-data-{{$item->id_keluar}}').click(); });"
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
