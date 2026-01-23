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

                    <!-- Hashtags -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                            <flux:icon icon="hashtag" class="w-5 h-5 text-pink-600 dark:text-pink-400" />
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Hashtag</h3>
                        </div>
                        
                        <flux:field class="md:col-span-2">
                            <flux:label class="!text-sm !font-semibold">Tambahkan Hashtag</flux:label>
                            
                            <!-- Hidden input untuk form submission -->
                            <input type="hidden" name="hashtags" id="hashtags-input" value="{{ old('hashtags') }}">
                            
                            <!-- Tag Input Container -->
                            <div class="hashtag-input-container">
                                <div class="hashtag-tags-display" id="hashtag-tags-display">
                                    <!-- Tags will be displayed here -->
                                </div>
                                <div class="hashtag-input-wrapper">
                                    <flux:icon icon="hashtag" class="hashtag-input-icon" />
                                    <input 
                                        type="text" 
                                        id="hashtag-input" 
                                        placeholder="Ketik hashtag dan tekan Enter atau koma"
                                        class="hashtag-input-field"
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            
                            <flux:error name="hashtags" />
                            <flux:description class="!mt-2">
                                <div class="flex items-center gap-2">
                                    <flux:icon icon="information-circle" class="w-4 h-4" />
                                    <span>Ketik hashtag dan tekan <kbd class="hashtag-kbd">Enter</kbd> atau <kbd class="hashtag-kbd">,</kbd> untuk menambahkan. Klik <flux:icon icon="x-mark" class="w-3 h-3 inline" /> pada tag untuk menghapus.</span>
                                </div>
                            </flux:description>
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

        /* Hashtag Input Styles */
        .hashtag-input-container {
            border: 2px solid rgb(212 212 216);
            border-radius: 0.75rem;
            background: white;
            padding: 0.75rem;
            min-height: 60px;
            transition: all 0.3s ease;
        }

        .dark .hashtag-input-container {
            background: rgb(39 39 42);
            border-color: rgb(63 63 70);
        }

        .hashtag-input-container:focus-within {
            border-color: rgb(219 39 119);
            box-shadow: 0 0 0 3px rgba(219, 39, 119, 0.1);
        }

        .hashtag-tags-display {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            min-height: 32px;
        }

        .hashtag-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            color: white;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            animation: tagSlideIn 0.3s ease;
            transition: all 0.2s ease;
        }

        .hashtag-tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(219, 39, 119, 0.3);
        }

        .hashtag-tag-text {
            user-select: none;
        }

        .hashtag-tag-remove {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .hashtag-tag-remove:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .hashtag-input-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .hashtag-input-icon {
            width: 1.25rem;
            height: 1.25rem;
            color: rgb(219 39 119);
            flex-shrink: 0;
        }

        .hashtag-input-field {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            font-size: 0.875rem;
            color: rgb(24 24 27);
            padding: 0.25rem 0;
        }

        .dark .hashtag-input-field {
            color: rgb(244 244 245);
        }

        .hashtag-input-field::placeholder {
            color: rgb(161 161 170);
        }

        .hashtag-kbd {
            display: inline-block;
            padding: 0.125rem 0.375rem;
            background: rgb(244 244 245);
            border: 1px solid rgb(212 212 216);
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: rgb(63 63 70);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .dark .hashtag-kbd {
            background: rgb(39 39 42);
            border-color: rgb(63 63 70);
            color: rgb(212 212 216);
        }

        @keyframes tagSlideIn {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes tagSlideOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.8);
            }
        }

        .hashtag-tag.removing {
            animation: tagSlideOut 0.2s ease forwards;
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

            // Hashtag Input Functionality
            const hashtagInput = document.getElementById('hashtag-input');
            const hashtagTagsDisplay = document.getElementById('hashtag-tags-display');
            const hashtagsHiddenInput = document.getElementById('hashtags-input');
            let hashtags = [];

            // Initialize hashtags from old input
            const oldHashtags = hashtagsHiddenInput.value;
            if (oldHashtags) {
                const tags = oldHashtags.split(/\s+/).filter(tag => tag.trim() !== '');
                tags.forEach(tag => {
                    const cleanTag = tag.trim().replace(/^#+/, '');
                    if (cleanTag) {
                        hashtags.push(cleanTag);
                    }
                });
                renderHashtags();
            }

            function formatHashtag(tag) {
                // Remove existing # and add one
                return tag.trim().replace(/^#+/, '');
            }

            function addHashtag(tag) {
                const formattedTag = formatHashtag(tag);
                if (formattedTag && !hashtags.includes(formattedTag)) {
                    hashtags.push(formattedTag);
                    renderHashtags();
                    updateHiddenInput();
                }
            }

            function removeHashtag(index) {
                const tagElement = hashtagTagsDisplay.children[index];
                if (tagElement) {
                    tagElement.classList.add('removing');
                    setTimeout(() => {
                        hashtags.splice(index, 1);
                        renderHashtags();
                        updateHiddenInput();
                    }, 200);
                }
            }

            function renderHashtags() {
                hashtagTagsDisplay.innerHTML = '';
                hashtags.forEach((tag, index) => {
                    const tagElement = document.createElement('div');
                    tagElement.className = 'hashtag-tag';
                    tagElement.innerHTML = `
                        <span class="hashtag-tag-text">#${tag}</span>
                        <span class="hashtag-tag-remove" data-index="${index}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </span>
                    `;
                    
                    tagElement.querySelector('.hashtag-tag-remove').addEventListener('click', () => {
                        removeHashtag(index);
                    });
                    
                    hashtagTagsDisplay.appendChild(tagElement);
                });
            }

            function updateHiddenInput() {
                const formattedTags = hashtags.map(tag => `#${tag}`).join(' ');
                hashtagsHiddenInput.value = formattedTags;
            }

            hashtagInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const value = this.value.trim();
                    if (value) {
                        addHashtag(value);
                        this.value = '';
                    }
                } else if (e.key === 'Backspace' && this.value === '' && hashtags.length > 0) {
                    // Remove last tag if input is empty and backspace is pressed
                    removeHashtag(hashtags.length - 1);
                }
            });

            // Handle paste event to add multiple tags
            hashtagInput.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedText = (e.clipboardData || window.clipboardData).getData('text');
                const tags = pastedText.split(/[\s,]+/).filter(tag => tag.trim() !== '');
                tags.forEach(tag => {
                    if (tag.trim()) {
                        addHashtag(tag);
                    }
                });
                this.value = '';
            });
        });
    </script>
    @endpush
@endsection
