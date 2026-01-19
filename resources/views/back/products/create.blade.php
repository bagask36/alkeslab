@extends('back.template.index')

@section('title', 'Create Product')

@push('css')
    <style>
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
        #icon,
        #card-icon {
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

        .icon-preview {
            max-width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid" id="content">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Produk Kami</h1>
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3">
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
            </div>

            <form action="{{ url('/products') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="description">Title</label>
                            <input type="text" name="description" id="description" class="form-control"
                                value="{{ old('description') }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="img">Image (Maximum 2 MB)</label>
                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*"
                        onchange="previewImage(event)">
                    <label for="photo" class="file-input-label">Choose File</label>

                    <div class="current-picture-container">
                        <small id="picture-label" class="current-picture-label" style="display: none;">Selected
                            Picture</small>
                        <img id="image-preview" src="" alt="" class="current-picture">
                    </div>
                </div>

                <!-- Card Icon Upload Section -->
                <div class="mb-3">
                    <label for="icon">Card Icon (Maximum 1 MB)</label>
                    <input type="file" name="icon" id="icon" class="form-control" accept="image/*"
                        onchange="previewCardIcon(event)">
                    <label for="icon" class="file-input-label">Choose Icon</label>

                    <div class="current-picture-container">
                        <small id="icon-label" class="current-picture-label" style="display: none;">Selected Icon</small>
                        <img id="icon-preview" src="" alt="" class="icon-preview">
                    </div>
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const pictureLabel = document.getElementById('picture-label');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Set image source
                    pictureLabel.style.display = 'block'; // Show label when an image is selected
                }
                reader.readAsDataURL(file); // Read file as Data URL
            } else {
                imagePreview.src = ''; // Reset if no file is selected
                pictureLabel.style.display = 'none'; // Hide label if no image
            }
        }

        // Preview for the card icon
        function previewCardIcon(event) {
            const iconPreview = document.getElementById('icon-preview');
            const iconLabel = document.getElementById('icon-label');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    iconPreview.src = e.target.result; // Set icon source
                    iconLabel.style.display = 'block'; // Show label when an icon is selected
                }
                reader.readAsDataURL(file); // Read file as Data URL
            } else {
                iconPreview.src = ''; // Reset if no file is selected
                iconLabel.style.display = 'none'; // Hide label if no icon
            }
        }
    </script>
@endpush
