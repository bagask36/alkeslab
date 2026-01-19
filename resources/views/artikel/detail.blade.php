@extends('template.index')

@section('title', $article->title)

@push('css')
    <style>
        .article-header {
            position: relative;
            background-image: url('{{ asset('storage/' . $article->photo) }}');
            background-size: cover;
            background-position: center;
            height: 300px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .article-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .article-title {
            position: relative;
            z-index: 2;
        }

        .article-content {
            padding: 30px;
            background-color: aliceblue;
        }

        .back-button {
            margin: 20px 0;
        }

        .breadcrumb {
            background-color: transparent;
            margin-bottom: 20px;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: ">";
        }

        .article-body {
            font-size: 1.2em;
            /* Increase font size for article content */
        }

        .list-group-item {
            font-size: 1em;
            /* Adjust font size for the list items */
            display: flex;
            /* Use flex to align items */
            align-items: center;
            /* Center align vertically */
            border-radius: 25px;
            /* Apply border radius */
            padding: 10px;
            /* Add padding */
            transition: background-color 0.3s;
            /* Smooth transition for background color */
        }

        .list-group-item:hover {
            background-color: #f0f0f0;
            /* Add hover effect */
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .list-group-item {
                font-size: 0.9em;
                /* Slightly smaller font size on smaller screens */
                padding: 8px;
                /* Less padding for smaller screens */
            }
        }

        @media (max-width: 576px) {
            .list-group-item {
                font-size: 0.8em;
                /* Further reduce font size for very small screens */
                padding: 6px;
                /* Further reduce padding */
            }
        }


        .col-lg-8 {
            padding-right: 30px;
            border-radius: 25px;
            /* Right padding for left column */
        }

        .col-lg-4 {
            padding-left: 30px;
            border-radius: 25px;
            /* Left padding for right column */
        }

        .article-image {
            width: 100px;
            /* Fixed width for all images */
            height: 100px;
            /* Fixed height for all images */
            margin-right: 10px;
            /* Space between image and text */
            border-radius: 15px;
            /* Apply border radius to images */
            object-fit: cover;
            /* Crop the image to fit the box */
        }

        .gap-2 {
            margin-bottom: 20px;
            /* Add gap between rows of cards */
        }

        .divider {
            border: none;
            /* Remove default border */
            height: 1px;
            /* Height of the line */
            background-color: #000000;
            /* Color of the line */
            margin: 10px 0;
        }

        .content-image {
            width: 100%;
            /* Set width to 100% to make it responsive */
            height: auto;
            /* Maintain aspect ratio */
            max-height: 400px;
            /* Optional: limit the height to keep a uniform size */
            object-fit: cover;
            /* Maintain aspect ratio while covering the area */
            border-radius: 15px;
            /* Optional: apply border radius */

            .video-responsive {
                position: relative;
                overflow: hidden;
                padding-top: 56.25%;
                /* Aspect ratio 16:9 */
            }

            .video-responsive iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

        }
    </style>
@endpush

@section('content')
    <header class="article-header">
    </header>

    <section class="article-content bg-light py-5">
        <div class="container">
            <div class="row">
                <!-- Left Section: Article Content -->
                <div class="col-lg-8 bg-white gap-2">
                    <div class="content mt-3">
                        <h2 class="fw-bolder mb-4" style="font-size:1.4rem;">{{ $article->title }}</h2>
                        <div class="small text-muted">
                            <div class="fw-bold">Admin</div>
                            <div>{{ $article->created_at->format('F d, Y') }}</div>
                        </div>
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                            {{ $article->category }}
                        </div>
                        <hr class="divider">
                        <div class="article-body">
                            <img src="{{ asset('storage/' . $article->photo) }}" alt="{{ $article->title }}"
                                class="content-image mb-4">
                            <!-- Displaying article description -->
                            {!! $article->desc !!}

                            <!-- Share Buttons -->
                            <div class="share-buttons mt-4 mb-4">
                                <h5>Share this article:</h5>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title) }}%0A{{ request()->fullUrl() }}"
                                    target="_blank" class="btn btn-success me-2">
                                    <i class="bi bi-whatsapp text-white"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}%0A{{ request()->fullUrl() }}"
                                    target="_blank" class="btn btn-info me-2">
                                    <i class="bi bi-twitter text-white"></i>
                                </a>
                                <button class="btn btn-primary me-2" onclick="copyLink()">
                                    <i class="bi bi-link-45deg"></i> Copy Link
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Right Section: List of Articles -->
                <div class="col-lg-4 bg-light gap-2">
                    <h2 class="fw-bolder mb-4">Artikel Lainnya</h2>
                    <div class="list-group">
                        @foreach ($other_articles as $other_article)
                            <div class="py-1"> <!-- Div baru dengan padding atas dan bawah -->
                                <a href="{{ route('artikel.detail', $other_article->slug) }}"
                                    class="list-group-item list-group-item-action d-flex align-items-start mb-2"
                                    style="border-radius: 25px;">
                                    <img src="{{ asset('storage/' . $other_article->photo) }}"
                                        alt="{{ $other_article->title }}" class="article-image me-3">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1">{{ $other_article->title }}</h5>
                                        <div class="small text-muted">
                                            <div class="fw-bold">Admin</div>
                                            <div>{{ $other_article->created_at->format('F d, Y') }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function copyLink() {
            const link = '{{ request()->fullUrl() }}'; // Get the current URL
            navigator.clipboard.writeText(link) // Copy the URL to clipboard
                .then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Copied!',
                        text: 'Link copied to clipboard!',
                        confirmButtonText: 'OK'
                    });
                })
                .catch(err => {
                    console.error('Error copying the link: ', err); // Error handling
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Failed to copy the link!',
                        confirmButtonText: 'Try Again'
                    });
                });
        }
    </script>
@endpush
