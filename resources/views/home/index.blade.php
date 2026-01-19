@extends('template.index')
@section('title', 'Beranda')

@push('css')
    <style>
        .client-image {
            max-width: 100%;
            /* Ensure image fits within the card */
            height: auto;
            /* Maintain aspect ratio */
            object-fit: cover;
            /* Ensure proper aspect ratio */
        }
    </style>
@endpush
@section('content')
    <!-- Landing -->
    <?php
    $imagePath = asset('app/assets/content/mask-group.png');
    ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-4 fw-bolder text-primary" id="about-title">
                <span class="split-text">Distributor Alat Kesehatan</span>
                <span class="split-text">PT Alkeslab Primatama</span>
            </h1>
        </div>
    </header>


    <!-- Produk Kami Section -->
    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">Kategori Produk</h1>
            </div>
        </div>
        <div class="card-home-container">
            @foreach ($product as $product)
                <div class="card-home bg-light">
                    <img src="{{ asset('storage/' . $product->icon) }}" alt="Card Image" class="card-home-image">
                    <h3 class="card-home-title fw-bolder">{{ $product->description }}</h3>
                    <a href="/produk-kami#{{ $product->slug }}">
                        <button class="card-home-button bg-primary">Selengkapnya ></button></a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">Layanan</h1>
            </div>
        </div>
        <div class="card-home-container">
            @foreach ($layanan as $layanan)
                <div class="card-home bg-light">
                    <img src="{{ asset('storage/' . $layanan->image) }}" alt="Card Image" class="card-home-image">
                    <h3 class="card-home-title fw-bolder">{{ $layanan->name }}</h3>
                    <a href="#">
                        <button class="card-home-button bg-primary">Selengkapnya ></button></a>
                </div>
            @endforeach
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
                            <img src="{{ asset('storage/' . $client->image) }}" class="img-fluid"
                                alt="{{ $client->name }}" style="height: auto; object-fit: cover; border-radius:10px;" />
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </section>
    <!-- Scroller Section -->
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

@endsection
