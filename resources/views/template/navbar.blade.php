<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg bg-primary py-2 top-navbar">
    <div class="container px-4">
        <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
            <!-- Left side (Contact Info) -->
            <div class="d-flex flex-column flex-sm-row align-items-center gap-2 gap-sm-3">
                <a href="tel:02129098991" class="text-white text-decoration-none d-flex align-items-center gap-1 small">
                    <i class="bi bi-telephone-fill"></i>
                    <span>021-29098991</span>
                </a>
                <span class="text-white d-none d-sm-inline">|</span>
                <a href="tel:02122968221" class="text-white text-decoration-none d-flex align-items-center gap-1 small">
                    <i class="bi bi-telephone-fill"></i>
                    <span>021-22968221</span>
                </a>
                <span class="text-white d-none d-sm-inline">|</span>
                <a href="mailto:alkeslab.primatama@gmail.com" class="text-white text-decoration-none d-flex align-items-center gap-1 small">
                    <i class="bi bi-envelope-fill"></i>
                    <span class="d-none d-md-inline">alkeslab.primatama@gmail.com</span>
                    <span class="d-md-none">Email</span>
                </a>
            </div>

            <!-- Right side (Social Media) -->
            <div class="d-flex align-items-center gap-2 social-icons">
                <a href="https://tokopedia.link/alkeslabprimatama" class="text-white text-decoration-none" target="_blank" aria-label="Tokopedia">
                    <img src="https://img.icons8.com/nolan/32/tokopedia.png" alt="Tokopedia" class="social-icon" />
                </a>
                <a href="https://shopee.co.id/alkeskitasemua" class="text-white text-decoration-none" target="_blank" aria-label="Shopee">
                    <img src="https://img.icons8.com/ios-filled/32/FFFFFF/shopee.png" alt="Shopee" class="social-icon" />
                </a>
                <a href="https://www.instagram.com/alkeslabprimatama_official" class="text-white text-decoration-none" target="_blank" aria-label="Instagram">
                    <img src="https://img.icons8.com/ios-filled/32/FFFFFF/instagram-new--v1.png" alt="Instagram" class="social-icon" />
                </a>
                <a href="https://www.tiktok.com/@alkeslabp" class="text-white text-decoration-none" target="_blank" aria-label="TikTok">
                    <img src="https://img.icons8.com/ios-filled/32/FFFFFF/tiktok--v1.png" alt="TikTok" class="social-icon" />
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm main-navbar sticky-top">
    <div class="container px-4">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" class="navbar-logo me-2" style="height: 50px; width: auto;">
            <span class="text-primary fw-bold d-none d-md-inline">PT. ALKESLAB PRIMATAMA</span>
            <span class="text-primary fw-bold d-md-none"></span>
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
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
    /* Top Navbar Styles */
    .top-navbar {
        font-size: 0.875rem;
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
    }

    .top-navbar a:hover {
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .social-icon {
        width: 24px;
        height: 24px;
        transition: transform 0.2s ease;
    }

    .social-icon:hover {
        transform: scale(1.1);
    }

    /* Main Navbar Styles */
    .main-navbar {
        transition: all 0.3s ease;
        z-index: 1000;
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
    }

    @media (max-width: 575.98px) {
        .top-navbar .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .social-icons {
            gap: 0.5rem;
        }

        .social-icon {
            width: 20px;
            height: 20px;
        }
    }
</style>
