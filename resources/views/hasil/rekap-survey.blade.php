<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cetak | SISUSANA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link
      rel="icon"
      href="{{asset('assets')}}/img/logo-rs.png"
      type="image/x-icon"
    />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('assets')}}/css/plugins.min.css" />
  <link rel="stylesheet" href="{{asset('assets')}}/css/kaiadmin.min.css" />

  <!-- Template Main CSS File -->
  <link href="{{asset('assets')}}/css/main.css" rel="stylesheet">

   <!-- CSS Just for demo purpose, don't include it in your project -->
   <link rel="stylesheet" href="{{asset('assets')}}/css/demo.css" />

   <style>
    .table-bordered {
          border: 1px solid black !important; /* Atur ketebalan dan warna dengan !important */
      }
      .table-bordered th,
      .table-bordered td {
          border: 1px solid black !important; /* Border untuk sel */
      }
  </style>
</head>

<body>
  <div class="wrapper">

    <main id="main">

      <!-- ======= Constructions Section ======= -->
      <section id="get-started" class="constructions">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-primary rounded">
                    <div class="card-title text-center text-white d-flex justify-content-between align-items-center">
                        <a href="/hasil/laporan" class="btn btn-primary  text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                            Rekap Semua Kuisioner
                        <div class="btn-group dropdown">
                          <button class="btn btn-primary dropdown-toggle text-white" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-print"></i>
                            Cetak
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                  <a class="dropdown-item" href="{{ route('export.survey-pdf') }}">PDF</a>
                                  <a class="dropdown-item" href="{{ route('export.survey-excel') }}" >Excel</a>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row justify-content-center">
                        <div class="card-body">
                            <table class="table table-bordered mt-4" >
                                <tr class="text-center bg-info">
                                    <td rowspan="2"><b>No. Responden</b></td>
                                    <td rowspan='2'><b>Layanan</b></td>
                                    <td colspan='9'><b>Nilai Unsur Pelayanan</b></td>
                                    <td rowspan='2'><b></b></td> </tr>
                                    <tr class="text-center bg-info">
                                    @foreach ($pertanyaan as $no=>$data)
                                      <td><b>U{{ $no+1 }}</b></td>
                                    @endforeach
                                <tr>
                              <tbody>
            
                                @foreach ($survey as $no => $data)
                                <tr class="text-center">
                                  <td>{{ $no + 1 }}</td>
                                  <td>{{ $data->jlayanan }}</td>
                                  @foreach ($data->jawaban as $jawab)
                                      <td>{{ $jawab->jawaban }}</td>
                                      @endforeach
                                    </tr>
                                @endforeach

                                <tr class="bg-info text-center">
                                    <td colspan='2'><b> Nilai/Unsur</b></td>
                                    @foreach ($pertanyaan as $data)
                                        <td><b>{{ $totalNilaiPerPertanyaan[$data->id] ?? 0 }}</b></td>
                                    @endforeach
                                </tr>

                                <tr class="bg-info text-center">
                                    <td colspan='2'><b>NRR/Unsur</b></td>
                                    @foreach ($pertanyaan as $data)
                                        <td><b>{{ number_format($NRRPerPertanyaan[$data->id] ?? 0, 3) }}</b></td>
                                    @endforeach
                                </tr>
                                <tr class="bg-info text-center">
                                    <td colspan='2'><b>NRR Tertimbang/Unsur</b></td>
                                    @foreach ($pertanyaan as $data)
                                        <td><b>{{ number_format(($NRRTertimbangPerPertanyaan[$data->id] ?? 1)/100, 3) }}</b></td>
                                    @endforeach
                                    <td colspan="9"><b>{{ number_format($totalNRRTertimbang, 3) }}</b></td>
                                </tr>
                                <tr class="bg-info text-center">
                                    <td colspan='11'><b>IKM Unit Pelayanan</b></td>
                                    <td><b>{{ number_format(array_sum($IKMPerPertanyaan),1 ) }}</b></td>
                                </tr>
            
                              </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Constructions Section -->

    </main><!-- End #main -->


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center bg-dark"><i
        class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>
  </div>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>

  <!--   Core JS Files   -->
  <script src="{{asset('assets')}}/js/core/jquery-3.7.1.min.js"></script>
  <script src="{{asset('assets')}}/js/core/popper.min.js"></script>
  <script src="{{asset('assets')}}/js/core/bootstrap.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="{{asset('assets')}}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Chart JS -->
  <script src="{{asset('assets')}}/js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="{{asset('assets')}}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="{{asset('assets')}}/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="{{asset('assets')}}/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="{{asset('assets')}}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- jQuery Vector Maps -->
  <script src="{{asset('assets')}}/js/plugin/jsvectormap/jsvectormap.min.js"></script>
  <script src="{{asset('assets')}}/js/plugin/jsvectormap/world.js"></script>

  <!-- Google Maps Plugin -->
  <script src="{{asset('assets')}}/js/plugin/gmaps/gmaps.js"></script>

  <!-- Sweet Alert -->
  <script src="{{asset('assets')}}/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Kaiadmin JS -->
  <script src="{{asset('assets')}}/js/kaiadmin.min.js"></script>

  
  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="{{asset('assets')}}/js/setting-demo2.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets')}}/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>