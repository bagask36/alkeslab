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
    
    <!-- Google fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
    
    <style>
        /* WhatsApp Buttons - Fixed Position */
        .whatsapp-btn {
            position: fixed;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            z-index: 999;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid white;
        }
        
        .whatsapp-btn:hover {
            transform: scale(1.15) translateY(-3px);
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
        }
        
        .whatsapp-btn:active {
            transform: scale(1.05);
        }
        
        /* WhatsApp Button 1 - Admin (atas) */
        #whatsapp1 {
            bottom: 180px;
        }
        
        /* WhatsApp Button 2 - Sales (tengah) */
        #whatsapp2 {
            bottom: 100px;
        }
        
        /* Back to Top Button */
        #back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            box-shadow: 0 4px 20px rgba(30, 48, 243, 0.4);
            cursor: pointer;
            z-index: 999;
            display: none;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid white;
            padding: 0;
        }
        
        #back-to-top:hover {
            background: linear-gradient(135deg, #1a28d9 0%, #1e30f3 100%);
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(30, 48, 243, 0.6);
        }
        
        #back-to-top:active {
            transform: translateY(-2px);
        }
        
        #back-to-top.show {
            display: flex;
        }
        
        #back-to-top i {
            line-height: 1;
        }
        
        /* Responsive - Tablet */
        @media (max-width: 768px) {
            .whatsapp-btn {
                width: 55px;
                height: 55px;
                font-size: 24px;
                right: 20px;
            }
            
            #whatsapp1 {
                bottom: 160px;
            }
            
            #whatsapp2 {
                bottom: 90px;
            }
            
            #back-to-top {
                width: 45px;
                height: 45px;
                font-size: 18px;
                right: 20px;
                bottom: 20px;
            }
        }
        
        /* Responsive - Mobile */
        @media (max-width: 576px) {
            .whatsapp-btn {
                width: 50px;
                height: 50px;
                font-size: 22px;
                right: 15px;
            }
            
            #whatsapp1 {
                bottom: 140px;
            }
            
            #whatsapp2 {
                bottom: 80px;
            }
            
            #back-to-top {
                width: 40px;
                height: 40px;
                font-size: 16px;
                right: 15px;
                bottom: 15px;
            }
        }
        
        /* Ensure buttons don't overlap with footer on mobile */
        @media (max-width: 991.98px) {
            .whatsapp-btn,
            #back-to-top {
                z-index: 1050;
            }
        }
        
        /* Global Font - Poppins */
        :root {
            --bs-font-sans-serif: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;
            --bs-body-font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;
            --bs-btn-font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;
        }
        
        * {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
        }
        
        body,
        html {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
        }
        
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6,
        .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
        }
        
        .navbar,
        .nav-link,
        .navbar-brand,
        .btn,
        button,
        input,
        textarea,
        select,
        label,
        .form-control,
        .form-label,
        .card,
        .card-title,
        .card-text,
        p,
        span,
        a,
        li,
        ul,
        ol,
        div,
        section,
        article,
        header,
        footer,
        .masthead,
        .page-section,
        .text-center,
        .lead,
        .small,
        .text-muted {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
        }
    </style>
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
    <button id="back-to-top" class="btn btn-primary" title="Kembali ke atas">
        <i class="fas fa-angle-up"></i>
    </button>

    <script>
        // Wait for DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll to Top Function
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
            
            // Get back to top button
            const backToTop = document.getElementById('back-to-top');
            
            if (backToTop) {
                // Show/hide back to top button on scroll
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTop.classList.add('show');
                    } else {
                        backToTop.classList.remove('show');
                    }
                });
                
                // Add click event to back to top button
                backToTop.addEventListener('click', scrollToTop);
            }
        });
    </script>

    @stack('js')
</body>
</html>
