@extends('back.template.index')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Total Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Articles</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $totalArticles }}</p>
                    </div>
                    <div class="rounded-full bg-blue-100 dark:bg-blue-900/20 p-3">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                </div>
            </flux:card>

            <!-- Published Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Published Articles</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $publishedArticles }}</p>
                    </div>
                    <div class="rounded-full bg-green-100 dark:bg-green-900/20 p-3">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </flux:card>

            <!-- Draft Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Draft Articles</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $draftArticles }}</p>
                    </div>
                    <div class="rounded-full bg-yellow-100 dark:bg-yellow-900/20 p-3">
                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                </div>
            </flux:card>

            <!-- Archived Articles -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Archived Articles</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $archivedArticles }}</p>
                    </div>
                    <div class="rounded-full bg-orange-100 dark:bg-orange-900/20 p-3">
                        <svg class="h-6 w-6 text-orange-600 dark:text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                </div>
            </flux:card>

            <!-- Total Client Pictures -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Client Pictures</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $totalClientPictures }}</p>
                    </div>
                    <div class="rounded-full bg-red-100 dark:bg-red-900/20 p-3">
                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </flux:card>

            <!-- Total Products -->
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Products</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $totalProducts }}</p>
                    </div>
                    <div class="rounded-full bg-purple-100 dark:bg-purple-900/20 p-3">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
            </flux:card>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Area Chart -->
            <div class="lg:col-span-2">
                <flux:card class="space-y-4">
                    <flux:heading size="lg">Total Articles Published Overview</flux:heading>
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </flux:card>
            </div>

            <!-- Pie Chart -->
            <div>
                <flux:card class="space-y-4">
                    <flux:heading size="lg">Article Categories</flux:heading>
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center text-sm space-y-2">
                        @foreach ($categoryLabels as $index => $category)
                            <div class="flex items-center justify-center gap-2">
                                <span class="inline-block w-3 h-3 rounded-full" style="background-color: {{ ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'][$index % 6] }}"></span>
                                <span class="text-gray-700 dark:text-gray-300">{{ $category }} ({{ $categoryData[$index] }})</span>
                            </div>
                        @endforeach
                    </div>
                </flux:card>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: "Total Articles Published",
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 20,
                    pointBorderWidth: 2,
                    data: {!! json_encode($data) !!},
                }],
            },
            options: {
                scales: {
                    x: {
                        time: 'date',
                        unit: 'day',
                        displayFormats: {
                            day: 'MMM D',
                        },
                    },
                    y: {
                        beginAtZero: true,
                    },
                },
                elements: {
                    line: {
                        tension: 0.3,
                    },
                },
            },
        });

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($categoryLabels),
                datasets: [{
                    data: @json($categoryData),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    hoverOffset: 4
                }],
            },
            options: {
                responsive: true,
            },
        });
    </script>
@endpush
