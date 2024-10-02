@extends('layout.main')

@section('title', 'Edit Pertanyaan | SISUSANA')
@section('namepage', 'MANAJEMEN PERTANYAAN')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Edit Pertanyaan</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <form action="{{ route('manajemen-pertanyaan.exedit', $pertanyaan->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="defaultSelect">Grup</label>
                                        <div class="input-group p-0">
                                            <span class="input-group-text">
                                                <i class="icon-shuffle"></i>
                                            </span>
                                            <select name="select_grup" class="form-select form-control" id="defaultSelect">
                                                <option value="{{ $pertanyaan->grup_id }}">
                                                    {{ $pertanyaan->grup->nama_grup }}</option>
                                                @foreach ($grup as $data)
                                                    {{-- Menampilkan semua grup --}}
                                                    <option value="{{ $data->id }}">{{ $data->nama_grup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pertanyaan">Pertanyaan</label>
                                        <textarea class="form-control" name="pertanyaan" rows="5">{{ $pertanyaan->pertanyaan }}</textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <a href="/manajemen-pertanyaan" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
