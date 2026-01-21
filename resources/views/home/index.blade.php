@extends('template.index')
@section('title', 'Beranda')

@push('css')
<style>
    /* Override template styles untuk brand colors */
    :root {
        --bs-primary: #1e30f3;
        --bs-primary-rgb: 30, 48, 243;
    }
    
    /* Masthead customization */
    header.masthead,
    .masthead {
        background-image: url('{{ asset('new-template/image/home.png') }}') !important;
        background-size: cover !important;
        background-position: center !important;
        background-attachment: fixed !important;
        background-repeat: no-repeat !important;
        position: relative;
    }
    
    /* Overlay kehitaman tipis untuk readability */
    header.masthead::before,
    .masthead::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.55);
        pointer-events: none;
        z-index: 1;
    }
    
    header.masthead > *,
    .masthead > * {
        position: relative;
        z-index: 2;
    }
    
    /* Mobile view optimization */
    @media (max-width: 768px) {
        header.masthead,
        .masthead {
            background-attachment: scroll !important;
            background-position: center center !important;
            background-size: cover !important;
        }
    }
    
    /* Portfolio section untuk produk */
    .portfolio-box {
        position: relative;
        display: block;
        max-width: 650px;
        margin: 0 auto;
    }
    
    .portfolio-box .portfolio-box-caption {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        height: 100%;
        position: absolute;
        bottom: 0;
        text-align: center;
        opacity: 0;
        color: #fff;
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.9) 0%, rgba(226, 30, 128, 0.9) 100%);
        transition: opacity 0.25s ease;
        text-align: center;
        padding: 1.5rem;
    }
    
    .portfolio-box:hover .portfolio-box-caption {
        opacity: 1;
    }
    
    .portfolio-box .portfolio-box-caption .project-category {
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .portfolio-box .portfolio-box-caption .project-name {
        font-size: 1.2rem;
        font-weight: 700;
    }
    
    /* Services section customization */
    .service-icon {
        color: var(--bs-primary);
        font-size: 3rem;
    }
    
    /* Clients section */
    .clients-section-label {
        display: inline-block;
        padding: 0.35rem 0.9rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #1e30f3;
        background: rgba(30, 48, 243, 0.08);
        margin-bottom: 0.75rem;
    }
    
    .clients-heading {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.75rem;
    }
    
    .clients-subtitle {
        font-size: 0.98rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }
    
    .clients-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        font-size: 0.9rem;
    }
    
    .clients-meta-item {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.9rem;
        border-radius: 999px;
        background: #f1f3ff;
        color: #1e30f3;
        font-weight: 500;
    }
    
    .clients-meta-item i {
        font-size: 1rem;
    }
    
    .clients-card {
        background: white;
        border-radius: 24px;
        padding: 2.25rem 2rem;
        box-shadow: 0 18px 60px rgba(15, 23, 42, 0.08);
        border: 1px solid rgba(15, 23, 42, 0.04);
        position: relative;
        overflow: hidden;
    }
    
    .clients-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top left, rgba(30, 48, 243, 0.08), transparent 55%);
        pointer-events: none;
    }
    
    .clients-card-inner {
        position: relative;
        z-index: 1;
    }
    
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 1.75rem;
    }
    
    .client-item {
        background: #f8f9ff;
        border-radius: 16px;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 90px;
    }
    
    .client-item-large {
        grid-column: span 2;
    }
    
    .client-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.12);
        background: #ffffff;
    }
    
    .client-item img {
        max-width: 100%;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.9;
        transition: filter 0.3s ease, opacity 0.3s ease, transform 0.3s ease;
    }
    
    .client-item:hover img {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.02);
    }
    
    /* Product/Layanan cards */
    .product-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f0f0f0;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        height: 100%;
    }
    
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(30, 48, 243, 0.15);
    }
    
    .product-card-image {
        width: 120px;
        height: 120px;
        object-fit: contain;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }
    
    .product-card:hover .product-card-image {
        transform: scale(1.1);
    }
    
    .product-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 1.5rem;
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .product-card-button {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: auto;
    }
    
    .product-card-button:hover {
        background: linear-gradient(135deg, #1a28d9 0%, #1e30f3 100%);
        transform: translateX(5px);
        color: white;
    }
    
    /* Responsive Design */
    @media (max-width: 991.98px) {
        .masthead {
            background-attachment: scroll;
            padding: 4rem 0;
        }
        
        .clients-heading {
            font-size: 1.75rem;
        }
        
        .clients-subtitle {
            font-size: 0.95rem;
        }
        
        .service-icon {
            font-size: 2.5rem;
        }
        
        .category-card {
            margin-bottom: 1.5rem;
        }
        
        .category-title {
            font-size: 1.05rem;
        }
        
        .product-card {
            margin-bottom: 1.5rem;
        }
    }
    
    @media (max-width: 767.98px) {
        .masthead {
            padding: 3rem 0;
            min-height: 50vh;
        }
        
        .masthead h1 {
            font-size: 2rem;
        }
        
        .masthead p {
            font-size: 1rem;
        }
        
        .clients-heading {
            font-size: 1.5rem;
        }
        
        .clients-subtitle {
            font-size: 0.9rem;
        }
        
        .clients-meta {
            font-size: 0.85rem;
        }
        
        .service-icon {
            font-size: 2rem;
        }
        
        .category-card {
            padding: 1.5rem;
            margin-bottom: 1.25rem;
        }
        
        .category-image {
            width: 80px;
            height: 80px;
        }
        
        .category-title {
            font-size: 1rem;
            min-height: auto;
        }
        
        .product-card {
            margin-bottom: 1.25rem;
        }
        
        .product-card-button {
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            width: 100%;
        }
        
        .portfolio-box {
            margin-bottom: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Distributor Alat Kesehatan</h1>
                    <hr class="divider divider-light" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">PT Alkeslab Primatama - Solusi Terpercaya untuk Kebutuhan Alat Kesehatan dan Peralatan Medis dengan Kualitas Terbaik</p>
                    <a class="btn btn-primary btn-xl" href="#produk">Lihat Produk</a>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Kami Punya Solusi untuk Kebutuhan Anda!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">
                        Perusahaan yang bergerak di bidang distribusi alat kesehatan yang mencakup Radiologi, 
                        Laboratorium, Barang Medis Habis Pakai (BMHP). Kami juga menyediakan Jasa Servis & 
                        Perawatan Alat Kesehatan dengan tim profesional dan berpengalaman.
                    </p>
                    <a class="btn btn-light btn-xl" href="#layanan">Layanan Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Layanan Section -->
    <section class="page-section py-5" id="layanan" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container px-4 px-lg-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-4 order-lg-1">
                    <h2 class="fw-bold mb-3" style="font-size: 2.5rem; color: #2c3e50;">Layanan Kami</h2>
                    <p class="text-muted" style="font-size: 1.1rem;">Solusi lengkap untuk kebutuhan alat kesehatan Anda</p>
                </div>
                <div class="col-lg-8 order-lg-2">
                    <div class="row g-4">
                        @if($layanan->count() > 0)
                            @foreach ($layanan as $item)
                                <div class="col-md-6 col-lg-3">
                                    <div class="service-card h-100">
                                        <div class="service-icon-wrapper">
                                            <img src="{{ asset('storage/' . $item->image) }}" 
                                                 alt="{{ $item->name }}" 
                                                 class="service-icon-img">
                                        </div>
                                        <h4 class="service-title">{{ $item->name }}</h4>
                                        <p class="service-description">Layanan profesional untuk kebutuhan medis Anda</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card h-100">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-hospital service-icon"></i>
                                    </div>
                                    <h4 class="service-title">Distribusi Alat Kesehatan</h4>
                                    <p class="service-description">Penyediaan alat kesehatan berkualitas tinggi</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card h-100">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-tools service-icon"></i>
                                    </div>
                                    <h4 class="service-title">Servis & Perawatan</h4>
                                    <p class="service-description">Layanan maintenance dan perawatan alat medis</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card h-100">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-shield-alt service-icon"></i>
                                    </div>
                                    <h4 class="service-title">Kualitas Terjamin</h4>
                                    <p class="service-description">Produk dan layanan dengan standar tinggi</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card h-100">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-users service-icon"></i>
                                    </div>
                                    <h4 class="service-title">Tim Profesional</h4>
                                    <p class="service-description">Didukung oleh tim ahli berpengalaman</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <style>
            .service-card {
                background: white;
                border-radius: 20px;
                padding: 2rem 1.5rem;
                text-align: center;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(0, 0, 0, 0.05);
                position: relative;
                overflow: hidden;
            }
            
            .service-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #1e30f3 0%, #1a28d9 100%);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .service-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 12px 40px rgba(30, 48, 243, 0.15);
            }
            
            .service-card:hover::before {
                transform: scaleX(1);
            }
            
            .service-icon-wrapper {
                width: 90px;
                height: 90px;
                margin: 0 auto 1.5rem;
                background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }
            
            .service-icon-wrapper::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
                opacity: 0;
                transition: opacity 0.4s;
            }
            
            .service-card:hover .service-icon-wrapper {
                transform: scale(1.1) rotate(5deg);
                box-shadow: 0 8px 25px rgba(30, 48, 243, 0.3);
            }
            
            .service-card:hover .service-icon-wrapper::before {
                opacity: 1;
            }
            
            .service-icon {
                font-size: 2.5rem;
                color: white;
                z-index: 1;
                position: relative;
            }
            
            .service-icon-img {
                width: 50px;
                height: 50px;
                object-fit: contain;
                filter: brightness(0) invert(1);
                z-index: 1;
                position: relative;
            }
            
            .service-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 0.75rem;
                transition: color 0.3s;
            }
            
            .service-card:hover .service-title {
                color: #1e30f3;
            }
            
            .service-description {
                font-size: 0.95rem;
                color: #6c757d;
                line-height: 1.6;
                margin: 0;
            }
            
            @media (max-width: 768px) {
                .service-card {
                    padding: 1.5rem 1rem;
                }
                
                .service-icon-wrapper {
                    width: 80px;
                    height: 80px;
                }
                
                .service-icon {
                    font-size: 2rem;
                }
                
                .service-title {
                    font-size: 1.1rem;
                }
            }
        </style>
    </section>

    <!-- Portfolio / Produk Section -->
    <section id="produk" class="page-section py-5" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
        <div class="container px-4 px-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
                    <h2 class="fw-bold mb-3" style="font-size: 2.5rem; color: #2c3e50; line-height: 1.2;">
                        Kategori<br>Produk
                    </h2>
                    <p class="text-muted" style="font-size: 1.1rem;">Berbagai kategori produk alat kesehatan berkualitas untuk kebutuhan medis Anda</p>
                </div>
                <div class="col-lg-8 order-lg-1">
                    @if($product->count() > 0)
                        <div class="row g-4">
                            @foreach ($product as $item)
                                <div class="col-md-6 col-lg-4">
                                    <div class="category-card h-100">
                                        <div class="category-image-wrapper">
                                            <img src="{{ asset('storage/' . $item->icon) }}" 
                                                 alt="{{ $item->description }}" 
                                                 class="category-image">
                                        </div>
                                        <h4 class="category-title">{{ $item->description }}</h4>
                                        <a href="/produk-kami#{{ $item->slug }}" class="category-button">
                                            Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-box-seam" style="font-size: 4rem; color: #6c757d; opacity: 0.5;"></i>
                            <p class="text-muted mt-3">Tidak ada produk tersedia saat ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <style>
            .category-card {
                background: white;
                border-radius: 20px;
                padding: 2rem 1.5rem;
                text-align: center;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(0, 0, 0, 0.05);
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
            .category-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #1e30f3 0%, #1a28d9 100%);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .category-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 40px rgba(30, 48, 243, 0.15);
            }
            
            .category-card:hover::before {
                transform: scaleX(1);
            }
            
            .category-image-wrapper {
                width: 100px;
                height: 100px;
                margin: 0 auto 1.5rem;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                border-radius: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                padding: 15px;
            }
            
            .category-card:hover .category-image-wrapper {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                transform: scale(1.05);
                box-shadow: 0 8px 25px rgba(30, 48, 243, 0.2);
            }
            
            .category-image {
                width: 100%;
                height: 100%;
                object-fit: contain;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .category-title {
                font-size: 1.15rem;
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 1.25rem;
                transition: color 0.3s;
                min-height: 55px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .category-card:hover .category-title {
                color: #1e30f3;
            }
            
            .category-button {
                background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
                color: white;
                border: none;
                padding: 10px 25px;
                border-radius: 25px;
                font-weight: 600;
                font-size: 0.9rem;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 5px;
                margin-top: auto;
                box-shadow: 0 4px 15px rgba(30, 48, 243, 0.2);
            }
            
            .category-button:hover {
                background: linear-gradient(135deg, #1a28d9 0%, #1e30f3 100%);
                transform: translateX(5px);
                color: white;
                box-shadow: 0 6px 20px rgba(30, 48, 243, 0.3);
            }
            
            @media (max-width: 768px) {
                .category-card {
                    padding: 1.5rem 1rem;
                }
                
                .category-image-wrapper {
                    width: 80px;
                    height: 80px;
                }
                
                .category-title {
                    font-size: 1rem;
                    min-height: 50px;
                }
            }
        </style>
    </section>

    <section class="page-section py-5" id="klien" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container px-4 px-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-5 mb-lg-0 order-lg-1">
                    <span class="clients-section-label">Klien Kami</span>
                    <h2 class="clients-heading">Perusahaan yang mempercayai kami</h2>
                    <p class="clients-subtitle">Perusahaan terpercaya yang mempercayai layanan dan produk kami</p>
                    <div class="clients-meta">
                        <div class="clients-meta-item">
                            <i class="bi bi-building"></i>
                            <span>Rumah sakit dan klinik</span>
                        </div>
                        <div class="clients-meta-item">
                            <i class="bi bi-heart"></i>
                            <span>Laboratorium dan fasilitas medis</span>
                        </div>
                        <div class="clients-meta-item">
                            <i class="bi bi-geo-alt"></i>
                            <span>Berbagai wilayah di Indonesia</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-lg-2">
                    @if($clients->count() > 0)
                        <div class="clients-card">
                            <div class="clients-card-inner">
                                <div class="clients-grid">
                                    @foreach ($clients as $client)
                                        @if($client->image_size === 'large')
                                            <div class="client-item client-item-large">
                                                <img src="{{ asset('storage/' . $client->image) }}" 
                                                     alt="{{ $client->name }}" 
                                                     class="img-fluid">
                                            </div>
                                        @else
                                            <div class="client-item">
                                                <img src="{{ asset('storage/' . $client->image) }}" 
                                                     alt="{{ $client->name }}" 
                                                     class="img-fluid">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-people" style="font-size: 4rem; color: #6c757d; opacity: 0.5;"></i>
                            <p class="text-muted mt-3">Tidak ada klien tersedia saat ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
