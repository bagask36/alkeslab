@extends('back.layout')

@section('title', 'Edit Layanan')

@section('content')
    <div class="space-y-8 max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('layanan.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Edit Layanan</flux:heading>
                <flux:subheading class="!mt-0">Edit layanan yang ditawarkan</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <form action="{{ route('layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="information-circle" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Informasi Layanan</h3>
                    </div>

                    <!-- Name -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Nama Layanan</flux:label>
                        <flux:input name="name" value="{{ old('name', $layanan->name) }}" placeholder="Masukkan nama layanan" required class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" />
                        <flux:error name="name" />
                    </flux:field>
                </div>

                <!-- Media Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="photo" class="w-5 h-5 text-green-600 dark:text-green-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Gambar Layanan</h3>
                    </div>

                    <!-- Photo -->
                    <flux:field>
                        <flux:label class="!text-sm !font-semibold">Upload Gambar</flux:label>
                        @if($layanan->image)
                            <div class="mb-4 p-4 bg-zinc-50 dark:bg-zinc-800/50 rounded-xl border border-zinc-200 dark:border-zinc-700">
                                <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-3">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $layanan->image) }}" alt="Current image" class="max-w-xs rounded-lg border border-zinc-200 dark:border-zinc-700 shadow-sm">
                            </div>
                        @endif
                        <label for="photo" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-zinc-300 dark:border-zinc-600 rounded-xl cursor-pointer bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <flux:icon icon="cloud-arrow-up" class="w-12 h-12 mb-3 text-zinc-400 dark:text-zinc-500" />
                                <p class="mb-2 text-sm text-zinc-500 dark:text-zinc-400"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400">JPG, PNG, GIF (MAX. 2MB)</p>
                            </div>
                            <input id="photo" type="file" name="photo" accept="image/*" class="hidden" />
                        </label>
                        <div id="photo-preview" class="mt-4 hidden">
                            <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Preview gambar baru:</p>
                            <img id="photo-preview-img" src="" alt="Preview" class="max-w-xs rounded-lg border border-zinc-200 dark:border-zinc-700 shadow-sm">
                        </div>
                        <flux:error name="photo" />
                        <flux:description class="!mt-2">Kosongkan jika tidak ingin mengubah gambar</flux:description>
                    </flux:field>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('layanan.index') }}" variant="ghost" class="!px-6">
                        <flux:icon icon="x-mark" class="w-4 h-4" />
                        Batal
                    </flux:button>
                    <flux:button type="submit" class="!px-8 !py-2.5 !rounded-xl !shadow-md hover:!shadow-lg transition-all">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Update Layanan
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
    @endpush
@endsection
