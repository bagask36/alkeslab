@extends('template.index')

@section('title', 'Produk Kami')

@push('css')
    <style>
        /* Add this to your custom CSS file */
        .img-fluid {
            max-width: 100%;
            /* Prevents the image from overflowing its container */
            height: auto;
            /* Ensures the image maintains its aspect ratio */
        }

        .product-image {
            max-width: 800px;
            /* Set a maximum width for large images */
            width: 100%;
            /* Ensure the image is responsive */
            height: auto;
            /* Keep aspect ratio intact */
            object-fit: cover;
            /* Crop the image to fit the container if needed */
        }

        .btn-success {
            transition: transform 0.3s, background-color 0.3s, box-shadow 0.3s;
        }

        .btn-success:hover {
            transform: scale(1.05);
            background-color: #218838;
            /* Change color */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            color: white !important;
        }
    </style>
@endpush

@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/img3.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-4 fw-bolder text-primary" id="about-title">
                <span class="split-text">Produk</span>
                <span class="split-text">Kami</span>
            </h1>
        </div>
    </header>

    @foreach ($products as $product)
        <section class="bg-white py-5" id="{{ $product->slug }}">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5 mt-5">
                        <!-- Display the product description in the h1 -->
                        <h1 class="fw-bold text-secondary">
                            <span style="color:black">
                                {{ $product->description }}
                            </span>
                        </h1>
                    </div>
                    <div class="col-12 mb-4 text-center">
                        <!-- Display the product image and center it using Bootstrap classes -->
                        <a href="{{ $product->whatsapp_link }}" target="_blank">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                class="img-fluid product-image d-block mx-auto" alt="{{ $product->description }}" />
                        </a>
                    </div>
                    <div class="col-12 text-center">
                        <!-- WhatsApp link below the image -->
                        <a href="{{ $product->whatsapp_link }}" class="btn btn-success mt-3" target="_blank">
                            <i class="fab fa-whatsapp" style="margin-right: 5px;"></i>
                            Tanya di WhatsApp
                        </a>
                    </div>

                </div>
            </div>
        </section>
    @endforeach

    <!-- Teknis Medis Project -->
    <section class="bg-white py-5" id="teknis-medis-project">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">TEKNIS MEDIS PROJECT</h1>
            </div>
        </div>

        <div class="text-center mb-5 mt-5">
            <h1 class="fw-bold text-secondary">
                <span style="color:black">
                    <h1 class="fw-bolder">PERBAIKAN ALAT MEDIS | SERVICES & MAINTENANCE ALAT MEDIS | INSTALANSI ALAT MEDIS
                    </h1>
                </span>
            </h1>
        </div>

        <div class="container">
            <div class="row">
                <!-- Loop through teknis for small images -->
                <div class="container">
                    <div class="row">
                        @foreach ($teknis as $teknisItem)
                            @if ($teknisItem->image_size === 'small')
                                <div class="col-md-6 mb-4 d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('storage/' . $teknisItem->image) }}"
                                        class="img-fluid product-image d-block mx-auto" alt="{{ $teknisItem->name }}" />
                                    <p class="mt-2 text-center fw-bolder">{{ $teknisItem->name }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Loop through teknis for large images -->
                @foreach ($teknis as $teknisItem)
                    @if ($teknisItem->image_size === 'large')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb-4 d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('storage/' . $teknisItem->image) }}" class="img-fluid"
                                        alt="{{ $teknisItem->name }}" class="img-fluid product-image d-block mx-auto" alt="{{ $teknisItem->name }}" />
                                    <!-- Adjust height for large images -->
                                    <p class="mt-2 text-center fw-bolder">{{ $teknisItem->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>

    <!-- Other Project -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">PROYEK LAINNYA</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($teknis as $teknisItem)
                    @if ($teknisItem->image_size === 'small')
                        <div class="col-md-6 mb-4 d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . $teknisItem->image) }}"
                                class="img-fluid product-image d-block mx-auto" alt="{{ $teknisItem->name }}" />
                            <p class="mt-2 text-center fw-bolder">{{ $teknisItem->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- New row for large images -->
        <div class="row">
            @foreach ($teknis as $teknisItem)
                @if ($teknisItem->image_size === 'large')
                    <div class="col-md-12 mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('storage/' . $teknisItem->image) }}"
                            class="img-fluid product-image d-block mx-auto" alt="{{ $teknisItem->name }}" />
                        <p class="mt-2 text-center fw-bolder">{{ $teknisItem->name }}</p>
                    </div>
                @endif
            @endforeach
        </div>

    </section>



@endsection
