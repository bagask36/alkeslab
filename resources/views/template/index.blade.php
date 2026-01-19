<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Distributor alat kesehatan meliputi Radiologi, Laboratorium, dan BMHP, serta layanan servis dan perawatan alat kesehatan." />
    <meta name="author" content="Alkeslab Primatama" />
    <meta name="keywords" content="Distributor alat kesehatan, Alat kesehatan Jakarta, Perusahaan alat medis, Radiologi rumah sakit, Peralatan radiologi, Alat laboratorium medis, Distributor BMHP, Barang medis habis pakai, Supplier alat laboratorium, Servis alat kesehatan, Jasa kalibrasi medis, Jasa perawatan alat, Maintenance alat kesehatan, Jasa teknisi medis, Peralatan medis lengkap, Distributor alat radiologi, Alat kesehatan klinik, Instalasi alat kesehatan, Supplier alat medis, Kalibrasi alat laboratorium, Servis alat laboratorium, Perawatan mesin medis, Perusahaan alat radiologi, Teknisi alat kesehatan, Pengadaan alat medis, Pemeriksaan alat kesehatan, Cek alat medis, Penjualan alat medis, Penyedia alat rumah sakit, Distributor klinik Jakarta, Instalasi radiologi medis, Peralatan laboratorium klinik, Barang habis pakai medis, Servis alat RS, Distributor medis terpercaya, Pemasok alat laboratorium, Maintenance alat laboratorium, Pengadaan BMHP, Alkes rumah sakit, Perusahaan alkes Jakarta, Instalasi peralatan medis, Teknisi peralatan laboratorium, Servis cepat alat medis, Kalibrasi alat RS, Jasa servis medis, Instalasi BMHP, Peralatan lab klinik, Peralatan diagnostik medis, Jasa pemasangan alat medis, Penyalur alat kesehatan, Sparepart alat kesehatan, Jual alat radiologi, Supplier alat BMHP, Perusahaan teknisi alkes, Layanan purna jual alkes, Pengiriman alat medis, Perawatan rutin alat medis, Sertifikasi alat medis, Solusi alat medis, Distributor alat kesehatan Jakarta">
    <title>Alkeslab Primatama - Distributor Alat Kesehatan PT Alkeslab Primatama | @yield('title')</title>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('app/assets/logo.png') }}" />
    
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('new-template/css/styles.css') }}" rel="stylesheet" />
    
    <!-- Custom CSS from old template if needed -->
    <link href="{{ asset('app/css/styles.css') }}" rel="stylesheet" />
    
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
<body id="page-top">
    <!-- Navigation-->
    @include('template.navbar')
    
    <!-- Content -->
    @yield('content')
    
    <!-- Footer-->
    @include('template.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    
    <!-- Core theme JS-->
    <script src="{{ asset('new-template/js/scripts.js') }}"></script>
    
    <!-- ScrollReveal library -->
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <!-- Custom JS from old template -->
    <script src="{{ asset('app/js/scripts.js') }}"></script>
    
    <!-- SweetAlert2 -->
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
