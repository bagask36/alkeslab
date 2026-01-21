@extends('back.layout')

@section('title', 'Edit Dokumen Legalitas')

@section('content')
    <div class="space-y-8 max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('legalitas.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Edit Dokumen Legalitas</flux:heading>
                <flux:subheading class="!mt-0">Edit dokumen legalitas dan sertifikat</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <form action="{{ route('legalitas.update', $legalitas->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="information-circle" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Informasi Dokumen</h3>
                    </div>

                    <!-- Name -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Nama Dokumen</flux:label>
                        <flux:input name="name" value="{{ old('name', $legalitas->name) }}" placeholder="Masukkan nama dokumen" required class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" />
                        <flux:error name="name" />
                    </flux:field>

                    <!-- Type -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Tipe Dokumen</flux:label>
                        <div class="grid grid-cols-3 gap-4 mt-2">
                            <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all hover:border-[var(--color-accent)] {{ old('type', $legalitas->type) == 'pdf' ? 'border-[var(--color-accent)] bg-[var(--color-accent)]/5' : 'border-zinc-300 dark:border-zinc-600' }}">
                                <input type="radio" name="type" value="pdf" class="sr-only" {{ old('type', $legalitas->type) == 'pdf' ? 'checked' : '' }} />
                                <div class="flex-1 text-center">
                                    <flux:icon icon="document-text" class="w-8 h-8 mx-auto mb-2 text-red-600 dark:text-red-400" />
                                    <p class="font-medium text-zinc-900 dark:text-white">PDF</p>
                                </div>
                            </label>
                            <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all hover:border-[var(--color-accent)] {{ old('type', $legalitas->type) == 'jpg' ? 'border-[var(--color-accent)] bg-[var(--color-accent)]/5' : 'border-zinc-300 dark:border-zinc-600' }}">
                                <input type="radio" name="type" value="jpg" class="sr-only" {{ old('type', $legalitas->type) == 'jpg' ? 'checked' : '' }} />
                                <div class="flex-1 text-center">
                                    <flux:icon icon="photo" class="w-8 h-8 mx-auto mb-2 text-blue-600 dark:text-blue-400" />
                                    <p class="font-medium text-zinc-900 dark:text-white">JPG</p>
                                </div>
                            </label>
                            <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all hover:border-[var(--color-accent)] {{ old('type', $legalitas->type) == 'png' ? 'border-[var(--color-accent)] bg-[var(--color-accent)]/5' : 'border-zinc-300 dark:border-zinc-600' }}">
                                <input type="radio" name="type" value="png" class="sr-only" {{ old('type', $legalitas->type) == 'png' ? 'checked' : '' }} />
                                <div class="flex-1 text-center">
                                    <flux:icon icon="photo" class="w-8 h-8 mx-auto mb-2 text-green-600 dark:text-green-400" />
                                    <p class="font-medium text-zinc-900 dark:text-white">PNG</p>
                                </div>
                            </label>
                        </div>
                        <flux:error name="type" />
                        <flux:description class="!mt-2">Pilih tipe dokumen yang akan diupload</flux:description>
                    </flux:field>
                </div>

                <!-- Document Upload -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="document-arrow-up" class="w-5 h-5 text-purple-600 dark:text-purple-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">File Dokumen</h3>
                    </div>

                    <!-- Document -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Upload File</flux:label>
                        @if($legalitas->file)
                            <div class="mb-4 p-4 bg-zinc-50 dark:bg-zinc-800/50 rounded-xl border border-zinc-200 dark:border-zinc-700">
                                <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-3">Dokumen saat ini:</p>
                                <a href="{{ asset('storage/' . $legalitas->file) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                    <flux:icon icon="arrow-top-right-on-square" class="w-5 h-5" />
                                    <span class="font-medium">{{ basename($legalitas->file) }}</span>
                                </a>
                            </div>
                        @endif
                        <label for="doc" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-zinc-300 dark:border-zinc-600 rounded-xl cursor-pointer bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <flux:icon icon="cloud-arrow-up" class="w-12 h-12 mb-3 text-zinc-400 dark:text-zinc-500" />
                                <p class="mb-2 text-sm text-zinc-500 dark:text-zinc-400"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400">PDF, JPG, PNG (MAX. 2MB)</p>
                            </div>
                            <input id="doc" type="file" name="doc" accept=".pdf,.jpg,.jpeg,.png" class="hidden" />
                        </label>
                        <div id="doc-preview" class="mt-4 hidden">
                            <div class="p-4 bg-zinc-50 dark:bg-zinc-800/50 rounded-xl border border-zinc-200 dark:border-zinc-700">
                                <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">File baru yang akan diupload:</p>
                                <p id="doc-preview-name" class="text-sm text-zinc-600 dark:text-zinc-400"></p>
                            </div>
                        </div>
                        <flux:error name="doc" />
                        <flux:description class="!mt-2">Kosongkan jika tidak ingin mengubah dokumen. Pastikan tipe file sesuai dengan pilihan di atas.</flux:description>
                    </flux:field>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('legalitas.index') }}" variant="ghost" class="!px-6">
                        <flux:icon icon="x-mark" class="w-4 h-4" />
                        Batal
                    </flux:button>
                    <flux:button type="submit" class="!px-8 !py-2.5 !rounded-xl !shadow-md hover:!shadow-lg transition-all">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Update Dokumen
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const docInput = document.getElementById('doc');
            const docPreview = document.getElementById('doc-preview');
            const docPreviewName = document.getElementById('doc-preview-name');

            if (docInput) {
                docInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        docPreviewName.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)';
                        docPreview.classList.remove('hidden');
                    } else {
                        docPreview.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    @endpush
@endsection
