<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    // Display all addresses, phones, and social links
    public function index()
    {
        return view('back.contact.index');
    }

    // Display contact page for frontend
    public function frontend()
    {
        // Get WhatsApp data
        $whatsappRaw = json_decode(Setting::get('whatsapp', '[]'), true) ?: [];
        $whatsapp = [];
        foreach ($whatsappRaw as $item) {
            if (is_array($item) && isset($item['name']) && isset($item['number'])) {
                $whatsapp[] = $item;
            } else {
                $whatsapp[] = ['name' => '', 'number' => is_string($item) ? $item : ''];
            }
        }

        // Get Phone data
        $phoneRaw = json_decode(Setting::get('phone', '[]'), true) ?: [];
        $phone = [];
        foreach ($phoneRaw as $item) {
            if (is_array($item) && isset($item['name']) && isset($item['number'])) {
                $phone[] = $item;
            } else {
                $phone[] = ['name' => '', 'number' => is_string($item) ? $item : ''];
            }
        }

        // Get Email data
        $email = json_decode(Setting::get('email', '[]'), true) ?: [];

        // Get Social Media Links
        $settings = [
            'tokopedia' => Setting::get('tokopedia', ''),
            'shopee' => Setting::get('shopee', ''),
            'instagram' => Setting::get('instagram', ''),
            'tiktok' => Setting::get('tiktok', ''),
        ];

        return view('kontak.index', compact('whatsapp', 'phone', 'email', 'settings'));
    }

    // Show edit form for contact settings
    public function edit()
    {
        // Get WhatsApp data - handle both old format (array of strings) and new format (array of objects)
        $whatsappRaw = json_decode(Setting::get('whatsapp', '[]'), true) ?: [];
        $whatsapp = [];
        foreach ($whatsappRaw as $item) {
            if (is_array($item) && isset($item['name']) && isset($item['number'])) {
                $whatsapp[] = $item;
            } else {
                // Old format - convert to new format
                $whatsapp[] = ['name' => '', 'number' => is_string($item) ? $item : ''];
            }
        }

        // Get Phone data - handle both old format (array of strings) and new format (array of objects)
        $phoneRaw = json_decode(Setting::get('phone', '[]'), true) ?: [];
        $phone = [];
        foreach ($phoneRaw as $item) {
            if (is_array($item) && isset($item['name']) && isset($item['number'])) {
                $phone[] = $item;
            } else {
                // Old format - convert to new format
                $phone[] = ['name' => '', 'number' => is_string($item) ? $item : ''];
            }
        }

        $settings = [
            'tokopedia' => Setting::get('tokopedia', ''),
            'shopee' => Setting::get('shopee', ''),
            'instagram' => Setting::get('instagram', ''),
            'tiktok' => Setting::get('tiktok', ''),
            'whatsapp' => $whatsapp,
            'phone' => $phone,
            'email' => json_decode(Setting::get('email', '[]'), true) ?: [],
        ];

        return view('back.contact.edit', compact('settings'));
    }

    // Update contact settings
    public function update(Request $request)
    {
        $request->validate([
            'tokopedia' => 'nullable|url',
            'shopee' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'whatsapp_name' => 'nullable|array',
            'whatsapp_name.*' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|array',
            'whatsapp_number.*' => 'nullable|string',
            'phone_name' => 'nullable|array',
            'phone_name.*' => 'nullable|string|max:255',
            'phone_number' => 'nullable|array',
            'phone_number.*' => 'nullable|string',
            'email' => 'nullable|array',
            'email.*' => 'nullable|email',
        ]);

        DB::beginTransaction();
        try {
            // Update single value settings
            Setting::set('tokopedia', $request->tokopedia ?? '');
            Setting::set('shopee', $request->shopee ?? '');
            Setting::set('instagram', $request->instagram ?? '');
            Setting::set('tiktok', $request->tiktok ?? '');

            // Update WhatsApp settings (combine name and number)
            $whatsapp = [];
            $whatsappNames = $request->whatsapp_name ?? [];
            $whatsappNumbers = $request->whatsapp_number ?? [];
            
            for ($i = 0; $i < max(count($whatsappNames), count($whatsappNumbers)); $i++) {
                $name = trim($whatsappNames[$i] ?? '');
                $number = trim($whatsappNumbers[$i] ?? '');
                
                if (!empty($number)) {
                    $whatsapp[] = [
                        'name' => $name,
                        'number' => $number
                    ];
                }
            }
            Setting::set('whatsapp', json_encode($whatsapp));

            // Update Phone settings (combine name and number)
            $phone = [];
            $phoneNames = $request->phone_name ?? [];
            $phoneNumbers = $request->phone_number ?? [];
            
            for ($i = 0; $i < max(count($phoneNames), count($phoneNumbers)); $i++) {
                $name = trim($phoneNames[$i] ?? '');
                $number = trim($phoneNumbers[$i] ?? '');
                
                if (!empty($number)) {
                    $phone[] = [
                        'name' => $name,
                        'number' => $number
                    ];
                }
            }
            Setting::set('phone', json_encode($phone));

            $email = array_filter($request->email ?? [], function($value) {
                return !empty(trim($value));
            });
            Setting::set('email', json_encode(array_values($email)));

            DB::commit();

            return redirect()->route('contacts.index')->with('success', 'Pengaturan kontak berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui pengaturan: ' . $e->getMessage())->withInput();
        }
    }
}
