@extends('template.index')
@section('title', 'Kontak Kami')

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
    
    /* Address Section Modern */
    .address-section-modern {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 50%, #1826c2 100%);
        position: relative;
        overflow: hidden;
    }
    
    .address-section-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(226, 30, 128, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(30, 48, 243, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }
    
    .address-card-modern {
        background: white;
        border-radius: 24px;
        padding: 0;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        transition: all 0.4s ease;
        overflow: hidden;
        position: relative;
        z-index: 1;
    }
    
    .address-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.2);
    }
    
    .address-card-header-modern {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        padding: 2rem;
        text-align: center;
        color: white;
    }
    
    .address-card-header-modern h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }
    
    .address-card-header-modern i {
        font-size: 1.75rem;
    }
    
    .address-card-body-modern {
        padding: 2.5rem;
    }
    
    .address-card-body-modern iframe {
        border-radius: 16px;
        width: 100%;
        height: 400px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    
    .address-details-modern {
        padding-top: 2rem;
        border-top: 2px solid #f0f0f0;
    }
    
    .address-detail-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        background: #f8f9ff;
    }
    
    .address-detail-item:last-child {
        margin-bottom: 0;
    }
    
    .address-detail-item:hover {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.05) 0%, rgba(30, 48, 243, 0.02) 100%);
        transform: translateX(5px);
    }
    
    .address-detail-item i {
        color: #1e30f3;
        font-size: 1.5rem;
        margin-top: 0.25rem;
        flex-shrink: 0;
    }
    
    .address-detail-item-content {
        flex: 1;
    }
    
    .address-detail-item-content strong {
        display: block;
        color: #2c3e50;
        font-size: 1.05rem;
        margin-bottom: 0.5rem;
    }
    
    .address-detail-item-content a {
        color: #1e30f3;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.05rem;
        transition: color 0.3s ease;
    }
    
    .address-detail-item-content a:hover {
        color: #1a28d9;
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
        
        .address-card-body-modern {
            padding: 2rem;
        }
        
        .address-card-body-modern iframe {
            height: 350px;
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
        
        .whatsapp-btn-modern {
            padding: 0.875rem 1.5rem;
            font-size: 0.95rem;
        }
        
        .address-card-header-modern {
            padding: 1.5rem;
        }
        
        .address-card-header-modern h3 {
            font-size: 1.3rem;
        }
        
        .address-card-body-modern {
            padding: 1.5rem;
        }
        
        .address-card-body-modern iframe {
            height: 300px;
            margin-bottom: 1.5rem;
        }
        
        .address-detail-item {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .address-detail-item i {
            margin-top: 0;
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
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="contact-section-label">Kontak</span>
                    <h2 class="contact-section-heading">Hubungi Kami</h2>
                    <p class="contact-section-subtitle">
                        Pilih metode kontak yang paling nyaman untuk Anda. Tim kami siap membantu menjawab pertanyaan dan kebutuhan Anda.
                    </p>
                </div>
            </div>
            
            <div class="row gx-4 gx-lg-5">
                <!-- Telepon -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card-modern">
                        <div class="contact-card-header">
                            <div class="contact-icon-wrapper">
                                <i class="bi bi-telephone-fill contact-icon"></i>
                            </div>
                            <h3 class="contact-card-title">Telepon</h3>
                        </div>
                        <div class="contact-card-body">
                            <div class="contact-info-item-modern">
                                <a href="tel:02129098991">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>021-29098991</span>
                                </a>
                            </div>
                            <div class="contact-info-item-modern">
                                <a href="tel:02122968221">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>021-22968221</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card-modern">
                        <div class="contact-card-header">
                            <div class="contact-icon-wrapper" style="background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);">
                                <i class="bi bi-whatsapp contact-icon"></i>
                            </div>
                            <h3 class="contact-card-title">WhatsApp</h3>
                        </div>
                        <div class="contact-card-body">
                            <a href="https://api.whatsapp.com/send?phone=6282280848541" target="_blank" class="whatsapp-btn-modern mb-3">
                                <i class="fab fa-whatsapp"></i>
                                <span>0822 8084 8541 (Admin)</span>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=6282260895899" target="_blank" class="whatsapp-btn-modern">
                                <i class="fab fa-whatsapp"></i>
                                <span>0822 6089 5899 (Sales)</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card-modern">
                        <div class="contact-card-header">
                            <div class="contact-icon-wrapper">
                                <i class="bi bi-envelope-fill contact-icon"></i>
                            </div>
                            <h3 class="contact-card-title">Email</h3>
                        </div>
                        <div class="contact-card-body">
                            <div class="contact-info-item-modern">
                                <a href="mailto:alkeslab.primatama@gmail.com">
                                    <i class="bi bi-envelope-fill"></i>
                                    <span>alkeslab.primatama@gmail.com</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Address Section -->
    <section class="page-section address-section-modern" id="address" style="padding: 6rem 0;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="contact-section-label" style="background: rgba(255, 255, 255, 0.2); color: white;">
                        Lokasi
                    </span>
                    <h2 class="text-white mt-0" style="font-size: 2.5rem; font-weight: 800;">Alamat Kami</h2>
                    <p class="text-white-75 mb-0" style="font-size: 1.1rem;">
                        Kunjungi kantor dan gudang kami untuk melihat produk dan konsultasi langsung dengan tim kami.
                    </p>
                </div>
            </div>
            
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="address-card-modern">
                        <div class="address-card-header-modern">
                            <h3>
                                <i class="bi bi-building"></i>
                                HEAD OFFICE & WAREHOUSE
                            </h3>
                        </div>
                        <div class="address-card-body-modern">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1034.9873891408463!2d106.83947878647712!3d-6.56998393584498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c694a19088e3%3A0xd66931f4835b2a77!2sPT.ALKESLAB%20PRIMATAMA!5e0!3m2!1sen!2sid!4v1728397491555!5m2!1sen!2sid"
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                            
                            <div class="address-details-modern">
                                <div class="address-detail-item">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <div class="address-detail-item-content">
                                        <strong>Alamat</strong>
                                        <span>Jl. Grand Sentul City Blok C4-02 No. 10 RT. 02/RW. 01<br>
                                        Desa Cadas Ngampar Kec. Sukaraja - Kab. Bogor</span>
                                    </div>
                                </div>
                                <div class="address-detail-item">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div class="address-detail-item-content">
                                        <strong>Telepon Admin</strong>
                                        <a href="tel:082280848541">0822 8084 8541</a>
                                    </div>
                                </div>
                                <div class="address-detail-item">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div class="address-detail-item-content">
                                        <strong>Telepon Sales Marketing</strong>
                                        <a href="tel:082124529567">0821 2452 9567</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
