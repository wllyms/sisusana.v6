@extends('layout.main')

@section('title', 'Manajemen User | SISUSANA')
@section('namepage', 'MANAJEMEN USER')
@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <a href="/manajemen-user/tambah" class="btn btn-primary">
                    <i class="icon-user-follow"></i> Tambah User
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <td>No</td>
                                        <td>Username</td>
                                        <td>Nama Lengkap</td>
                                        <td>Email</td>
                                        <td>Level</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $no => $data)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $data->username }}</td>
                                            <td>{{ $data->nama_lengkap }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->level }}</td>
                                            <div>
                                                <td class="d-flex">
                                                    <a href="{{ route('manajemen-user.edit', $data->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pen"></i> Edit
                                                    </a>
                                                    <form action="{{ route('manajemen-user.hapus', $data->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm ms-1" id="hapus">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
