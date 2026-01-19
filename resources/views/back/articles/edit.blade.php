@extends('back.template.index')

@section('title', 'Edit Article')

@push('css')
    <style>
        #editor {
            min-height: 1000px;
            /* Ubah sesuai kebutuhan */
        }

        .file-input-label {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: white;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 0.8rem;
            /* Atur ukuran font */
            transition: background-color 0.3s ease;
            /* Tambahkan transisi untuk efek halus */
        }

        .file-input-label:hover {
            background-color: #0056b3;
            /* Warna latar belakang saat hover */
        }

        #photo {
            display: none;
            /* Menyembunyikan input file asli */
        }

        .current-picture-container {
            margin-top: 1rem;
            /* Jarak atas */
            text-align: center;
            /* Pusatkan gambar dan teks */
        }

        .current-picture {
            max-width: 80%;
            /* Atur lebar maksimum gambar (ubah sesuai kebutuhan) */
            max-height: 300px;
            /* Atur tinggi maksimum gambar (ubah sesuai kebutuhan) */
            height: auto;
            /* Tinggi otomatis agar proporsional */
            border-radius: 0.5rem;
            /* Sudut melengkung */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Bayangan halus */
        }

        .current-picture-label {
            display: block;
            /* Tampilkan label sebagai blok */
            margin-top: 0.5rem;
            /* Jarak atas */
            font-size: 0.9rem;
            /* Ukuran font label */
            color: #666;
            /* Warna teks label */
        }
    </style>
@endpush
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update {{ $article->title }}</h1>
        </div>

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

        <form action="{{ url('articles/' . $article->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImg" value="{{ $article->img }}">

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $article->title) }}" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <input type="text" name="category" id="category" class="form-control" required
                            value="{{ old('category', $article->category) }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="desc">Description</label>
                <textarea name="desc" id="editor" cols="30" rows="10" class="form-control">{{ old('desc', $article->desc) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="img">Image (Maximum 2 MB)</label>
                <input type="file" name="photo" id="photo" class="form-control">
                <label for="photo" class="file-input-label">Choose File</label>
                <div class="current-picture-container">
                    <small class="current-picture-label">Current Picture</small>
                    <img src="{{ asset('storage/' . $article->photo) }}" alt="" class="current-picture">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="" hidden>-- Choose --</option>
                            <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published
                            </option>
                            <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ $article->status == 'archived' ? 'selected' : '' }}>Archived
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control"
                            value="{{ old('publish_date', $article->publish_date) }}" required>
                    </div>
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>

    </main>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                // Retrieve the names of the registered UI components
                const componentNames = Array.from(editor.ui.componentFactory.names());

                // Log the component names to the console
                console.log('Registered UI Component Names:', componentNames);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
