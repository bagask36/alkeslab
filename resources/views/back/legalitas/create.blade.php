@extends('back.layout')

@section('title', 'Tambah Dokumen Legalitas')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex items-center gap-4">
            <flux:button href="{{ route('legalitas.index') }}" variant="ghost" class="!p-2">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div>
                <flux:heading size="xl">Tambah Dokumen Legalitas</flux:heading>
                <flux:subheading>Upload dokumen legalitas dan sertifikat perusahaan</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card>
            <form action="{{ route('legalitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name -->
                <flux:field>
                    <flux:label>Nama Dokumen</flux:label>
                    <flux:input name="name" value="{{ old('name') }}" placeholder="Masukkan nama dokumen" required />
                    <flux:error name="name" />
                </flux:field>

                <!-- Type -->
                <flux:field>
                    <flux:label>Tipe Dokumen</flux:label>
                    <flux:radio.group name="type" value="{{ old('type', 'pdf') }}">
                        <flux:radio value="pdf">PDF</flux:radio>
                        <flux:radio value="jpg">JPG</flux:radio>
                        <flux:radio value="png">PNG</flux:radio>
                    </flux:radio.group>
                    <flux:error name="type" />
                    <flux:description>Pilih tipe dokumen yang akan diupload</flux:description>
                </flux:field>

                <!-- Document -->
                <flux:field>
                    <flux:label>File Dokumen</flux:label>
                    <flux:input type="file" name="doc" accept=".pdf,.jpg,.jpeg,.png" required />
                    <flux:error name="doc" />
                    <flux:description>Format: PDF, JPG, PNG. Maksimal 2MB. Pastikan tipe file sesuai dengan pilihan di atas.</flux:description>
                </flux:field>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('legalitas.index') }}" variant="ghost">Batal</flux:button>
                    <flux:button type="submit">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Simpan Dokumen
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>
@endsection
