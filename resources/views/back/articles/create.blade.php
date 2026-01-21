@extends('back.layout')

@section('title', 'Buat Artikel Baru')

@section('content')
    <div class="space-y-8 max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('articles.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Buat Artikel Baru</flux:heading>
                <flux:subheading class="!mt-0">Tambah artikel dan berita baru untuk perusahaan</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Basic Information Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="information-circle" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Informasi Dasar</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <flux:field class="md:col-span-2">
                            <flux:label class="!text-sm !font-semibold">Judul Artikel</flux:label>
                            <flux:input name="title" value="{{ old('title') }}" placeholder="Masukkan judul artikel" required class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" />
                            <flux:error name="title" />
                        </flux:field>

                        <!-- Category -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Kategori</flux:label>
                            <flux:input name="category" value="{{ old('category') }}" placeholder="Masukkan kategori artikel" required class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" />
                            <flux:error name="category" />
                        </flux:field>

                        <!-- Status -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Status</flux:label>
                            <flux:select name="status" value="{{ old('status', 'draft') }}" required class="!rounded-xl !border-zinc-300 dark:!border-zinc-600">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </flux:select>
                            <flux:error name="status" />
                        </flux:field>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="document-text" class="w-5 h-5 text-purple-600 dark:text-purple-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Konten Artikel</h3>
                    </div>

                    <!-- Description -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Deskripsi</flux:label>
                        <textarea id="desc" name="desc" class="hidden">{{ old('desc') }}</textarea>
                        <div id="editor" class="rounded-xl border border-zinc-300 dark:border-zinc-600 overflow-hidden" style="min-height: 400px;"></div>
                        <flux:error name="desc" />
                        <flux:description class="!mt-2">Anda dapat menggunakan oembed untuk video YouTube dengan format: &lt;oembed url="https://youtu.be/VIDEO_ID"&gt;&lt;/oembed&gt;</flux:description>
                    </flux:field>
                </div>

                <!-- Media Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="photo" class="w-5 h-5 text-green-600 dark:text-green-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Media</h3>
                    </div>

                    <!-- Photo -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Foto Artikel</flux:label>
                        <div class="mt-2">
                            <label for="photo" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-zinc-300 dark:border-zinc-600 rounded-xl cursor-pointer bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <flux:icon icon="cloud-arrow-up" class="w-12 h-12 mb-3 text-zinc-400 dark:text-zinc-500" />
                                    <p class="mb-2 text-sm text-zinc-500 dark:text-zinc-400"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400">JPG, PNG, GIF (MAX. 2MB)</p>
                                </div>
                                <input id="photo" type="file" name="photo" accept="image/*" class="hidden" />
                            </label>
                            <div id="photo-preview" class="mt-4 hidden">
                                <img id="photo-preview-img" src="" alt="Preview" class="max-w-xs rounded-lg border border-zinc-200 dark:border-zinc-700">
                            </div>
                        </div>
                        <flux:error name="photo" />
                    </flux:field>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('articles.index') }}" variant="ghost" class="!px-6">
                        <flux:icon icon="x-mark" class="w-4 h-4" />
                        Batal
                    </flux:button>
                    <flux:button type="submit" class="!px-8 !py-2.5 !rounded-xl !shadow-md hover:!shadow-lg transition-all">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Simpan
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>

    @push('styles')
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
        .ck-editor__editable[role="textbox"] {
            min-height: 400px;
        }
        .dark .ck-editor__editable {
            background-color: rgb(39 39 42) !important;
            color: rgb(244 244 245) !important;
        }
        .dark .ck-toolbar {
            background-color: rgb(24 24 27) !important;
            border-color: rgb(63 63 70) !important;
        }
        .dark .ck-editor__editable {
            border-color: rgb(63 63 70) !important;
        }
        #photo-preview-img {
            max-height: 200px;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // CKEditor
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'bulletedList', 'numberedList', '|',
                            'blockQuote', 'insertTable', '|',
                            'undo', 'redo'
                        ]
                    },
                    language: 'id',
                    placeholder: 'Masukkan konten artikel...'
                })
                .then(editor => {
                    const initialContent = document.querySelector('#desc').value;
                    if (initialContent) {
                        editor.setData(initialContent);
                    }

                    document.querySelector('form').addEventListener('submit', function(e) {
                        document.querySelector('#desc').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });

            // Photo Preview
            const photoInput = document.getElementById('photo');
            const photoPreview = document.getElementById('photo-preview');
            const photoPreviewImg = document.getElementById('photo-preview-img');

            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreviewImg.src = e.target.result;
                        photoPreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    photoPreview.classList.add('hidden');
                }
            });
        });
    </script>
    @endpush
@endsection
