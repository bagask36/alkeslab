@extends('back.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div>
            <flux:heading size="xl">Dashboard</flux:heading>
            <flux:subheading>Selamat datang di Admin Panel PT. ALKESLAB PRIMATAMA</flux:subheading>
        </div>
        
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Artikel</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalArticles }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                        <flux:icon icon="document-text" class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    </div>
                </div>
            </flux:card>
            
            <!-- Published Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Artikel Terbit</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $publishedArticles }}</p>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                        <flux:icon icon="check-circle" class="w-6 h-6 text-green-600 dark:text-green-400" />
                    </div>
                </div>
            </flux:card>
            
            <!-- Draft Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Draft Artikel</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $draftArticles }}</p>
                    </div>
                    <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                        <flux:icon icon="pencil" class="w-6 h-6 text-yellow-600 dark:text-yellow-400" />
                    </div>
                </div>
            </flux:card>
            
            <!-- Total Products -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Produk</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalProducts }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                        <flux:icon icon="shopping-bag" class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                    </div>
                </div>
            </flux:card>
        </div>
        
        <!-- Additional Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Client Pictures -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Klien</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalClientPictures }}</p>
                    </div>
                    <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                        <flux:icon icon="user-group" class="w-6 h-6 text-indigo-600 dark:text-indigo-400" />
                    </div>
                </div>
            </flux:card>
            
            <!-- Archived Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Artikel Diarsipkan</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $archivedArticles }}</p>
                    </div>
                    <div class="p-3 bg-gray-100 dark:bg-gray-800 rounded-lg">
                        <flux:icon icon="archive-box" class="w-6 h-6 text-gray-600 dark:text-gray-400" />
                    </div>
                </div>
            </flux:card>
        </div>
        
        <!-- Quick Actions -->
        <flux:card>
            <flux:heading size="lg" class="mb-4">Aksi Cepat</flux:heading>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <flux:button href="{{ route('articles.create') }}" variant="outline" class="w-full justify-start">
                    <flux:icon icon="plus" class="w-4 h-4" />
                    Buat Artikel Baru
                </flux:button>
                
                <flux:button href="{{ route('products.create') }}" variant="outline" class="w-full justify-start">
                    <flux:icon icon="plus" class="w-4 h-4" />
                    Tambah Produk
                </flux:button>
                
                <flux:button href="{{ route('clients.create') }}" variant="outline" class="w-full justify-start">
                    <flux:icon icon="plus" class="w-4 h-4" />
                    Tambah Klien
                </flux:button>
                
                <flux:button href="{{ route('projects.create') }}" variant="outline" class="w-full justify-start">
                    <flux:icon icon="plus" class="w-4 h-4" />
                    Tambah Proyek
                </flux:button>
            </div>
        </flux:card>
        
        <!-- Charts Section (if data available) -->
        @if($labels->isNotEmpty() && $data->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Articles by Date Chart -->
            <flux:card>
                <flux:heading size="lg" class="mb-4">Artikel per Tanggal</flux:heading>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="articlesByDateChart"></canvas>
                </div>
            </flux:card>
            
            <!-- Articles by Category Chart -->
            @if($categoryLabels->isNotEmpty() && $categoryData->isNotEmpty())
            <flux:card>
                <flux:heading size="lg" class="mb-4">Artikel per Kategori</flux:heading>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="articlesByCategoryChart"></canvas>
                </div>
            </flux:card>
            @endif
        </div>
        @endif
    </div>
    
    @push('scripts')
    @if($labels->isNotEmpty() && $data->isNotEmpty())
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Articles by Date Chart
        const dateCtx = document.getElementById('articlesByDateChart');
        if (dateCtx) {
            new Chart(dateCtx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Jumlah Artikel',
                        data: @json($data),
                        borderColor: 'rgb(30, 48, 243)',
                        backgroundColor: 'rgba(30, 48, 243, 0.1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        
        // Articles by Category Chart
        @if($categoryLabels->isNotEmpty() && $categoryData->isNotEmpty())
        const categoryCtx = document.getElementById('articlesByCategoryChart');
        if (categoryCtx) {
            new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($categoryLabels),
                    datasets: [{
                        data: @json($categoryData),
                        backgroundColor: [
                            'rgba(30, 48, 243, 0.8)',
                            'rgba(34, 197, 94, 0.8)',
                            'rgba(251, 191, 36, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(168, 85, 247, 0.8)',
                            'rgba(236, 72, 153, 0.8)',
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }
        @endif
    </script>
    @endif
    @endpush
@endsection
