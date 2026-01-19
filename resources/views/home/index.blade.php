@extends('template.index')
@section('title', 'Beranda')

@push('css')
<style>
    /* Hero Section - Enhanced */
    .hero-section {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.95) 0%, rgba(26, 40, 217, 0.95) 100%),
                    url('{{ asset('app/assets/content/mask-group.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 120px 0 100px;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 50%, rgba(226, 30, 128, 0.1) 0%, transparent 50%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        max-width: 900px;
        padding: 0 20px;
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.15;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 0.8s ease-out;
        letter-spacing: -0.02em;
    }

    .hero-title span {
        display: block;
        font-size: 0.7em;
        font-weight: 600;
        margin-top: 0.5rem;
        opacity: 0.95;
    }

    .hero-subtitle {
        font-size: clamp(1.1rem, 2.5vw, 1.4rem);
        font-weight: 400;
        opacity: 0.95;
        animation: fadeInUp 1s ease-out;
        line-height: 1.6;
        max-width: 700px;
        margin: 0 auto;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Section Styles - Enhanced */
    .section {
        padding: 100px 0;
        position: relative;
    }

    .section-alt {
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
    }

    .section-header {
        text-align: center;
        margin-bottom: 70px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .section-title {
        font-size: clamp(2rem, 4.5vw, 2.75rem);
        font-weight: 800;
        color: #1e30f3;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
        letter-spacing: -0.01em;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 5px;
        background: linear-gradient(90deg, #1e30f3 0%, #e21e80 100%);
        border-radius: 3px;
        box-shadow: 0 2px 8px rgba(30, 48, 243, 0.3);
    }

    .section-subtitle {
        color: #6c757d;
        font-size: 1.15rem;
        margin-top: 1.5rem;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Card Container - Enhanced Grid */
    .card-home-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 35px;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* Card Styles - Premium Design */
    .card-home {
        background: white;
        border-radius: 24px;
        padding: 40px 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(240, 240, 240, 0.8);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .card-home::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #1e30f3 0%, #e21e80 100%);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-home::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(30, 48, 243, 0.05) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .card-home:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 50px rgba(30, 48, 243, 0.2);
        border-color: rgba(30, 48, 243, 0.2);
    }

    .card-home:hover::before {
        transform: scaleX(1);
    }

    .card-home:hover::after {
        opacity: 1;
    }

    .card-home-image-wrapper {
        width: 140px;
        height: 140px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 20px;
        padding: 20px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .card-home:hover .card-home-image-wrapper {
        transform: scale(1.05);
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.05) 0%, rgba(226, 30, 128, 0.05) 100%);
    }

    .card-home-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .card-home:hover .card-home-image {
        transform: scale(1.15) rotate(2deg);
    }

    .card-home-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 25px;
        min-height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.4;
        letter-spacing: -0.01em;
    }

    .card-home-button {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: auto;
        box-shadow: 0 4px 15px rgba(30, 48, 243, 0.25);
        position: relative;
        overflow: hidden;
    }

    .card-home-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .card-home-button:hover {
        background: linear-gradient(135deg, #1a28d9 0%, #1e30f3 100%);
        transform: translateX(8px);
        box-shadow: 0 6px 20px rgba(30, 48, 243, 0.4);
        color: white;
    }

    .card-home-button:hover::before {
        left: 100%;
    }

    .card-home-button i {
        transition: transform 0.3s ease;
    }

    .card-home-button:hover i {
        transform: translateX(4px);
    }

    /* Clients Section - Enhanced */
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 35px;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .client-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 160px;
        border: 1px solid rgba(240, 240, 240, 0.8);
    }

    .client-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        border-color: rgba(30, 48, 243, 0.2);
    }

    .client-card img {
        max-width: 100%;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%) opacity(0.7);
        transition: all 0.4s ease;
    }

    .client-card:hover img {
        filter: grayscale(0%) opacity(1);
        transform: scale(1.05);
    }

    .client-card-large {
        grid-column: 1 / -1;
        padding: 50px;
        min-height: 280px;
    }

    /* Scroll Section - Enhanced */
    .scroll-section {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        padding: 80px 0;
        overflow: hidden;
        position: relative;
    }

    .scroll-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(226, 30, 128, 0.1) 0%, transparent 50%),
            url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.06)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 1;
    }

    .scroll-container {
        position: relative;
        z-index: 1;
        overflow: hidden;
        white-space: nowrap;
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }

    .scroll-content {
        display: inline-flex;
        animation: scroll 35s linear infinite;
        gap: 40px;
    }

    .scroll-item {
        flex-shrink: 0;
        width: 220px;
        height: 140px;
        background: white;
        border-radius: 18px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .scroll-item:hover {
        transform: scale(1.05);
    }

    .scroll-item img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: brightness(0.95);
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    /* Responsive - Enhanced */
    @media (max-width: 1200px) {
        .card-home-container {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }
    }

    @media (max-width: 768px) {
        .section {
            padding: 70px 0;
        }

        .section-header {
            margin-bottom: 50px;
        }

        .card-home-container {
            grid-template-columns: 1fr;
            gap: 25px;
            padding: 0 20px;
        }

        .card-home {
            padding: 35px 25px;
        }

        .clients-grid {
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 25px;
            padding: 0 20px;
        }

        .hero-section {
            min-height: 75vh;
            padding: 100px 0 80px;
        }

        .scroll-item {
            width: 180px;
            height: 120px;
        }
    }

    @media (max-width: 576px) {
        .card-home-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .card-home-image-wrapper {
            width: 120px;
            height: 120px;
        }

        .clients-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Empty State - Enhanced */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #6c757d;
    }

    .empty-state-icon {
        font-size: 5rem;
        margin-bottom: 1.5rem;
        opacity: 0.4;
        color: #1e30f3;
    }

    .empty-state p {
        font-size: 1.1rem;
        font-weight: 500;
    }

    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Loading Animation */
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Distributor Alat Kesehatan
                    <span>PT Alkeslab Primatama</span>
                </h1>
                <p class="hero-subtitle">
                    Solusi Terpercaya untuk Kebutuhan Alat Kesehatan dan Peralatan Medis dengan Kualitas Terbaik
                </p>
            </div>
        </div>
    </section>

    <!-- Produk Kami Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kategori Produk</h2>
                <p class="section-subtitle">Pilih kategori produk yang Anda butuhkan untuk mendapatkan solusi terbaik</p>
            </div>
            @if($product->count() > 0)
                <div class="card-home-container">
                    @foreach ($product as $item)
                        <div class="card-home">
                            <div class="card-home-image-wrapper">
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="{{ $item->description }}" 
                                     class="card-home-image">
                            </div>
                            <h3 class="card-home-title">{{ $item->description }}</h3>
                            <a href="/produk-kami#{{ $item->slug }}" class="card-home-button">
                                Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-box-seam empty-state-icon"></i>
                    <p>Tidak ada produk tersedia saat ini</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Layanan Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Layanan profesional dan berkualitas untuk kebutuhan medis Anda</p>
            </div>
            @if($layanan->count() > 0)
                <div class="card-home-container">
                    @foreach ($layanan as $item)
                        <div class="card-home">
                            <div class="card-home-image-wrapper">
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     alt="{{ $item->name }}" 
                                     class="card-home-image">
                            </div>
                            <h3 class="card-home-title">{{ $item->name }}</h3>
                            <a href="#" class="card-home-button">
                                Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-gear empty-state-icon"></i>
                    <p>Tidak ada layanan tersedia saat ini</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Klien Kami Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Klien Kami</h2>
                <p class="section-subtitle">Perusahaan terpercaya yang mempercayai layanan dan produk kami</p>
            </div>
            @if($clients->count() > 0)
                <div class="clients-grid">
                    @foreach ($clients as $client)
                        @if($client->image_size === 'large')
                            <div class="client-card client-card-large">
                                <img src="{{ asset('storage/' . $client->image) }}" 
                                     alt="{{ $client->name }}" 
                                     class="img-fluid">
                            </div>
                        @else
                            <div class="client-card">
                                <img src="{{ asset('storage/' . $client->image) }}" 
                                     alt="{{ $client->name }}" 
                                     class="img-fluid">
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-people empty-state-icon"></i>
                    <p>Tidak ada klien tersedia saat ini</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Scroller Section -->
    <section class="scroll-section">
        <div class="scroll-container">
            <div class="scroll-content">
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 1">
                </div>
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 2">
                </div>
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 3">
                </div>
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 4">
                </div>
                <!-- Duplicate for seamless loop -->
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 1">
                </div>
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 2">
                </div>
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 3">
                </div>
                <div class="scroll-item">
                    <img src="{{ asset('app/assets/content/img22.png') }}" alt="Partner 4">
                </div>
            </div>
        </div>
    </section>
@endsection
