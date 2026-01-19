<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Distributor alat kesehatan meliputi Radiologi, Laboratorium, dan BMHP, serta layanan servis dan perawatan alat kesehatan." />
    <meta name="author" content="Alkeslab Primatama" />
    <meta name="keywords" content="Distributor alat kesehatan, Alat kesehatan Jakarta, Perusahaan alat medis, Radiologi rumah sakit, Peralatan radiologi, Alat laboratorium medis, Distributor BMHP, Barang medis habis pakai, Supplier alat laboratorium, Servis alat kesehatan, Jasa kalibrasi medis, Jasa perawatan alat, Maintenance alat kesehatan, Jasa teknisi medis, Peralatan medis lengkap, Distributor alat radiologi, Alat kesehatan klinik, Instalasi alat kesehatan, Supplier alat medis, Kalibrasi alat laboratorium, Servis alat laboratorium, Perawatan mesin medis, Perusahaan alat radiologi, Teknisi alat kesehatan, Pengadaan alat medis, Pemeriksaan alat kesehatan, Cek alat medis, Penjualan alat medis, Penyedia alat rumah sakit, Distributor klinik Jakarta, Instalasi radiologi medis, Peralatan laboratorium klinik, Barang habis pakai medis, Servis alat RS, Distributor medis terpercaya, Pemasok alat laboratorium, Maintenance alat laboratorium, Pengadaan BMHP, Alkes rumah sakit, Perusahaan alkes Jakarta, Instalasi peralatan medis, Teknisi peralatan laboratorium, Servis cepat alat medis, Kalibrasi alat RS, Jasa servis medis, Instalasi BMHP, Peralatan lab klinik, Peralatan diagnostik medis, Jasa pemasangan alat medis, Penyalur alat kesehatan, Sparepart alat kesehatan, Jual alat radiologi, Supplier alat BMHP, Perusahaan teknisi alkes, Layanan purna jual alkes, Pengiriman alat medis, Perawatan rutin alat medis, Sertifikasi alat medis, Solusi alat medis, Distributor alat kesehatan Jakarta">
    <title>Alkeslab Primatama - Distributor Alat Kesehatan PT Alkeslab Primatama | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('app') }}/assets/logo.png" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('app') }}/css/styles.css" rel="stylesheet" />
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WSSQP5VKY7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-WSSQP5VKY7');
    </script>

    @stack('css')
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        @include('template.navbar')
        <!-- Content -->
        @yield('content')
    </main>
    <!-- Footer-->
    @include('template.footer')

    <!-- Bootstrap core JS (Bootstrap 5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Include ScrollReveal library -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Core theme JS-->
    <script src="{{ asset('app') }}/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Tombol WhatsApp 1 -->
    <div id="whatsapp1" class="whatsapp-btn" title="Admin Alkeslab Primatama"
        onclick="window.open('https://wa.me/6282280848541', '_blank')">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- Tombol WhatsApp 2 -->
    <div id="whatsapp2" class="whatsapp-btn" title="Sales Alkeslab Primatama"
        onclick="window.open('https://wa.me/6282260895899', '_blank')">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="btn btn-primary" title="Go to top" onclick="scrollToTop()">
        <i class="fas fa-angle-up"></i>
    </button>


    @stack('js')

</body>

</html>
