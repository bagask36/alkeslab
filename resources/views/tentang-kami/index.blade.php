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
    
    /* Feature cards */
    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        border-left: 4px solid var(--bs-primary);
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(30, 48, 243, 0.15);
    }
    
    .feature-icon {
        font-size: 2.5rem;
        color: var(--bs-primary);
        margin-bottom: 1rem;
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
    
    /* Clients grid */
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
    
    /* Address section */
    .address-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .address-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    }
    
    .address-card iframe {
        border-radius: 15px;
        width: 100%;
    }
    
    .contact-info {
        margin-top: 1.5rem;
    }
    
    .contact-info p {
        margin-bottom: 0.5rem;
        color: #6c757d;
        font-size: 1rem;
    }
    
    .contact-info i {
        color: var(--bs-primary);
        margin-right: 0.5rem;
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
    <section class="page-section" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Tentang Kami</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">
                        PT. Alkeslab Primatama adalah perusahaan yang bergerak di bidang distribusi alat kesehatan 
                        yang mencakup Radiologi, Laboratorium, Barang Medis Habis Pakai (BMHP). Kami juga 
                        menyediakan Jasa Servis & Perawatan Alat Kesehatan dengan tim profesional dan berpengalaman.
                    </p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 mt-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card text-center">
                        <i class="bi bi-star-fill feature-icon"></i>
                        <h4 class="h5 mb-3">Banyak Brand Terpercaya</h4>
                        <p class="text-muted mb-0">Menyediakan banyak brand alat kesehatan berkualitas tinggi dari berbagai produsen terkemuka</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card text-center">
                        <i class="bi bi-shield-check feature-icon"></i>
                        <h4 class="h5 mb-3">Layanan Purna Jual Prima</h4>
                        <p class="text-muted mb-0">Memiliki layanan purna jual yang prima dengan dukungan teknis dan maintenance berkala</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card text-center">
                        <i class="bi bi-people feature-icon"></i>
                        <h4 class="h5 mb-3">SDM Berkualitas</h4>
                        <p class="text-muted mb-0">Didukung SDM berkualitas dan manajemen yang baik untuk memberikan pelayanan terbaik</p>
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
    <section class="page-section" id="clients">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="mt-0">Klien Kami</h2>
                    <hr class="divider" />
                    <p class="text-muted">Perusahaan terpercaya yang mempercayai layanan dan produk kami</p>
                </div>
            </div>
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

    <!-- Address Section -->
    <section class="page-section bg-dark text-white" id="address">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="text-white mt-0">Alamat Kami</h2>
                    <hr class="divider divider-light" />
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="address-card">
                        <h3 class="text-center mb-4" style="color: #1e30f3;">
                            <i class="bi bi-building me-2"></i>HEAD OFFICE & WAREHOUSE
                        </h3>
                        <div class="mb-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1034.9873891408463!2d106.83947878647712!3d-6.56998393584498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c694a19088e3%3A0xd66931f4835b2a77!2sPT.ALKESLAB%20PRIMATAMA!5e0!3m2!1sen!2sid!4v1728397491555!5m2!1sen!2sid"
                                width="100%" 
                                height="300" 
                                style="border:0; border-radius: 15px;" 
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="contact-info text-center">
                            <p class="mb-3">
                                <i class="bi bi-geo-alt-fill"></i>
                                <strong>Jl. Grand Sentul City Blok C4-02 No. 10 RT. 02/RW. 01<br>
                                Desa Cadas Ngampar Kec. Sukaraja - Kab. Bogor</strong>
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-telephone-fill"></i>
                                <a href="tel:082280848541" class="text-decoration-none" style="color: #1e30f3;">
                                    <strong>0822 8084 8541</strong> (Admin)
                                </a>
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-telephone-fill"></i>
                                <a href="tel:082124529567" class="text-decoration-none" style="color: #1e30f3;">
                                    <strong>0821 2452 9567</strong> (Sales Marketing)
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
