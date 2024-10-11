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
                    <div class="card-title text-center text-white d-flex justify-content-between align-items-center ">
                        <a href="/hasil/laporan" class="btn btn-primary  text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                            Detail Laporan 
                        <a href="{{ route('survey.cetakdetail', $survey->id) }}" class="btn btn-primary  text-white"><i class="fas fa-print"></i> Cetak</a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row justify-content-center">
                        <div class="card-body">
                            <div class="card-sub">
                              <p>Usia : {{ $survey->usia }}</p>
                              <p>Jenis Pasien : {{ $survey->jpasien }}</p>
                              <p>Jenis Kelamin : {{ $survey->jkelamin }}</p>
                              <p>Pendidikan : {{ $survey->pendidikan }}</p>
                              <p>Pekerjaan : {{ $survey->pekerjaan }}</p>
                              <p>Jenis Layanan : {{ $survey->jlayanan }}</p>
                              <p>Tanggal Survey : {{ $survey->tanggal }}</p>
                              <p>Kritik : {{ $survey->kritik }}</p>
                            </div>
                            <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" >
                              <thead>
                                <tr class="text-center">
                                  <th scope="col">No</th>
                                  <th scope="col">Pertanyaan</th>
                                  <th scope="col">Sangat Baik</th>
                                  <th scope="col">Baik</th>
                                  <th scope="col">Cukup</th>
                                  <th scope="col">Buruk</th>
                                </tr>
                              </thead>
                              <tbody>
            
                                @foreach ($jawaban as $no => $data)
                                <tr class="text-center">
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $data->pertanyaan->pertanyaan }}</td>
                                    <td>{{ $data->jawaban == 'A' ? '✔' : '' }}</td>
                                    <td>{{ $data->jawaban == 'B' ? '✔' : '' }}</td>
                                    <td>{{ $data->jawaban == 'C' ? '✔' : '' }}</td>
                                    <td>{{ $data->jawaban == 'D' ? '✔' : '' }}</td>
                                </tr> 
                                @endforeach
            
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


</body>

</html>