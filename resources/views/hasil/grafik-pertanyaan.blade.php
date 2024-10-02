@extends('layout.main')

@section('title','Grafik Per Pertanyaan | SISUSANA')
@section('namepage','HASIL KUISIONER')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-xl-12">
            <nav class="navbar bg-light">
                <form class="container-fluid justify-content-start">
                    <a href="/hasil/grafik-keseluruhan" class="btn btn-outline-secondary me-2">
                        Grafik Keseluruhan</a>
                    <a href="/hasil/grafik-pertanyaan" class="btn btn-outline-secondary me-2">
                        Grafik Per Pertanyaan</a>
                    <a href="/hasil/laporan" class="btn btn-outline-secondary me-2">
                        Laporan</a>
                </form>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Grafik per Unsur Pelayanan</div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <h6>Tampilkan Berdasarkan Tanggal</h6>
                    <div class="form-group">
                        <label for="Dtanggal">Dari Tanggal</label>
                        <div class="input-group p-0">
                            <span class="input-group-text">
                                <i class="icon-calendar"></i>
                            </span>
                            <input
                                type="date"
                                class="form-control"
                                name="dtanggal"
                                id="Dtanggal"
                                aria-describedby="basic-addon1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Stanggal">s/d Tanggal</label>
                        <div class="input-group p-0">
                            <span class="input-group-text">
                                <i class="icon-calendar"></i>
                            </span>
                            <input
                                type="date"
                                class="form-control"
                                name="stanggal"
                                id="Stanggal"
                                aria-describedby="basic-addon1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="layanan">Layanan</label>
                        <div class="input-group p-0">
                            <span class="input-group-text">
                                <i class="icon-shuffle"></i>
                            </span>
                            <select
                                class="form-select form-control"
                                id="layanan" name="layanan">
                                <option>Semua Layanan</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-secondary"><i class="fas fa-search"></i> Cari</button>
              </div>
            </div>
            <div class="alert alert-info" role="alert">
                Menampilkan Semua Data 
                <br>
                         Jumlah Responden : <b> 4722 Responden </b>
                <br><br>
           </div>
           <div class="container p-0">
                <div class="col-md-6">
                    <div class="card mt-4 ">
                        <div class="card-header">
                            <h5>Pertanyaan 1</h5>
                        </div>
                        <div class="card-body">
                            <h6>Persentase Jawaban Unsur Pelayanan</h6>
                            <div class="chart-container">
                            <canvas
                                id="totSurvei"
                                style="width: 50%; height: 50%"
                            ></canvas>
                            </div>
                        </div>
                        <div>
                            <div class="card-body">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Sangat Baik</th>
                                    <th scope="col">Baik</th>
                                    <th scope="col">Cukup</th>
                                    <th scope="col">Buruk</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Jumlah Jawaban</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                    <td>25</td>
                                  </tr>
                                  <tr>
                                    <td>Persentase</td>
                                    <td>25%</td>
                                    <td>25%</td>
                                    <td>25%</td>
                                    <td>25%</td>
                                  </tr>
                                </tbody>
                              </table>
                              <p class="ms-4">Nilai Rata-rata: 3.85 = 96.25%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection