@extends('template.index')
@section('title', 'Tentang Kami')
@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/tentangkami.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-2 fw-bolder text-primary">TENTANG KAMI</h1>
        </div>
    </header>
    <!-- Tentang Kami Open -->
    <div class="container">
        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-md-6 mt-4 mb-3 text-justify">
                <div class="p-3 bg-white">
                    <p style="font-size: 1.6rem">PT. Alkeslab Primatama adalah perusahaan yang bergerak dibidang penyedia
                        Alat
                        Kesehatan, Peralatan Medis
                        & Laboratorium.</p>
                    <ul>
                        <li>
                            <p style="font-size: 1.4rem">Alat Kesehatan Elektromedik Radiasi</p>
                        </li>
                        <li>
                            <p style="font-size: 1.4rem">Alat Kesehatan Elektromedik Non Radiasi</p>
                        </li>
                        <li>
                            <p style="font-size: 1.4rem">Alat Kesehatan Non Elektromedik Steril</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Kolom kanan -->
            <div class="col-md-6 mt-4 mb-3 text-justify">
                <div class="p-3 bg-white">
                    <p style="font-size: 1.6rem">PT. Alkeslab Primatama adalah perusahaan yang bergerak dibidang penyedia
                        Alat
                        Kesehatan, Peralatan Medis
                        & Laboratorium.</p>
                    <ul>
                        <li>
                            <p style="font-size: 1.4rem">Alat Kesehatan Non Elektromedik Non Steril</p>
                        </li>
                        <li>
                            <p style="font-size: 1.4rem">Produk Diagnostik In Vitro</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Profil Pendiri -->
    <div class="container mt-5">
        <div class="row">
            <div class="text-center mb-5">
                <h1 class="fw-bold text-secondary">
                    <span style="color:black">PROFIL</span>
                    <span style="color:#1e30f3">PENDIRI</span>
                </h1>
            </div>
            <div class="text-justify">
                <p style="font-size: 1.6rem">
                    Dr. H. Abdul Radjak, DSOG lulus dari Fakultas Kedokteran Universitas Indonesia (1969) dan berkarir
                    sebagai PNS sambil mengembangkan klinik bersama istrinya, Dr. Sudinaryati, MARS, yang juga seorang
                    dokter.
                </p>
            </div>
            <!-- Image Section -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('app/assets/content/pendiri.png') }}" class="img-fluid rounded" alt="Pendiri"
                    style="max-height: 500px;">

            </div>
            <!-- Text Section -->
            <div class="col-md-8 text-justify">

                <p style="font-size: 1.6rem">
                    Klinik pertamanya, Rumah Bersalin Tegalan, diresmikan pada tahun 1976 oleh Gubernur DKI Jakarta, Ali
                    Sadikin. Klinik ini merupakan cikal bakal usahanya yang kini berkembang menjadi RS Radjak Group.
                </p>
                <p style="font-size: 1.6rem">
                    Dr. H. Abdul Radjak, DSOG tidak hanya aktif di dunia kesehatan dan bisnis, tetapi juga merupakan tokoh
                    nasional dan internasional. Beliau pernah menjadi konsultan WHO dan berkantor di Jenewa, Swiss pada
                    tahun 1986 dan memprakarsai pengobatan jarak jauh untuk negara berkembang, Presiden APCEDM (Asia Pacific
                    Conference on Emergency and Disaster Medicine) ke-11 pada tahun 2012 dan menjadi pembicara di forum
                    nasional dan internasional.
                </p>
            </div>
        </div>
    </div>
    <!-- Visi -->
    <section>
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">VISI</span>
            </h1>
        </div>
        <div class="container px-5 my-5">
            <div class="card shadow border-0 rounded-4 mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center gx-5">
                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                            <p>Menjadi perusahaan produsen dan distributor alat kesehatan yang handal serta terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Misi -->
    <section>
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">MISI</span>
            </h1>
        </div>
        <div class="container px-5 my-5">
            <div class="card shadow border-0 rounded-4 mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center gx-5">
                        <div class="col text-justify text-lg-start mb-4 mb-lg-0">
                            <ol>
                                <li class="mb-2 text-black" style="font-size:1.5rem">Melakukan produksi alat kesehatan</li>
                                <li class="mb-2 text-black" style="font-size:1.5rem">Menyelenggarakan pemasokan peralatan
                                    medik</li>
                                <li class="mb-2 text-black" style="font-size:1.5rem">Menyelenggarakan Evaluasi terhadap
                                    pemasokan peralatan medik</li>
                                <li class="mb-2 text-black" style="font-size:1.5rem">Menyelenggarakan pemeliharaan di
                                    fasilitas pelayanan kesehatan serta Rumah Sakit</li>
                                <li class="mb-2 text-black" style="font-size:1.5rem">Mengembangkan sarana, prasarana dan
                                    fasilitas yang berhubungan dengan peralatan kesehatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sertifikat -->
    <section class="bg-white py-5">
        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:#1e30f3">SERTIFIKAT DISTRIBUSI ALAT KESEHATAN</span>
            </h1>
        </div>
        <div class="container">
            <!-- Large Image -->
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="{{ asset('app/assets/content/img21.png') }}" class="img-fluid" alt="Klien Besar" />
                </div>
            </div>
        </div>
    </section>
    <!-- Klien Kami Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                Klien Kami
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
    <!-- Alamat Kami Section -->
    <div class="text-center mb-5 mt-5">
        <h1 class="fw-bold text-secondary">
            <span style="color:#1e30f3">ALAMAT KAMI</span>
        </h1>
    </div>
    <div class="container my-5">
        <div class="row">
            <!-- Left column -->
            <div class="col-6 mb-4 text-center">
                <div class="mb-2">
                    <h4 class="fw-bold text-secondary">
                        <span style="color:#1e30f3">HEAD OFFICE</span>
                    </h4>
                </div>
                <div class="card mx-3 bg-light" style="border-radius: 20px">
                    <div class="card-body">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1034.9873891408463!2d106.83947878647712!3d-6.56998393584498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c694a19088e3%3A0xd66931f4835b2a77!2sPT.ALKESLAB%20PRIMATAMA!5e0!3m2!1sen!2sid!4v1728397491555!5m2!1sen!2sid"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <p style="font-size: 1.2rem; padding-top:10px">Jl. Grand Sentul City Blok C4-02 No. 10 RT. 02/RW. 01 Desa
                    Cadas Ngampar Kec. Sukaraja- Kab. Bogor</p>
                <p style="font-size: 1.2rem"><i class="bi bi-telephone-fill icon-align">: 021- 29098991, 22968221</i></p>
            </div>

            <!-- Right column -->
            <div class="col-6 mb-4 text-center">
                <div class="mb-2">
                    <h4 class="fw-bold text-secondary">
                        <span style="color:#1e30f3">KANTOR PERWAKILAN</span>
                    </h4>
                </div>
                <div class="card mx-3 bg-light" style="border-radius: 20px">
                    <div class="card-body">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673.7805798077151!2d106.84983799545259!3d-6.193458643034183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f44255fb2dcf%3A0xa84dce332a106956!2sUniversitas%20MH%20Thamrin%20KAMPUS%20SALEMBA!5e0!3m2!1sen!2sid!4v1728397543759!5m2!1sen!2sid"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <p style="font-size: 1.2rem; padding-top:10px">Jl. Salemba Tengah No.5, RT.2/RW.3, Paseban, Kec. Senen,
                    Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10440</p>
            </div>
        </div>
    </div>




@endsection
