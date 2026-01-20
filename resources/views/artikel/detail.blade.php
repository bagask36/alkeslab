@extends('template.index')

@section('title', $article->title)

@push('css')
    <style>
        /* Article Header */
        .article-header {
            position: relative;
            background-image: url('{{ asset('storage/' . $article->photo) }}');
            background-size: cover;
            background-position: center;
            height: 450px;
            color: white;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            text-align: center;
            padding: 3rem;
        }

        .article-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.7) 100%);
            z-index: 1;
        }

        .article-header-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            width: 100%;
        }

        .article-header-title {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .article-header-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

        .article-header-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .article-header-meta-item i {
            font-size: 1.1rem;
        }

        /* Breadcrumb */
        .breadcrumb-section {
            background: #f8f9fa;
            padding: 1rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .breadcrumb {
            background-color: transparent;
            margin: 0;
            padding: 0;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            color: #6c757d;
            padding: 0 0.5rem;
        }

        .breadcrumb-item a {
            color: #1e30f3;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #1a28d9;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }

        /* Article Content */
        .article-content-section {
            padding: 4rem 0;
            background: #ffffff;
        }

        .article-main {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9ecef;
        }

        .article-category-badge {
            background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1.5rem;
            letter-spacing: 0.3px;
        }

        .article-meta-info {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
            flex-wrap: wrap;
        }

        .article-meta-info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            font-size: 0.95rem;
        }

        .article-meta-info-item i {
            color: #1e30f3;
            font-size: 1.1rem;
        }

        .article-meta-info-item strong {
            color: #2c3e50;
            margin-right: 0.25rem;
        }

        .article-body {
            font-size: 1.05rem !important;
            line-height: 1.8;
            color: #4a5568;
        }
        
        .article-body * {
            font-size: inherit !important;
        }

        .article-body h1,
        .article-body h2,
        .article-body h3,
        .article-body h4 {
            color: #2c3e50;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .article-body h2 {
            font-size: 1.75rem !important;
        }

        .article-body h3 {
            font-size: 1.5rem !important;
        }
        
        .article-body h4 {
            font-size: 1.25rem !important;
        }

        .article-body p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem !important;
        }
        
        .article-body div {
            font-size: 1.05rem !important;
        }
        
        .article-body span {
            font-size: 1.05rem !important;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            margin: 2rem 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .article-body ul,
        .article-body ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
            font-size: 1.05rem !important;
        }

        .article-body li {
            margin-bottom: 0.75rem;
            font-size: 1.05rem !important;
        }

        .article-body a {
            color: #1e30f3;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .article-body a:hover {
            color: #1a28d9;
            border-bottom-color: #1a28d9;
        }

        .article-body blockquote {
            border-left: 4px solid #1e30f3;
            padding-left: 1.5rem;
            margin: 2rem 0;
            color: #6c757d;
            font-style: italic;
        }

        /* Share Buttons */
        .share-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .share-section h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .share-buttons {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .share-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .share-btn-whatsapp {
            background: #25D366;
            color: white;
        }

        .share-btn-whatsapp:hover {
            background: #20BA5A;
            color: white;
        }

        .share-btn-twitter {
            background: #1DA1F2;
            color: white;
        }

        .share-btn-twitter:hover {
            background: #1A91DA;
            color: white;
        }

        .share-btn-copy {
            background: #1e30f3;
            color: white;
        }

        .share-btn-copy:hover {
            background: #1a28d9;
            color: white;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 2rem;
        }

        .sidebar-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9ecef;
            margin-bottom: 2rem;
        }

        .sidebar-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .related-article-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            text-decoration: none;
            color: inherit;
            border: 1px solid transparent;
        }

        .related-article-item:hover {
            background: #f8f9ff;
            border-color: rgba(30, 48, 243, 0.2);
            transform: translateX(5px);
        }

        .related-article-item:last-child {
            margin-bottom: 0;
        }

        .related-article-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            flex-shrink: 0;
        }

        .related-article-content {
            flex: 1;
        }

        .related-article-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-article-meta {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .related-article-meta .date {
            color: #6c757d;
        }

        /* Video Responsive */
        .video-responsive {
            position: relative;
            overflow: hidden;
            padding-top: 56.25%;
            border-radius: 15px;
            margin: 2rem 0;
        }

        .video-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Desktop View - Larger Font */
        @media (min-width: 992px) {
            .article-body {
                font-size: 1.1rem !important;
            }
            
            .article-body p,
            .article-body div,
            .article-body span,
            .article-body li {
                font-size: 1.1rem !important;
            }
            
            .article-body ul,
            .article-body ol {
                font-size: 1.1rem !important;
            }
        }
        
        @media (max-width: 991.98px) {
            .article-header {
                height: 350px;
                padding: 2rem;
            }

            .article-header-title {
                font-size: 2rem;
            }

            .article-main {
                padding: 2rem 1.5rem;
            }

            .sidebar {
                position: static;
                margin-top: 3rem;
            }
        }

        @media (max-width: 767.98px) {
            .article-header {
                height: 300px;
                padding: 1.5rem;
            }

            .article-header-title {
                font-size: 1.75rem;
            }

            .article-header-meta {
                flex-direction: column;
                gap: 0.75rem;
                align-items: flex-start;
            }

            .article-meta-info {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .article-body {
                font-size: 0.9rem !important;
            }
            
            .article-body p,
            .article-body div,
            .article-body span,
            .article-body li {
                font-size: 0.9rem !important;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Article Header -->
    <header class="article-header">
        <div class="article-header-content">
            <h1 class="article-header-title">{{ $article->title }}</h1>
            <div class="article-header-meta">
                <div class="article-header-meta-item">
                    <i class="bi bi-person-circle"></i>
                    <span><strong>Admin</strong></span>
                </div>
                <div class="article-header-meta-item">
                    <i class="bi bi-calendar3"></i>
                    <span>{{ $article->created_at->format('d F Y') }}</span>
                </div>
                <div class="article-header-meta-item">
                    <i class="bi bi-tag"></i>
                    <span>{{ $article->category }}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 50) }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Article Content -->
    <section class="article-content-section">
        <div class="container">
            <div class="row gx-4 gx-lg-5">
                <!-- Main Article Content -->
                <div class="col-lg-8">
                    <div class="article-main">
                        <span class="article-category-badge">{{ $article->category }}</span>
                        
                        <div class="article-meta-info">
                            <div class="article-meta-info-item">
                                <i class="bi bi-person-circle"></i>
                                <span><strong>Penulis:</strong> Admin</span>
                            </div>
                            <div class="article-meta-info-item">
                                <i class="bi bi-calendar3"></i>
                                <span><strong>Diterbitkan:</strong> {{ $article->created_at->format('d F Y') }}</span>
                            </div>
                        </div>

                        <div class="article-body">
                            {!! $article->desc !!}
                        </div>

                        <!-- Share Buttons -->
                        <div class="share-section">
                            <h5>Bagikan Artikel Ini</h5>
                            <div class="share-buttons">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title) }}%0A{{ request()->fullUrl() }}"
                                    target="_blank" class="share-btn share-btn-whatsapp">
                                    <i class="bi bi-whatsapp"></i>
                                    WhatsApp
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}%0A{{ request()->fullUrl() }}"
                                    target="_blank" class="share-btn share-btn-twitter">
                                    <i class="bi bi-twitter"></i>
                                    Twitter
                                </a>
                                <button class="share-btn share-btn-copy" onclick="copyLink()">
                                    <i class="bi bi-link-45deg"></i>
                                    Salin Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-card">
                            <h3>Artikel Lainnya</h3>
                            @if($other_articles->count() > 0)
                                @foreach ($other_articles as $other_article)
                                    <a href="{{ route('artikel.detail', $other_article->slug) }}" class="related-article-item">
                                        <img src="{{ asset('storage/' . $other_article->photo) }}"
                                            alt="{{ $other_article->title }}" 
                                            class="related-article-image">
                                        <div class="related-article-content">
                                            <h4 class="related-article-title">{{ $other_article->title }}</h4>
                                            <div class="related-article-meta">
                                                <span class="date">{{ $other_article->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="text-muted">Tidak ada artikel lainnya</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function copyLink() {
            const link = '{{ request()->fullUrl() }}';
            navigator.clipboard.writeText(link)
                .then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Link berhasil disalin ke clipboard',
                        confirmButtonText: 'OK',
                        timer: 2000
                    });
                })
                .catch(err => {
                    console.error('Error copying the link: ', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Gagal menyalin link',
                        confirmButtonText: 'Coba Lagi'
                    });
                });
        }
    </script>
@endpush
