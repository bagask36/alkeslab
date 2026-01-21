@extends('back.layout')

@section('title', 'Buat Artikel Baru')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex items-center gap-4">
            <flux:button href="{{ route('articles.index') }}" variant="ghost" class="!p-2">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div>
                <flux:heading size="xl">Buat Artikel Baru</flux:heading>
                <flux:subheading>Tambah artikel dan berita baru untuk perusahaan</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Title -->
                <flux:field>
                    <flux:label>Judul Artikel</flux:label>
                    <flux:input name="title" value="{{ old('title') }}" placeholder="Masukkan judul artikel" required />
                    <flux:error name="title" />
                </flux:field>

                <!-- Category -->
                <flux:field>
                    <flux:label>Kategori</flux:label>
                    <flux:input name="category" value="{{ old('category') }}" placeholder="Masukkan kategori artikel" required />
                    <flux:error name="category" />
                </flux:field>

                <!-- Description -->
                <flux:field>
                    <flux:label>Deskripsi</flux:label>
                    <textarea id="desc" name="desc" class="hidden">{{ old('desc') }}</textarea>
                    <div id="editor" style="min-height: 300px;"></div>
                    <flux:error name="desc" />
                    <flux:description>Anda dapat menggunakan oembed untuk video YouTube dengan format: &lt;oembed url="https://youtu.be/VIDEO_ID"&gt;&lt;/oembed&gt;</flux:description>
                </flux:field>

                <!-- Photo -->
                <flux:field>
                    <flux:label>Foto</flux:label>
                    <flux:input type="file" name="photo" accept="image/*" />
                    <flux:error name="photo" />
                    <flux:description>Format: JPG, PNG, GIF. Maksimal 2MB</flux:description>
                </flux:field>

                <!-- Status -->
                <flux:field>
                    <flux:label>Status</flux:label>
                    <flux:select name="status" value="{{ old('status', 'draft') }}" required>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="archived">Archived</option>
                    </flux:select>
                    <flux:error name="status" />
                </flux:field>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('articles.index') }}" variant="ghost">Batal</flux:button>
                    <flux:button type="submit">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Simpan Artikel
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>

    @push('styles')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        .ck-editor__editable[role="textbox"] {
            min-height: 300px;
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
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                    // Set initial content
                    const initialContent = document.querySelector('#desc').value;
                    if (initialContent) {
                        editor.setData(initialContent);
                    }

                    // Update hidden textarea before form submit
                    document.querySelector('form').addEventListener('submit', function(e) {
                        document.querySelector('#desc').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });
        });
    </script>
    @endpush
@endsection
