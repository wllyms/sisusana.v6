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
    /* Tambahkan gaya CSS yang sesuai untuk tampilan cetak */
        @media print {
            .no-print {
                display: none;
            }
        }
        .table-bordered {
            border: 1px solid black !important; /* Atur ketebalan dan warna dengan !important */
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid black !important; /* Border untuk sel */
        }
    </style>
    <script>
        // Otomatis memanggil print ketika halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>

</head>

<body>
    <div class="container mt-4">
        <br>
        <h2 class="text-center">Laporan Detail Survei</h2>
        <br>
        <p>Dicetak : <b>{{ $tanggalWaktu }}</b></p>
        <br>
        <p>Usia: {{ $survey->usia }}</p>
        <p>Jenis Pasien: {{ $survey->jpasien }}</p>
        <p>Jenis Kelamin: {{ $survey->jkelamin }}</p>
        <p>Pendidikan: {{ $survey->pendidikan }}</p>
        <p>Pekerjaan: {{ $survey->pekerjaan }}</p>
        <p>Jenis Layanan: {{ $survey->jlayanan }}</p>
        <p>Tanggal Survey: {{ $survey->tanggal }}</p>
        <p>Kritik: {{ $survey->kritik }}</p>
        <br><br>
        <table class="table table-bordered">
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
                @foreach ($jawaban as $no => $jawab)
                    <tr class="text-center">
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $jawab->pertanyaan->pertanyaan }}</td>
                        <td>{{ $jawab->jawaban == 'A' ? '✔' : '' }}</td>
                        <td>{{ $jawab->jawaban == 'B' ? '✔' : '' }}</td>
                        <td>{{ $jawab->jawaban == 'C' ? '✔' : '' }}</td>
                        <td>{{ $jawab->jawaban == 'D' ? '✔' : '' }}</td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>