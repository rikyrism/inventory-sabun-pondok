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
                <h4 class="page-title text-white"><i class="fas fa-user-lock mr-2"></i> Password</h4>
                <!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('dashboard') }}"><i class="flaticon-home text-white"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a>Password</a></li>
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
            <div class="card-title">Ubah Password</div>
        </div>
        <!-- form entri data -->
        <form action="{{ route('profile.update-password') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Password Lama <span class="text-danger">*</span></label>
                            <input type="password" name="current_password" class="form-control" autocomplete="off" required>
                            <div class="invalid-feedback">Password lama tidak boleh kosong.</div>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" autocomplete="off" required>
                            <div class="invalid-feedback">Password baru tidak boleh kosong.</div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" autocomplete="off" required>
                            <div class="invalid-feedback">Konfirmasi password baru tidak boleh kosong.</div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <!-- tombol simpan data -->
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-secondary btn-round pl-4 pr-4 mr-2">
                </div>
        </form>
    </div>
</div>


@endsection
