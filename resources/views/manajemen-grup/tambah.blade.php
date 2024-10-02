@extends('layout.main')

@section('title', 'Tambah Grup | SISUSANA')
@section('namepage', 'MANAJEMEN GRUP')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Grup</div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <form action="{{ route('manajemen-grup.submit') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="Grup">Grup</label>
                                        <div class="input-group p-0">
                                            <span class="input-group-text">
                                                <i class="fas fa-layer-group"></i>
                                            </span>
                                            <input type="text" class="form-control" name="nama_grup" id="Grup"
                                                aria-describedby="basic-addon1" value="{{ Session::get('nama_grup') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success"><i class="fa fa-save" id="tambah"></i> Simpan</button>
                        <a href="/manajemen-grup" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
