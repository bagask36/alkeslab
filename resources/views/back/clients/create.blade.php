@extends('back.layout')

@section('title', 'Tambah Klien')

@section('content')
    <div class="space-y-8 max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('clients.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Tambah Klien</flux:heading>
                <flux:subheading class="!mt-0">Tambah klien atau partner baru</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Basic Information -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="information-circle" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Informasi Klien</h3>
                    </div>

                    <!-- Name -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Nama Klien</flux:label>
                        <flux:input name="name" value="{{ old('name') }}" placeholder="Masukkan nama klien" required class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" />
                        <flux:error name="name" />
                    </flux:field>
                </div>

                <!-- Media Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="photo" class="w-5 h-5 text-green-600 dark:text-green-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Logo Klien</h3>
                    </div>

                    <!-- Photo -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Upload Logo</flux:label>
                        <label for="photo" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-zinc-300 dark:border-zinc-600 rounded-xl cursor-pointer bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <flux:icon icon="cloud-arrow-up" class="w-12 h-12 mb-3 text-zinc-400 dark:text-zinc-500" />
                                <p class="mb-2 text-sm text-zinc-500 dark:text-zinc-400"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400">JPG, PNG, GIF (MAX. 2MB)</p>
                            </div>
                            <input id="photo" type="file" name="photo" accept="image/*" class="hidden" required />
                        </label>
                        <div id="photo-preview" class="mt-4 hidden">
                            <img id="photo-preview-img" src="" alt="Preview" class="max-w-xs rounded-lg border border-zinc-200 dark:border-zinc-700 shadow-sm">
                        </div>
                        <flux:error name="photo" />
                    </flux:field>

                    <!-- Image Size -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Ukuran Tampilan</flux:label>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all hover:border-[var(--color-accent)] {{ old('image_size', 'small') == 'small' ? 'border-[var(--color-accent)] bg-[var(--color-accent)]/5' : 'border-zinc-300 dark:border-zinc-600' }}">
                                <input type="radio" name="image_size" value="small" class="sr-only" {{ old('image_size', 'small') == 'small' ? 'checked' : '' }} />
                                <div class="flex-1 text-center">
                                    <flux:icon icon="squares-2x2" class="w-8 h-8 mx-auto mb-2 text-zinc-600 dark:text-zinc-400" />
                                    <p class="font-medium text-zinc-900 dark:text-white">Kecil</p>
                                </div>
                            </label>
                            <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all hover:border-[var(--color-accent)] {{ old('image_size') == 'large' ? 'border-[var(--color-accent)] bg-[var(--color-accent)]/5' : 'border-zinc-300 dark:border-zinc-600' }}">
                                <input type="radio" name="image_size" value="large" class="sr-only" {{ old('image_size') == 'large' ? 'checked' : '' }} />
                                <div class="flex-1 text-center">
                                    <flux:icon icon="rectangle-group" class="w-8 h-8 mx-auto mb-2 text-zinc-600 dark:text-zinc-400" />
                                    <p class="font-medium text-zinc-900 dark:text-white">Besar</p>
                                </div>
                            </label>
                        </div>
                        <flux:error name="image_size" />
                        <flux:description class="!mt-2">Pilih ukuran tampilan logo klien di halaman depan</flux:description>
                    </flux:field>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('clients.index') }}" variant="ghost" class="!px-6">
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

            if (photoInput) {
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
            }

            // Radio Button Selection for Image Size
            const imageSizeRadios = document.querySelectorAll('input[name="image_size"]');
            
            // Initialize styling for checked radio on page load
            imageSizeRadios.forEach(radio => {
                if (radio.checked) {
                    const label = radio.closest('label');
                    label.classList.remove('border-zinc-300', 'dark:border-zinc-600');
                    label.classList.add('border-[var(--color-accent)]', 'bg-[var(--color-accent)]/5');
                }
            });
            
            // Handle radio button changes
            imageSizeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Remove active state from all labels
                    document.querySelectorAll('input[name="image_size"]').forEach(r => {
                        const label = r.closest('label');
                        label.classList.remove('border-[var(--color-accent)]', 'bg-[var(--color-accent)]/5');
                        label.classList.add('border-zinc-300', 'dark:border-zinc-600');
                    });
                    
                    // Add active state to selected label
                    const selectedLabel = this.closest('label');
                    selectedLabel.classList.remove('border-zinc-300', 'dark:border-zinc-600');
                    selectedLabel.classList.add('border-[var(--color-accent)]', 'bg-[var(--color-accent)]/5');
                });
            });
        });
    </script>
    @endpush
@endsection
