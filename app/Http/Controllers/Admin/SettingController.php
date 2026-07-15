<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrNew([
            'id' => Setting::min('id') ?: null,
        ]);

        return view('admin.settings.index', [
            'title' => 'Pengaturan',
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_email' => ['required', 'email', 'max:255'],
            'support_phone' => ['nullable', 'string', 'max:30'],
            'timezone' => ['required', 'string', 'max:100'],
            'default_language' => ['required', 'string', 'max:10'],
            'address' => ['nullable', 'string'],
        ]);

        $settings = Setting::first() ?: new Setting();
        $settings->fill($validated);
        $settings->save();

        return redirect()
            ->route('settings.index')
            ->with('success', 'Pengaturan aplikasi berhasil disimpan.');
    }
}
