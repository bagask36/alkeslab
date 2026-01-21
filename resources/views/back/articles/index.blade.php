@extends('back.layout')

@section('title', 'Artikel')

@section('content')
    <div class="space-y-6 max-w-full">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <flux:heading size="xl">Artikel</flux:heading>
                <flux:subheading>Kelola artikel dan berita perusahaan</flux:subheading>
            </div>
            <flux:button href="{{ route('articles.create') }}">
                <flux:icon icon="plus" class="w-4 h-4" />
                Buat Artikel Baru
            </flux:button>
        </div>

        <!-- Statistics Cards -->
        @php
            $totalArticles = \App\Models\Article::count();
            $publishedArticles = \App\Models\Article::where('status', 'published')->count();
            $draftArticles = \App\Models\Article::where('status', 'draft')->count();
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total Artikel</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalArticles }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                        <flux:icon icon="document-text" class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Artikel Terbit</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $publishedArticles }}</p>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                        <flux:icon icon="check-circle" class="w-6 h-6 text-green-600 dark:text-green-400" />
                    </div>
                </div>
            </flux:card>
            
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Draft</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $draftArticles }}</p>
                    </div>
                    <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                        <flux:icon icon="pencil" class="w-6 h-6 text-yellow-600 dark:text-yellow-400" />
                    </div>
                </div>
            </flux:card>
        </div>

        <!-- DataTable -->
        <flux:card>
            <div class="overflow-x-auto">
                <table id="articles-table" class="w-full">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Tanggal</th>
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
        $(document).ready(function() {
            $('#articles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('articles.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'px-6 py-4 whitespace-nowrap text-sm text-zinc-900 dark:text-zinc-300' },
                    { data: 'title', name: 'title', className: 'px-6 py-4 text-sm font-medium text-zinc-900 dark:text-white' },
                    { data: 'category', name: 'category', className: 'px-6 py-4 whitespace-nowrap text-sm text-zinc-600 dark:text-zinc-400' },
                    { 
                        data: 'status', 
                        name: 'status',
                        className: 'px-6 py-4 whitespace-nowrap',
                        render: function(data) {
                            const statusConfig = {
                                'published': { 
                                    color: 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
                                    icon: 'check-circle'
                                },
                                'draft': { 
                                    color: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
                                    icon: 'pencil'
                                },
                                'archived': { 
                                    color: 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-400',
                                    icon: 'archive-box'
                                }
                            };
                            const config = statusConfig[data] || { color: 'bg-gray-100 text-gray-800', icon: 'question-mark-circle' };
                            return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium ${config.color}">
                                ${data}
                            </span>`;
                        }
                    },
                    { data: 'publish_date', name: 'publish_date', className: 'px-6 py-4 whitespace-nowrap text-sm text-zinc-600 dark:text-zinc-400' },
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
            });
            
            // Initialize tooltips
            tippy('[data-tooltip]', {
                content: function(reference) {
                    return reference.getAttribute('data-tooltip');
                },
                theme: 'light-border',
                placement: 'top',
            });
        });
    </script>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
    <style>
        /* DataTable Styling */
        #articles-table_wrapper .dataTables_filter input {
            @apply px-4 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
        }
        #articles-table_wrapper .dataTables_length select {
            @apply px-4 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
        }
        #articles-table_wrapper .dataTables_paginate .paginate_button {
            @apply px-3 py-1.5 mx-1 rounded-lg text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors;
        }
        #articles-table_wrapper .dataTables_paginate .paginate_button.current {
            @apply bg-[var(--color-accent)] text-white hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)];
        }
        #articles-table_wrapper .dataTables_info {
            @apply text-sm text-zinc-600 dark:text-zinc-400;
        }
        
        /* Table Styling */
        #articles-table {
            @apply border-collapse;
        }
        #articles-table thead {
            @apply bg-zinc-50 dark:bg-zinc-800/50;
        }
        #articles-table tbody tr {
            @apply hover:bg-zinc-50 dark:hover:bg-zinc-800/30 transition-colors;
        }
        #articles-table tbody td {
            @apply border-b border-zinc-200 dark:border-zinc-700;
        }
        
        /* Action Icons */
        .action-icon {
            @apply inline-flex items-center justify-center p-1.5 rounded-lg transition-all cursor-pointer;
            @apply hover:bg-zinc-100 dark:hover:bg-zinc-700;
        }
        .action-icon svg {
            @apply transition-transform;
        }
        .action-icon:hover svg {
            @apply scale-110;
        }
        .action-icon-form {
            @apply inline-flex;
        }
    </style>
    @endpush
@endsection
