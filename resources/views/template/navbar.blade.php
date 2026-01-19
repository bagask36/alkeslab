<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg bg-primary py-0 top-navbar">
    <div class="container px-5 d-flex justify-content-between align-items-center flex-wrap">
        <!-- Left side (Phone and Email) -->
        <div class="navbar-nav small d-flex flex-column flex-sm-row align-items-center">
            <span class="nav-item me-3">
                <a href="tel:02129098991"><i class="bi bi-telephone-fill"></i> 021-29098991</a>
            </span>
            <span class="nav-item me-3">
                <a href="tel:02122968221"><i class="bi bi-telephone-fill"></i> 021-22968221</a>
            </span>
            <span class="nav-item">
                <a href="mailto:alkeslab.primatama@gmail.com"><i class="bi bi-envelope-fill"></i>
                    alkeslab.primatama@gmail.com</a>
            </span>
        </div>

        <!-- Right side (Social Media Toggle) -->
        <div class="navbar-nav ms-auto small d-flex flex-nowrap">
            <div class="collapse navbar-collapse" id="socialMediaCollapse">
                <div class="navbar-nav d-flex justify-content-center align-items-center flex-nowrap social-icons">
                    <a href="https://tokopedia.link/alkeslabprimatama" class="nav-item text-light tokopedia"
                        target="_blank">
                        <img src="https://img.icons8.com/nolan/64/tokopedia.png" alt="Tokopedia" />
                    </a>
                    <a href="https://shopee.co.id/alkeskitasemua" class="nav-item text-light shopee" target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/shopee.png" alt="Shopee" />
                    </a>
                    <a href="https://www.instagram.com/alkeslabprimatama_official" class="nav-item text-light"
                        target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/instagram-new--v1.png" alt="Instagram" />
                    </a>
                    <a href="https://www.tiktok.com/@alkeslabp" class="nav-item text-light" target="_blank">
                        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/tiktok--v1.png" alt="TikTok" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light py-3 main-navbar">
    <div class="container px-4 d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" class="navbar-logo d-inline-block me-2">
            <span class="text-primary fw-bolder text-logo">PT. ALKESLAB PRIMATAMA</span>
        </a>

        <!-- Navbar Toggler untuk membuka offcanvas (sidebar) pada tampilan mobile -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items (untuk desktop) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bolder">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/tentang-kami">Tentang</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Produk
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Produk Items -->
                        @foreach ($products as $product)
                            <li><a class="dropdown-item text-justify"
                                    href="/produk-kami#{{ $product->slug }}">{{ $product->description }}</a></li>
                        @endforeach
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-dark" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/kontak-kami">Kontak</a>
                </li>
            </ul>
        </div>

        <!-- Sidebar (Offcanvas) untuk mobile -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('app/assets/logo.png') }}" alt="Logo"
                        class="navbar-logo d-inline-block me-2">
                </a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav small fw-bolder">
                    <li class="nav-item mb-2"><a class="nav-link text-dark" href="/">Beranda</a></li>

                    <!-- Produk Accordion -->
                    <li class="mb-2">
                        <button class="btn btn-toggle collapsed nav-link text-dark" data-bs-toggle="collapse"
                            data-bs-target="#home-collapse" aria-expanded="false">
                            Produk <i class="bi bi-caret-down-fill"></i>
                        </button>

                        <div class="collapse" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                @foreach ($products as $product)
                                    <li class="mb-1">
                                        <a class="nav-link text-dark" href="/produk-kami#{{ $product->slug }}">
                                            {{ $product->description }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2"><a class="nav-link text-dark" href="/berita">Berita</a></li>
                    <li class="nav-item mb-2"><a class="nav-link text-dark" href="/kontak-kami">Kontak</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
