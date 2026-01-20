<!-- Unified Navbar -->
<nav class="navbar-unified navbar-expand-lg navbar-light bg-white shadow-sm" id="mainNavbar">
    <!-- Top Bar Section -->
    <div class="navbar-top">
        <div class="container px-4">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <!-- Left side (Contact Info) -->
                <div class="d-flex flex-column flex-sm-row align-items-center gap-2 gap-sm-3">
                    <a href="tel:02129098991" class="navbar-top-link d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill"></i>
                        <span>021-29098991</span>
                    </a>
                    <span class="navbar-top-separator d-none d-sm-inline">|</span>
                    <a href="tel:02122968221" class="navbar-top-link d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill"></i>
                        <span>021-22968221</span>
                    </a>
                </div>

                <!-- Right side (Social Media) -->
                <div class="d-flex align-items-center gap-3 navbar-top-social">
                    <a href="https://tokopedia.link/alkeslabprimatama" 
                       class="navbar-top-social-link" 
                       target="_blank" 
                       aria-label="Tokopedia"
                       title="Tokopedia">
                        <img src="https://img.icons8.com/nolan/28/tokopedia.png" alt="Tokopedia" class="navbar-top-social-icon" />
                        <span class="d-none d-lg-inline">Tokopedia</span>
                    </a>
                    <a href="https://shopee.co.id/alkeskitasemua" 
                       class="navbar-top-social-link" 
                       target="_blank" 
                       aria-label="Shopee"
                       title="Shopee">
                        <img src="https://img.icons8.com/ios-filled/28/FFFFFF/shopee.png" alt="Shopee" class="navbar-top-social-icon" />
                        <span class="d-none d-lg-inline">Shopee</span>
                    </a>
                    <a href="https://www.instagram.com/alkeslabprimatama_official" 
                       class="navbar-top-social-link" 
                       target="_blank" 
                       aria-label="Instagram"
                       title="Instagram">
                        <img src="https://img.icons8.com/ios-filled/28/FFFFFF/instagram-new--v1.png" alt="Instagram" class="navbar-top-social-icon" />
                        <span class="d-none d-lg-inline">Instagram</span>
                    </a>
                    <a href="https://www.tiktok.com/@alkeslabp" 
                       class="navbar-top-social-link" 
                       target="_blank" 
                       aria-label="TikTok"
                       title="TikTok">
                        <img src="https://img.icons8.com/ios-filled/28/FFFFFF/tiktok--v1.png" alt="TikTok" class="navbar-top-social-icon" />
                        <span class="d-none d-lg-inline">TikTok</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Section -->
    <div class="navbar-main">
        <div class="container px-4">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" class="navbar-logo me-2" style="height: 50px; width: auto;">
                <span class="text-primary fw-bold d-none d-md-inline">PT. ALKESLAB PRIMATAMA</span>
                <span class="text-primary fw-bold d-md-none"></span>
            </a>

            <!-- Mobile Toggler -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-semibold px-3 {{ request()->is('/') ? 'active' : '' }}" href="/">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-semibold px-3 {{ request()->is('tentang-kami') ? 'active' : '' }}" href="/tentang-kami">
                            Tentang Kami
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark fw-semibold px-3 dropdown-toggle {{ request()->is('produk-kami*') ? 'active' : '' }}" 
                           href="#" 
                           id="navbarDropdown" 
                           role="button"
                           data-bs-toggle="dropdown" 
                           aria-expanded="false">
                            Produk
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdown">
                            @forelse ($products as $product)
                                <li>
                                    <a class="dropdown-item py-2 px-3" href="/produk-kami#{{ $product->slug }}">
                                        {{ $product->description }}
                                    </a>
                                </li>
                            @empty
                                <li><span class="dropdown-item-text text-muted py-2 px-3">Tidak ada produk</span></li>
                            @endforelse
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-semibold px-3 {{ request()->is('berita*') ? 'active' : '' }}" href="/berita">
                            Berita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-semibold px-3 {{ request()->is('kontak-kami') ? 'active' : '' }}" href="/kontak-kami">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Sidebar (Offcanvas) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center">
            <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" class="navbar-logo me-2" style="height: 40px; width: auto;">
            <span class="text-primary fw-bold"></span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="list-unstyled mb-0">
            <li>
                <a class="d-block px-4 py-3 text-dark text-decoration-none border-bottom {{ request()->is('/') ? 'bg-light' : '' }}" 
                   href="/">
                    <i class="bi bi-house-door me-2"></i>Beranda
                </a>
            </li>
            <li>
                <a class="d-block px-4 py-3 text-dark text-decoration-none border-bottom {{ request()->is('tentang-kami') ? 'bg-light' : '' }}" 
                   href="/tentang-kami">
                    <i class="bi bi-info-circle me-2"></i>Tentang Kami
                </a>
            </li>
            <li>
                <button class="btn btn-toggle w-100 text-start px-4 py-3 text-dark border-bottom d-flex justify-content-between align-items-center" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#mobile-products-collapse" 
                        aria-expanded="false">
                    <span><i class="bi bi-box-seam me-2"></i>Produk</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="collapse" id="mobile-products-collapse">
                    <ul class="list-unstyled bg-light">
                        @forelse ($products as $product)
                            <li>
                                <a class="d-block px-5 py-2 text-dark text-decoration-none" 
                                   href="/produk-kami#{{ $product->slug }}">
                                    {{ $product->description }}
                                </a>
                            </li>
                        @empty
                            <li><span class="d-block px-5 py-2 text-muted">Tidak ada produk</span></li>
                        @endforelse
                    </ul>
                </div>
            </li>
            <li>
                <a class="d-block px-4 py-3 text-dark text-decoration-none border-bottom {{ request()->is('berita*') ? 'bg-light' : '' }}" 
                   href="/berita">
                    <i class="bi bi-newspaper me-2"></i>Berita
                </a>
            </li>
            <li>
                <a class="d-block px-4 py-3 text-dark text-decoration-none {{ request()->is('kontak-kami') ? 'bg-light' : '' }}" 
                   href="/kontak-kami">
                    <i class="bi bi-envelope me-2"></i>Kontak
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    /* Reset body and html to remove gaps */
    body {
        margin: 0 !important;
        padding: 0 !important;
        padding-top: 0 !important;
        margin-top: 0 !important;
    }
    
    html {
        margin: 0 !important;
        padding: 0 !important;
        scroll-padding-top: 0 !important;
    }
    
    /* Remove any gap before navbar */
    body > .navbar-unified {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
    
    /* Ensure content doesn't overlap navbar */
    body > *:not(.navbar-unified) {
        margin-top: 0 !important;
    }
    
    /* Unified Navbar Container */
    .navbar-unified {
        position: sticky !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        z-index: 1030 !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        flex-direction: column;
        width: 100% !important;
        visibility: visible !important;
        opacity: 1 !important;
        transform: translateY(0) !important;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out, visibility 0.3s ease-in-out !important;
        will-change: transform;
    }
    
    /* Navbar hidden state (scrolled down) */
    .navbar-unified.navbar-hidden {
        transform: translateY(-100%) !important;
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }
    
    /* Navbar visible state (scrolled up or at top) */
    .navbar-unified.navbar-visible {
        transform: translateY(0) !important;
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
    }
    
    /* Prevent navbar from being hidden */
    .navbar-unified,
    .navbar-unified * {
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    /* Ensure navbar stays on top */
    body > .navbar-unified,
    body#page-top > .navbar-unified {
        position: sticky !important;
        top: 0 !important;
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
    
    /* Override any conflicting styles from other CSS files */
    #mainNavbar.navbar-unified,
    nav.navbar-unified,
    .navbar-unified.navbar {
        position: sticky !important;
        top: 0 !important;
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        transform: none !important;
    }
    
    /* Override fixed position from app/css/styles.css */
    .navbar-unified.navbar {
        position: sticky !important;
        top: 0 !important;
    }
    
    /* Prevent any JavaScript from hiding navbar */
    .navbar-unified[style*="display: none"],
    .navbar-unified[style*="visibility: hidden"],
    .navbar-unified[style*="opacity: 0"] {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    /* Top Bar Section */
    .navbar-top {
        font-size: 0.875rem;
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%) !important;
        padding: 0.75rem 0;
        width: 100%;
        margin: 0 !important;
        border: none;
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .navbar-top-link {
        color: rgba(255, 255, 255, 0.9) !important;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
    }

    .navbar-top-link:hover {
        color: white !important;
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    .navbar-top-link i {
        font-size: 0.9rem;
    }

    .navbar-top-separator {
        color: rgba(255, 255, 255, 0.4);
        margin: 0 0.5rem;
    }

    .navbar-top-social {
        gap: 0.75rem;
    }

    .navbar-top-social-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(255, 255, 255, 0.9) !important;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        padding: 0.4rem 0.75rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .navbar-top-social-link:hover {
        color: white !important;
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .navbar-top-social-icon {
        width: 20px;
        height: 20px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .navbar-top-social-link:hover .navbar-top-social-icon {
        transform: scale(1.15);
    }

    .navbar-top-social-link span {
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Main Navigation Section */
    .navbar-main {
        background: white !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 0 !important;
        padding: 0.75rem 0;
        width: 100%;
        border: none;
        display: flex !important;
        align-items: center;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .navbar-main .container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    /* Ensure no gap between top and main sections */
    .navbar-top + .navbar-main {
        margin-top: 0;
        padding-top: 0.75rem;
    }

    .navbar-logo {
        height: 50px;
        width: auto;
        object-fit: contain;
    }

    .nav-link {
        position: relative;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: var(--bs-primary) !important;
    }

    .nav-link.active {
        color: var(--bs-primary) !important;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 2px;
        background-color: var(--bs-primary);
        border-radius: 2px;
    }

    /* Navbar Toggler Styles */
    .navbar-toggler {
        display: flex !important;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 0.75rem;
        background-color: transparent;
        border: 2px solid #1e30f3 !important;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 1050;
        position: relative;
    }

    .navbar-toggler:hover {
        background-color: #1e30f3;
        border-color: #1e30f3;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.25rem rgba(30, 48, 243, 0.25);
        outline: none;
    }

    .navbar-toggler-icon {
        display: inline-block;
        width: 1.5em;
        height: 1.5em;
        vertical-align: middle;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2830, 48, 243, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }

    .navbar-toggler:hover .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Hide toggler on desktop (lg and above) */
    @media (min-width: 992px) {
        .navbar-toggler {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
    }

    /* Ensure toggler is visible on mobile */
    @media (max-width: 991.98px) {
        .navbar-toggler {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
    }

    /* Dropdown Styles */
    .dropdown-menu {
        margin-top: 0.5rem;
        border-radius: 0.5rem;
        min-width: 250px;
    }

    .dropdown-item {
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: var(--bs-primary);
        color: white;
        padding-left: 1.25rem;
    }

    /* Mobile Sidebar Styles */
    .offcanvas {
        max-width: 300px;
    }

    .btn-toggle {
        background: none;
        border: none;
        cursor: pointer;
    }

    .btn-toggle[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }

    .offcanvas-body a:hover {
        background-color: #f8f9fa;
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .navbar-brand span {
            font-size: 0.9rem;
        }

        .navbar-top {
            padding: 0.6rem 0;
        }

        .navbar-top-social-link span {
            display: none;
        }

        .navbar-top-social-link {
            padding: 0.35rem 0.6rem;
        }
    }

    @media (max-width: 575.98px) {
        .navbar-top .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .navbar-top {
            padding: 0.5rem 0;
            font-size: 0.8rem;
        }

        .navbar-top-link {
            font-size: 0.8rem;
            padding: 0.2rem 0.4rem;
        }

        .navbar-top-social {
            gap: 0.5rem;
        }

        .navbar-top-social-link {
            padding: 0.3rem 0.5rem;
        }

        .navbar-top-social-icon {
            width: 18px;
            height: 18px;
        }
    }
</style>

<!-- JavaScript for hide/show navbar on scroll -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        if (!navbar) return;
        
        let lastScrollTop = 0;
        let scrollThreshold = 10; // Minimum scroll distance to trigger hide/show
        let ticking = false;
        
        // Initialize navbar
        navbar.style.position = 'sticky';
        navbar.style.top = '0';
        navbar.style.zIndex = '1030';
        navbar.classList.add('navbar-visible');
        
        function handleScroll() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    // Always show navbar at the top of the page
                    if (currentScrollTop <= 50) {
                        navbar.classList.remove('navbar-hidden');
                        navbar.classList.add('navbar-visible');
                        lastScrollTop = currentScrollTop;
                        ticking = false;
                        return;
                    }
                    
                    // Calculate scroll direction
                    const scrollDifference = Math.abs(currentScrollTop - lastScrollTop);
                    
                    // Only trigger if scroll difference is significant
                    if (scrollDifference > scrollThreshold) {
                        if (currentScrollTop > lastScrollTop) {
                            // Scrolling down - hide navbar
                            navbar.classList.remove('navbar-visible');
                            navbar.classList.add('navbar-hidden');
                        } else {
                            // Scrolling up - show navbar
                            navbar.classList.remove('navbar-hidden');
                            navbar.classList.add('navbar-visible');
                        }
                        
                        lastScrollTop = currentScrollTop;
                    }
                    
                    ticking = false;
                });
                
                ticking = true;
            }
        }
        
        // Add scroll event listener with passive option for better performance
        window.addEventListener('scroll', handleScroll, { passive: true });
        
        // Initial check
        handleScroll();
    });
</script>
