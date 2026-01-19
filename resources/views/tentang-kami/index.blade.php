@extends('template.index')
@section('title', 'Tentang Kami')
@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/tentangkami.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-4 fw-bolder text-primary" id="about-title">
                <span class="split-text">Tentang</span>
                <span class="split-text">Alkeslab</span>
                <span class="split-text">Primatama</span>
            </h1>
        </div>
    </header>
    <!-- Tentang Kami Open -->
    <section class="bg-white py-5">
        <div class="container">
            <div class="row">
                <p class="text-center">PT. Alkeslab Primatama adalah perusahaan yang bergerak dibidang distribusi alat
                    kesehatan
                    yang mencakup Radiologi, Laoratorium, Barang Medis Habis Pakai (BMHP). Kami juga
                    menyediakan Jasa Servis & Perawatan Alat Kesehatan. </p>
                <div class="container px-5 my-5">
                    <div class="card shadow bg-primary">
                        <div class="card-body p-4">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-star-fill me-2 text-white" style="font-style:normal">
                                                <p class="d-inline"> Menyediakan banyak brand alat kesehatan</p>
                                            </i>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-star-fill me-2 text-white" style="font-style:normal">
                                                <p class="d-inline"> Memiliki layanan purna jual yang prima</p>
                                            </i>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-star-fill me-2 text-white" style="font-style:normal">
                                                <p class="d-inline"> Didukung SDM Berkualitas dan Manajemen yang baik</p>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">VISI</span>
            </h1>
        </div>
        <div class="container px-5 my-5">
            <div class="card shadow bg-primary">
                <div class="card-body p-4"> <!-- Reduced padding for mobile -->
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <p class="text-white mb-0">Menjadi perusahaan manufaktur dan distributor alat kesehatan yang
                                handal dan terpercaya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Misi -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">MISI</span>
            </h1>
        </div>
        <div class="container px-5 my-5">
            <div class="card shadow bg-primary">
                <div class="card-body p-5"> <!-- Set padding for the card body -->
                    <div class="text-left text-white">
                        <ol class="mb-0 text-white"> <!-- Changed mb-4 to mb-0 to reduce margin -->
                            <li class="mb-2">Melaksanakan produksi alat kesehatan</li>
                            <li class="mb-2">Menyelenggarakan penyediaan alat kesehatan</li>
                            <li class="mb-2">Menyelenggarakan evaluasi penyediaan alat kesehatan</li>
                            <li class="mb-2">Menyelenggarakan perawatan di fasilitas pelayanan kesehatan dan rumah sakit.
                                Mengembangkan sarana, prasarana, dan fasilitas yang terkait dengan alat kesehatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- Sertifikat -->
    <section class="bg-white py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span>
                    <h1 class="fw-bolder text-primary">LEGALITAS</h1>
                </span>
            </h1>
        </div>
        <div class="container px-5 my-5">
            <div class="card shadow bg-primary">
                <div class="card-body p-5"> <!-- Maintain padding for the card body -->
                    <div class="text-left text-white">
                        @if ($legalitasDocuments->isEmpty())
                            <p class="text-warning">No legalitas documents available.</p>
                        @else
                            <ol class="mb-0 text-white"> <!-- Changed mb-4 to mb-0 to reduce margin -->
                                @foreach ($legalitasDocuments as $document)
                                    <li class="mb-2">
                                        {{ $document->name }}
                                        <a href="{{ asset('storage/' . $document->file) }}" download
                                            class="text-white text-decoration-underline">Unduh disini</a>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">Klien Kami</h1>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                @foreach ($clients as $client)
                    @if ($client->image_size === 'small' && ($client->id === 1 || $client->id === 2))
                        <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . $client->image) }}" class="img-fluid" alt="{{ $client->name }}"
                                style="height: auto; object-fit: cover; border-radius:10px;" />
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                @foreach ($clients as $client)
                    @if ($client->image_size === 'small' && $client->id !== 1 && $client->id !== 2)
                        <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
                            <!-- Adjusted column for 4 images -->
                            <img src="{{ asset('storage/' . $client->image) }}" class="img-fluid client-image"
                                alt="{{ $client->name }}" style="height: auto; object-fit: cover; border-radius:10px;" />
                        </div>
                    @endif
                @endforeach
            </div>
        </div>




        @foreach ($clients as $client)
            @if ($client->image_size === 'large')
                <div class="container">
                    <!-- Large Image Placeholder -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <img src="{{ asset('storage/' . $client->image) }}" class="img-fluid" alt="{{ $client->name }}"
                                style="height: auto; object-fit: cover; border-radius:10px;" />
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
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
                    <h1 class="fw-bold text-secondary">
                        <span style="color:#1e30f3">HEAD OFFICE & WAREHOUSE</span>
                    </h1>
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
                <p style="padding-top: 10px"><i class="bi bi-telephone-fill icon-align"></i> 0822 8084 8541 (Admin)
                </p>
                <p> <i class="bi bi-telephone-fill icon-align"></i> 0821 2452 9567 (Sales Marketing)
                </p>
            </div>
    </section>
@endsection
