<?php

namespace NamHuuNam\KeyAccessPackage\Providers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use NamHuuNam\KeyAccessPackage\Http\Middleware\KeyAccessMiddleware;

class KeyAccessServiceProvider extends ServiceProvider
{
    public function boot(Kernel $kernel)
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'key-access-package');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/key-access.php' => config_path('key-access.php'),
            ], 'config');
        }

        if (config('key-access.enabled', true)) {
            $router = $this->app['router'];
            $router->pushMiddlewareToGroup('web', KeyAccessMiddleware::class);
        }

        config(['plugins' => array_merge(config('plugins', []), [
            [
                'name' => 'Quản lý Key',
                'icon' => 'la la-key',
                'entries' => [
                    [
                        'name' => 'Danh sách Key',
                        'url' => backpack_url('keys'),
                        'icon' => 'la la-list'
                    ],
                    [
                        'name' => 'Tạo Key mới',
                        'url' => backpack_url('keys/create'),
                        'icon' => 'la la-plus'
                    ],
                    [
                        'name' => 'Cài đặt',
                        'url' => backpack_url('key-access-settings'),
                        'icon' => 'la la-cog'
                    ]
                ]
            ]
        ])]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/key-access.php', 'key-access'
        );

        $this->app->register(SessionSettingsServiceProvider::class);
    }
}
