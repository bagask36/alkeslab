<nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
    <div class="container px-5">
        <a class="navbar-brand d-flex flex-column align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" width="50" height="50" class="d-inline-block">
            <span class="mt-1 text-primary fw-bolder">PT. ALKESLAB PRIMATAMA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk-kami">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang-kami">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontak-kami">Kontak Kami</a></li>
            </ul>
        </div>
    </div>
</nav>
