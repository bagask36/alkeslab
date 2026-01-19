@extends('template.index')

@section('title', 'Kontak Kami')

@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/tentangkami.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-4 fw-bolder text-primary" id="about-title">
                <span class="split-text">Kontak</span>
                <span class="split-text">Kami</span>
            </h1>
        </div>
    </header>


    <!-- Telepon Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">TELEPON</span>
            </h1>
        </div>
        <div class="container">
            <!-- Left column -->
            <div class="col-md-6 mb-4 px-4 text-center">
                <p class="text-center" style="padding-top: 10px;">
                    <a href="tel:02129098991"><i class="bi bi-telephone-fill icon-align"></i>021-29098991</a>
                </p>
                <p class="text-center" style="padding-top: 10px;">
                    <a href="tel:02122968221"><i class="bi bi-telephone-fill icon-align"></i>021-22968221</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Whatsapp Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">WHATSAPP</span>
            </h1>
        </div>
        <div class="container">
            <!-- Left column -->
            <div class="col-md-6 mb-4 px-4 text-center">
                <p class="text-center" style="padding-top: 10px;"><i class="bi bi-whatsapp" style="font-size: 20px; padding-right: 8px"></i>Admin :
                    <a href="https://api.whatsapp.com/send?phone=6282280848541">
                        0822 8084 8541
                    </a>
                </p>
                <p class="text-center" style="padding-top: 10px;"> <i class="bi bi-whatsapp" style="font-size: 20px; padding-right: 8px"></i>Sales Marketing :
                    <a href="https://api.whatsapp.com/send?phone=6282260895899">
                        0822 6089 5899
                    </a>
                </p>
            </div>
    </section>

    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">E-MAIL</span>
            </h1>
        </div>
        <div class="container">
            <!-- Left column -->
            <div class="col-md-6 mb-4 px-4 text-center">
                <p class="text-center" style="padding-top: 10px;"><a
                        href="mailto:alkeslab.primatama@gmail.com"> <i class="bi bi-envelope-fill" style="font-size: 20px; vertical-align: middle; margin-right: 5px;"></i>alkeslab.primatama@gmail.com</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Alamat Kami Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">ALAMAT KAMI</span>
            </h1>
        </div>
        <div class="container">
            <!-- Left column -->
            <div class="col-md-6 mb-4 px-4 text-center">
                <div class="mb-2">
                    <h4 class="fw-bold text-secondary">
                        <span style="color:#1e30f3">HEAD OFFICE & WAREHOUSE</span>
                    </h4>
                </div>
                <div class="card mx-auto bg-light" style="border-radius: 20px">
                    <div class="card-body">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1034.9873891408463!2d106.83947878647712!3d-6.56998393584498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c694a19088e3%3A0xd66931f4835b2a77!2sPT.ALKESLAB%20PRIMATAMA!5e0!3m2!1sen!2sid!4v1728397491555!5m2!1sen!2sid"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <p style="padding-top: 10px">Jl. Grand Sentul City Blok C4-02 No. 10 RT. 02/RW. 01
                    Desa
                    Cadas Ngampar Kec. Sukaraja- Kab. Bogor
                </p>
            </div>
    </section>


@endsection
