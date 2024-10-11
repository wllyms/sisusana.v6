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
        window.onload = function() {
            window.location.href = "{{ route('export.survey-pdf') }}";
        };
    </script>

</head>

<body>
    <div class="container mt-4">
        <br>
        <h1 class="text-center">SISUSANA</h1>
        <h2 class="text-center">Laporan Rekap Semua Kuisioner</h2>
        <br>
        <table class="table table-bordered mt-4">
            <thead>
                <tr class="text-center bg-info">
                    <th>No. Responden</th>
                    <th>Layanan</th>
                    @foreach ($pertanyaan as $no => $data)
                        <th>U{{ $no+1 }}</th>
                    @endforeach
                </tr>
            </thead>
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
        
                <tr class="bg-info">
                    <td colspan='2'>Nilai/Unsur</td>
                    @foreach ($pertanyaan as $data)
                        <td>{{ $totalNilaiPerPertanyaan[$data->id] ?? 0 }}</td>
                    @endforeach
                </tr>
        
                <tr class="bg-info">
                    <td colspan='2'>NRR/Unsur</td>
                    @foreach ($pertanyaan as $data)
                        <td>{{ number_format($NRRPerPertanyaan[$data->id] ?? 0, 3) }}</td>
                    @endforeach
                </tr>
        
                <tr class="bg-info">
                    <td colspan='2'>NRR Tertimbang/Unsur</td>
                    @foreach ($pertanyaan as $data)
                        <td>{{ number_format(($NRRTertimbangPerPertanyaan[$data->id] ?? 1)/100, 3) }}</td>
                    @endforeach
                    <td>{{ number_format($totalNRRTertimbang, 3) }}</td>
                </tr>
        
                <tr class="bg-info">
                    <td colspan='5'>IKM Unit Pelayanan</td>
                    <td>{{ number_format(array_sum($IKMPerPertanyaan), 1) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    
</body>

</html>