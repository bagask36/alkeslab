@extends('back.layout')

@section('title', 'Detail Artikel')

@section('content')
    <div class="space-y-6 max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('articles.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Detail Artikel</flux:heading>
                <flux:subheading class="!mt-0">Informasi lengkap artikel dan berita</flux:subheading>
            </div>
            <div class="flex items-center gap-2">
                <flux:button href="{{ route('articles.edit', $article->id) }}" variant="ghost" class="!px-4">
                    <flux:icon icon="pencil" class="w-4 h-4" />
                    Edit
                </flux:button>
            </div>
        </div>

        <!-- Article Image -->
        @if($article->photo)
        <flux:card class="!p-0 !overflow-hidden">
            <img src="{{ asset('storage/' . $article->photo) }}" 
                 alt="{{ $article->title }}" 
                 class="w-full h-auto max-h-96 object-cover">
        </flux:card>
        @endif

        <!-- Article Information -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <flux:heading size="2xl" class="!mb-2">{{ $article->title }}</flux:heading>
                    <div class="flex items-center gap-4 flex-wrap mt-4">
                        <!-- Category Badge -->
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 text-sm font-medium">
                            <flux:icon icon="tag" class="w-4 h-4" />
                            {{ $article->category }}
                        </span>
                        
                        <!-- Status Badge -->
                        @php
                            $statusConfig = [
                                'published' => ['color' => 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300', 'icon' => 'check-circle'],
                                'draft' => ['color' => 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300', 'icon' => 'pencil'],
                                'archived' => ['color' => 'bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-300', 'icon' => 'archive-box']
                            ];
                            $status = $statusConfig[$article->status] ?? $statusConfig['draft'];
                        @endphp
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg {{ $status['color'] }} text-sm font-medium">
                            <flux:icon icon="{{ $status['icon'] }}" class="w-4 h-4" />
                            {{ ucfirst($article->status) }}
                        </span>
                    </div>
                </div>

                <!-- Meta Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-zinc-100 dark:bg-zinc-800 rounded-lg">
                            <flux:icon icon="calendar" class="w-5 h-5 text-zinc-600 dark:text-zinc-400" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Tanggal Dibuat</p>
                            <p class="text-sm font-semibold text-zinc-900 dark:text-white">{{ $article->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-zinc-100 dark:bg-zinc-800 rounded-lg">
                            <flux:icon icon="clock" class="w-5 h-5 text-zinc-600 dark:text-zinc-400" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Terakhir Diupdate</p>
                            <p class="text-sm font-semibold text-zinc-900 dark:text-white">{{ $article->updated_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-zinc-100 dark:bg-zinc-800 rounded-lg">
                            <flux:icon icon="user" class="w-5 h-5 text-zinc-600 dark:text-zinc-400" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Penulis</p>
                            <p class="text-sm font-semibold text-zinc-900 dark:text-white">{{ $article->user->name ?? 'Admin' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-zinc-100 dark:bg-zinc-800 rounded-lg">
                            <flux:icon icon="link" class="w-5 h-5 text-zinc-600 dark:text-zinc-400" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Slug</p>
                            <p class="text-sm font-semibold text-zinc-900 dark:text-white break-all">{{ $article->slug }}</p>
                        </div>
                    </div>
                </div>

                <!-- Hashtags -->
                @php
                    $hashtagsArray = [];
                    if (!empty($article->hashtags) && trim($article->hashtags) !== '') {
                        $hashtags = explode(' ', trim($article->hashtags));
                        $hashtagsArray = array_filter($hashtags, function($tag) {
                            return !empty(trim($tag));
                        });
                    }
                @endphp
                @if(count($hashtagsArray) > 0)
                <div class="pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <div class="flex items-center gap-2 mb-3">
                        <flux:icon icon="hashtag" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <p class="text-sm font-semibold text-zinc-900 dark:text-white">Hashtag</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($hashtagsArray as $tag)
                            @php
                                $cleanTag = ltrim(trim($tag), '#');
                                $hashtagText = $cleanTag;
                            @endphp
                            <span class="hashtag-badge">
                                <span>#{{ $hashtagText }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Article Content -->
                <div class="pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <div class="flex items-center gap-2 mb-4">
                        <flux:icon icon="document-text" class="w-5 h-5 text-zinc-600 dark:text-zinc-400" />
                        <p class="text-sm font-semibold text-zinc-900 dark:text-white">Konten Artikel</p>
                    </div>
                    <div class="prose prose-zinc dark:prose-invert max-w-none">
                        <div class="article-content">
                            {!! $article->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </flux:card>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-4 border-t border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('articles.index') }}" variant="ghost" class="!px-6">
                <flux:icon icon="arrow-left" class="w-4 h-4" />
                Kembali ke Daftar
            </flux:button>
            <div class="flex items-center gap-2">
                <flux:button href="{{ route('articles.edit', $article->id) }}" class="!px-6">
                    <flux:icon icon="pencil" class="w-4 h-4" />
                    Edit Artikel
                </flux:button>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        /* Article Content Styling */
        .article-content {
            @apply text-zinc-700 dark:text-zinc-300;
        }
        
        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4 {
            @apply font-bold text-zinc-900 dark:text-white mt-6 mb-3;
        }
        
        .article-content h2 {
            @apply text-2xl;
        }
        
        .article-content h3 {
            @apply text-xl;
        }
        
        .article-content h4 {
            @apply text-lg;
        }
        
        .article-content p {
            @apply mb-4 leading-relaxed;
        }
        
        .article-content ul,
        .article-content ol {
            @apply mb-4 ml-6;
        }
        
        .article-content li {
            @apply mb-2;
        }
        
        .article-content a {
            @apply text-blue-600 dark:text-blue-400 hover:underline;
        }
        
        .article-content img {
            @apply max-w-full h-auto rounded-lg my-4;
        }
        
        .article-content blockquote {
            @apply border-l-4 border-zinc-300 dark:border-zinc-600 pl-4 italic my-4;
        }
        
        .article-content table {
            @apply w-full border-collapse border border-zinc-300 dark:border-zinc-600 my-4;
        }
        
        .article-content table th,
        .article-content table td {
            @apply border border-zinc-300 dark:border-zinc-600 px-4 py-2;
        }
        
        .article-content table th {
            @apply bg-zinc-100 dark:bg-zinc-800 font-semibold;
        }
        
        /* Video Responsive */
        .article-content .video-responsive {
            @apply relative overflow-hidden rounded-lg my-4;
            padding-top: 56.25%;
        }
        
        .article-content .video-responsive iframe {
            @apply absolute top-0 left-0 w-full h-full border-0;
        }
        
        /* Hashtag Badge Styling */
        .hashtag-badge {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0.625rem 1rem !important;
            border-radius: 0.5rem !important;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important;
            color: #ffffff !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3) !important;
            transition: all 0.2s ease !important;
            min-width: 100px !important;
        }
        
        .hashtag-badge:hover {
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4) !important;
            transform: translateY(-1px) !important;
        }
        
        .hashtag-badge span {
            color: #ffffff !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            line-height: 1.25rem !important;
        }
    </style>
    @endpush
@endsection
