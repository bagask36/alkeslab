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
                            <th class="px-6 py-4 text-left text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Aksi</th>
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
    <script>
        $(document).ready(function() {
            $('#legalitas-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('legalitas.index') }}",
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
            });
        });
    </script>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        #legalitas-table_wrapper .dataTables_filter input,
        #legalitas-table_wrapper .dataTables_length select {
            @apply px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white;
        }
        #legalitas-table_wrapper .dataTables_paginate .paginate_button {
            @apply px-3 py-1 mx-1 rounded-lg text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700;
        }
        #legalitas-table_wrapper .dataTables_paginate .paginate_button.current {
            @apply bg-[var(--color-accent)] text-white;
        }
    </style>
    @endpush
@endsection
