@extends('back.template.index')

@section('title', 'Edit Product')

@push('css')
    <style>
        #editor {
            min-height: 1000px;
        }

        .file-input-label {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: white;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 0.8rem;
            transition: background-color 0.3s ease;
        }

        .file-input-label:hover {
            background-color: #0056b3;
        }

        #photo,
        #icon {
            display: none;
        }

        .current-picture-container {
            margin-top: 1rem;
            text-align: center;
        }

        .current-picture {
            max-width: 80%;
            max-height: 300px;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .current-picture-label {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }

        .current-icon {
            max-width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Produk Kami</h1>
        </div>

        <!-- Display Errors -->
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

        <!-- Edit Form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Description Section -->
            <div class="form-group mt-3">
                <label for="description">Title</label>
                <input type="text" name="description" class="form-control"
                    value="{{ old('description', $product->description) }}" required>
            </div>
            
            <!-- Product Image Section -->
            <div class="mb-3">
                <label for="img">Image (Maximum 2 MB)</label>
                <input type="file" name="photo" id="photo" class="form-control">
                <label for="photo" class="file-input-label">Choose File</label>
                <div class="current-picture-container">
                    <small class="current-picture-label">Current Picture</small>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image"
                        class="current-picture">
                </div>
            </div>

            <!-- Product Icon Section -->
            <div class="mb-3">
                <label for="icon">Icon (Maximum 1 MB)</label>
                <input type="file" name="icon" id="icon" class="form-control">
                <label for="icon" class="file-input-label">Choose Icon</label>
                <div class="current-picture-container">
                    <small class="current-picture-label">Current Icon</small>
                    <img src="{{ asset('storage/' . $product->icon) }}" alt="Current Icon" class="current-icon">
                </div>
            </div>



            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Update Product</button>
        </form>
    </div>
@endsection
