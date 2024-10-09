@extends('template.index')
@section('title', 'Home')
@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/mask-group.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-2 fw-bolder text-primary">PT. ALKESLAB PRIMATAMA</h1>
        </div>
    </header>
    <!-- Open Section-->
    <section class="bg-white py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-10">
                    <div class="text-center my-5">
                        <p class="lead mb-4">PT. Alkeslab Primatama adalah perusahaan yang bergerak dibidang
                            penyedia Alat Kesehatan, Peralatan Medis & Laboratorium, Produksi Cairan & Bubuk Hemodialisa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Kami Section -->
    <section class="bg-white py-5 bg-success">
        <div class="text-center mb-5">
            <div class="button-area">
                Produk Kami :
            </div>
        </div>
        <div class="container text-center my-5">
            <div class="row justify-content-center">
                <div class="d-flex flex-wrap justify-content-center gap-5">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('storage/image.png') }}" class="card-img-top img-fluid"
                                alt="Barang Medis Habis Pakai">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Barang Medis Habis Pakai</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/alatkesehatan.png') }}" class="card-img-top img-fluid"
                                alt="Alat Kesehatan">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Alat Kesehatan</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/furniture.png') }}" class="card-img-top img-fluid"
                                alt="Furniture Rumah Sakit">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Furniture Rumah Sakit</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/image.png') }}" class="card-img-top img-fluid"
                                alt="Linen">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Linen</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/laboratorium.png') }}" class="card-img-top img-fluid"
                                alt="Laboratorium">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Laboratorium</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teknis Medis Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                Teknis Medis Project :
            </div>
        </div>
        <div class="container text-center mt-5">
            <div class="d-flex flex-wrap justify-content-center gap-5">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/alatperbaikan.png') }}" class="card-img-top img-fluid"
                                alt="Barang Perbaikan Alat Kesehatan">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Perbaikan Alat Kesehatan</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/alatmedis.png') }}" class="card-img-top img-fluid"
                                alt="Services & Maintenance Alat Medis">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Services & Maintenance Alat Medis</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card-home position-relative bg-light">
                            <img src="{{ asset('app/assets/content/instalasialat.png') }}" class="card-img-top img-fluid"
                                alt="Instalansi Alat Medis">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bolder">Instalansi Alat Medis</h5>
                                <a href="#" class="btn btn-primary fixed-btn">Selengkapnya ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Klien Kami Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                Teknis Medis Project :
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/radjakgroup.png') }}" class="img-fluid" alt="Klien 1"
                        style="height: 250px; object-fit: cover;" />
                </div>
                <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('app/assets/content/univmht.png') }}" class="img-fluid" alt="Klien 2"
                        style="height: 500x; object-fit: cover;" />
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('app/assets/content/img22.png') }}" class="img-fluid" alt="Klien Besar" />
                </div>
            </div>
        </div>
    </section>

    <section class="scroll-section">
        <div class="scroll-container">
            <div class="scroll-content">
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 1"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 2"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 3"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 4"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 1"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 2"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 3"></div>
                <div class="scroll-item"><img src="{{ asset('app/assets/content/img22.png') }}" alt="Image 4"></div>
            </div>
        </div>
    </section>



    </main>
@endsection
