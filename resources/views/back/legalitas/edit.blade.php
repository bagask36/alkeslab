@extends('back.template.index')

@section('title', 'Edit Legalitas')

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

        #doc {
            display: none;
        }

        .current-document-container {
            margin-top: 1rem;
            text-align: center;
        }

        .current-document-label {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }

        #document-preview {
            margin-top: 1rem;
            width: 100%;
            height: 500px; /* Set the height for the PDF viewer */
            display: none; /* Hide initially */
        }

        #image-preview {
            max-width: 80%;
            max-height: 300px;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 1rem;
            display: none; /* Hide initially */
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Legalitas</h1>
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

        <form action="{{ route('legalitas.update', $legalitas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Nama Legalitas</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $legalitas->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="doc">Document (PDF, JPG, PNG - Maximum 2 MB)</label>
                <input type="file" name="doc" id="doc" class="form-control" accept=".pdf,image/*" onchange="previewDocument(event)">
                <label for="doc" class="file-input-label">Choose File</label>

                <div class="current-document-container">
                    <a href="{{ asset('storage/' . $legalitas->file) }}" target="_blank" class="current-document">View Current Document</a>
                </div>
            </div>

            <div class="mb-3 doc-type-option">
                <label>Document Type</label><br>
                <input type="radio" id="pdf" name="type" value="pdf" {{ $legalitas->type === 'pdf' ? 'checked' : '' }} required>
                <label for="pdf">PDF</label><br>
                <input type="radio" id="jpg" name="type" value="jpg" {{ $legalitas->type === 'jpg' ? 'checked' : '' }}>
                <label for="jpg">JPG</label><br>
                <input type="radio" id="png" name="type" value="png" {{ $legalitas->type === 'png' ? 'checked' : '' }}>
                <label for="png">PNG</label>
            </div>

            <img id="image-preview" src="" alt="Image Preview" />
            <iframe id="document-preview" src="" frameborder="0"></iframe>

            <button type="submit" class="btn btn-primary mt-3">Update Legalitas</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function previewDocument(event) {
            const file = event.target.files[0];
            const imagePreview = document.getElementById('image-preview');
            const documentPreview = document.getElementById('document-preview');

            if (file) {
                const fileReader = new FileReader();

                fileReader.onload = function(e) {
                    if (file.type === 'application/pdf') {
                        // If the file is a PDF, show it in the iframe
                        documentPreview.src = e.target.result;
                        documentPreview.style.display = 'block';
                        imagePreview.style.display = 'none';
                    } else if (file.type.startsWith('image/')) {
                        // If the file is an image, show it in the img tag
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        documentPreview.style.display = 'none';
                    } else {
                        // Hide both previews if the file type is unsupported
                        documentPreview.style.display = 'none';
                        imagePreview.style.display = 'none';
                    }
                }

                fileReader.readAsDataURL(file);
            } else {
                // If no file, hide both previews
                documentPreview.style.display = 'none';
                imagePreview.style.display = 'none';
            }
        }
    </script>
@endpush
