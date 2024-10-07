<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Survei Kepuasan Pasien | SISUSANA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1>SISUSANA</h1>
        </a>


      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h2 data-aos="fade-down">Selamat Datang di SISUSANA</h2>
              <h3 class="text-white" data-aos="fade-up">aplikaSI SUrvei kepuaSAN pAsien</h3>
              <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Mulai Survei</a>
            </div>
          </div>
        </div>
      </div>

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/hero-carousel-1.jpg)">
        </div>
        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-2.jpg)"></div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

    </section><!-- End Hero Section -->

    <main id="main">

      <!-- ======= Constructions Section ======= -->
      <section id="get-started" class="constructions">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Survei Kepuasan Pasien</h2>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title text-center">Informasi Pasien</div>
                </div>
                <div class="card-body ">
                  <div class="row justify-content-center">
                    <form action="{{ route('survey.submit') }}" method="post">
                      
                      @csrf
                      <table class="table table-bordered">
                        <tr>
                          <td class="row justify-content-center">
                            <div class="col-xl-6 col-lg-4">
                              <div class="form-group">
                                <label for="usia">Usia</label>
                                <input type="text" class="form-control" id="usia" name="usia" placeholder="Usia (Tahun)" required/>
                              </div>
        
                              <div class="form-group">
                                <label for="select1">Jenis Pasien</label>
                                <select class="form-select" id="select1" name="jpasien" required>
                                  <option value="" disabled selected>- Pilih Jenis Pasien -</option>
                                  <option value="Umum (Masyarakat/Perusahaan)">Umum (Masyarakat/Perusahaan)</option>
                                  <option value="Dinas (Anggota PNS/Polri)">Dinas (Anggota PNS/Polri)</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="select2">Jenis Kelamin</label>
                                <select class="form-select" id="select2" name="jkelamin" required>
                                  <option value="" disabled selected>- Pilih Jenis Kelamin -</option>
                                  <option value="Pria">Pria</option>
                                  <option value="Wanita">Wanita</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="select3">Pendidikan</label>
                                <select class="form-select" id="select3" name="pendidikan" required>
                                  <option value="" disabled selected>- Pilih Pendidikan -</option>
                                  <option value="SD">SD</option>
                                  <option value="SMP">SMP</option>
                                  <option value="SMA">SMA</option>
                                  <option value="D3">D3</option>
                                  <option value="S1">S1</option>
                                  <option value="S2">S2</option>
                                  <option value="S3">S3</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="select4">Pekerjaan</label>
                                <select class="form-select" id="select4" name="pekerjaan" required>
                                  <option value="" disabled selected>- Pilih Pekerjaan -</option>
                                  <option value="SD">PNS</option>
                                  <option value="TNI">TNI</option>
                                  <option value="POLRI">POLRI</option>
                                  <option value="Swasta">Swasta</option>
                                  <option value="Wirausaha">Wirausaha</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="select5">Jenis Layanan Yang Diterima</label>
                                <select class="form-select" id="select5" name="jlayanan" required>
                                  <option value="" disabled selected>- Pilih Jenis Layanan -</option>
                                  <option value="Instalasi Rawat Jalan">Instalasi Rawat Jalan</option>
                                  <option value="Instalasi Rawat Inap">Instalasi Rawat Inap</option>
                                  <option value="Penunjang Medik">Penunjang Medik</option>
                                  <option value="Instalasi Gawat Darurat">Instalasi Gawat Darurat</option>
                                  <option value="Pendaftaran">Pendaftaran</option>
                                  <option value="MCU">MCU</option>
                                </select>
                              </div>
                              
                              <div class="form-group ">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ now()->format('d-m-Y') }}" readonly />
                              </div>
                              <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="row justify-content-center text-center bordered">
                              <br>
                              <b class="text-center">Mohon kesediaan Anda untuk memberikan 
                                penilaian dan masukan kepada RS Bhayangkara Banjarmasin, dimana hal ini sangat bermanfaat 
                                untuk meningkatkan kualitas layanan kami.
                              </b><br>
                              <p>
                                Silahkan diisi dengan mengklik option radio serta keterangan sesuai dengan penilaian Anda pada kolom yang telah disediakan
                              </p>
                              <br><br>
                            </td>
                        </tr>
                        <tr>
                          <td colspan="9">
                            <table class="table table-bordered">
                              <thead>
                                <th width='3%' ><b><font face='Arial'>No</font></b></th>
                                <th colspan='2'><p align='center'><b><font face='Arial'>DESKRIPSI</font></b></th>
                                <th colspan="4" bgcolor='#FFFF00'><p align='center'><font face='Arial'>KUALITAS</font></th>   
                              </thead>
                              @foreach ($grup as $no=>$item)
                                  
                              
                              <tbody>
                                <tr valign='top'> 
                                  <td><font face='Arial' colspan='1'><b>{{ $no+1 }}</b></font></td>
                                  <td colspan='2'><font face='Arial'><b>{{ $item->nama_grup }}</b></font></td>
    
                                  <td class="bg-dark" height='25' width='8%'><p align='center'><font face='Arial' color='white'>A<br>(Sangat Baik)</font></td>
                                  <td class="bg-dark" height='25' width='8%'><p align='center'><font face='Arial' color='white'>B<br>(Baik)</font></td>
                                  <td class="bg-dark" height='25' width='8%'><p align='center'><font face='Arial' color='white'>C<br>(Cukup)</font></td>
                                  <td class="bg-dark" height='25' width='8%'><p align='center'><font face='Arial' color='white'>D<br>(Buruk)</font></td>
                                </tr>
                                
                                @foreach ($pertanyaan as $data)
                                <tr>
                                    <td colspan='1'></td>
                                    
                                    <td colspan='2'><font face='Arial'>{{ $data->pertanyaan }}</font></td>

                                    <td align='center'> <input type='radio' name='jawaban[{{ $data->id }}]' value='A' required> </td>
                                    <td align='center'> <input type='radio' name='jawaban[{{ $data->id }}]' value='B' required> </td>
                                    <td align='center'> <input type='radio' name='jawaban[{{ $data->id }}]' value='C' required> </td>
                                    <td align='center'> <input type='radio' name='jawaban[{{ $data->id }}]' value='D' readonly> </td>
                                </tr>
                                @endforeach
                                <br> 
                              </tbody>
                              @endforeach
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="8">    
                            <div class="well">
                              <div class="form-group">
                                <label for="kritik">Kritik dan Saran</label>
                                <textarea name='kritik' class="form-control" rows="5" placeholder="Tulis Kritik dan Saran..." required></textarea>
                              </div>
                            </div>
                            <hr>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="card-action text-center">
                              <button class="btn btn-success">Simpan</button>
                          </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="97%" valign="top" align="center" colspan="5" style="border-style: none; border-width: medium">
                          <center class="well">
                          <p>Terima Kasih Atas Waktu dan Masukan yang anda berikan,Semua masukan yang anda berikan </p>
                          <p>akan kami terima sebagai sarana bagi kami untuk meningkatkan kulaitas pelanan kami</p>
                          </center>
                          </td>
                      </tr>
                      </table>
                    </form>

                    </div>
                  </div>
                <br>
                
                </div>
                
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Constructions Section -->

    </main><!-- End #main -->


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center bg-dark"><i
        class="bi bi-arrow-up-short"></i></a>

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

  
{{-- sweetalert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




{{-- JS Sweet Start --}}

@if (session('success'))
<script type="text/javascript">
    $(function() {
        Swal.fire({
            title: "Disimpan!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    });
</script>
@endif

{{-- sweetalert tambah --}}
<script type="text/javascript">
  $(function() {
      // Konfirmasi sebelum menyimpan
      $(document).on('click', '#tambah', function(e) {
          e.preventDefault();
          var form = $('#form-tambah-grup');
  
          Swal.fire({
              title: "Konfirmasi",
              text: "Apakah kamu yakin ingin menyimpan data ini?",
              icon: "question",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Ya, simpan",
              cancelButtonText: "Tidak"
          }).then((result) => {
              if (result.isConfirmed) {
                  // Submit form secara manual
                  form.submit();
              }
          });
      });
  });
</script>


{{-- sweetalert hapus --}}
<script type="text/javascript">
  $(function(){
    // Tombol Hapus
    $(document).on('click', '#hapus', function(e){
      e.preventDefault();
      var form = $(this).closest("form");

      Swal.fire({
        title: "Peringatan",
        text: "Apakah kamu yakin akan menghapus data ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#4CAF50",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Tidak"
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
          Swal.fire({
            title: "Terhapus!",
            text: "Data berhasil dihapus.",
            icon: "success"
          });
          
        }
      });
    });

  });
</script>

</body>

</html>