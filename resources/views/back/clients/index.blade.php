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
        <flux:card>
            <div class="overflow-x-auto">
                <table id="clients-table" class="w-full">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Ukuran</th>
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
            $('#clients-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('clients.index') }}",
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
            });
            
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
        #clients-table_wrapper .dataTables_filter input,
        #clients-table_wrapper .dataTables_length select {
            @apply px-4 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] focus:border-transparent;
        }
        #clients-table_wrapper .dataTables_paginate .paginate_button {
            @apply px-3 py-1.5 mx-1 rounded-lg text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors;
        }
        #clients-table_wrapper .dataTables_paginate .paginate_button.current {
            @apply bg-[var(--color-accent)] text-white hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)];
        }
        #clients-table_wrapper .dataTables_info {
            @apply text-sm text-zinc-600 dark:text-zinc-400;
        }
        #clients-table thead {
            @apply bg-zinc-50 dark:bg-zinc-800/50;
        }
        #clients-table tbody tr {
            @apply hover:bg-zinc-50 dark:hover:bg-zinc-800/30 transition-colors;
        }
        #clients-table tbody td {
            @apply border-b border-zinc-200 dark:border-zinc-700;
        }
        .action-icon {
            @apply inline-flex items-center justify-center p-1.5 rounded-lg transition-all cursor-pointer hover:bg-zinc-100 dark:hover:bg-zinc-700;
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
