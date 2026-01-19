@extends('back.template.index')

@section('title', 'Buat Layanan Baru')

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

        #photo {
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

        .image-size-option {
            margin-top: 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid" id="content">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buat Layanan Baru</h1>
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

            <form action="{{ route('layanan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name">Nama Layanan</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="photo">Image (Maximum 2 MB)</label>
                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <label for="photo" class="file-input-label">Choose File</label>

                    <div class="current-picture-container">
                        <small id="picture-label" class="current-picture-label" style="display: none;">Selected Picture</small>
                        <img id="image-preview" src="" alt="" class="current-picture" style="display: none;">
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
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    pictureLabel.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
                pictureLabel.style.display = 'none';
            }
        }
    </script>
@endpush
