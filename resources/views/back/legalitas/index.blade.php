@extends('back.layout')

@section('title', 'Legalitas')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <flux:heading size="xl">Legalitas</flux:heading>
                <flux:subheading>Kelola dokumen legalitas dan sertifikat perusahaan</flux:subheading>
            </div>
            <flux:button href="{{ route('legalitas.create') }}">
                <flux:icon icon="plus" class="w-4 h-4" />
                Tambah Dokumen
            </flux:button>
        </div>

        <!-- Statistics -->
        @php
            $totalLegalitas = \App\Models\Legalitas::count();
            $pdfCount = \App\Models\Legalitas::where('type', 'pdf')->count();
            $imageCount = \App\Models\Legalitas::whereIn('type', ['jpg', 'png'])->count();
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Dokumen</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalLegalitas }}</p>
                    </div>
                    <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                        <flux:icon icon="shield-check" class="w-6 h-6 text-indigo-600 dark:text-indigo-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Dokumen PDF</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $pdfCount }}</p>
                    </div>
                    <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-lg">
                        <flux:icon icon="document-text" class="w-6 h-6 text-red-600 dark:text-red-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Dokumen Gambar</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $imageCount }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                        <flux:icon icon="photo" class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    </div>
                </div>
            </flux:card>
        </div>

        <!-- DataTable -->
        <flux:card>
            <div class="overflow-x-auto">
                <table id="legalitas-table" class="w-full">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Nama Dokumen</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                        <!-- Data akan diisi oleh DataTables -->
                    </tbody>
                </table>
            </div>
        </flux:card>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
        window.addEventListener('load', function() {
            if (typeof jQuery === 'undefined') {
                console.error('jQuery is not loaded');
                return;
            }

            jQuery(document).ready(function($) {
                if (typeof $.fn.DataTable === 'undefined') {
                    console.error('DataTables is not loaded');
                    return;
                }

                if ($('#legalitas-table').length === 0) {
                    console.error('Table #legalitas-table not found');
                    return;
                }

                console.log('Initializing Legalitas DataTable...');
                console.log('AJAX URL:', "{{ route('legalitas.index') }}");
                
                $('#legalitas-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('legalitas.index') }}",
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
                    { data: 'name', name: 'name', className: 'px-6 py-4 text-sm font-medium text-zinc-900 dark:text-white' },
                    { 
                        data: 'type', 
                        name: 'type',
                        className: 'px-6 py-4 whitespace-nowrap',
                        render: function(data) {
                            const config = {
                                'pdf': { 
                                    color: 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
                                    icon: 'document-text',
                                    label: 'PDF'
                                },
                                'jpg': { 
                                    color: 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400',
                                    icon: 'photo',
                                    label: 'JPG'
                                },
                                'png': { 
                                    color: 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
                                    icon: 'photo',
                                    label: 'PNG'
                                }
                            };
                            const item = config[data] || { color: 'bg-gray-100 text-gray-800', icon: 'document', label: data.toUpperCase() };
                            return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium ${item.color}">
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
                        console.log('Legalitas DataTable initialized successfully');
                    }
                }).on('xhr.dt', function (e, settings, json, xhr) {
                    console.log('Legalitas DataTables AJAX request completed:', xhr.status);
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
        #legalitas-table_wrapper .dataTables_filter input,
        #legalitas-table_wrapper .dataTables_length select {
            @apply px-4 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
        }
        #legalitas-table_wrapper .dataTables_paginate .paginate_button {
            @apply px-3 py-1.5 mx-1 rounded-lg text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors;
        }
        #legalitas-table_wrapper .dataTables_paginate .paginate_button.current {
            @apply bg-[var(--color-accent)] text-white hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)];
        }
        #legalitas-table_wrapper .dataTables_info {
            @apply text-sm text-zinc-600 dark:text-zinc-400;
        }
        #legalitas-table thead {
            @apply bg-zinc-50 dark:bg-zinc-800/50;
        }
        #legalitas-table tbody tr {
            @apply hover:bg-zinc-50 dark:hover:bg-zinc-800/30 transition-colors;
        }
        #legalitas-table tbody td {
            @apply border-b border-zinc-200 dark:border-zinc-700;
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
