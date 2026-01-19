@extends('back.template.index')

@section('title', 'Create Legalitas')

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

        .current-document {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Legalitas Document</h1>
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

        <form action="{{ route('legalitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name">Document Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="doc">Upload Document (PDF, JPG, PNG, Maximum 2 MB)</label>
                <input type="file" name="doc" id="doc" class="form-control" accept=".pdf,.jpg,.png"
                    onchange="previewDocument(event)">
                <label for="doc" class="file-input-label">Choose File</label>

                <div class="current-document-container">
                    <small class="current-document-label">Uploaded Document</small>
                    <span id="document-name" class="current-document"></span>
                </div>
            </div>

            <div class="mb-3">
                <label>Document Type</label><br>
                <input type="radio" id="pdf" name="type" value="pdf"
                    {{ old('type') === 'pdf' ? 'checked' : '' }} required>
                <label for="pdf">PDF</label><br>
                <input type="radio" id="jpg" name="type" value="jpg"
                    {{ old('type') === 'jpg' ? 'checked' : '' }}>
                <label for="jpg">JPG</label><br>
                <input type="radio" id="png" name="type" value="png"
                    {{ old('type') === 'png' ? 'checked' : '' }}>
                <label for="png">PNG</label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Legalitas Document</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function previewDocument(event) {
            const documentName = document.getElementById('document-name');
            const file = event.target.files[0];

            if (file) {
                documentName.textContent = file.name;
            } else {
                documentName.textContent = '';
            }
        }
    </script>
@endpush
