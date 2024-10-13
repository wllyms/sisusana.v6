@extends('layout.gmain')

@section('title', 'Laporan | SISUSANA')
@section('namepage', 'HASIL KUISIONER')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-xl-12">
                <nav class="navbar bg-light">
                    <form class="container-fluid justify-content-start">
                        <a href="/hasil/grafik-keseluruhan" class="btn btn-outline-secondary me-2">
                            Grafik Keseluruhan</a>
                        <a href="/hasil/persentase-pertanyaan" class="btn btn-outline-secondary me-2">
                            Grafik per Pertanyaan</a>
                        <a href="/hasil/laporan" class="btn btn-outline-secondary me-2">
                            Laporan</a>
                    </form>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Laporan
                            <a href="/rekapkritik" class="btn btn-primary btn-sm text-white" style="margin-left: 720px"><i
                                    class="fas fa-print"></i> Rekap Kritik dan Saran</a>
                            <a href="/rekapsurvey" class="btn btn-primary btn-sm text-white" style="margin-left: 5px"><i
                                    class="fas fa-print"></i> Rekap Semua Kuisioner</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <h6>Tampilkan Berdasarkan Tanggal</h6>

                                <form action="{{ route('hasil.tampillaporan') }}" method="GET">
                                    <!-- atau method POST jika diperlukan -->
                                    <div class="form-group">
                                        <label for="Dtanggal">Dari Tanggal</label>
                                        <div class="input-group p-0">
                                            <span class="input-group-text">
                                                <i class="icon-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" name="dtanggal" id="Dtanggal"
                                                value="{{ request('dtanggal') }}" aria-describedby="basic-addon1" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Stanggal">s/d Tanggal</label>
                                        <div class="input-group p-0">
                                            <span class="input-group-text">
                                                <i class="icon-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" name="stanggal" id="Stanggal"
                                                value="{{ request('stanggal') }}" aria-describedby="basic-addon1" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="layanan">Layanan</label>
                                        <div class="input-group p-0">
                                            <span class="input-group-text">
                                                <i class="icon-shuffle"></i>
                                            </span>
                                            <select name="layanan" id="layanan" class="form-select form-control">
                                                <option value="" disabled selected>-Pilih Jenis Layanan-</option>
                                                <option value="Instalasi Rawat Jalan">Instalasi Rawat Jalan</option>
                                                <option value="Instalasi Rawat Inap">Instalasi Rawat Inap</option>
                                                <option value="Penunjang Medik">Penunjang Medik</option>
                                                <option value="Instalasi Gawat Darurat">Instalasi Gawat Darurat</option>
                                                <option value="Pendaftaran">Pendaftaran</option>
                                                <option value="MCU">MCU</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-secondary"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-info" role="alert">
                    <br>
                    <b>Menampilkan Semua Hasil Survei</b>
                    <br><br>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <td>No</td>
                                                <td>Usia Responden</td>
                                                <td>Tanggal Isi Survei</td>
                                                <td>Jenis Layanan</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($survey as $no => $data)
                                                <tr class="text-center">
                                                    <td>{{ $no + 1 }}</td>
                                                    <td>{{ $data->usia }}</td>
                                                    <td>{{ $data->tanggal }}</td>
                                                    <td>{{ $data->jlayanan }}</td>
                                                    <div>
                                                        <td class="d-flex">
                                                            <a href="{{ route('survey.detail', $data->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye"></i> Detail
                                                            </a>
                                                            <form action="{{ route('survey.hapus', $data->id) }}"
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

                <div class="alert alert-info" role="alert">
                    <br>
                    Jumlah Responden : <b> {{ $totRespon }} Responden </b>
                    <br><br>
                </div>
            </div>
        </div>



    @endsection
