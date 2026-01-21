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
    <link href="{{ asset('back') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
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

    @livewireStyles
    
    @stack('css')
    
    <style>
        /* WhatsApp Buttons - Fixed Position */
        .whatsapp-btn {
            position: fixed !important;
            right: 30px !important;
            width: 60px !important;
            height: 60px !important;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%) !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            color: white !important;
            font-size: 28px !important;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4) !important;
            cursor: pointer !important;
            z-index: 9999 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            border: 3px solid white !important;
            pointer-events: auto !important;
        }
        
        .whatsapp-btn:hover {
            transform: scale(1.15) translateY(-3px) !important;
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6) !important;
        }
        
        .whatsapp-btn:active {
            transform: scale(1.05) !important;
        }
        
        /* WhatsApp Button 1 - Admin (atas) */
        #whatsapp1 {
            bottom: 180px !important;
        }
        
        /* WhatsApp Button 2 - Sales (tengah) */
        #whatsapp2 {
            bottom: 100px !important;
        }
        
        /* Back to Top Button */
        #back-to-top {
            position: fixed !important;
            bottom: 30px !important;
            right: 30px !important;
            width: 50px !important;
            height: 50px !important;
            background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%) !important;
            border: none !important;
            border-radius: 50% !important;
            color: white !important;
            font-size: 20px !important;
            box-shadow: 0 4px 20px rgba(30, 48, 243, 0.4) !important;
            cursor: pointer !important;
            z-index: 9999 !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            border: 3px solid white !important;
            padding: 0 !important;
            pointer-events: auto !important;
        }
        
        #back-to-top:hover {
            background: linear-gradient(135deg, #1a28d9 0%, #1e30f3 100%) !important;
            transform: translateY(-5px) !important;
            box-shadow: 0 8px 30px rgba(30, 48, 243, 0.6) !important;
        }
        
        #back-to-top:active {
            transform: translateY(-2px) !important;
        }
        
        #back-to-top.show {
            display: flex !important;
        }
        
        #back-to-top i {
            line-height: 1 !important;
        }
        
        /* Responsive - Tablet */
        @media (max-width: 768px) {
            .whatsapp-btn {
                width: 55px !important;
                height: 55px !important;
                font-size: 24px !important;
                right: 20px !important;
            }
            
            #whatsapp1 {
                bottom: 160px !important;
            }
            
            #whatsapp2 {
                bottom: 90px !important;
            }
            
            #back-to-top {
                width: 45px !important;
                height: 45px !important;
                font-size: 18px !important;
                right: 20px !important;
                bottom: 20px !important;
            }
        }
        
        /* Responsive - Mobile */
        @media (max-width: 576px) {
            .whatsapp-btn {
                width: 50px !important;
                height: 50px !important;
                font-size: 22px !important;
                right: 15px !important;
            }
            
            #whatsapp1 {
                bottom: 140px !important;
            }
            
            #whatsapp2 {
                bottom: 80px !important;
            }
            
            #back-to-top {
                width: 40px !important;
                height: 40px !important;
                font-size: 16px !important;
                right: 15px !important;
                bottom: 15px !important;
            }
        }
        
        /* Ensure buttons don't overlap with footer on mobile */
        @media (max-width: 991.98px) {
            .whatsapp-btn,
            #back-to-top {
                z-index: 9999 !important;
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
    <script src="https://unpkg.com/scrollreveal@4.0.9/dist/scrollreveal.min.js"></script>
    
    <!-- Custom JS from old template -->
    <script src="{{ asset('app/js/scripts.js') }}"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" defer></script>

    <!-- Tombol WhatsApp 1 -->
    <div id="whatsapp1" class="whatsapp-btn" title="Admin Alkeslab Primatama" role="button" tabindex="0">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- Tombol WhatsApp 2 -->
    <div id="whatsapp2" class="whatsapp-btn" title="Sales Alkeslab Primatama" role="button" tabindex="0">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="btn btn-primary" title="Kembali ke atas">
        <i class="fas fa-angle-up"></i>
    </button>

    <script>
        // Initialize WhatsApp buttons and scroll to top
        function initFloatingButtons() {
            // WhatsApp Button 1 - Admin
            const whatsapp1 = document.getElementById('whatsapp1');
            if (whatsapp1) {
                whatsapp1.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    window.open('https://wa.me/6282280848541', '_blank');
                });
                whatsapp1.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        window.open('https://wa.me/6282280848541', '_blank');
                    }
                });
            }
            
            // WhatsApp Button 2 - Sales
            const whatsapp2 = document.getElementById('whatsapp2');
            if (whatsapp2) {
                whatsapp2.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    window.open('https://wa.me/6282260895899', '_blank');
                });
                whatsapp2.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        window.open('https://wa.me/6282260895899', '_blank');
                    }
                });
            }
            
            // Scroll to Top Function
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
            
            // Back to Top Button
            const backToTop = document.getElementById('back-to-top');
            if (backToTop) {
                // Show/hide back to top button on scroll
                function handleScroll() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
                    if (scrollTop > 300) {
                        backToTop.classList.add('show');
                    } else {
                        backToTop.classList.remove('show');
                    }
                }
                
                // Add scroll event listener
                window.addEventListener('scroll', handleScroll, { passive: true });
                
                // Add click event to back to top button
                backToTop.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    scrollToTop();
                });
                
                // Initial check
                handleScroll();
            }
        }
        
        // Run when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFloatingButtons);
        } else {
            initFloatingButtons();
        }
    </script>

    <!-- ScrollReveal Initialization -->
    <script>
        // Wait for ScrollReveal library to load
        function initScrollReveal() {
            // Check if ScrollReveal is loaded
            if (typeof ScrollReveal === 'undefined') {
                // Retry after a short delay if not loaded yet
                setTimeout(initScrollReveal, 100);
                return;
            }

            // Create ScrollReveal instance with default config
            const sr = ScrollReveal({
                origin: 'bottom',
                distance: '30px',
                duration: 1000,
                delay: 100,
                reset: false,
                easing: 'ease-out',
                mobile: true,
                viewFactor: 0.15,
                viewOffset: { top: 0, right: 0, bottom: 50, left: 0 }
            });

            // Animate sections
            sr.reveal('.page-section', {
                interval: 100
            });

            // Animate headings
            sr.reveal('h1, h2, h3, .berita-heading, .clients-heading, .articles-heading, .about-title, .address-section-title', {
                origin: 'top',
                distance: '40px',
                duration: 1200,
                delay: 150
            });

            // Animate cards
            sr.reveal('.berita-card, .article-card, .product-card, .service-card, .category-card, .client-item, .feature-card, .vision-mission-card, .address-card, .clients-card, .project-card', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 100,
                interval: 150
            });

            // Animate featured content
            sr.reveal('.berita-featured, .featured-article', {
                origin: 'left',
                distance: '50px',
                duration: 1200,
                delay: 200
            });

            // Animate images
            sr.reveal('.berita-card-image-container, .product-image-container, .category-image-wrapper, .service-icon-wrapper, .portfolio-box', {
                origin: 'bottom',
                distance: '30px',
                duration: 1000,
                delay: 150,
                scale: 0.95
            });

            // Animate buttons and links
            sr.reveal('.btn, .berita-featured-link, .product-whatsapp-btn, .category-button, .product-card-button', {
                origin: 'bottom',
                distance: '20px',
                duration: 800,
                delay: 300
            });

            // Animate badges and labels
            sr.reveal('.berita-label, .berita-featured-badge, .berita-card-badge, .clients-section-label, .articles-section-label', {
                origin: 'top',
                distance: '20px',
                duration: 600,
                delay: 100,
                scale: 0.8
            });

            // Animate text content
            sr.reveal('.berita-subtitle, .clients-subtitle, .articles-subtitle, .about-description, p.lead, .berita-featured-text, .berita-card-text', {
                origin: 'bottom',
                distance: '25px',
                duration: 900,
                delay: 200
            });

            // Animate pagination
            sr.reveal('.berita-pagination, .pagination', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 400
            });

            // Animate meta information
            sr.reveal('.berita-card-meta, .article-meta, .contact-info, .article-meta-info', {
                origin: 'bottom',
                distance: '20px',
                duration: 700,
                delay: 250
            });

            // Animate empty states
            sr.reveal('.berita-empty, .text-center.py-5', {
                origin: 'bottom',
                distance: '40px',
                duration: 1000,
                delay: 200
            });

            // Animate grid items with stagger
            sr.reveal('.row .col-lg-4, .row .col-lg-6, .row .col-md-6, .row .col-lg-3', {
                origin: 'bottom',
                distance: '30px',
                duration: 800,
                delay: 100,
                interval: 100
            });

            // Animate list items
            sr.reveal('.list-group-item, .legalitas-item, .related-article-item', {
                origin: 'left',
                distance: '30px',
                duration: 700,
                delay: 100,
                interval: 80
            });

            // Animate clients grid
            sr.reveal('.clients-grid .client-item', {
                origin: 'bottom',
                distance: '25px',
                duration: 700,
                delay: 100,
                interval: 100
            });
        }

        // Initialize ScrollReveal when DOM and scripts are ready
        function waitForScrollReveal() {
            if (typeof ScrollReveal !== 'undefined') {
                initScrollReveal();
            } else {
                setTimeout(waitForScrollReveal, 50);
            }
        }

        // Start initialization
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(waitForScrollReveal, 200);
            });
        } else {
            setTimeout(waitForScrollReveal, 200);
        }
    </script>

    @livewireScripts
    
    @stack('js')
</body>
</html>
