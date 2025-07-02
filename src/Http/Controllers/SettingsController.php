<?php

namespace NamHuuNam\KeyAccessPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Backpack\Settings\app\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', ['session_lifetime', 'session_expire_on_close'])->pluck('value', 'key');
        return view('key-access-package::settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = [
            [
                'key' => 'session_lifetime',
                'name' => 'Session Lifetime',
                'description' => 'Thời gian (phút) session được ghi nhớ sau khi đóng trình duyệt.',
                'value' => $request->input('session_lifetime'),
                'field' => '{"name":"value","label":"Value","type":"number"}',
                'group' => 'key_access',
                'active' => 1,
            ],
            [
                'key' => 'session_expire_on_close',
                'name' => 'Expire on Close',
                'description' => 'Hết hạn session ngay khi đóng trình duyệt.',
                'value' => $request->has('session_expire_on_close') ? 1 : 0,
                'field' => '{"name":"value","label":"Value","type":"checkbox"}',
                'group' => 'key_access',
                'active' => 1,
            ]
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->back()->with('success', 'Cài đặt đã được lưu thành công.');
    }
}
