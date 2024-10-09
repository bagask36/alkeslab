@extends('template.index')

@section('title', 'Produk Kami')

@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/img3.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-2 fw-bolder text-primary">PRODUK KAMI</h1>
        </div>
    </header>

    <!-- Open Section-->
    <section class="bg-white py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl">
                    <div class="text-center my-5">
                        <p class="lead mb-4">PT Alkeslab adalah perusahaan yang bergerak dalam beberapa bidang bisnis,
                            termasuk distribusi produk, penyediaan layanan berkualitas, pemeliharaan perangkat, dan jasa
                            pengangkutan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Barang Medis Habis Pakai -->
    <section class="bg-white py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:black">BARANG MEDIS HABIS PAKAI</span>
            </h1>
        </div>
        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('app/assets/content/img12.png') }}" class="img-fluid" alt="Klien Besar" />
                </div>
            </div>
        </div>
    </section>

    <!-- Alat Kesehatan -->
    <section class="bg-white py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:black">ALAT KESEHATAN</span>
            </h1>
        </div>
        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('app/assets/content/img13.png') }}" class="img-fluid" alt="Klien Besar" />
                </div>
            </div>
        </div>
    </section>

    <!-- Furniture Rumah Sakit -->
    <section class="bg-light py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:black">FURNITURE RUMAH SAKIT</span>
            </h1>
        </div>
        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('app/assets/content/img14.png') }}" class="img-fluid" alt="Klien Besar" />
                </div>
            </div>
        </div>
    </section>

    <!-- Linen -->
    <section class="bg-white py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:black">LINEN</span>
            </h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/img26.png') }}" class="img-fluid" alt="Klien 1"
                        style="height: 350px; object-fit: cover;" />
                </div>
                <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/img27.png') }}" class="img-fluid" alt="Klien 2"
                        style="height: 300px; object-fit: cover;" />
                </div>
            </div>
        </div>
    </section>

    <!-- Laboratorium -->
    <section class="bg-light py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:black">LABORATORIUM</span>
            </h1>
        </div>
        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('app/assets/content/') }}" class="img-fluid" alt="laboratorium" />
                </div>
            </div>
        </div>
    </section>

    <!-- Teknis Medis Project -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                Teknis Medis Project :
            </div>
        </div>
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl">
                    <div class="text-center my-5">
                        <p class="lead mb-4">PT Alkeslab menawarkan beragam jasa layanan yang mencakup perbaikan UV LIGHT,
                            perbaikan lampu operasi, perbaikan AutoClave, proyek pengangkutan (Trucking Project), dan
                            instalasi sistem RO (Reverse Osmosis) untuk memenuhi kebutuhan berbagai sektor industri.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PERBAIKAN ALAT MEDIS  |  SERVICES & MAINTENANCE ALAT MEDIS  |  INSTALANSI ALAT MEDIS -->
    <section class="bg-light py-5">
        <div class="text-center mb-5 mt-5">
            <h2 class="fw-bold text-secondary">
                <span style="color:black">PERBAIKAN ALAT MEDIS | SERVICES & MAINTENANCE ALAT MEDIS | INSTALANSI ALAT MEDIS
                </span>
            </h2>
        </div>
    </section>

    <!-- Foto-Foto -->
    <section class="bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/image 16.png') }}" class="img-fluid" alt="Klien 1"
                        style="height: 300px; object-fit: cover;" />
                    <p class="mt-2 text-center fw-bolder">PERBAIKAN UV LIGHT</p>
                </div>
                <div class="col-md-6 mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/image 17.png') }}" class="img-fluid" alt="Klien 2"
                        style="height: 300px; object-fit: cover;" />
                    <p class="mt-2 text-center fw-bolder">PERBAIKAN LAMPU OPERASI</p>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/image 18.png') }}" class="img-fluid" alt="Gambar 18" />
                    <p class="mt-2 text-center fw-bolder">PERBAIKAN AUTOCLAVE</p>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/image 19.png') }}" class="img-fluid" alt="Gambar 19" />
                    <p class="mt-2 text-center fw-bolder">TRUCKING PROJECT</p>
                    <p class="text-center"> Project (trucking, CV)</p>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/image 20.png') }}" class="img-fluid" alt="Gambar 20" />
                    <p class="mt-2 text-center fw-bolder">INSTALASI RO (REVERSE OSMOSIS)</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Project -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                OTHER PROJECT :
            </div>
        </div>
    </section>


@endsection
