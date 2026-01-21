@extends('back.layout')

@section('title', 'Tambah Produk')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex items-center gap-4">
            <flux:button href="{{ route('products.index') }}" variant="ghost" class="!p-2">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div>
                <flux:heading size="xl">Tambah Produk</flux:heading>
                <flux:subheading>Tambah produk baru ke katalog</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Description -->
                <flux:field>
                    <flux:label>Deskripsi Produk</flux:label>
                    <flux:textarea name="description" rows="5" placeholder="Masukkan deskripsi produk">{{ old('description') }}</flux:textarea>
                    <flux:error name="description" />
                </flux:field>

                <!-- Photo -->
                <flux:field>
                    <flux:label>Foto Produk</flux:label>
                    <flux:input type="file" name="photo" accept="image/*" required />
                    <flux:error name="photo" />
                    <flux:description>Format: JPG, PNG, GIF. Maksimal 2MB</flux:description>
                </flux:field>

                <!-- Icon -->
                <flux:field>
                    <flux:label>Icon Produk</flux:label>
                    <flux:input type="file" name="icon" accept="image/*" required />
                    <flux:error name="icon" />
                    <flux:description>Format: JPG, PNG, GIF. Maksimal 2MB</flux:description>
                </flux:field>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('products.index') }}" variant="ghost">Batal</flux:button>
                    <flux:button type="submit">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Simpan Produk
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>
@endsection
