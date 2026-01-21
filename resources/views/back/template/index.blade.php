<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alkeslab Primatama | @yield('title')</title>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('app/assets/logo.png') }}" />
    
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet">
    
    <!-- Flux UI -->
    @fluxAppearance
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    
    @livewireStyles
    
    @stack('css')
</head>

<body class="h-full antialiased bg-white dark:bg-gray-950">
    <flux:sidebar sticky collapsible="mobile" class="bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="{{ route('dashboard') }}"
                :logo="asset('app/assets/logo.png')"
                name="Alkeslab Primatama"
            />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.item href="{{ route('dashboard') }}" icon="chart-bar" :current="request()->routeIs('dashboard')">
                Dashboard
            </flux:sidebar.item>

            <flux:sidebar.group expandable heading="Utilitas" icon="wrench">
                <flux:sidebar.item href="{{ route('products.index') }}" :current="request()->routeIs('products.*')">
                    Produk Kami
                </flux:sidebar.item>
                <flux:sidebar.item href="{{ route('clients.index') }}" :current="request()->routeIs('clients.*')">
                    Klien Kami
                </flux:sidebar.item>
                <flux:sidebar.item href="{{ route('projects.index') }}" :current="request()->routeIs('projects.*')">
                    Proyek Lainnya
                </flux:sidebar.item>
                <flux:sidebar.item href="{{ route('teknis.index') }}" :current="request()->routeIs('teknis.*')">
                    Teknis Medis
                </flux:sidebar.item>
                <flux:sidebar.item href="{{ route('layanan.index') }}" :current="request()->routeIs('layanan.*')">
                    Layanan
                </flux:sidebar.item>
                <flux:sidebar.item href="{{ route('legalitas.index') }}" :current="request()->routeIs('legalitas.*')">
                    Legalitas
                </flux:sidebar.item>
            </flux:sidebar.group>

            <flux:sidebar.item href="{{ route('articles.index') }}" icon="newspaper" :current="request()->routeIs('articles.*')">
                Berita
            </flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

    <div class="lg:pl-72">
        <flux:header sticky class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            
            <flux:heading size="lg" class="flex-1">
                @yield('title', 'Dashboard')
            </flux:heading>

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:button variant="ghost" icon="user-circle">
                    {{ Auth::user()->name ?? 'Admin' }}
                </flux:button>
                
                <flux:menu>
                    <flux:menu.item wire:click="$dispatch('open-modal', { alias: 'logout' })" icon="arrow-right-on-rectangle">
                        Logout
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        <main class="py-8">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800 dark:text-green-200">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-800 dark:text-red-200">
                                    {{ session('error') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-800 dark:text-red-200 mb-2">
                                    Terjadi kesalahan:
                                </p>
                                <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    &copy; {{ date('Y') }} Copyright: PT. ALKESLAB PRIMATAMA
                </p>
            </div>
        </footer>
    </div>

    <!-- Logout Modal -->
    <flux:modal name="logout" title="Ready to Leave?">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Select "Logout" below if you are ready to end your current session.
        </p>

        <x-slot name="footer">
            <div class="flex items-center justify-end gap-2">
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <flux:button variant="primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </flux:button>
            </div>
        </x-slot>
    </flux:modal>

    @fluxScripts
    
    @stack('scripts')
</body>
</html>
