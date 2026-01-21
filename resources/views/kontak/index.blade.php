@extends('template.index')
@section('title', 'Kontak Kami')

@push('css')
<style>
    /* Masthead customization */
    .masthead {
        background-image: url('{{ asset('new-template/image/kontak.png') }}') !important;
        background-size: cover !important;
        background-position: center !important;
        background-attachment: fixed !important;
        background-repeat: no-repeat !important;
        position: relative;
    }
    
    /* Overlay kehitaman tipis untuk readability */
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
    
    .masthead > * {
        position: relative;
        z-index: 2;
    }
    
    /* Mobile view optimization */
    @media (max-width: 768px) {
        .masthead {
            background-attachment: scroll !important;
            background-position: center center !important;
            background-size: cover !important;
        }
    }
    
    /* Section Label */
    .contact-section-label {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #1e30f3;
        background: rgba(30, 48, 243, 0.1);
        margin-bottom: 1rem;
    }
    
    .contact-section-heading {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2c3e50;
        margin-bottom: 1rem;
        line-height: 1.2;
    }
    
    .contact-section-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 3rem;
    }
    
    /* Modern Contact Cards */
    .contact-card-modern {
        background: #ffffff;
        border-radius: 24px;
        padding: 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        overflow: hidden;
        border: 1px solid rgba(30, 48, 243, 0.1);
        position: relative;
    }
    
    .contact-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
    }
    
    .contact-card-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(30, 48, 243, 0.15);
        border-color: rgba(30, 48, 243, 0.3);
    }
    
    .contact-card-header {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.05) 0%, rgba(30, 48, 243, 0.02) 100%);
        padding: 2.5rem 2rem;
        text-align: center;
        border-bottom: 1px solid rgba(30, 48, 243, 0.1);
    }
    
    .contact-icon-wrapper {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 20px rgba(30, 48, 243, 0.25);
        transition: all 0.3s ease;
    }
    
    .contact-card-modern:hover .contact-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 30px rgba(30, 48, 243, 0.35);
    }
    
    .contact-icon {
        font-size: 2.5rem;
        color: white;
    }
    
    .contact-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
    }
    
    .contact-card-body {
        padding: 2rem;
    }
    
    .contact-info-item-modern {
        background: #f8f9ff;
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .contact-info-item-modern:last-child {
        margin-bottom: 0;
    }
    
    .contact-info-item-modern:hover {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.05) 0%, rgba(30, 48, 243, 0.02) 100%);
        border-color: rgba(30, 48, 243, 0.2);
        transform: translateX(5px);
    }
    
    .contact-info-item-modern a {
        color: #2c3e50;
        text-decoration: none;
        font-size: 1.05rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }
    
    .contact-info-item-modern a:hover {
        color: #1e30f3;
    }
    
    .contact-info-item-modern i {
        color: #1e30f3;
        font-size: 1.3rem;
        width: 24px;
        flex-shrink: 0;
    }
    
    /* WhatsApp Button Modern */
    .whatsapp-btn-modern {
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        color: white !important;
        padding: 1rem 1.75rem;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.05rem;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        width: 100%;
        justify-content: center;
    }
    
    .whatsapp-btn-modern:hover {
        background: linear-gradient(135deg, #128C7E 0%, #25D366 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        color: white !important;
    }
    
    .whatsapp-btn-modern i {
        font-size: 1.3rem;
    }
    
    /* Address section - Same as tentang-kami */
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
    
    .address-card iframe {
        border-radius: 15px;
        width: 100%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .address-details {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }
    
    .address-details p {
        margin-bottom: 0.75rem;
        color: #6c757d;
        font-size: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .address-details i {
        color: var(--bs-primary);
    }
    
    /* Ensure title and content are always on separate rows */
    #contact-methods .container > .row:first-child,
    #address .container > .row:first-child {
        display: block !important;
        width: 100% !important;
        margin-bottom: 3rem !important;
    }
    
    #contact-methods .container > .container,
    #address .container > .row:last-child {
        display: block !important;
        width: 100% !important;
        margin-top: 0 !important;
    }
    
    /* Ensure contact cards are always in 1 row on desktop */
    @media (min-width: 992px) {
        /* Force grid layout */
        #contact-cards-row {
            display: grid !important;
            grid-template-columns: 1fr 1fr 1fr !important;
            gap: 1.5rem !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        
        /* Reset Bootstrap column behavior */
        #contact-cards-row > div.col-lg-4 {
            width: 100% !important;
            max-width: 100% !important;
            flex: none !important;
            float: none !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    }
    
    /* Responsive Design */
    @media (max-width: 991.98px) {
        .masthead {
            background-attachment: scroll;
            padding: 4rem 0;
        }
        
        .contact-section-heading {
            font-size: 2rem;
        }
        
        /* Allow cards to wrap on tablet and mobile */
        #contact-cards-row {
            flex-wrap: wrap !important;
        }
        
        #contact-cards-row > div {
            flex: 0 0 auto !important;
            max-width: 100% !important;
            width: 100% !important;
        }
        
        .contact-card-modern {
            margin-bottom: 2rem;
        }
        
        .contact-card-header {
            padding: 2rem 1.5rem;
        }
        
        .contact-icon-wrapper {
            width: 70px;
            height: 70px;
        }
        
        .contact-icon {
            font-size: 2rem;
        }
        
        .address-card {
            padding: 2rem;
        }
        
        .address-card iframe {
            height: 300px;
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
        
        .contact-section-heading {
            font-size: 1.75rem;
        }
        
        .contact-section-subtitle {
            font-size: 1rem;
            margin-bottom: 2rem;
        }
        
        .contact-card-header {
            padding: 1.5rem;
        }
        
        .contact-icon-wrapper {
            width: 60px;
            height: 60px;
        }
        
        .contact-icon {
            font-size: 1.75rem;
        }
        
        .contact-card-title {
            font-size: 1.3rem;
        }
        
        .contact-card-body {
            padding: 1.5rem;
        }
        
        .contact-info-item-modern {
            padding: 1rem 1.25rem;
        }
        
        .contact-info-item-modern a {
            font-size: 0.95rem;
        }
        
        /* Smaller font for email address on mobile */
        .contact-info-item-modern a[href^="mailto:"] {
            font-size: 0.675rem !important;
            word-break: break-word;
        }
        
        .contact-info-item-modern a[href^="mailto:"] span {
            font-size: 0.675rem !important;
            line-height: 1.4;
        }
        
        .whatsapp-btn-modern {
            padding: 0.875rem 1.5rem;
            font-size: 0.95rem;
        }
        
        .address-card {
            padding: 1.5rem;
        }
        
        .address-card h3 {
            font-size: 1.1rem;
        }
        
        .address-card iframe {
            height: 250px;
        }
        
        .address-details p {
            font-size: 0.9rem;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
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
                    <h1 class="text-white font-weight-bold">Kontak Kami</h1>
                    <hr class="divider divider-light" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Hubungi kami untuk informasi lebih lanjut tentang produk dan layanan kami</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Contact Methods Section -->
    <section class="page-section" id="contact-methods" style="padding: 6rem 0;">
        <!-- Title Section - Separate Container -->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-12 text-center">
                    <span class="contact-section-label">Kontak</span>
                    <h2 class="contact-section-heading">Hubungi Kami</h2>
                    <p class="contact-section-subtitle">
                        Pilih metode kontak yang paling nyaman untuk Anda. Tim kami siap membantu menjawab pertanyaan dan kebutuhan Anda.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Content Section - Separate Container Below -->
        <div class="container px-4 px-lg-5" style="max-width: 1200px;">
            <div class="row gx-4 gx-lg-5 justify-content-center" id="contact-cards-row">
                <!-- Telepon -->
                <div class="col-lg-4 mb-4">
                    <div class="contact-card-modern">
                        <div class="contact-card-header">
                            <div class="contact-icon-wrapper">
                                <i class="bi bi-telephone-fill contact-icon"></i>
                            </div>
                            <h3 class="contact-card-title">Telepon</h3>
                        </div>
                        <div class="contact-card-body">
                            @forelse($phone as $item)
                                @php
                                    $phoneNumber = $item['number'] ?? '';
                                    $phoneName = $item['name'] ?? '';
                                    $formattedPhone = format_phone_number($phoneNumber);
                                    // For tel: link, use original number but ensure it starts with 0
                                    $cleanNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
                                    if (substr($cleanNumber, 0, 2) === '62') {
                                        $cleanNumber = '0' . substr($cleanNumber, 2);
                                    } elseif (substr($cleanNumber, 0, 1) !== '0') {
                                        $cleanNumber = '0' . $cleanNumber;
                                    }
                                    $telLink = 'tel:' . $cleanNumber;
                                @endphp
                                <div class="contact-info-item-modern">
                                    <a href="{{ $telLink }}">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span>
                                            @if($phoneName)
                                                <strong>{{ $phoneName }}:</strong> 
                                            @else
                                                <strong>Telepon:</strong>
                                            @endif
                                            {{ $formattedPhone }}
                                        </span>
                                    </a>
                                </div>
                            @empty
                                <div class="contact-info-item-modern">
                                    <span style="color: #6c757d;">Belum ada nomor telepon</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-lg-4 mb-4">
                    <div class="contact-card-modern">
                        <div class="contact-card-header">
                            <div class="contact-icon-wrapper" style="background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);">
                                <i class="bi bi-whatsapp contact-icon"></i>
                            </div>
                            <h3 class="contact-card-title">WhatsApp</h3>
                        </div>
                        <div class="contact-card-body">
                            @forelse($whatsapp as $item)
                                @php
                                    $waNumber = $item['number'] ?? '';
                                    $waName = $item['name'] ?? '';
                                    $formattedWA = format_whatsapp_number($waNumber);
                                    $waLink = get_whatsapp_link($waNumber);
                                @endphp
                                <a href="{{ $waLink }}" target="_blank" class="whatsapp-btn-modern {{ !$loop->last ? 'mb-3' : '' }}">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>
                                        @if($waName)
                                            {{ $waName }}: {{ $formattedWA }}
                                        @else
                                            {{ $formattedWA }}
                                        @endif
                                    </span>
                                </a>
                            @empty
                                <div class="contact-info-item-modern">
                                    <span style="color: #6c757d;">Belum ada nomor WhatsApp</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-4 mb-4">
                    <div class="contact-card-modern">
                        <div class="contact-card-header">
                            <div class="contact-icon-wrapper">
                                <i class="bi bi-envelope-fill contact-icon"></i>
                            </div>
                            <h3 class="contact-card-title">Email</h3>
                        </div>
                        <div class="contact-card-body">
                            @forelse($email as $emailAddress)
                                <div class="contact-info-item-modern">
                                    <a href="mailto:{{ $emailAddress }}">
                                        <i class="bi bi-envelope-fill"></i>
                                        <span>{{ $emailAddress }}</span>
                                    </a>
                                </div>
                            @empty
                                <div class="contact-info-item-modern">
                                    <span style="color: #6c757d;">Belum ada email</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Address Section -->
    <section class="page-section bg-primary" id="address">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <!-- Title Section -->
                <div class="col-lg-4 text-center text-lg-start mb-5 mb-lg-0">
                    <h2 class="text-white mt-0">Alamat Kami</h2>
                    <hr class="divider divider-light ms-lg-0" />
                    <p class="text-white-75 mb-4">
                        Kunjungi kantor dan gudang kami untuk melihat produk dan konsultasi langsung dengan tim kami.
                    </p>
                </div>

                <!-- Address Card -->
                <div class="col-lg-8">
                    <div class="address-card">
                        <h3 class="text-center mb-4" style="color: #1e30f3;">
                            <i class="bi bi-building me-2"></i>HEAD OFFICE & WAREHOUSE
                        </h3>
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
                        <div class="address-details">
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                <strong>Jl. Grand Sentul City Blok C4-02 No. 10 RT. 02/RW. 01<br>
                                Desa Cadas Ngampar Kec. Sukaraja - Kab. Bogor</strong>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
