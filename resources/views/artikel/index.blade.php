@extends('template.index')
@section('title', 'Berita')

@push('css')
<style>
    /* ============================================
       BERITA PAGE - CLEAN CSS CLASSES
       ============================================ */
    
    /* Header Section */
    .berita-masthead {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.9) 0%, rgba(26, 40, 217, 0.9) 100%),
                    url('{{ asset('app/assets/content/tentangkami.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    /* Section Labels & Headings */
    .berita-label {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #1e30f3;
        background: rgba(30, 48, 243, 0.1);
        margin-bottom: 1rem;
    }
    
    .berita-heading {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.75rem;
        line-height: 1.2;
    }
    
    .berita-subtitle {
        font-size: 1.05rem;
        color: #6c757d;
        margin-bottom: 2.5rem;
        line-height: 1.7;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Featured Article Card */
    .berita-featured {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        margin: 0 auto 4rem;
        max-width: 1200px;
        border: 1px solid rgba(30, 48, 243, 0.1);
    }
    
    .berita-featured:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 48px rgba(30, 48, 243, 0.15);
    }
    
    .berita-featured-image {
        height: 400px;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }
    
    .berita-featured-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.05) 100%);
    }
    
    .berita-featured-content {
        padding: 3.5rem;
    }
    
    .berita-featured-badge {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        padding: 0.5rem 1.25rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 8px;
        display: inline-block;
        margin-bottom: 1.5rem;
    }
    
    .berita-featured-title {
        font-size: 2.25rem;
        font-weight: 700;
        margin: 0 0 1.25rem 0;
        color: #212529;
        line-height: 1.4;
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
    }
    
    .berita-featured-title a {
        color: #212529;
        text-decoration: none;
        transition: color 0.3s ease;
        display: block;
        line-height: 1.4;
    }
    
    .berita-featured-title a:hover {
        color: #1e30f3;
    }
    
    .berita-featured-text {
        color: #6c757d;
        line-height: 1.8;
        margin-bottom: 1.75rem;
        font-size: 1.05rem;
    }
    
    .berita-featured-link {
        color: #1e30f3;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .berita-featured-link:hover {
        color: #1a28d9;
        gap: 0.75rem;
    }
    
    /* Article Grid Cards */
    .berita-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(30, 48, 243, 0.08);
    }
    
    .berita-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(30, 48, 243, 0.15);
        border-color: rgba(30, 48, 243, 0.2);
    }
    
    .berita-card-image-container {
        position: relative;
        overflow: hidden;
        height: 240px;
        background: #f8f9fa;
    }
    
    .berita-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .berita-card:hover .berita-card-image {
        transform: scale(1.1);
    }
    
    .berita-card-body {
        padding: 1.75rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .berita-card-badge {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        color: white;
        padding: 0.4rem 1rem;
        font-size: 0.75rem;
        font-weight: 600;
        align-self: flex-start;
        border-radius: 8px;
        letter-spacing: 0.3px;
        margin-bottom: 0;
    }
    
    .berita-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
        line-height: 1.5;
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .berita-card-title a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.3s ease;
        display: block;
        line-height: 1.5;
    }
    
    .berita-card-title a:hover {
        color: #1e30f3;
    }
    
    .berita-card-text {
        color: #6c757d;
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
        padding: 1.25rem 2rem;
        background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
        border-top: 1px solid #e9ecef;
    }
    
    .berita-card-meta {
        font-size: 0.875rem;
        color: #6c757d;
    }
    
    .berita-card-meta-author {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }
    
    .berita-card-meta-date {
        color: #6c757d;
    }
    
    /* Pagination */
    .berita-pagination {
        justify-content: center;
        margin: 4rem 0 2rem;
    }
    
    .berita-pagination .page-link {
        color: #1e30f3;
        border: 1px solid #e9ecef;
        padding: 0.75rem 1.25rem;
        margin: 0 0.25rem;
        border-radius: 10px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .berita-pagination .page-link:hover {
        background: #1e30f3;
        color: white;
        border-color: #1e30f3;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 48, 243, 0.3);
    }
    
    .berita-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
        border-color: #1e30f3;
        color: white;
        box-shadow: 0 4px 12px rgba(30, 48, 243, 0.3);
    }
    
    .berita-pagination .page-item.disabled .page-link {
        color: #adb5bd;
        pointer-events: none;
        background: #f8f9fa;
        border-color: #e9ecef;
    }
    
    /* Empty State */
    .berita-empty {
        text-align: center;
        padding: 4rem 2rem;
    }
    
    .berita-empty-icon {
        font-size: 4rem;
        color: #6c757d;
        opacity: 0.5;
        margin-bottom: 1rem;
    }
    
    .berita-empty-text {
        color: #6c757d;
        font-size: 1.1rem;
    }
    
    /* Responsive */
    @media (max-width: 991.98px) {
        .berita-heading {
            font-size: 2rem;
        }
        
        .berita-featured {
            margin-bottom: 3rem;
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
    }
    
    @media (max-width: 767.98px) {
        .berita-heading {
            font-size: 1.75rem;
        }
        
        .berita-featured-image {
            height: 240px;
        }
        
        .berita-featured-content {
            padding: 2rem 1.5rem;
        }
        
        .berita-card-image-container {
            height: 200px;
        }
        
        .berita-card-body {
            padding: 1.5rem;
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
        <section class="page-section" id="featured" style="padding: 5rem 0;">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-10 text-center">
                        <span class="berita-label">Berita</span>
                        <h2 class="berita-heading">Berita Terbaru</h2>
                        <p class="berita-subtitle">Ringkasan berita terbaru dan informasi penting dari Alkeslab Primatama</p>
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
                                        <span class="berita-featured-badge">{{ $latest_post->category }}</span>
                                        <h2 class="berita-featured-title">
                                            <a href="{{ route('artikel.detail', $latest_post->slug) }}">
                                                {{ $latest_post->title }}
                                            </a>
                                        </h2>
                                        <p class="berita-featured-text">{!! Str::limit(strip_tags($latest_post->desc), 200, '...') !!}</p>
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

    <section class="page-section py-5" id="articles" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 4rem 0;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <span class="berita-label">Berita</span>
                    <h2 class="berita-heading">Daftar Berita</h2>
                    <p class="berita-subtitle">Kumpulan artikel, informasi produk, dan update terbaru seputar alat kesehatan</p>
                </div>
            </div>
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
                                    <span class="berita-card-badge">{{ $latest_post->category }}</span>
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
                                        <div class="berita-card-meta-author">Admin</div>
                                        <div class="berita-card-meta-date">{{ $latest_post->created_at->format('d M Y') }}</div>
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
                                    <span class="berita-card-badge">{{ $article->category }}</span>
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
                                        <div class="berita-card-meta-author">Admin</div>
                                        <div class="berita-card-meta-date">{{ $article->created_at->format('d M Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="berita-empty">
                    <i class="bi bi-newspaper berita-empty-icon"></i>
                    <p class="berita-empty-text">Tidak ada berita tersedia saat ini</p>
                </div>
            @endif
            
            <!-- Pagination -->
            @if($articles->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination berita-pagination">
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
