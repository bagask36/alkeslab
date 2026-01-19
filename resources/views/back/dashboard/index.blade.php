@extends('back.template.index')

@section('title', 'Dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Total Articles -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Articles</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalArticles }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Published Articles -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Published Articles</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $publishedArticles }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Draft Articles -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Draft Articles</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $draftArticles }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-pencil-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Archived Articles -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Archived Articles</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $archivedArticles }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-archive fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Client Pictures -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Client Pictures</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalClientPictures }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7 col-md-12 mb-4"> <!-- Added mb-4 for margin on smaller screens -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Total Articles Published Overview</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5 col-md-12 mb-4"> <!-- Added mb-4 for margin on smaller screens -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Article Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            @foreach ($categoryLabels as $index => $category)
                                <span class="mr-2">
                                    <i
                                        class="fas fa-circle text-{{ $loop->index % 3 == 0 ? 'primary' : ($loop->index % 3 == 1 ? 'success' : 'info') }}"></i>
                                    {{ $category }} ({{ $categoryData[$index] }})
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
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
                labels: @json($categoryLabels), // Categories as labels
                datasets: [{
                    data: @json($categoryData), // Total articles for each category
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)', // Color for the first category
                        'rgba(255, 99, 132, 0.6)', // Color for the second category
                        'rgba(255, 206, 86, 0.6)', // Color for the third category
                        'rgba(75, 192, 192, 0.6)', // Color for the fourth category
                        'rgba(153, 102, 255, 0.6)', // Color for the fifth category
                        'rgba(255, 159, 64, 0.6)' // Color for the sixth category
                    ],
                    hoverOffset: 4 // Effect when hovering over the pie chart
                }],
            },
            options: {
                responsive: true, // Make the chart responsive
            },
        });
    </script>
@endpush
