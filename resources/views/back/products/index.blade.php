@extends('back.layout')

@section('title', 'Produk')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <flux:heading size="xl">Produk</flux:heading>
                <flux:subheading>Kelola produk dan layanan perusahaan</flux:subheading>
            </div>
            <flux:button href="{{ route('products.create') }}">
                <flux:icon icon="plus" class="w-4 h-4" />
                Tambah Produk
            </flux:button>
        </div>

        <!-- Statistics -->
        @php
            $totalProducts = $products->count();
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Produk</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalProducts }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                        <flux:icon icon="shopping-bag" class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Dengan Gambar</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $products->whereNotNull('image')->count() }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                        <flux:icon icon="photo" class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Dengan Icon</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $products->whereNotNull('icon')->count() }}</p>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                        <flux:icon icon="sparkles" class="w-6 h-6 text-green-600 dark:text-green-400" />
                    </div>
                </div>
            </flux:card>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <flux:card class="group hover:shadow-lg transition-shadow duration-300">
                        <div class="space-y-4">
                            @if($product->image)
                                <div class="relative overflow-hidden rounded-lg bg-zinc-100 dark:bg-zinc-800">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->description }}" 
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="w-full h-48 bg-zinc-100 dark:bg-zinc-800 rounded-lg flex items-center justify-center">
                                    <flux:icon icon="photo" class="w-12 h-12 text-zinc-400 dark:text-zinc-600" />
                                </div>
                            @endif
                            
                            <div class="space-y-3">
                                <div class="flex items-start justify-between gap-2">
                                    <h3 class="text-lg font-semibold text-zinc-900 dark:text-white line-clamp-2 flex-1">
                                        {{ \Illuminate\Support\Str::limit($product->description, 60) }}
                                    </h3>
                                    @if($product->icon)
                                        <img src="{{ asset('storage/' . $product->icon) }}" 
                                             alt="Icon" 
                                             class="w-10 h-10 object-contain flex-shrink-0">
                                    @endif
                                </div>
                                
                                @if($product->whatsapp_link)
                                    <a href="{{ $product->whatsapp_link }}" 
                                       target="_blank" 
                                       class="inline-flex items-center gap-2 text-sm text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300">
                                        <flux:icon icon="phone" class="w-4 h-4" />
                                        Hubungi via WhatsApp
                                    </a>
                                @endif
                            </div>
                            
                            <div class="flex items-center gap-2 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                                <flux:button href="{{ route('products.edit', $product->id) }}" variant="outline" size="sm" class="flex-1">
                                    <flux:icon icon="pencil" class="w-4 h-4" />
                                    Edit
                                </flux:button>
                                
                                <form action="{{ route('products.destroy', $product->id) }}" 
                                      method="POST" 
                                      class="flex-1" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" variant="danger" size="sm" class="w-full">
                                        <flux:icon icon="x-mark" class="w-4 h-4" />
                                        Hapus
                                    </flux:button>
                                </form>
                            </div>
                        </div>
                    </flux:card>
                @endforeach
            </div>
        @else
            <flux:card>
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-zinc-100 dark:bg-zinc-800 mb-6">
                        <flux:icon icon="shopping-bag" class="w-10 h-10 text-zinc-400 dark:text-zinc-600" />
                    </div>
                    <flux:heading size="lg" class="mb-2">Belum ada produk</flux:heading>
                    <flux:text class="text-zinc-600 dark:text-zinc-400 mb-8 max-w-md mx-auto">
                        Mulai dengan menambahkan produk pertama Anda untuk ditampilkan di website
                    </flux:text>
                    <flux:button href="{{ route('products.create') }}">
                        <flux:icon icon="plus" class="w-4 h-4" />
                        Tambah Produk Pertama
                    </flux:button>
                </div>
            </flux:card>
        @endif
    </div>
@endsection
