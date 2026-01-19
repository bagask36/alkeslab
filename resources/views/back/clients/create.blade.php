@extends('back.template.index')

@section('title', 'Create Client')

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
    <div id="content">
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

            <form action="{{ url('/clients') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name">Nama Klien</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') }}" required>
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

                <div class="mb-3 image-size-option">
                    <label>Image Size</label><br>
                    <input type="radio" id="small" name="image_size" value="small" required>
                    <label for="small">Small</label><br>
                    <input type="radio" id="large" name="image_size" value="large">
                    <label for="large">Large</label>
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
                    imagePreview.style.display = 'block'; // Show image preview
                    pictureLabel.style.display = 'block'; // Show label when an image is selected
                }
                reader.readAsDataURL(file); // Read file as Data URL
            } else {
                imagePreview.src = ''; // Reset if no file is selected
                imagePreview.style.display = 'none'; // Hide image preview
                pictureLabel.style.display = 'none'; // Hide label if no image
            }
        }
    </script>
@endpush
