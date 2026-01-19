@extends('back.template.index')

@section('title', 'Create Article')

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


            <form action="{{ url('/articles') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control" required>
                        </div>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="editor" cols="30" rows="10" class="form-control"></textarea>
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


                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" hidden>-- Choose --</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="draft">Archived</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="publish_date">Publish Date</label>
                            <input type="date" name="publish_date" id="publish_date" class="form-control">
                        </div>
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
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
                    imagePreview.src = e.target.result; // Set sumber gambar ke hasil pembacaan
                    pictureLabel.style.display = 'block'; // Tampilkan label saat ada gambar
                }
                reader.readAsDataURL(file); // Baca file sebagai URL data
            } else {
                imagePreview.src = ''; // Reset jika tidak ada file yang dipilih
                pictureLabel.style.display = 'none'; // Sembunyikan label saat tidak ada gambar
            }
        }
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
