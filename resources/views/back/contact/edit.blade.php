@extends('back.layout')

@section('title', 'Edit Pengaturan Kontak')

@section('content')
    <div class="space-y-8 max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="flex items-center gap-4 pb-2 border-b border-zinc-200 dark:border-zinc-700">
            <flux:button href="{{ route('contacts.index') }}" variant="ghost" class="!p-2 hover:!bg-zinc-100 dark:hover:!bg-zinc-800">
                <flux:icon icon="arrow-left" class="w-5 h-5" />
            </flux:button>
            <div class="flex-1">
                <flux:heading size="xl" class="!mb-1">Edit Pengaturan Kontak</flux:heading>
                <flux:subheading class="!mt-0">Kelola link sosial media dan informasi kontak perusahaan</flux:subheading>
            </div>
        </div>

        <!-- Form -->
        <flux:card class="!p-8 !shadow-lg !border-zinc-200 dark:!border-zinc-700">
            <form action="{{ route('contacts.update') }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Social Media Links Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="share" class="w-5 h-5 text-pink-600 dark:text-pink-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Link Media Sosial</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tokopedia -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Link Tokopedia</flux:label>
                            <flux:input 
                                type="url" 
                                name="tokopedia" 
                                value="{{ old('tokopedia', $settings['tokopedia']) }}" 
                                placeholder="https://tokopedia.com/..." 
                                class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                            />
                            <flux:error name="tokopedia" />
                        </flux:field>

                        <!-- Shopee -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Link Shopee</flux:label>
                            <flux:input 
                                type="url" 
                                name="shopee" 
                                value="{{ old('shopee', $settings['shopee']) }}" 
                                placeholder="https://shopee.co.id/..." 
                                class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                            />
                            <flux:error name="shopee" />
                        </flux:field>

                        <!-- Instagram -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Link Instagram</flux:label>
                            <flux:input 
                                type="url" 
                                name="instagram" 
                                value="{{ old('instagram', $settings['instagram']) }}" 
                                placeholder="https://instagram.com/..." 
                                class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                            />
                            <flux:error name="instagram" />
                        </flux:field>

                        <!-- TikTok -->
                        <flux:field>
                            <flux:label class="!text-sm !font-semibold">Link TikTok</flux:label>
                            <flux:input 
                                type="url" 
                                name="tiktok" 
                                value="{{ old('tiktok', $settings['tiktok']) }}" 
                                placeholder="https://tiktok.com/..." 
                                class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                            />
                            <flux:error name="tiktok" />
                        </flux:field>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="phone" class="w-5 h-5 text-green-600 dark:text-green-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Nomor WhatsApp</h3>
                    </div>

                    <div id="whatsapp-container" class="space-y-3">
                        @if(old('whatsapp_name') || old('whatsapp_number'))
                            @php
                                $whatsappNames = old('whatsapp_name', []);
                                $whatsappNumbers = old('whatsapp_number', []);
                                $maxCount = max(count($whatsappNames), count($whatsappNumbers));
                            @endphp
                            @for($i = 0; $i < $maxCount; $i++)
                                <div class="flex gap-3 whatsapp-item">
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nama Kontak</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="whatsapp_name[]" 
                                            value="{{ $whatsappNames[$i] ?? '' }}" 
                                            placeholder="Contoh: Sales" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nomor WhatsApp</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="whatsapp_number[]" 
                                            value="{{ $whatsappNumbers[$i] ?? '' }}" 
                                            placeholder="Contoh: 6281234567890" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <button type="button" onclick="removeWhatsApp(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors mt-6">
                                        <flux:icon icon="trash" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endfor
                        @else
                            @foreach($settings['whatsapp'] as $wa)
                                <div class="flex gap-3 whatsapp-item">
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nama Kontak</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="whatsapp_name[]" 
                                            value="{{ $wa['name'] ?? '' }}" 
                                            placeholder="Contoh: Sales" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nomor WhatsApp</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="whatsapp_number[]" 
                                            value="{{ $wa['number'] ?? '' }}" 
                                            placeholder="Contoh: 6281234567890" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <button type="button" onclick="removeWhatsApp(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors mt-6">
                                        <flux:icon icon="trash" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <flux:button type="button" variant="outline" onclick="addWhatsApp()" class="!w-full">
                        <flux:icon icon="plus" class="w-4 h-4" />
                        Tambah Nomor WhatsApp
                    </flux:button>
                    <flux:error name="whatsapp_name.*" />
                    <flux:error name="whatsapp_number.*" />
                </div>

                <!-- Phone Numbers Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="phone" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Nomor Telepon</h3>
                    </div>

                    <div id="phone-container" class="space-y-3">
                        @if(old('phone_name') || old('phone_number'))
                            @php
                                $phoneNames = old('phone_name', []);
                                $phoneNumbers = old('phone_number', []);
                                $maxCount = max(count($phoneNames), count($phoneNumbers));
                            @endphp
                            @for($i = 0; $i < $maxCount; $i++)
                                <div class="flex gap-3 phone-item">
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nama Kontak</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="phone_name[]" 
                                            value="{{ $phoneNames[$i] ?? '' }}" 
                                            placeholder="Contoh: Customer Service" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nomor Telepon</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="phone_number[]" 
                                            value="{{ $phoneNumbers[$i] ?? '' }}" 
                                            placeholder="Contoh: 021-12345678" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <button type="button" onclick="removePhone(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors mt-6">
                                        <flux:icon icon="trash" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endfor
                        @else
                            @foreach($settings['phone'] as $phone)
                                <div class="flex gap-3 phone-item">
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nama Kontak</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="phone_name[]" 
                                            value="{{ $phone['name'] ?? '' }}" 
                                            placeholder="Contoh: Customer Service" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <flux:field class="flex-1">
                                        <flux:label class="!text-xs !font-medium">Nomor Telepon</flux:label>
                                        <flux:input 
                                            type="text" 
                                            name="phone_number[]" 
                                            value="{{ $phone['number'] ?? '' }}" 
                                            placeholder="Contoh: 021-12345678" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <button type="button" onclick="removePhone(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors mt-6">
                                        <flux:icon icon="trash" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <flux:button type="button" variant="outline" onclick="addPhone()" class="!w-full">
                        <flux:icon icon="plus" class="w-4 h-4" />
                        Tambah Nomor Telepon
                    </flux:button>
                    <flux:error name="phone_name.*" />
                    <flux:error name="phone_number.*" />
                </div>

                <!-- Email Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-zinc-200 dark:border-zinc-700">
                        <flux:icon icon="envelope" class="w-5 h-5 text-purple-600 dark:text-purple-400" />
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Email</h3>
                    </div>

                    <div id="email-container" class="space-y-3">
                        @if(old('email'))
                            @foreach(old('email') as $index => $email)
                                <div class="flex gap-3 email-item">
                                    <flux:field class="flex-1">
                                        <flux:input 
                                            type="email" 
                                            name="email[]" 
                                            value="{{ $email }}" 
                                            placeholder="Contoh: info@perusahaan.com" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <button type="button" onclick="removeEmail(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <flux:icon icon="trash" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endforeach
                        @else
                            @foreach($settings['email'] as $email)
                                <div class="flex gap-3 email-item">
                                    <flux:field class="flex-1">
                                        <flux:input 
                                            type="email" 
                                            name="email[]" 
                                            value="{{ $email }}" 
                                            placeholder="Contoh: info@perusahaan.com" 
                                            class="!rounded-xl !border-zinc-300 dark:!border-zinc-600" 
                                        />
                                    </flux:field>
                                    <button type="button" onclick="removeEmail(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <flux:icon icon="trash" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <flux:button type="button" variant="outline" onclick="addEmail()" class="!w-full">
                        <flux:icon icon="plus" class="w-4 h-4" />
                        Tambah Email
                    </flux:button>
                    <flux:error name="email.*" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-zinc-200 dark:border-zinc-700">
                    <flux:button href="{{ route('contacts.index') }}" variant="ghost" class="!px-6">
                        <flux:icon icon="x-mark" class="w-4 h-4" />
                        Batal
                    </flux:button>
                    <flux:button type="submit" class="!px-8 !py-2.5 !rounded-xl !shadow-md hover:!shadow-lg transition-all">
                        <flux:icon icon="check" class="w-4 h-4" />
                        Simpan Pengaturan
                    </flux:button>
                </div>
            </form>
        </flux:card>
    </div>

    @push('scripts')
    <script>
        // WhatsApp Functions
        function addWhatsApp() {
            const container = document.getElementById('whatsapp-container');
            const div = document.createElement('div');
            div.className = 'flex gap-3 whatsapp-item';
            div.innerHTML = `
                <div class="flex-1">
                    <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-300 mb-1">Nama Kontak</label>
                    <input 
                        type="text" 
                        name="whatsapp_name[]" 
                        value="" 
                        placeholder="Contoh: Sales" 
                        class="w-full px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                    />
                </div>
                <div class="flex-1">
                    <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-300 mb-1">Nomor WhatsApp</label>
                    <input 
                        type="text" 
                        name="whatsapp_number[]" 
                        value="" 
                        placeholder="Contoh: 6281234567890" 
                        class="w-full px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                    />
                </div>
                <button type="button" onclick="removeWhatsApp(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors mt-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            container.appendChild(div);
        }

        function removeWhatsApp(button) {
            const container = document.getElementById('whatsapp-container');
            if (container.children.length > 1) {
                button.closest('.whatsapp-item').remove();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Minimal harus ada 1 nomor WhatsApp',
                    confirmButtonColor: '#10b981'
                });
            }
        }

        // Phone Functions
        function addPhone() {
            const container = document.getElementById('phone-container');
            const div = document.createElement('div');
            div.className = 'flex gap-3 phone-item';
            div.innerHTML = `
                <div class="flex-1">
                    <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-300 mb-1">Nama Kontak</label>
                    <input 
                        type="text" 
                        name="phone_name[]" 
                        value="" 
                        placeholder="Contoh: Customer Service" 
                        class="w-full px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                    />
                </div>
                <div class="flex-1">
                    <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-300 mb-1">Nomor Telepon</label>
                    <input 
                        type="text" 
                        name="phone_number[]" 
                        value="" 
                        placeholder="Contoh: 021-12345678" 
                        class="w-full px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                    />
                </div>
                <button type="button" onclick="removePhone(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors mt-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            container.appendChild(div);
        }

        function removePhone(button) {
            const container = document.getElementById('phone-container');
            if (container.children.length > 1) {
                button.closest('.phone-item').remove();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Minimal harus ada 1 nomor telepon',
                    confirmButtonColor: '#10b981'
                });
            }
        }

        // Email Functions
        function addEmail() {
            const container = document.getElementById('email-container');
            const div = document.createElement('div');
            div.className = 'flex gap-3 email-item';
            div.innerHTML = `
                <div class="flex-1">
                    <input 
                        type="email" 
                        name="email[]" 
                        value="" 
                        placeholder="Contoh: info@perusahaan.com" 
                        class="w-full px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                    />
                </div>
                <button type="button" onclick="removeEmail(this)" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            container.appendChild(div);
        }

        function removeEmail(button) {
            const container = document.getElementById('email-container');
            if (container.children.length > 1) {
                button.closest('.email-item').remove();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Minimal harus ada 1 email',
                    confirmButtonColor: '#10b981'
                });
            }
        }

        // Initialize: Add one field if empty
        document.addEventListener('DOMContentLoaded', function() {
            const whatsappContainer = document.getElementById('whatsapp-container');
            const phoneContainer = document.getElementById('phone-container');
            const emailContainer = document.getElementById('email-container');

            // Initialize: Add one field if empty
            const hasOldWhatsapp = {{ (old('whatsapp_name') || old('whatsapp_number')) ? 'true' : 'false' }};
            const hasOldPhone = {{ (old('phone_name') || old('phone_number')) ? 'true' : 'false' }};

            if (!hasOldWhatsapp && whatsappContainer.children.length === 0) {
                addWhatsApp();
            }
            if (!hasOldPhone && phoneContainer.children.length === 0) {
                addPhone();
            }
            if (emailContainer.children.length === 0) {
                addEmail();
            }
        });
    </script>
    @endpush
@endsection
