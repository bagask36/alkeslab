@extends('template.index')
@section('title', 'Berita')

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
    
    .articles-section-label {
        display: inline-block;
        padding: 0.35rem 0.9rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #1e30f3;
        background: rgba(30, 48, 243, 0.08);
        margin-bottom: 0.75rem;
    }
    
    .articles-heading {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.75rem;
    }
    
    .articles-subtitle {
        font-size: 0.98rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }
    
    .featured-article {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        margin: 0 auto 3rem;
        max-width: 1100px;
    }
    
    .featured-article:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    }
    
    .featured-article-image {
        height: 320px;
        background-size: cover;
        background-position: center;
    }
    
    .featured-article-content {
        padding: 3rem;
    }
    
    .featured-article .badge {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
    
    .featured-article h2 {
        font-size: 2rem;
        font-weight: 700;
        margin: 1rem 0;
        color: #212529;
    }
    
    .featured-article p {
        color: #6c757d;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }
    
    .featured-article a {
        color: var(--bs-primary);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .featured-article a:hover {
        color: #1a28d9;
        transform: translateX(5px);
    }
    
    /* Article cards */
    .article-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(30, 48, 243, 0.15);
    }
    
    .article-card-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .article-card:hover .article-card-image {
        transform: scale(1.1);
    }
    
    .article-card-body {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .article-card .badge {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        padding: 0.4rem 0.8rem;
        font-size: 0.75rem;
        margin-bottom: 1rem;
        align-self: flex-start;
    }
    
    .article-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 1rem;
        line-height: 1.4;
    }
    
    .article-card-title a {
        color: #212529;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .article-card-title a:hover {
        color: var(--bs-primary);
    }
    
    .article-card-text {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        flex-grow: 1;
        margin-bottom: 1rem;
    }
    
    .article-card-footer {
        padding: 1rem 1.5rem;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .article-meta {
        font-size: 0.85rem;
        color: #6c757d;
    }
    
    @media (max-width: 991.98px) {
        .featured-article {
            margin-bottom: 2.5rem;
        }
        
        .featured-article-image {
            height: 220px;
        }
        
        .featured-article-content {
            padding: 2rem 1.5rem;
        }
    }
    
    /* Pagination */
    .pagination {
        justify-content: center;
        margin: 3rem 0;
    }
    
    .pagination .page-link {
        color: var(--bs-primary);
        border: 1px solid #dee2e6;
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .pagination .page-link:hover {
        background: var(--bs-primary);
        color: white;
        border-color: var(--bs-primary);
        transform: translateY(-2px);
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        border-color: var(--bs-primary);
        color: white;
    }
    
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background: #f8f9fa;
    }
</style>
@endpush

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Berita & Artikel</h1>
                    <hr class="divider divider-light" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Informasi terbaru seputar alat kesehatan, tips kesehatan, dan update dari kami</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Article Section -->
    @if(isset($latest_post) && $latest_post)
        <section class="page-section" id="featured">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <span class="articles-section-label">Berita</span>
                        <h2 class="articles-heading">Berita Terbaru</h2>
                        <p class="articles-subtitle">Ringkasan berita terbaru dan informasi penting dari Alkeslab Primatama</p>
                    </div>
                </div>
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-10">
                        <div class="featured-article">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="featured-article-image" 
                                         style="background-image: url('{{ asset('storage/' . $latest_post->photo) }}');">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="featured-article-content">
                                        <span class="badge">{{ $latest_post->category }}</span>
                                        <h2>{{ $latest_post->title }}</h2>
                                        <p>{!! Str::limit(strip_tags($latest_post->desc), 200, '...') !!}</p>
                                        <a href="{{ route('artikel.detail', $latest_post->slug) }}">
                                            Baca selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="page-section py-5" id="articles" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="articles-section-label">Berita</span>
                    <h2 class="articles-heading">Daftar Berita</h2>
                    <p class="articles-subtitle">Kumpulan artikel, informasi produk, dan update terbaru seputar alat kesehatan</p>
                </div>
            </div>
            @if($articles->count() > 0 || (isset($latest_post) && $latest_post))
                <div class="row gx-4 gx-lg-5">
                    @if(isset($latest_post) && $latest_post && !$articles->contains('id', $latest_post->id))
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="article-card">
                                <img src="{{ asset('storage/' . $latest_post->photo) }}" 
                                     alt="{{ $latest_post->title }}" 
                                     class="article-card-image">
                                <div class="article-card-body">
                                    <span class="badge">{{ $latest_post->category }}</span>
                                    <h3 class="article-card-title">
                                        <a href="{{ route('artikel.detail', $latest_post->slug) }}">
                                            {{ $latest_post->title }}
                                        </a>
                                    </h3>
                                    <p class="article-card-text">
                                        {{ Str::limit(strip_tags($latest_post->desc), 120, '...') }}
                                    </p>
                                </div>
                                <div class="article-card-footer">
                                    <div class="article-meta">
                                        <div class="fw-bold">Admin</div>
                                        <div>{{ $latest_post->created_at->format('d M Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    @foreach ($articles as $article)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="article-card">
                                <img src="{{ asset('storage/' . $article->photo) }}" 
                                     alt="{{ $article->title }}" 
                                     class="article-card-image">
                                <div class="article-card-body">
                                    <span class="badge">{{ $article->category }}</span>
                                    <h3 class="article-card-title">
                                        <a href="{{ route('artikel.detail', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    <p class="article-card-text">
                                        {{ Str::limit(strip_tags($article->desc), 120, '...') }}
                                    </p>
                                </div>
                                <div class="article-card-footer">
                                    <div class="article-meta">
                                        <div class="fw-bold">Admin</div>
                                        <div>{{ $article->created_at->format('d M Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-newspaper" style="font-size: 4rem; color: #6c757d; opacity: 0.5;"></i>
                    <p class="text-muted mt-3">Tidak ada berita tersedia saat ini</p>
                </div>
            @endif
            
            <!-- Pagination -->
            @if($articles->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @if ($articles->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Sebelumnya</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $articles->previousPageUrl() }}">Sebelumnya</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $articles->lastPage(); $i++)
                            <li class="page-item {{ $articles->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($articles->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $articles->nextPageUrl() }}">Selanjutnya</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Selanjutnya</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </section>
@endsection
