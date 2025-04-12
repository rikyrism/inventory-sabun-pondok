@extends('layouts.app')
@section('content')
    @if (auth()->user()->role === 'Administrator')
    <div id="pesan"></div>
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
                        <li class="nav-item"><a>Entri</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <!-- judul form -->
                <div class="card-title">Entri Data Barang Keluar</div>
            </div>
            <!-- form entri data -->
            <form action="{{ route('barang-keluar.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>ID Keluar <span class="text-danger">*</span></label>
                                <!-- tampilkan "id_barang" -->
                                <input type="text" name="id_keluar" class="form-control" value="{{ $unique_id }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-5 ml-auto">
                            <div class="form-group">
                                <label>Tanggal <span class="text-danger">*</span></label>
                                <input type="text" name="tanggal" class="form-control date-picker" value="{{ date("d-m-Y") }}" autocomplete="off" required>
                                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="mt-3 mb-4">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Barang <span class="text-danger">*</span></label>
                                <select id="barang_id" name="barang" class="form-control chosen-select" autocomplete="off" required>
                                    <option selected disabled value="">-- Pilih --</option>
                                    @foreach ($barangs as $item)
                                        <option value="{{ $item->id_barang }}">{{ $item->id_barang }} - {{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Barang tidak boleh kosong.</div>
                                @error('barang_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stok <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="data_stok" name="stok" class="form-control" readonly>
                                    <div id="data_satuan" class="input-group-append"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 ml-auto">
                            <div class="form-group">
                                <label>Jumlah Keluar<span class="text-danger">*</span></label>
                                <input type="text" id="jumlah" name="jumlah" class="form-control" autocomplete="off" required>
                                <div class="invalid-feedback">Jumlah masuk tidak boleh kosong.</div>
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Total Stok <span class="text-danger">*</span></label>
                                <input type="text" id="total" name="total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Penerima Keluar <span class="text-danger">*</span></label>
                                <input type="text" name="penerima_keluar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <!-- tombol simpan data -->
                        <input type="submit" name="simpan" value="Simpan"
                            class="btn btn-secondary btn-round pl-4 pr-4 mr-2">
                        <!-- tombol kembali ke halaman data barang -->
                        <a href="{{ route('barang-keluar.index') }}" class="btn btn-default btn-round pl-4 pr-4">Batal</a>
                    </div>
            </form>
        </div>
    </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            const barangs = @json($barangs)

            $('#barang_id').change(function() {
                let barang_id = $('#barang_id').val();
                let barang = barangs.filter((item) => item.id_barang === barang_id)

                if (barang.length > 0) {
                    barang = barang[0]

                    $('#data_stok').val(barang.stok)
                    $('#data_satuan').html('<span class="input-group-text">' + barang.satuan + '</span>')
                    // set focus
                    $('#jumlah').focus()
                }
            })

            // menghitung total stok
            $('#jumlah').keyup(function() {
                // mengambil data dari form entri
                var stok = $('#data_stok').val();
                var jumlah = $('#jumlah').val();

                // mengecek input data
                // jika data barang belum diisi
                if (stok == "") {
                    // tampilkan pesan info
                    $('#pesan').html('<div class="alert alert-notify alert-info alert-dismissible fade show" role="alert"><span data-notify="icon" class="fas fa-info"></span><span data-notify="title" class="text-info">Info!</span> <span data-notify="message">Silahkan isi data barang terlebih dahulu.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    // reset input "jumlah"
                    $('#jumlah').val('');
                    // total stok kosong
                    var total_stok = "";
                }
                // jika "jumlah" belum diisi
                else if (jumlah == "") {
                    // total stok kosong
                    var total_stok = "";
                }
                // jika "jumlah" diisi 0
                else if (eval(jumlah) > eval(stok)) {
                    // tampilkan pesan peringatan
                    $('#pesan').html('<div class="alert alert-notify alert-warning alert-dismissible fade show" role="alert"><span data-notify="icon" class="fas fa-exclamation"></span><span data-notify="title" class="text-warning">Peringatan!</span> <span data-notify="message">Stok tidak memenuhi, kurangi jumlah keluar.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    // reset input "jumlah"
                    $('#jumlah').val('');
                    // total stok kosong
                    var total_stok = "";
                }
                // jika "jumlah" sudah diisi
                else {
                    // hitung total stok
                    var total_stok = eval(stok) - eval(jumlah);
                }

                // tampilkan total stok
                $('#total').val(total_stok);
            });
        });
    </script>
@endpush
