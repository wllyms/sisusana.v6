@extends('layout.main')

@section('title', 'Manajemen Grup | SISUSANA')
@section('namepage', 'MANAJEMEN GRUP')
@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <a href="/tambah-grup/tambah" class="btn btn-primary">
                    <i class="fas fa-layer-group"></i> Tambah Grup
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grup</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Grup</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grup as $no => $data)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $data->nama_grup }}</td>
                                            <div>
                                                <td class="d-flex">
                                                    <a href="{{ route('manajemen-grup.edit', $data->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pen"></i> Edit
                                                    </a>
                                                    <form action="{{ route('manajemen-grup.hapus', $data->id) }}"
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
