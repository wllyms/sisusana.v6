@extends('layout.main')

@section('title','Laporan | SISUSANA')
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
              <div class="card-header d-flex">
                <div class="card-title">Laporan <button class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Rekap Semua Kuisioner</button></div>
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
                <br>
                <b>Menampilkan Semua Hasil Survei</b>
                <br><br>
            </div>

            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table
                          id="basic-datatables"
                          class="display table table-striped table-hover">
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
                            <tr>
                              <td>1</td>
                              <td>8 Tahun</td>
                              <td>30 September 2024</td>
                              <td>IGD</td>
                              <div>
                                <td class="">
                                  <a href="/manajemen-pertanyaan/edit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                  </a>
                                  <a href="hapus.php" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                  </a>
                                </td>
                              </div>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>27</td>
                              <td>29 September 2024</td>
                              <td>IGD</td>
                              <div>
                                <td class="">
                                  <a href="/manajemen-pertanyaan/edit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                  </a>
                                  <a href="hapus.php" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                  </a>
                                </td>
                              </div>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="alert alert-info" role="alert">
                <br>
                        Jumlah Responden : <b> 4722 Responden </b>
                <br><br>
            </div>
        </div>
    </div>
@endsection