@extends('back.layout')

@section('title', 'Tambah Teknis')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex items-center gap-4">
            <flux:button href="{{ route('teknis.index') }}" variant="ghost" class="!p-2">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div>
                <flux:heading size="xl">Tambah Teknis</flux:heading>
                <flux:subheading>Tambah data teknis dan spesialisasi baru</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card>
            <form action="{{ route('teknis.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name -->
                <flux:field>
                    <flux:label>Nama Teknis</flux:label>
                    <flux:input name="name" value="{{ old('name') }}" placeholder="Masukkan nama teknis" required />
                    <flux:error name="name" />
                </flux:field>

                <!-- Photo -->
                <flux:field>
                    <flux:label>Gambar Teknis</flux:label>
                    <flux:input type="file" name="photo" accept="image/*" required />
                    <flux:error name="photo" />
                    <flux:description>Format: JPG, PNG, GIF. Maksimal 2MB</flux:description>
                </flux:field>

                <!-- Image Size -->
                <flux:field>
                    <flux:label>Ukuran Tampilan</flux:label>
                    <flux:radio.group name="image_size" value="{{ old('image_size', 'small') }}">
                        <flux:radio value="small">Kecil</flux:radio>
                        <flux:radio value="large">Besar</flux:radio>
                    </flux:radio.group>
                    <flux:error name="image_size" />
                    <flux:description>Pilih ukuran tampilan gambar teknis di halaman depan</flux:description>
                </flux:field>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('teknis.index') }}" variant="ghost">Batal</flux:button>
                    <flux:button type="submit">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Simpan Teknis
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>
@endsection
