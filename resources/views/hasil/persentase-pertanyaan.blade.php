@extends('layout.gmain')

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
                <div class="card-title">Grafik per Pertanyaan</div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <h6>Tampilkan Berdasarkan Tanggal</h6>

                    <form class="container-fluid justify-content-start" action="{{ url('/hasil/persentase-pertanyaan') }}" method="GET">
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
                                    value="{{ request('dtanggal') }}" 
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
                                    value="{{ request('stanggal') }}" 
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
                                    id="layanan" name="jlayanan">
                                    <option value="" disabled {{ request('layanan') ? '' : 'selected' }}>- Pilih Jenis Layanan -</option>
                                    <option value="Instalasi Rawat Jalan" {{ request('layanan') == 'Instalasi Rawat Jalan' ? 'selected' : '' }}>Instalasi Rawat Jalan</option>
                                    <option value="Instalasi Rawat Inap" {{ request('layanan') == 'Instalasi Rawat Inap' ? 'selected' : '' }}>Instalasi Rawat Inap</option>
                                    <option value="Penunjang Medik" {{ request('layanan') == 'Penunjang Medik' ? 'selected' : '' }}>Penunjang Medik</option>
                                    <option value="Instalasi Gawat Darurat" {{ request('layanan') == 'Instalasi Gawat Darurat' ? 'selected' : '' }}>Instalasi Gawat Darurat</option>
                                    <option value="Pendaftaran" {{ request('layanan') == 'Pendaftaran' ? 'selected' : '' }}>Pendaftaran</option>
                                    <option value="MCU" {{ request('layanan') == 'MCU' ? 'selected' : '' }}>MCU</option>
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
                Menampilkan Semua Data 
                <br>
                         Jumlah Responden : <b> {{ $totRespon }} Responden </b>
                <br><br>
           </div>
           <div class="container p-0 d-block">
            <div class="row">
              @foreach ($dataPersentase as $data)
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>{{ $data['pertanyaan']->pertanyaan }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="totSurvei{{ $data['pertanyaan']->id }}" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div>
                        <div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Data</th>
                                            <th scope="col">Sangat Baik</th>
                                            <th scope="col">Baik</th>
                                            <th scope="col">Cukup</th>
                                            <th scope="col">Buruk</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>Jumlah Jawaban</td>
                                            <td>{{ $data['jumlahA'] }}</td>
                                            <td>{{ $data['jumlahB'] }}</td>
                                            <td>{{ $data['jumlahC'] }}</td>
                                            <td>{{ $data['jumlahD'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Persentase</td>
                                            <td>{{ $data['persenA'] }}%</td>
                                            <td>{{ $data['persenB'] }}%</td>
                                            <td>{{ $data['persenC'] }}%</td>
                                            <td>{{ $data['persenD'] }}%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="ms-4">Nilai Rata-rata: {{ $data['rataRata'] }} %</p>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
@endsection