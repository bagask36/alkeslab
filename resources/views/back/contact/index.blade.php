@extends('back.layout')

@section('title', 'Kontak')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div>
            <flux:heading size="xl">Kontak</flux:heading>
            <flux:subheading>Informasi kontak dan alamat perusahaan</flux:subheading>
        </div>

        <!-- Contact Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Alamat -->
            <flux:card class="hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex-shrink-0">
                        <flux:icon icon="map-pin" class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="flex-1">
                        <flux:heading size="sm" class="mb-2">Alamat</flux:heading>
                        <flux:text class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Informasi alamat lengkap perusahaan dapat dikonfigurasi melalui database atau file konfigurasi.
                        </flux:text>
                    </div>
                </div>
            </flux:card>

            <!-- Telepon -->
            <flux:card class="hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg flex-shrink-0">
                        <flux:icon icon="phone" class="w-6 h-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="flex-1">
                        <flux:heading size="sm" class="mb-2">Telepon</flux:heading>
                        <flux:text class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Nomor telepon perusahaan untuk layanan pelanggan dan informasi produk.
                        </flux:text>
                    </div>
                </div>
            </flux:card>

            <!-- Email -->
            <flux:card class="hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex-shrink-0">
                        <flux:icon icon="envelope" class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="flex-1">
                        <flux:heading size="sm" class="mb-2">Email</flux:heading>
                        <flux:text class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Alamat email resmi perusahaan untuk komunikasi dan pertanyaan.
                        </flux:text>
                    </div>
                </div>
            </flux:card>

            <!-- WhatsApp -->
            <flux:card class="hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg flex-shrink-0">
                        <flux:icon icon="phone" class="w-6 h-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="flex-1">
                        <flux:heading size="sm" class="mb-2">WhatsApp</flux:heading>
                        <flux:text class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Nomor WhatsApp untuk komunikasi cepat dengan tim sales dan support.
                        </flux:text>
                    </div>
                </div>
            </flux:card>

            <!-- Jam Operasional -->
            <flux:card class="hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex-shrink-0">
                        <flux:icon icon="clock" class="w-6 h-6 text-orange-600 dark:text-orange-400" />
                    </div>
                    <div class="flex-1">
                        <flux:heading size="sm" class="mb-2">Jam Operasional</flux:heading>
                        <flux:text class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Waktu operasional perusahaan untuk layanan pelanggan.
                        </flux:text>
                    </div>
                </div>
            </flux:card>

            <!-- Media Sosial -->
            <flux:card class="hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-pink-100 dark:bg-pink-900/30 rounded-lg flex-shrink-0">
                        <flux:icon icon="share" class="w-6 h-6 text-pink-600 dark:text-pink-400" />
                    </div>
                    <div class="flex-1">
                        <flux:heading size="sm" class="mb-2">Media Sosial</flux:heading>
                        <flux:text class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Link media sosial perusahaan untuk update dan informasi terbaru.
                        </flux:text>
                    </div>
                </div>
            </flux:card>
        </div>

        <!-- Info Card -->
        <flux:card>
            <div class="flex items-start gap-4">
                <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex-shrink-0">
                    <flux:icon icon="information-circle" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                </div>
                <div class="flex-1">
                    <flux:heading size="sm" class="mb-2">Informasi</flux:heading>
                    <flux:text class="text-sm text-zinc-600 dark:text-zinc-400">
                        Untuk mengelola informasi kontak secara dinamis, Anda dapat membuat model dan controller untuk Address, Phone, dan SocialLink. 
                        Saat ini informasi kontak dapat dikonfigurasi melalui database atau file konfigurasi sesuai kebutuhan.
                    </flux:text>
                </div>
            </div>
        </flux:card>
    </div>
@endsection
