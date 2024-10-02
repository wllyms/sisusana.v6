@extends('layout.main')

@section('title', 'Edit User | SISUSANA')
@section('namepage', 'MANAJEMEN USER')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 col-lg-6">
                            <form action="{{ route('manajemen-user.exedit', $user->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="username" id="Username"
                                            aria-describedby="basic-addon1" value="{{ $user->username }}" />
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
                                        aria-describedby="basic-addon1" value="{{ $user->password }}" />
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
                                        aria-describedby="basic-addon1" value="{{ $user->nama_lengkap }}" />
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
                                        aria-describedby="basic-addon1" value="{{ $user->email }}" />
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
                                    <select name="level" class="form-select form-control" id="defaultSelect">
                                        <option value="{{ $user->level }}">{{ $user->level }}
                                        </option>
                                        {{-- Menampilkan semua grup --}}
                                        <option value="Admin Biasa">Admin Biasa</option>
                                        <option value="Super Admin">Super Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                <span class="btn-label">
                                    <i class="fa fa-check"></i>
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
