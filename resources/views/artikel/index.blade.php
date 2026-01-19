@extends('template.index')

@section('title', 'Berita')

@push('css')
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            /* Membesar sedikit */
        }

        .image-container {
            display: flex;
            /* Menggunakan flexbox untuk mengatur gambar */
            justify-content: center;
            /* Menengahkan secara horizontal */
            align-items: center;
            /* Menengahkan secara vertikal */
            height: 230px;
            /* Pastikan tinggi kontainer sesuai dengan tinggi gambar */
        }

        .card-img-top {
            /* Atas: 20px, Kanan: 10px, Bawah: 0, Kiri: 20px */
            /* Menambahkan padding seragam pada Daftar sisi */
            width: calc(100% - 40px);
            /* Mengurangi lebar agar sesuai dengan padding kanan kiri */
            height: 200px;
            /* Tetapkan tinggi tetap */
            object-fit: cover;
            /* Menjaga rasio gambar */
        }

        .pagination {
            margin: 20px 0;
            /* Add some space around the pagination */
        }

        .pagination .page-item {
            margin: 0 5px;
            /* Add space between pagination items */
        }

        .pagination .page-link {
            border: 1px solid #007bff;
            /* Add border to links */
            border-radius: 5px;
            /* Rounded corners */
            color: #007bff;
            /* Text color */
            transition: background-color 0.3s, color 0.3s;
            /* Smooth transitions */
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            /* Background on hover */
            color: white;
            /* Text color on hover */
        }

        .pagination .active .page-link {
            background-color: #007bff;
            /* Active page background */
            color: white;
            /* Active page text color */
            border: none;
            /* Remove border for active page */
        }

        .pagination .disabled .page-link {
            color: #6c757d;
            /* Color for disabled links */
            pointer-events: none;
            /* Prevent clicking */
            background-color: transparent;
            /* Transparent background */
        }
    </style>
@endpush

@section('content')
    <!-- Landing -->
    <?php $imagePath = asset('app/assets/content/tentangkami.png'); ?>
    <header class="py-4" style="background-image: url('{{ $imagePath }}');">
        <div class="container px-5 pb-5 text-center">
            <h1 class="display-4 fw-bolder text-primary" id="about-title">
                <span class="split-text">Berita</span>
            </h1>
        </div>
    </header>
    <section class="py-5 bg-white">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">Berita Terbaru</h1>
            </div>
        </div>
        <div class="container px-5">
            <div class="card border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-5 py-lg-5">
                            <div class="p-4 p-md-5">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $latest_post->category }}
                                </div>
                                <div class="h2 fw-bolder">{{ $latest_post->title }}</div>
                                <p>{!! Str::limit(strip_tags($latest_post->desc), 150, '...') !!}</p>
                                <a class="stretched-link text-decoration-none"
                                    href="{{ route('artikel.detail', $latest_post->slug) }}">
                                    Read more <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <div class="bg-featured-blog h-100"
                                style="background-image: url('{{ asset('storage/' . $latest_post->photo) }}'); background-size: cover; background-position: center;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-white">
        <div class="text-center mb-5">
            <div class="button-area">
                <h1 class="fw-bolder">Daftar Berita</h1>
            </div>
        </div>
        <div class="container px-5">
            <div class="row gx-5">
                @if ($latest_post)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="image-container">
                                <img class="card-img-top" src="{{ asset('storage/' . $latest_post->photo) }}"
                                    alt="..." />
                            </div>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $latest_post->category }}
                                </div>
                                <a class="text-decoration-none link-dark stretched-link fw-bolder"
                                    href="{{ route('artikel.detail', $latest_post->slug) }}">
                                    <div class="h5 card-title mb-3">{{ $latest_post->title }}</div>
                                </a>
                                <p class="card-text mb-0">{{ Str::limit(strip_tags($latest_post->desc), 150, '...') }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="small">
                                            <div class="fw-bold">Admin</div>
                                            <div class="text-muted">{{ $latest_post->created_at->format('F d, Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach ($articles as $article)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="image-container">
                                <img class="card-img-top" src="{{ asset('storage/' . $article->photo) }}" alt="..." />
                            </div>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $article->category }}
                                </div>
                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('artikel.detail', $article->slug) }}">
                                    <div class="h5 card-title mb-3">{{ $article->title }}</div>
                                </a>
                                <p class="card-text mb-0">{{ Str::limit(strip_tags($article->desc), 150, '...') }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="small">
                                            <div class="fw-bold">Admin</div>
                                            <div class="text-muted">{{ $article->created_at->format('F d, Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                @if ($articles->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $articles->previousPageUrl() }}">Previous</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $articles->lastPage(); $i++)
                    <li class="page-item {{ $articles->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($articles->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $articles->nextPageUrl() }}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                    </li>
                @endif
            </ul>
        </nav>

    </section>
@endsection
