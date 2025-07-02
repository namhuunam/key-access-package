<?php

namespace NamHuuNam\KeyAccessPackage\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class SessionSettingsServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (Schema::hasTable('settings')) {
            try {
                $settings = DB::table('settings')->whereIn('key', ['session_lifetime', 'session_expire_on_close'])->pluck('value', 'key');

                if (isset($settings['session_lifetime'])) {
                    config(['session.lifetime' => (int) $settings['session_lifetime']]);
                }

                if (isset($settings['session_expire_on_close'])) {
                    config(['session.expire_on_close' => (bool) $settings['session_expire_on_close']]);
                }
            } catch (\Exception $e) {
                // Do nothing if the database is not ready
            }
        }
    }
}
