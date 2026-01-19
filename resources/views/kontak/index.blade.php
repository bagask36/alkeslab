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
    
    /* Contact cards */
    .contact-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        text-align: center;
        border-top: 4px solid var(--bs-primary);
    }
    
    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 50px rgba(30, 48, 243, 0.2);
    }
    
    .contact-icon {
        font-size: 3rem;
        color: var(--bs-primary);
        margin-bottom: 1.5rem;
    }
    
    .contact-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1.5rem;
    }
    
    .contact-info-item {
        margin-bottom: 1rem;
        padding: 0.75rem;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:hover {
        background: #f8f9fa;
    }
    
    .contact-info-item a {
        color: #212529;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .contact-info-item a:hover {
        color: var(--bs-primary);
        transform: translateX(5px);
    }
    
    .contact-info-item i {
        color: var(--bs-primary);
        font-size: 1.2rem;
    }
    
    /* WhatsApp specific */
    .whatsapp-link {
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        color: white !important;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 600;
    }
    
    .whatsapp-link:hover {
        background: linear-gradient(135deg, #128C7E 0%, #25D366 100%);
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(37, 211, 102, 0.3);
        color: white !important;
    }
    
    /* Address card */
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
        border: none;
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
    <section class="page-section" id="contact-methods">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <!-- Telepon -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card">
                        <i class="bi bi-telephone-fill contact-icon"></i>
                        <h3>Telepon</h3>
                        <div class="contact-info-item">
                            <a href="tel:02129098991">
                                <i class="bi bi-telephone-fill"></i>
                                <span>021-29098991</span>
                            </a>
                        </div>
                        <div class="contact-info-item">
                            <a href="tel:02122968221">
                                <i class="bi bi-telephone-fill"></i>
                                <span>021-22968221</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card">
                        <i class="bi bi-whatsapp contact-icon"></i>
                        <h3>WhatsApp</h3>
                        <div class="contact-info-item">
                            <a href="https://api.whatsapp.com/send?phone=6282280848541" target="_blank" class="whatsapp-link">
                                <i class="fab fa-whatsapp"></i>
                                <span>0822 8084 8541 (Admin)</span>
                            </a>
                        </div>
                        <div class="contact-info-item">
                            <a href="https://api.whatsapp.com/send?phone=6282260895899" target="_blank" class="whatsapp-link">
                                <i class="fab fa-whatsapp"></i>
                                <span>0822 6089 5899 (Sales)</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card">
                        <i class="bi bi-envelope-fill contact-icon"></i>
                        <h3>Email</h3>
                        <div class="contact-info-item">
                            <a href="mailto:alkeslab.primatama@gmail.com">
                                <i class="bi bi-envelope-fill"></i>
                                <span>alkeslab.primatama@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Address Section -->
    <section class="page-section bg-primary" id="address">
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
                            <p>
                                <i class="bi bi-telephone-fill"></i>
                                <a href="tel:082280848541" style="color: #1e30f3; text-decoration: none;">
                                    <strong>0822 8084 8541</strong> (Admin)
                                </a>
                            </p>
                            <p>
                                <i class="bi bi-telephone-fill"></i>
                                <a href="tel:082124529567" style="color: #1e30f3; text-decoration: none;">
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
