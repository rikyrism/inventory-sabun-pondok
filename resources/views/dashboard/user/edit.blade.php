@extends('layouts.app')
@section('content')
    <div class="panel-header bg-secondary-gradient">
        <div class="page-inner py-45">
            <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
                <div class="page-header text-white">
                    <!-- judul halaman -->
                    <h4 class="page-title text-white"><i class="fas fa-user mr-2"></i> Manajemen User</h4>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('user.index') }}" class="text-white">User</a></li>
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
                <div class="card-title">Ubah Data User</div>
            </div>
            <!-- form entri data -->
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Nama User <span class="text-danger">*</span></label>
                                <input type="text" name="nama_user" class="form-control" autocomplete="off" value="{{ $user->nama_user }}" required>
                                <div class="invalid-feedback">Nama user tidak boleh kosong.</div>
                                @error('nama_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" autocomplete="off" value="{{ $user->username }}" required>
                                <div class="invalid-feedback">Username tidak boleh kosong.</div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Kosongkan password jika tidak diubah">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Hak Akses <span class="text-danger">*</span></label>
                                <select name="hak_akses" class="form-control chosen-select" autocomplete="off" required>
                                    <option disabled value="">-- Pilih --</option>
                                    <option value="Administrator" {{ $user->role === 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                    <option value="Kepala Produksi" {{ $user->role === 'Kepala Produksi' ? 'selected' : '' }}>Kepala Produksi</option>
                                </select>
                                <div class="invalid-feedback">Hak akses tidak boleh kosong.</div>
                                @error('role')
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
                        <!-- tombol kembali ke halaman data user -->
                        <a href="{{ route('user.index') }}" class="btn btn-default btn-round pl-4 pr-4">Batal</a>
                    </div>
            </form>
        </div>
    </div>

@endsection
