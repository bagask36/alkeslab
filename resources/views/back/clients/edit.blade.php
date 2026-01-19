@extends('back.template.index')

@section('title', 'Edit Client')

@push('css')
    <style>
        #editor {
            min-height: 1000px;
            /* Adjust as needed */
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
            /* Hover color */
        }

        #photo {
            display: none;
            /* Hide the original file input */
        }

        .current-picture-container {
            margin-top: 1rem;
            text-align: center;
            /* Center the image and text */
        }

        .current-picture {
            max-width: 80%;
            max-height: 300px;
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .current-picture-label {
            display: block;
            margin-top: 0.5rem;
            /* Top margin */
            font-size: 0.9rem;
            /* Label font size */
            color: #666;
            /* Label text color */
        }

        .image-size-option {
            margin-top: 1rem;
        }
    </style>
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Client</h1>
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
        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Client Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $client->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="photo">Image (Maximum 2 MB)</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                <label for="photo" class="file-input-label">Choose File</label>
                <div class="current-picture-container">
                    <small class="current-picture-label">Current Picture</small>
                    <img src="{{ asset('storage/' . $client->image) }}" alt="Client Photo" class="current-picture">
                </div>
            </div>

            <div class="mb-3 image-size-option">
                <label>Image Size</label><br>
                <input type="radio" id="small" name="image_size" value="small"
                    {{ $client->image_size === 'small' ? 'checked' : '' }} required>
                <label for="small">Small</label><br>
                <input type="radio" id="large" name="image_size" value="large"
                    {{ $client->image_size === 'large' ? 'checked' : '' }}>
                <label for="large">Large</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Update Client</button>
        </form>
    </div>
@endsection
