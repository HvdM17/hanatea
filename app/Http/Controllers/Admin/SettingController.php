<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::query()->first();

        // Pastikan selalu ada 1 row settings
        if (!$setting) {
            $setting = Setting::create([]);
        }

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::query()->first() ?? Setting::create([]);

        $data = $request->validate([
            'instagram' => ['nullable', 'string', 'max:255'],
            'tiktok' => ['nullable', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:255'],
            'open_hours' => ['nullable', 'string', 'max:80'],
            'about' => ['nullable', 'string'],
            'qris_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('qris_image')) {
            $data['qris_image'] = $request->file('qris_image')->store('qris', 'public');
        }

        $setting->update($data);

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Profil & sosial media berhasil diperbarui.');
    }
}