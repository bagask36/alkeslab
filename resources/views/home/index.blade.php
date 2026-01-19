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
    .masthead {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.9) 0%, rgba(26, 40, 217, 0.9) 100%),
                    url('{{ asset('app/assets/content/mask-group.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
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
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .client-item {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 150px;
    }
    
    .client-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    
    .client-item img {
        max-width: 100%;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }
    
    .client-item:hover img {
        filter: grayscale(0%);
    }
    
    .client-item-large {
        grid-column: 1 / -1;
        padding: 3rem;
        min-height: 250px;
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
    <section class="page-section" id="layanan">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Layanan Kami</h2>
            <hr class="divider" />
            @if($layanan->count() > 0)
                <div class="row gx-4 gx-lg-5">
                    @foreach ($layanan as $item)
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="mt-5">
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->name }}" 
                                         class="service-icon"
                                         style="width: 80px; height: 80px; object-fit: contain;">
                                </div>
                                <h3 class="h4 mb-2">{{ $item->name }}</h3>
                                <p class="text-muted mb-0">Layanan profesional untuk kebutuhan medis Anda</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart-pulse service-icon"></i></div>
                            <h3 class="h4 mb-2">Distribusi Alat Kesehatan</h3>
                            <p class="text-muted mb-0">Penyediaan alat kesehatan berkualitas tinggi</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-tools service-icon"></i></div>
                            <h3 class="h4 mb-2">Servis & Perawatan</h3>
                            <p class="text-muted mb-0">Layanan maintenance dan perawatan alat medis</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-shield-check service-icon"></i></div>
                            <h3 class="h4 mb-2">Kualitas Terjamin</h3>
                            <p class="text-muted mb-0">Produk dan layanan dengan standar tinggi</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-people service-icon"></i></div>
                            <h3 class="h4 mb-2">Tim Profesional</h3>
                            <p class="text-muted mb-0">Didukung oleh tim ahli berpengalaman</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Portfolio / Produk Section -->
    <div id="produk" class="page-section">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Kategori Produk</h2>
            <hr class="divider" />
            @if($product->count() > 0)
                <div class="row gx-4 gx-lg-5">
                    @foreach ($product as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="product-card">
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="{{ $item->description }}" 
                                     class="product-card-image">
                                <h3 class="product-card-title">{{ $item->description }}</h3>
                                <a href="/produk-kami#{{ $item->slug }}" class="product-card-button">
                                    Selengkapnya
                                    <i class="bi bi-arrow-right"></i>
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

    <!-- Call to Action -->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Butuh Bantuan? Hubungi Kami Sekarang!</h2>
            <p class="text-white-75 mb-4">Tim kami siap membantu Anda menemukan solusi terbaik untuk kebutuhan alat kesehatan Anda</p>
            <a class="btn btn-light btn-xl" href="/kontak-kami">Hubungi Kami</a>
        </div>
    </section>

    <!-- Klien Kami Section -->
    <section class="page-section" id="klien">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Klien Kami</h2>
            <hr class="divider" />
            <p class="text-center text-muted mb-5">Perusahaan terpercaya yang mempercayai layanan dan produk kami</p>
            @if($clients->count() > 0)
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
            @else
                <div class="text-center py-5">
                    <i class="bi bi-people" style="font-size: 4rem; color: #6c757d; opacity: 0.5;"></i>
                    <p class="text-muted mt-3">Tidak ada klien tersedia saat ini</p>
                </div>
            @endif
        </div>
    </section>
@endsection
