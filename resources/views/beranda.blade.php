@extends('layout.gmain')

@section('title','Beranda | SISUSANA')
@section('namepage','BERANDA')
@section('content')
<div class="page-inner">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-primary bubble-shadow-small">
                  {{-- <i class="fas fa-users"></i> --}}
                  <h2 class="text-white"><b>A</b></h2>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Sangat Baik</p>
                  <h4 class="card-title">{{ $jumlahA }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-info bubble-shadow-small">
                  {{-- <i class="fas fa-users"></i> --}}
                  <h2 class="text-white"><b>B</b></h2>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Baik</p>
                  <h4 class="card-title">{{ $jumlahB }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-warning bubble-shadow-small">
                  {{-- <i class="fas fa-users"></i> --}}
                  <h2 class="text-white"><b>C</b></h2>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Cukup</p>
                  <h4 class="card-title">{{ $jumlahC }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-danger bubble-shadow-small">
                  {{-- <i class="fas fa-users"></i> --}}
                  <h2 class="text-white"><b>D</b></h2>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Buruk</p>
                  <h4 class="card-title">{{ $jumlahD }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Responden</p>
                  <h4 class="card-title">{{ $totRespon }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Grafik Total Survei</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas
                id="totSurvei"
                style="width: 50%; height: 50%"
              ></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection