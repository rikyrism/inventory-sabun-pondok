@extends('layouts.app')
@section('content')
    @if (auth()->user()->role === 'Administrator')
        <div class="panel-header bg-secondary-gradient">
            <div class="page-inner py-45">
                <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                    <div class="page-header text-white">
                        <!-- judul halaman -->
                        <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Kategori</h4>
                        <!-- breadcrumbs -->
                        <ul class="breadcrumbs">
                            <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a>
                            </li>
                            <li class="separator"><i class="flaticon-right-arrow"></i></li>
                            <li class="nav-item"><a href="{{ route('kategori.index') }}" class="text-white">Kategori</a></li>
                            <li class="separator"><i class="flaticon-right-arrow"></i></li>
                            <li class="nav-item"><a>Detail</a></li>
                        </ul>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <!-- tombol kembali ke halaman data kategori -->
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary btn-round">
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
                            <div class="card-title">Detail Data Kategori</div>
                        </div>
                        <!-- detail data -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td>ID Kategori</td>
                                    <td>:</td>
                                    <td>{{ $kategori->id_kategori }}</td>
                                </tr>

                                <tr>
                                    <td>Nama Kategori</td>
                                    <td>:</td>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang</td>
                                    <td>:</td>
                                    <td>{{ $kategori->barangs()->count() }}</td>
                                </tr>
                            </table>
                        </div>
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
                                    <th class="text-center">Ukuran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tampilkan data -->
                                @foreach ($kategori->barangs as $index => $item)
                                    <tr>
                                        <td width="50" class="text-center">{{ $index + 1 }}</td>
                                        <td width="100" class="text-center">{{ $item->id_barang }}</td>
                                        <td width="200">{{ $item->nama_barang }}</td>
                                        <td width="200">{{ $item->kategoriTable->nama_kategori }}</td>
                                        <td width="80" class="text-right">{{ $item->stok }}</td>
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

