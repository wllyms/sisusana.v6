@extends('layout.gmain')

@section('title','Grafik Keseluruhan | SISUSANA')
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
                    Persentase Pertanyaan</a>
                <a href="/hasil/laporan" class="btn btn-outline-secondary me-2">
                    Laporan</a>
                </form>
            </nav>
            <div class="card mt-4">
              <div class="card-header">
                <div class="card-title">Hasil Grafik Keseluruhan</div>
              </div>
              <div class="card-body">
                <div class="chart-container">
                  <canvas
                    id="totSurvei"
                    style="width: 50%; height: 50%"
                  ></canvas>
                </div>
              </div>
              <div>
                <div class="card-header">
                  <h5>Jumlah Responden : {{ $totRespon }} orang</h5>
                </div>
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
                        <td>{{ $jumlahA }}</td>
                        <td>{{ $jumlahB }}</td>
                        <td>{{ $jumlahC }}</td>
                        <td>{{ $jumlahD }}</td>
                      </tr>
                      <tr>
                        <td>Persentase</td>
                        <td>{{ $persenA }}%</td>
                        <td>{{ $persenB }}%</td>
                        <td>{{ $persenC }}%</td>
                        <td>{{ $persenD }}%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection



        

        

