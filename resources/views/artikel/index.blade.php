@extends('template.index')
@section('title', 'Berita')

@push('css')
<style>
    /* ============================================
       BERITA PAGE - MODERN REDESIGN
       ============================================ */
    
    /* Header Section */
    .berita-masthead {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.95) 0%, rgba(26, 40, 217, 0.95) 100%),
                    url('{{ asset('app/assets/content/tentangkami.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 60vh;
    }
    
    /* Section Labels & Headings */
    .berita-label {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #1e30f3;
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.1) 0%, rgba(30, 48, 243, 0.05) 100%);
        margin-bottom: 1.25rem;
        border: 1px solid rgba(30, 48, 243, 0.2);
    }
    
    .berita-heading {
        font-size: 3rem;
        font-weight: 800;
        color: #1a1a2e;
        margin-bottom: 1rem;
        line-height: 1.2;
        letter-spacing: -0.02em;
    }
    
    .berita-subtitle {
        font-size: 1.15rem;
        color: #64748b;
        margin-bottom: 3rem;
        line-height: 1.7;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Featured Article Card - Modern Design */
    .berita-featured {
        background: #ffffff;
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.04);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        margin: 0 auto 5rem;
        max-width: 1300px;
    }
    
    .berita-featured:hover {
        transform: translateY(-12px);
        box-shadow: 0 30px 80px rgba(30, 48, 243, 0.15), 0 0 0 1px rgba(30, 48, 243, 0.1);
    }
    
    .berita-featured-image {
        height: 450px;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }
    
    .berita-featured-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }
    
    .berita-featured-content {
        padding: 4rem;
        position: relative;
    }
    
    .berita-featured-badge {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        padding: 0.6rem 1.5rem;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-radius: 12px;
        display: inline-block;
        margin-bottom: 1.75rem;
        box-shadow: 0 4px 12px rgba(30, 48, 243, 0.3);
    }
    
    .berita-featured-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin: 0 0 1.5rem 0;
        color: #1a1a2e;
        line-height: 1.3;
        letter-spacing: -0.02em;
    }
    
    .berita-featured-title a {
        color: #1a1a2e;
        text-decoration: none;
        transition: color 0.3s ease;
        display: block;
    }
    
    .berita-featured-title a:hover {
        color: #1e30f3;
    }
    
    .berita-featured-text {
        color: #64748b;
        line-height: 1.9;
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }
    
    .berita-featured-link {
        color: #1e30f3;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.05rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        background: rgba(30, 48, 243, 0.05);
    }
    
    .berita-featured-link:hover {
        color: #ffffff;
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        gap: 1rem;
        box-shadow: 0 4px 12px rgba(30, 48, 243, 0.3);
    }
    
    /* Article Grid Cards - Modern Design */
    .berita-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06), 0 0 0 1px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(30, 48, 243, 0.08);
    }
    
    .berita-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(30, 48, 243, 0.15), 0 0 0 1px rgba(30, 48, 243, 0.2);
        border-color: rgba(30, 48, 243, 0.3);
    }
    
    .berita-card-image-container {
        position: relative;
        overflow: hidden;
        height: 260px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .berita-card-image-container::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.05) 100%);
        z-index: 1;
    }
    
    .berita-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .berita-card:hover .berita-card-image {
        transform: scale(1.12);
    }
    
    .berita-card-body {
        padding: 2rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .berita-card-badge {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        padding: 0.5rem 1.25rem;
        font-size: 0.75rem;
        font-weight: 700;
        align-self: flex-start;
        border-radius: 10px;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 8px rgba(30, 48, 243, 0.25);
    }
    
    .berita-card-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 3.78rem;
    }
    
    .berita-card-title a {
        color: #1a1a2e;
        text-decoration: none;
        transition: color 0.3s ease;
        display: block;
    }
    
    .berita-card-title a:hover {
        color: #1e30f3;
    }
    
    .berita-card-text {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.7;
        flex-grow: 1;
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .berita-card-footer {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
        border-top: 1px solid rgba(30, 48, 243, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .berita-card-meta {
        font-size: 0.875rem;
        color: #64748b;
    }
    
    .berita-card-meta-author {
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
    }
    
    .berita-card-meta-date {
        color: #94a3b8;
        font-size: 0.85rem;
    }
    
    /* Pagination - Modern Design */
    .berita-pagination {
        justify-content: center;
        margin: 5rem 0 3rem;
    }
    
    .berita-pagination .page-link {
        color: #1e30f3;
        border: 2px solid #e2e8f0;
        padding: 0.875rem 1.5rem;
        margin: 0 0.35rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        font-weight: 600;
        background: white;
    }
    
    .berita-pagination .page-link:hover {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        border-color: #1e30f3;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(30, 48, 243, 0.3);
    }
    
    .berita-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        border-color: #1e30f3;
        color: white;
        box-shadow: 0 6px 20px rgba(30, 48, 243, 0.3);
    }
    
    .berita-pagination .page-item.disabled .page-link {
        color: #cbd5e1;
        pointer-events: none;
        background: #f8f9fa;
        border-color: #e2e8f0;
        opacity: 0.6;
    }
    
    /* Empty State */
    .berita-empty {
        text-align: center;
        padding: 6rem 2rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 24px;
        margin: 2rem 0;
    }
    
    .berita-empty-icon {
        font-size: 5rem;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
    }
    
    .berita-empty-text {
        color: #64748b;
        font-size: 1.15rem;
        font-weight: 500;
    }
    
    /* Section Background */
    .berita-section-bg {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
        padding: 5rem 0;
    }
    
    /* Responsive */
    @media (max-width: 991.98px) {
        .berita-heading {
            font-size: 2.25rem;
        }
        
        .berita-featured {
            margin-bottom: 4rem;
        }
        
        .berita-featured-image {
            height: 320px;
        }
        
        .berita-featured-content {
            padding: 3rem 2.5rem;
        }
        
        .berita-featured-title {
            font-size: 2rem;
        }
        
        .berita-card-image-container {
            height: 220px;
        }
    }
    
    @media (max-width: 767.98px) {
        .berita-masthead {
            min-height: 50vh;
        }
        
        .berita-heading {
            font-size: 1.875rem;
        }
        
        .berita-subtitle {
            font-size: 1rem;
        }
        
        .berita-featured-image {
            height: 280px;
        }
        
        .berita-featured-content {
            padding: 2.5rem 2rem;
        }
        
        .berita-featured-title {
            font-size: 1.75rem;
        }
        
        .berita-card-image-container {
            height: 200px;
        }
        
        .berita-card-body {
            padding: 1.5rem;
        }
        
        .berita-card-footer {
            padding: 1.25rem 1.5rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Masthead-->
    <header class="berita-masthead masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold" style="font-size: 3.5rem; letter-spacing: -0.02em;">Berita & Artikel</h1>
                    <hr class="divider divider-light" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5" style="font-size: 1.15rem; line-height: 1.7;">Informasi terbaru seputar alat kesehatan, tips kesehatan, dan update dari kami</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Article Section -->
    @if(isset($latest_post) && $latest_post)
        <section class="page-section" id="featured" style="padding: 6rem 0;">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-10 text-center">
                        <span class="berita-label">
                            Berita
                        </span>
                        <h2 class="berita-heading">
                            Berita Terbaru
                        </h2>
                        <p class="berita-subtitle">
                            Ringkasan berita terbaru dan informasi penting dari Alkeslab Primatama
                        </p>
                    </div>
                </div>
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-11">
                        <div class="berita-featured">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="berita-featured-image" 
                                         style="background-image: url('{{ asset('storage/' . $latest_post->photo) }}');">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="berita-featured-content">
                                        <span class="berita-featured-badge">
                                            {{ $latest_post->category }}
                                        </span>
                                        <h2 class="berita-featured-title">
                                            <a href="{{ route('artikel.detail', $latest_post->slug) }}">
                                                {{ $latest_post->title }}
                                            </a>
                                        </h2>
                                        <p class="berita-featured-text">
                                            {!! Str::limit(strip_tags($latest_post->desc), 200, '...') !!}
                                        </p>
                                        <a href="{{ route('artikel.detail', $latest_post->slug) }}" class="berita-featured-link">
                                            Baca selengkapnya <i class="bi bi-arrow-right"></i>
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

    <section class="berita-section-bg" id="articles">
        <div class="container px-4 px-lg-5">
            <!-- Title Section - Separate Row -->
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-12 text-center">
                    <span class="berita-label">
                        Berita
                    </span>
                    <h2 class="berita-heading">
                        Daftar Berita
                    </h2>
                    <p class="berita-subtitle">
                        Kumpulan artikel, informasi produk, dan update terbaru seputar alat kesehatan
                    </p>
                </div>
            </div>
        </div>
            
        <div class="container px-4 px-lg-5">
            <!-- Articles Grid - Separate Row Below -->
            @if($articles->count() > 0 || (isset($latest_post) && $latest_post))
                <div class="row gx-4 gx-lg-5">
                    @if(isset($latest_post) && $latest_post && !$articles->contains('id', $latest_post->id))
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="berita-card">
                                <div class="berita-card-image-container">
                                    <img src="{{ asset('storage/' . $latest_post->photo) }}" 
                                         alt="{{ $latest_post->title }}" 
                                         class="berita-card-image">
                                </div>
                                <div class="berita-card-body">
                                    <span class="berita-card-badge">
                                        {{ $latest_post->category }}
                                    </span>
                                    <h3 class="berita-card-title">
                                        <a href="{{ route('artikel.detail', $latest_post->slug) }}">
                                            {{ $latest_post->title }}
                                        </a>
                                    </h3>
                                    <p class="berita-card-text">
                                        {{ Str::limit(strip_tags($latest_post->desc), 120, '...') }}
                                    </p>
                                </div>
                                <div class="berita-card-footer">
                                    <div class="berita-card-meta">
                                        <div class="berita-card-meta-author">
                                            Admin
                                        </div>
                                        <div class="berita-card-meta-date">
                                            {{ $latest_post->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    @foreach ($articles as $article)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="berita-card">
                                <div class="berita-card-image-container">
                                    <img src="{{ asset('storage/' . $article->photo) }}" 
                                         alt="{{ $article->title }}" 
                                         class="berita-card-image">
                                </div>
                                <div class="berita-card-body">
                                    <span class="berita-card-badge">
                                        {{ $article->category }}
                                    </span>
                                    <h3 class="berita-card-title">
                                        <a href="{{ route('artikel.detail', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    <p class="berita-card-text">
                                        {{ Str::limit(strip_tags($article->desc), 120, '...') }}
                                    </p>
                                </div>
                                <div class="berita-card-footer">
                                    <div class="berita-card-meta">
                                        <div class="berita-card-meta-author">
                                            Admin
                                        </div>
                                        <div class="berita-card-meta-date">
                                            {{ $article->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="berita-empty">
                    <i class="bi bi-newspaper berita-empty-icon"></i>
                    <p class="berita-empty-text">
                        Tidak ada berita tersedia saat ini
                    </p>
                </div>
            @endif
        </div>
        
        <!-- Pagination - Separate Row -->
        @if($articles->hasPages())
            <div class="container px-4 px-lg-5">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination berita-pagination">
                                @if ($articles->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            Sebelumnya
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $articles->previousPageUrl() }}">
                                            Sebelumnya
                                        </a>
                                    </li>
                                @endif

                                @for ($i = 1; $i <= $articles->lastPage(); $i++)
                                    <li class="page-item {{ $articles->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $articles->url($i) }}">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor

                                @if ($articles->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $articles->nextPageUrl() }}">
                                            Selanjutnya
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            Selanjutnya
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
