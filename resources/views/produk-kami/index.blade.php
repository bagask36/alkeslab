@extends('template.index')
@section('title', 'Produk Kami')

@push('css')
<style>
    /* Masthead customization */
    .masthead {
        background: linear-gradient(135deg, rgba(30, 48, 243, 0.9) 0%, rgba(26, 40, 217, 0.9) 100%),
                    url('{{ asset('app/assets/content/img3.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    /* Product section */
    .product-section {
        padding: 80px 0;
        scroll-margin-top: 100px;
    }
    
    .product-header {
        margin-bottom: 3rem;
    }
    
    .product-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    
    .product-header p {
        font-size: 1.1rem;
        color: #6c757d;
        line-height: 1.6;
    }
    
    .product-image-container {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }
    
    .product-image-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(30, 48, 243, 0.2);
    }
    
    .product-image-container img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
    }
    
    .product-image-container:hover img {
        transform: scale(1.05);
    }
    
    .product-whatsapp-btn {
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 5px 20px rgba(37, 211, 102, 0.3);
    }
    
    .product-whatsapp-btn:hover {
        background: linear-gradient(135deg, #128C7E 0%, #25D366 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        color: white;
    }
    
    /* Project section */
    .project-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .project-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    
    .project-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    
    .project-card-body {
        padding: 1.5rem;
        text-align: center;
    }
    
    .project-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #212529;
        margin: 0;
    }
    
    .project-card-large {
        grid-column: 1 / -1;
    }
    
    .project-card-large img {
        height: 400px;
    }
    
    /* Responsive Design */
    @media (max-width: 991.98px) {
        .masthead {
            background-attachment: scroll;
            padding: 4rem 0;
        }
        
        .product-section {
            padding: 60px 0;
        }
        
        .product-header h2 {
            font-size: 2rem;
        }
        
        .product-header p {
            font-size: 1rem;
        }
        
        .product-whatsapp-btn {
            padding: 12px 30px;
            font-size: 0.95rem;
        }
        
        .project-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .project-card-large img {
            height: 300px;
        }
    }
    
    @media (max-width: 767.98px) {
        .masthead {
            padding: 3rem 0;
            min-height: 50vh;
        }
        
        .masthead h1 {
            font-size: 2rem;
        }
        
        .product-section {
            padding: 40px 0;
        }
        
        .product-header {
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .product-header h2 {
            font-size: 1.75rem;
        }
        
        .product-header p {
            font-size: 0.95rem;
        }
        
        .product-image-container {
            margin-bottom: 1.5rem;
        }
        
        .product-whatsapp-btn {
            padding: 10px 25px;
            font-size: 0.9rem;
            width: 100%;
            justify-content: center;
        }
        
        .project-grid {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
        
        .project-card img {
            height: 200px;
        }
        
        .project-card-large img {
            height: 250px;
        }
        
        .project-card-body {
            padding: 1.25rem;
        }
        
        .project-card-title {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Produk Kami</h1>
                    <hr class="divider divider-light" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Berbagai kategori produk alat kesehatan berkualitas untuk memenuhi kebutuhan medis Anda</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Products Section -->
    @if($products->count() > 0)
        @foreach ($products as $product)
            <section class="page-section product-section" id="{{ $product->slug }}">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-5 align-items-center">
                        <!-- Title Column - Alternating Left/Right -->
                        <div class="col-lg-4 mb-5 mb-lg-0 order-lg-{{ $loop->odd ? '1' : '2' }}">
                            <div class="product-header">
                                <h2>{{ $product->description }}</h2>
                                <hr class="divider" />
                                <p>Produk alat kesehatan berkualitas tinggi untuk kebutuhan medis Anda</p>
                            </div>
                        </div>
                        
                        <!-- Content Column - Alternating Right/Left -->
                        <div class="col-lg-8 order-lg-{{ $loop->odd ? '2' : '1' }}">
                            <div class="product-image-container">
                                <a href="{{ $product->whatsapp_link }}" target="_blank">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->description }}" 
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ $product->whatsapp_link }}" 
                                   class="product-whatsapp-btn" 
                                   target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    Tanya di WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="text-center py-5">
                    <i class="bi bi-box-seam" style="font-size: 4rem; color: #6c757d; opacity: 0.5;"></i>
                    <p class="text-muted mt-3">Tidak ada produk tersedia saat ini</p>
                </div>
            </div>
        </section>
    @endif

    <!-- Teknis Medis Project Section -->
    @if($teknis->count() > 0)
        <section class="page-section bg-primary" id="teknis-medis">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center mb-5">
                        <h2 class="text-white mt-0">Teknis Medis Project</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Perbaikan Alat Medis | Services & Maintenance Alat Medis | Instalasi Alat Medis</p>
                    </div>
                </div>
                <div class="project-grid">
                    @foreach ($teknis as $teknisItem)
                        @if($teknisItem->image_size === 'large')
                            <div class="project-card project-card-large">
                                <img src="{{ asset('storage/' . $teknisItem->image) }}" 
                                     alt="{{ $teknisItem->name }}">
                                <div class="project-card-body">
                                    <h4 class="project-card-title">{{ $teknisItem->name }}</h4>
                                </div>
                            </div>
                        @else
                            <div class="project-card">
                                <img src="{{ asset('storage/' . $teknisItem->image) }}" 
                                     alt="{{ $teknisItem->name }}">
                                <div class="project-card-body">
                                    <h4 class="project-card-title">{{ $teknisItem->name }}</h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Other Projects Section -->
    @if($projects->count() > 0)
        <section class="page-section" id="other-projects">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center mb-5">
                        <h2 class="mt-0">Proyek Lainnya</h2>
                        <hr class="divider" />
                    </div>
                </div>
                <div class="project-grid">
                    @foreach ($projects as $project)
                        @if($project->image_size === 'large')
                            <div class="project-card project-card-large">
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->name }}">
                                <div class="project-card-body">
                                    <h4 class="project-card-title">{{ $project->name }}</h4>
                                </div>
                            </div>
                        @else
                            <div class="project-card">
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->name }}">
                                <div class="project-card-body">
                                    <h4 class="project-card-title">{{ $project->name }}</h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
