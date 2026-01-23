@extends('back.layout')

@section('title', 'Klien')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <flux:heading size="xl">Klien</flux:heading>
                <flux:subheading>Kelola data klien dan partner perusahaan</flux:subheading>
            </div>
            <flux:button href="{{ route('clients.create') }}">
                <flux:icon icon="plus" class="w-4 h-4" />
                Tambah Klien
            </flux:button>
        </div>

        <!-- Statistics -->
        @php
            $totalClients = \App\Models\Client::count();
            $smallClients = \App\Models\Client::where('image_size', 'small')->count();
            $largeClients = \App\Models\Client::where('image_size', 'large')->count();
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Klien</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalClients }}</p>
                    </div>
                    <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                        <flux:icon icon="user-group" class="w-6 h-6 text-indigo-600 dark:text-indigo-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Ukuran Kecil</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $smallClients }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                        <flux:icon icon="squares-2x2" class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Ukuran Besar</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $largeClients }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                        <flux:icon icon="rectangle-group" class="w-6 h-6 text-purple-600 dark:text-purple-400" />
                    </div>
                </div>
            </flux:card>
        </div>

        <!-- DataTable -->
        <flux:card class="overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle px-6">
                        <table id="clients-table" class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                            <thead class="bg-gradient-to-r from-zinc-50 to-zinc-100 dark:from-zinc-800/50 dark:to-zinc-800/30">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Gambar</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Ukuran</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-zinc-900 divide-y divide-zinc-200 dark:divide-zinc-700">
                                <!-- Data akan diisi oleh DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </flux:card>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
        // Wait for all scripts to load
        window.addEventListener('load', function() {
            // Double check jQuery is loaded
            if (typeof jQuery === 'undefined') {
                console.error('jQuery is not loaded');
                return;
            }

            // Use jQuery ready
            jQuery(document).ready(function($) {
                // Check if DataTables is loaded
                if (typeof $.fn.DataTable === 'undefined') {
                    console.error('DataTables is not loaded');
                    return;
                }

                // Check if table exists
                if ($('#clients-table').length === 0) {
                    console.error('Table #clients-table not found');
                    return;
                }

                console.log('Initializing DataTable...');
                console.log('AJAX URL:', "{{ route('clients.index') }}");
                
                $('#clients-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('clients.index') }}",
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    error: function(xhr, error, thrown) {
                        console.error('DataTables AJAX Error:', error);
                        console.error('Response:', xhr.responseText);
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'px-6 py-4 whitespace-nowrap text-sm text-zinc-900 dark:text-zinc-300' },
                    { data: 'image', name: 'image', orderable: false, searchable: false, className: 'px-6 py-4' },
                    { data: 'name', name: 'name', className: 'px-6 py-4 text-sm font-medium text-zinc-900 dark:text-white' },
                    { 
                        data: 'image_size', 
                        name: 'image_size',
                        className: 'px-6 py-4 whitespace-nowrap',
                        render: function(data) {
                            const config = {
                                'small': { 
                                    color: 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400',
                                    label: 'Kecil'
                                },
                                'large': { 
                                    color: 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400',
                                    label: 'Besar'
                                }
                            };
                            const item = config[data] || { color: 'bg-gray-100 text-gray-800', label: data };
                            return `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ${item.color}">
                                ${item.label}
                            </span>`;
                        }
                    },
                    { 
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        className: 'px-6 py-4 whitespace-nowrap text-sm'
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                pageLength: 10,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
                dom: '<"flex flex-col sm:flex-row justify-between items-center mb-4"<"mb-2 sm:mb-0"l><"mb-2 sm:mb-0"f>>rt<"flex flex-col sm:flex-row justify-between items-center mt-4"<"mb-2 sm:mb-0"i><"mb-2 sm:mb-0"p>>',
                initComplete: function() {
                    console.log('DataTable initialized successfully');
                }
            }).on('xhr.dt', function (e, settings, json, xhr) {
                console.log('DataTables AJAX request completed:', xhr.status);
            });
            
                if (typeof tippy !== 'undefined') {
                    tippy('[data-tooltip]', {
                        content: function(reference) {
                            return reference.getAttribute('data-tooltip');
                        },
                        theme: 'light-border',
                        placement: 'top',
                    });
                }
            });
        });
    </script>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
    <style>
        #clients-table_wrapper .dataTables_filter label {
            @apply flex items-center gap-2 text-sm font-medium text-zinc-700 dark:text-zinc-300;
        }
        #clients-table_wrapper .dataTables_filter input {
            @apply px-4 py-2.5 border border-zinc-300 dark:border-zinc-600 rounded-xl bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white;
            @apply focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
            @apply shadow-sm transition-all duration-200;
            min-width: 250px;
        }
        #clients-table_wrapper .dataTables_filter input:focus {
            @apply shadow-md;
        }
        #clients-table_wrapper .dataTables_length label {
            @apply flex items-center gap-2 text-sm font-medium text-zinc-700 dark:text-zinc-300;
        }
        #clients-table_wrapper .dataTables_length select {
            @apply px-4 py-2.5 border border-zinc-300 dark:border-zinc-600 rounded-xl bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white;
            @apply focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
            @apply shadow-sm transition-all duration-200 cursor-pointer;
        }
        #clients-table_wrapper .dataTables_length select:focus {
            @apply shadow-md;
        }
        #clients-table thead th:not(:last-child)::after {
            content: '';
            @apply absolute right-0 top-1/2 -translate-y-1/2 w-px h-6 bg-zinc-300 dark:bg-zinc-600;
        }
        #clients-table thead th {
            @apply relative;
        }
        #clients-table tbody tr {
            @apply transition-all duration-200;
            @apply hover:bg-gradient-to-r hover:from-zinc-50 hover:to-transparent dark:hover:from-zinc-800/50 dark:hover:to-transparent;
            @apply hover:shadow-sm;
        }
        #clients-table tbody td {
            @apply px-6 py-4 text-sm;
        }
        #clients-table tbody tr:last-child td {
            @apply border-b-0;
        }
        #clients-table_wrapper .dataTables_paginate {
            @apply flex items-center justify-center gap-1 mt-6;
        }
        #clients-table_wrapper .dataTables_paginate .paginate_button {
            @apply px-4 py-2 mx-0.5 rounded-lg text-sm font-medium text-zinc-700 dark:text-zinc-300;
            @apply hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-all duration-200;
            @apply border border-transparent hover:border-zinc-200 dark:hover:border-zinc-600;
            @apply min-w-[2.5rem] text-center;
        }
        #clients-table_wrapper .dataTables_paginate .paginate_button:hover {
            @apply transform scale-105 shadow-sm;
        }
        #clients-table_wrapper .dataTables_paginate .paginate_button.current {
            @apply bg-[var(--color-accent)] text-white border-[var(--color-accent)] shadow-md hover:shadow-lg;
        }
        #clients-table_wrapper .dataTables_paginate .paginate_button.disabled {
            @apply opacity-50 cursor-not-allowed hover:bg-transparent hover:scale-100 hover:shadow-none;
        }
        #clients-table_wrapper .dataTables_info {
            @apply text-sm text-zinc-600 dark:text-zinc-400 font-medium px-2;
        }
        #clients-table_wrapper .dataTables_processing {
            @apply bg-white/90 dark:bg-zinc-900/90 backdrop-blur-sm rounded-xl shadow-lg border border-zinc-200 dark:border-zinc-700;
            @apply text-zinc-700 dark:text-zinc-300 font-medium;
        }
        .action-btn {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 36px !important;
            height: 36px !important;
            border-radius: 0.5rem !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
            cursor: pointer !important;
            border: 1px solid !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        .action-btn-view {
            background-color: rgb(239 246 255) !important;
            color: rgb(37 99 235) !important;
            border-color: rgb(191 219 254) !important;
        }
        .dark .action-btn-view {
            background-color: rgba(30, 58, 138, 0.2) !important;
            color: rgb(96 165 250) !important;
            border-color: rgb(30 58 138) !important;
        }
        .action-btn-view:hover {
            background-color: rgb(219 234 254) !important;
            border-color: rgb(147 197 253) !important;
            transform: scale(1.05) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
        }
        .dark .action-btn-view:hover {
            background-color: rgba(30, 58, 138, 0.3) !important;
        }
        .action-btn-edit {
            background-color: rgb(254 252 232) !important;
            color: rgb(202 138 4) !important;
            border-color: rgb(253 230 138) !important;
        }
        .dark .action-btn-edit {
            background-color: rgba(113, 63, 18, 0.2) !important;
            color: rgb(250 204 21) !important;
            border-color: rgb(113 63 18) !important;
        }
        .action-btn-edit:hover {
            background-color: rgb(254 249 195) !important;
            border-color: rgb(253 224 71) !important;
            transform: scale(1.05) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
        }
        .dark .action-btn-edit:hover {
            background-color: rgba(113, 63, 18, 0.3) !important;
        }
        .action-btn-delete {
            background-color: rgb(254 242 242) !important;
            color: rgb(220 38 38) !important;
            border-color: rgb(254 202 202) !important;
        }
        .dark .action-btn-delete {
            background-color: rgba(127, 29, 29, 0.2) !important;
            color: rgb(248 113 113) !important;
            border-color: rgb(127 29 29) !important;
        }
        .action-btn-delete:hover {
            background-color: rgb(254 226 226) !important;
            border-color: rgb(252 165 165) !important;
            transform: scale(1.05) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
        }
        .dark .action-btn-delete:hover {
            background-color: rgba(127, 29, 29, 0.3) !important;
        }
        .action-btn svg {
            width: 16px !important;
            height: 16px !important;
            transition: transform 0.2s ease !important;
        }
        .action-btn:hover svg {
            transform: scale(1.1) !important;
        }
        .action-btn-form {
            display: inline-flex !important;
        }
    </style>
    @endpush
@endsection
