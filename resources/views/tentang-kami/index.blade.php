@extends('template.index')
@section('title', 'Tentang Kami')

@push('css')
<style>
    /* Masthead customization */
    .masthead {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.9) 0%, rgba(26, 40, 217, 0.9) 100%),
                    url('{{ asset('app/assets/content/tentangkami.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    /* About Section Title */
    .about-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        position: relative;
        padding-bottom: 0.75rem;
    }
    
    .about-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #ff6b35 0%, #ff8c42 100%);
        border-radius: 2px;
    }
    
    .about-description {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #4a5568;
        margin-top: 1.5rem;
    }
    
    /* Feature cards */
    .feature-card {
        background: white;
        border-radius: 12px;
        padding: 1.75rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        border-left: 4px solid #1e30f3;
        display: flex;
        flex-direction: column;
        margin-bottom: 1.25rem;
    }
    
    .feature-card:last-child {
        margin-bottom: 0;
    }
    
    .feature-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(30, 48, 243, 0.15);
        border-left-color: #ff6b35;
    }
    
    .feature-icon {
        font-size: 2.25rem;
        color: #1e30f3;
        margin-bottom: 1rem;
        transition: color 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        color: #ff6b35;
    }
    
    .feature-card h4 {
        font-size: 1.15rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.75rem;
    }
    
    .feature-card p {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #6c757d;
        margin-bottom: 0;
    }
    
    /* Vision/Mission cards */
    .vision-mission-card {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        border-radius: 20px;
        padding: 3rem 2.5rem;
        box-shadow: 0 10px 40px rgba(30, 48, 243, 0.2);
        color: white;
        transition: all 0.3s ease;
    }
    
    .vision-mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(30, 48, 243, 0.3);
    }
    
    .vision-mission-card h3 {
        color: white;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    
    .vision-mission-card ol,
    .vision-mission-card ul {
        color: white;
    }
    
    .vision-mission-card li {
        margin-bottom: 0.75rem;
        line-height: 1.6;
    }
    
    /* Legalitas section */
    .legalitas-item {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        border-left: 3px solid rgba(255, 255, 255, 0.3);
    }
    
    .legalitas-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(5px);
    }
    
    .legalitas-item a {
        color: #ffd700;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .legalitas-item a:hover {
        color: #ffed4e;
        text-decoration: underline;
    }
    
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
    
    /* Address section */
    .address-section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        position: relative;
        padding-bottom: 0.75rem;
        display: inline-block;
    }
    
    .address-section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: white;
        border-radius: 2px;
    }
    
    .address-card {
        background: white;
        border-radius: 20px;
        padding: 2.75rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }
    
    .address-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
    }
    
    .address-card-header {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .address-card-header i {
        font-size: 2rem;
        color: #1e30f3;
        margin-right: 0.75rem;
    }
    
    .address-card-header h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e30f3;
        margin: 0;
    }
    
    .address-card iframe {
        border-radius: 15px;
        width: 100%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .contact-info {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid #f0f0f0;
    }
    
    .contact-info-item {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        margin-bottom: 1.25rem;
        padding: 0.75rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:hover {
        background: #f8f9ff;
    }
    
    .contact-info-item:last-child {
        margin-bottom: 0;
    }
    
    .contact-info-item i {
        color: #1e30f3;
        margin-right: 0.75rem;
        font-size: 1.25rem;
        margin-top: 0.25rem;
        flex-shrink: 0;
    }
    
    .contact-info-item p {
        margin: 0;
        color: #4a5568;
        font-size: 1rem;
        line-height: 1.6;
    }
    
    .contact-info-item strong {
        color: #2c3e50;
        display: block;
        margin-bottom: 0.25rem;
    }
    
    .contact-info-item a {
        color: #1e30f3;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    
    .contact-info-item a:hover {
        color: #ff6b35;
    }
</style>
@endpush

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Tentang Alkeslab Primatama</h1>
                    <hr class="divider divider-light" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Perusahaan terpercaya di bidang distribusi alat kesehatan dengan komitmen memberikan solusi terbaik untuk kebutuhan medis Anda</p>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="page-section" id="about" style="padding: 5rem 0;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-5 align-items-center">
                <!-- Left Column: About Text -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="about-title">Tentang Kami</h2>
                    <p class="about-description">
                        PT. Alkeslab Primatama adalah perusahaan yang bergerak di bidang distribusi alat kesehatan 
                        yang mencakup Radiologi, Laboratorium, Barang Medis Habis Pakai (BMHP). Kami juga 
                        menyediakan Jasa Servis & Perawatan Alat Kesehatan dengan tim profesional dan berpengalaman.
                    </p>
                </div>
                
                <!-- Right Column: Feature Cards -->
                <div class="col-lg-6">
                    <div class="feature-card">
                        <i class="bi bi-star-fill feature-icon"></i>
                        <h4>Banyak Brand Terpercaya</h4>
                        <p>Menyediakan banyak brand alat kesehatan berkualitas tinggi dari berbagai produsen terkemuka</p>
                    </div>
                    <div class="feature-card">
                        <i class="bi bi-shield-check feature-icon"></i>
                        <h4>Layanan Purna Jual Prima</h4>
                        <p>Memiliki layanan purna jual yang prima dengan dukungan teknis dan maintenance berkala</p>
                    </div>
                    <div class="feature-card">
                        <i class="bi bi-people feature-icon"></i>
                        <h4>SDM Berkualitas</h4>
                        <p>Didukung SDM berkualitas dan manajemen yang baik untuk memberikan pelayanan terbaik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="page-section bg-primary" id="vision">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="text-white mt-0">Visi</h2>
                    <hr class="divider divider-light" />
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="vision-mission-card text-center">
                        <h3 class="mb-0">Menjadi perusahaan manufaktur dan distributor alat kesehatan yang handal dan terpercaya.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="page-section" id="mission">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="mt-0">Misi</h2>
                    <hr class="divider" />
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="vision-mission-card">
                        <h3 class="text-center mb-4">Misi Kami</h3>
                        <ol class="mb-0 ps-4">
                            <li>Melaksanakan produksi alat kesehatan</li>
                            <li>Menyelenggarakan penyediaan alat kesehatan</li>
                            <li>Menyelenggarakan evaluasi penyediaan alat kesehatan</li>
                            <li>Menyelenggarakan perawatan di fasilitas pelayanan kesehatan dan rumah sakit. Mengembangkan sarana, prasarana, dan fasilitas yang terkait dengan alat kesehatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Legalitas Section -->
    <section class="page-section bg-primary" id="legalitas">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="text-white mt-0">Legalitas</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75">Dokumen legalitas dan sertifikat perusahaan kami</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="vision-mission-card">
                        @if ($legalitasDocuments->isEmpty())
                            <p class="text-center text-white-75 mb-0">Tidak ada dokumen legalitas tersedia saat ini</p>
                        @else
                            <ol class="mb-0 ps-0 list-unstyled">
                                @foreach ($legalitasDocuments as $document)
                                    <li class="legalitas-item">
                                        <strong>{{ $document->name }}</strong>
                                        <a href="{{ asset('storage/' . $document->file) }}" download class="ms-2">
                                            <i class="bi bi-download me-1"></i>Unduh disini
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="page-section py-5" id="clients" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container px-4 px-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
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
                <div class="col-lg-8">
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

    <!-- Address Section -->
    <section class="page-section bg-light text-primary" id="address" style="padding: 5rem 0;">
        <div class="container px-4 px-lg-5">
            <!-- Title Row -->
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-12 text-center">
                    <h2 class="address-section-title text-primary">Alamat Kami</h2>
                </div>
            </div>
            
            <!-- Card Row - Separate row below title -->
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="address-card">
                        <div class="address-card-header">
                            <i class="bi bi-building"></i>
                            <h3>HEAD OFFICE & WAREHOUSE</h3>
                        </div>
                        
                        <div class="mb-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1034.9873891408463!2d106.83947878647712!3d-6.56998393584498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c694a19088e3%3A0xd66931f4835b2a77!2sPT.ALKESLAB%20PRIMATAMA!5e0!3m2!1sen!2sid!4v1728397491555!5m2!1sen!2sid"
                                width="100%" 
                                height="350" 
                                style="border:0; border-radius: 15px;" 
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        
                        <div class="contact-info">
                            <div class="contact-info-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>
                                    <strong>Jl. Grand Sentul City Blok C4-02 No. 10 RT. 02/RW. 01<br>
                                    Desa Cadas Ngampar Kec. Sukaraja - Kab. Bogor</strong>
                                </p>
                            </div>
                            <div class="contact-info-item">
                                <i class="bi bi-telephone-fill"></i>
                                <p>
                                    <a href="tel:082280848541">
                                        <strong>0822 8084 8541</strong> (Admin)
                                    </a>
                                </p>
                            </div>
                            <div class="contact-info-item">
                                <i class="bi bi-telephone-fill"></i>
                                <p>
                                    <a href="tel:082124529567">
                                        <strong>0821 2452 9567</strong> (Sales Marketing)
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
