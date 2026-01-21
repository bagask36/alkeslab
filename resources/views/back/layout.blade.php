<!DOCTYPE html>
<html lang="id" x-data="{ 
    darkMode: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" 
x-bind:class="{ 'dark': darkMode }"
x-init="$watch('darkMode', value => localStorage.setItem('darkMode', value))">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - PT. ALKESLAB PRIMATAMA</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('app/assets/logo.png') }}">
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Flux UI Appearance -->
    @fluxAppearance
    
    @livewireStyles
    
    @stack('styles')
</head>
<body class="antialiased bg-zinc-50 dark:bg-zinc-900 min-h-screen">
    <!-- Sidebar -->
    <flux:sidebar sticky collapsible="mobile" class="bg-white dark:bg-zinc-800 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand 
                href="{{ route('dashboard') }}" 
                logo="{{ asset('app/assets/logo.png') }}" 
                name="PT. ALKESLAB PRIMATAMA"
                alt="Logo"
            />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>
        
        <flux:sidebar.nav>
            <flux:sidebar.item 
                icon="home" 
                href="{{ route('dashboard') }}" 
                :current="request()->routeIs('dashboard')"
            >
                Dashboard
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="document-text" 
                href="{{ route('articles.index') }}" 
                :current="request()->routeIs('articles.*')"
            >
                Artikel
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="shopping-bag" 
                href="{{ route('products.index') }}" 
                :current="request()->routeIs('products.*')"
            >
                Produk
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="user-group" 
                href="{{ route('clients.index') }}" 
                :current="request()->routeIs('clients.*')"
            >
                Klien
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="folder" 
                href="{{ route('projects.index') }}" 
                :current="request()->routeIs('projects.*')"
            >
                Proyek
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="wrench-screwdriver" 
                href="{{ route('layanan.index') }}" 
                :current="request()->routeIs('layanan.*')"
            >
                Layanan
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="cog-6-tooth" 
                href="{{ route('teknis.index') }}" 
                :current="request()->routeIs('teknis.*')"
            >
                Teknis
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="shield-check" 
                href="{{ route('legalitas.index') }}" 
                :current="request()->routeIs('legalitas.*')"
            >
                Legalitas
            </flux:sidebar.item>
            
            <flux:sidebar.item 
                icon="envelope" 
                href="{{ route('contacts.index') }}" 
                :current="request()->routeIs('contacts.*')"
            >
                Kontak
            </flux:sidebar.item>
        </flux:sidebar.nav>
        
        <flux:sidebar.spacer />
        
        <flux:sidebar.nav>
            <flux:sidebar.item 
                icon="arrow-right-end-on-rectangle" 
                href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                variant="danger"
            >
                Logout
            </flux:sidebar.item>
        </flux:sidebar.nav>
        
        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            <flux:sidebar.profile 
                name="{{ auth()->user()->name ?? 'Admin' }}"
            >
                <flux:avatar icon="user" size="sm" />
            </flux:sidebar.profile>
            <flux:menu>
                <flux:menu.item href="{{ route('dashboard') }}" icon="home">Dashboard</flux:menu.item>
                <flux:menu.separator />
                <flux:menu.item 
                    href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    icon="arrow-right-end-on-rectangle"
                    class="text-red-600 dark:text-red-400"
                >
                    Logout
                </flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>
    
    <!-- Mobile Header -->
    <flux:header class="lg:hidden bg-white dark:bg-zinc-800 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle />
        <flux:spacer />
        <div class="flex items-center gap-3">
            <!-- Dark Mode Toggle -->
            <button 
                type="button"
                class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-700"
                @click="darkMode = !darkMode"
                title="Toggle Dark Mode"
            >
                <flux:icon icon="sun" class="w-5 h-5 dark:hidden" />
                <flux:icon icon="moon" class="w-5 h-5 hidden dark:block" />
            </button>
            
            <!-- User Menu -->
            <flux:dropdown>
                <flux:button variant="ghost" class="flex items-center gap-2">
                    <flux:icon icon="user" class="w-5 h-5" />
                    <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                    <flux:icon icon="chevron-down" class="w-4 h-4" />
                </flux:button>
                
                <flux:menu>
                    <flux:menu.item href="{{ route('dashboard') }}">
                        <flux:icon icon="home" class="w-4 h-4" />
                        Dashboard
                    </flux:menu.item>
                    
                    <flux:menu.separator />
                    
                    <flux:menu.item 
                        href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-red-600 dark:text-red-400"
                    >
                        <flux:icon icon="arrow-right-end-on-rectangle" class="w-4 h-4" />
                        Logout
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>
    </flux:header>
    
    <!-- Desktop Header -->
    <flux:header class="hidden lg:flex bg-white dark:bg-zinc-800 border-b border-zinc-200 dark:border-zinc-700">
        <div class="flex items-center gap-3">
            <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" class="h-8 w-auto">
            <h1 class="text-lg font-semibold text-zinc-900 dark:text-white">Admin Panel</h1>
        </div>
        <flux:spacer />
        <div class="flex items-center gap-3">
            <!-- Dark Mode Toggle -->
            <button 
                type="button"
                class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-700"
                @click="darkMode = !darkMode"
                title="Toggle Dark Mode"
            >
                <flux:icon icon="sun" class="w-5 h-5 dark:hidden" />
                <flux:icon icon="moon" class="w-5 h-5 hidden dark:block" />
            </button>
            
            <!-- User Menu -->
            <flux:dropdown>
                <flux:button variant="ghost" class="flex items-center gap-2">
                    <flux:icon icon="user" class="w-5 h-5" />
                    <span class="hidden sm:inline text-sm font-medium text-zinc-700 dark:text-zinc-300">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                    <flux:icon icon="chevron-down" class="w-4 h-4" />
                </flux:button>
                
                <flux:menu>
                    <flux:menu.item href="{{ route('dashboard') }}">
                        <flux:icon icon="home" class="w-4 h-4" />
                        Dashboard
                    </flux:menu.item>
                    
                    <flux:menu.separator />
                    
                    <flux:menu.item 
                        href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-red-600 dark:text-red-400"
                    >
                        <flux:icon icon="arrow-right-end-on-rectangle" class="w-4 h-4" />
                        Logout
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>
    </flux:header>
    
    <!-- Main Content -->
    <flux:main class="max-w-full px-6 lg:px-8">
        @yield('content')
    </flux:main>
    
    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
    
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Flux UI Scripts -->
    @fluxScripts
    
    @livewireScripts
    
    @stack('scripts')
    
    <!-- SweetAlert Integration Script -->
    <script>
        // Success Message
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#10b981',
                confirmButtonText: 'OK',
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                showConfirmButton: false
            });
        @endif

        // Error Message
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
        @endif

        // Delete Confirmation Function
        function confirmDelete(event, message = 'Apakah Anda yakin ingin menghapus item ini?') {
            event.preventDefault();
            const form = event.target.closest('form');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        // Logout Confirmation
        document.addEventListener('DOMContentLoaded', function() {
            // Handle logout from sidebar items
            const logoutItems = document.querySelectorAll('[onclick*="logout-form"]');
            logoutItems.forEach(item => {
                const originalOnclick = item.getAttribute('onclick');
                item.removeAttribute('onclick');
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Logout?',
                        text: 'Apakah Anda yakin ingin logout?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, Logout',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
