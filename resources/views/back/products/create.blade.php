@extends('back.layout')

@section('title', 'Tambah Produk')

@section('content')
    <div class="space-y-8 max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('products.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Tambah Produk</flux:heading>
                <flux:subheading class="!mt-0">Tambah produk baru ke katalog</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Product Information -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="information-circle" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Informasi Produk</h3>
                    </div>

                    <!-- Description -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Deskripsi Produk</flux:label>
                        <flux:textarea name="description" rows="5" placeholder="Masukkan deskripsi produk" class="!rounded-xl !border-zinc-300 dark:!border-zinc-600">{{ old('description') }}</flux:textarea>
                        <flux:error name="description" />
                    </flux:field>
                </div>

                <!-- Media Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="photo" class="w-5 h-5 text-green-600 dark:text-green-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Media Produk</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Photo -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Foto Produk</flux:label>
                            <label for="photo" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-zinc-300 dark:border-zinc-600 rounded-xl cursor-pointer bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <flux:icon icon="photo" class="w-10 h-10 mb-2 text-zinc-400 dark:text-zinc-500" />
                                    <p class="mb-1 text-xs text-zinc-500 dark:text-zinc-400"><span class="font-semibold">Upload foto</span></p>
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400">JPG, PNG, GIF (MAX. 2MB)</p>
                                </div>
                                <input id="photo" type="file" name="photo" accept="image/*" class="hidden" required />
                            </label>
                            <div id="photo-preview" class="mt-3 hidden">
                                <img id="photo-preview-img" src="" alt="Preview" class="max-w-full rounded-lg border border-zinc-200 dark:border-zinc-700">
                            </div>
                            <flux:error name="photo" />
                        </flux:field>

                        <!-- Icon -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Icon Produk</flux:label>
                            <label for="icon" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-zinc-300 dark:border-zinc-600 rounded-xl cursor-pointer bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <flux:icon icon="sparkles" class="w-10 h-10 mb-2 text-zinc-400 dark:text-zinc-500" />
                                    <p class="mb-1 text-xs text-zinc-500 dark:text-zinc-400"><span class="font-semibold">Upload icon</span></p>
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400">JPG, PNG, GIF (MAX. 2MB)</p>
                                </div>
                                <input id="icon" type="file" name="icon" accept="image/*" class="hidden" required />
                            </label>
                            <div id="icon-preview" class="mt-3 hidden">
                                <img id="icon-preview-img" src="" alt="Preview" class="max-w-full rounded-lg border border-zinc-200 dark:border-zinc-700">
                            </div>
                            <flux:error name="icon" />
                        </flux:field>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('products.index') }}" variant="ghost" class="!px-6">
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

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // Icon Preview
            const iconInput = document.getElementById('icon');
            const iconPreview = document.getElementById('icon-preview');
            const iconPreviewImg = document.getElementById('icon-preview-img');

            iconInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        iconPreviewImg.src = e.target.result;
                        iconPreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    iconPreview.classList.add('hidden');
                }
            });
        });
    </script>
    @endpush
@endsection
