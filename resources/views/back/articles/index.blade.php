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
        <flux:card class="overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle px-6">
                        <table id="articles-table" class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                            <thead class="bg-gradient-to-r from-zinc-50 to-zinc-100 dark:from-zinc-800/50 dark:to-zinc-800/30">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Tanggal</th>
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
        /* DataTable Wrapper */
        #articles-table_wrapper {
            @apply space-y-4;
        }
        
        /* Filter & Length Controls */
        #articles-table_wrapper .dataTables_filter {
            @apply mb-4;
        }
        #articles-table_wrapper .dataTables_filter label {
            @apply flex items-center gap-2 text-sm font-medium text-zinc-700 dark:text-zinc-300;
        }
        #articles-table_wrapper .dataTables_filter input {
            @apply px-4 py-2.5 border border-zinc-300 dark:border-zinc-600 rounded-xl bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white;
            @apply focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
            @apply shadow-sm transition-all duration-200;
            min-width: 250px;
        }
        #articles-table_wrapper .dataTables_filter input:focus {
            @apply shadow-md;
        }
        
        #articles-table_wrapper .dataTables_length {
            @apply mb-4;
        }
        #articles-table_wrapper .dataTables_length label {
            @apply flex items-center gap-2 text-sm font-medium text-zinc-700 dark:text-zinc-300;
        }
        #articles-table_wrapper .dataTables_length select {
            @apply px-4 py-2.5 border border-zinc-300 dark:border-zinc-600 rounded-xl bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white;
            @apply focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
            @apply shadow-sm transition-all duration-200 cursor-pointer;
        }
        #articles-table_wrapper .dataTables_length select:focus {
            @apply shadow-md;
        }
        
        /* Table Styling */
        #articles-table {
            @apply border-collapse;
        }
        #articles-table thead th {
            @apply relative;
        }
        #articles-table thead th:not(:last-child)::after {
            content: '';
            @apply absolute right-0 top-1/2 -translate-y-1/2 w-px h-6 bg-zinc-300 dark:bg-zinc-600;
        }
        #articles-table tbody tr {
            @apply transition-all duration-200;
            @apply hover:bg-gradient-to-r hover:from-zinc-50 hover:to-transparent dark:hover:from-zinc-800/50 dark:hover:to-transparent;
            @apply hover:shadow-sm;
        }
        #articles-table tbody td {
            @apply px-6 py-4 text-sm;
        }
        #articles-table tbody tr:last-child td {
            @apply border-b-0;
        }
        
        /* Pagination */
        #articles-table_wrapper .dataTables_paginate {
            @apply flex items-center justify-center gap-1 mt-6;
        }
        #articles-table_wrapper .dataTables_paginate .paginate_button {
            @apply px-4 py-2 mx-0.5 rounded-lg text-sm font-medium text-zinc-700 dark:text-zinc-300;
            @apply hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-all duration-200;
            @apply border border-transparent hover:border-zinc-200 dark:hover:border-zinc-600;
            @apply min-w-[2.5rem] text-center;
        }
        #articles-table_wrapper .dataTables_paginate .paginate_button:hover {
            @apply transform scale-105 shadow-sm;
        }
        #articles-table_wrapper .dataTables_paginate .paginate_button.current {
            @apply bg-[var(--color-accent)] text-white border-[var(--color-accent)];
            @apply shadow-md hover:shadow-lg;
        }
        #articles-table_wrapper .dataTables_paginate .paginate_button.disabled {
            @apply opacity-50 cursor-not-allowed hover:bg-transparent hover:scale-100 hover:shadow-none;
        }
        
        /* Info */
        #articles-table_wrapper .dataTables_info {
            @apply text-sm text-zinc-600 dark:text-zinc-400 font-medium px-2;
        }
        
        /* Processing Indicator */
        #articles-table_wrapper .dataTables_processing {
            @apply bg-white/90 dark:bg-zinc-900/90 backdrop-blur-sm rounded-xl shadow-lg border border-zinc-200 dark:border-zinc-700;
            @apply text-zinc-700 dark:text-zinc-300 font-medium;
        }
        
        /* Action Buttons */
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
        
        /* Sort Icons */
        #articles-table_wrapper .sorting,
        #articles-table_wrapper .sorting_asc,
        #articles-table_wrapper .sorting_desc {
            @apply relative pr-6;
        }
        #articles-table_wrapper .sorting::after,
        #articles-table_wrapper .sorting_asc::after,
        #articles-table_wrapper .sorting_desc::after {
            @apply absolute right-2 top-1/2 -translate-y-1/2;
        }
    </style>
    @endpush
@endsection
