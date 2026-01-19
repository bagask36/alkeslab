@extends('back.template.index')

@section('title', 'Products')

@push('css')
    <!-- Add any custom CSS here if needed -->
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Produk Kami</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Buat Produk Kami Baru</a>
        </div>

        @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Data Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Produk Kami</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center fw-bolder">
                                <th>No</th>
                                <th>Image</th>
                                <th>Card Icon</th>
                                <th>Description</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <!-- Display Product Image -->
                                    <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                            style="width: 100px;"></td>
                                    <!-- Display Product Icon -->
                                    <td>
                                        @if ($product->icon)
                                            <img src="{{ asset('storage/' . $product->icon) }}" alt="Card Icon"
                                                style="width: 50px;">
                                        @else
                                            No Icon
                                        @endif
                                    </td>
                                    <!-- Description -->
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#dataTable').DataTable({
                processing: true,
                serverSide: false, // Set to false if you're using a static array or controller without server-side processing
                order: [
                    [0, 'asc']
                ], // Default sorting
            });
        });
    </script>
@endpush
