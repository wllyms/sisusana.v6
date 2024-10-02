@extends('layout.main')

@section('title', 'Edit Grup | SISUSANA')
@section('namepage', 'MANAJEMEN GRUP')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Edit Grup</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <form action="{{ route('manajemen-grup.exedit', $grup->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Grup">Grup</label>
                                        <div class="input-group p-0">
                                            <span class="input-group-text">
                                                <i class="fas fa-layer-group"></i>
                                            </span>
                                            <input type="text" class="form-control" name="nama_grup" id="Grup"
                                                value="{{ $grup->nama_grup }}" aria-describedby="basic-addon1" />
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" id="edit"><i class="fa fa-save"></i> Simpan</button>
                        <a href="/manajemen-grup" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
