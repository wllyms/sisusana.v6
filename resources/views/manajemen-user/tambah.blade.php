@extends('layout.main')

@section('title', 'Tambah User | SISUSANA')
@section('namepage', 'MANAJEMEN USER')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manajemen-user.submit') }}" method="POST">
                            @csrf
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="username" id="Username"
                                            aria-describedby="basic-addon1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" name="password" id="Password"
                                            aria-describedby="basic-addon1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="NamaLengkap">Nama Lengkap</label>
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-note"></i>
                                        </span>
                                        <input type="text" class="form-control" name="nama_lengkap" id="NamaLengkap"
                                            aria-describedby="basic-addon1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" name="email" id="Email"
                                            aria-describedby="basic-addon1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="defaultSelect">Level Admin</label>
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-shuffle"></i>
                                        </span>
                                        <select class="form-select form-control" id="defaultSelect" name="level">
                                            <option value="Admin Biasa">Admin Biasa</option>
                                            <option value="Super Admin">Super Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">
                                    <span class="btn-label">
                                        <i class="fa fa-save"></i>
                                    </span>
                                    Simpan
                                </button>
                                <button class="btn btn-danger">
                                    <span class="btn-label">
                                        <i class="fa fa-times"></i>
                                    </span>
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
