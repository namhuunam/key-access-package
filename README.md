```bash
composer config repositories.key-access-package vcs https://github.com/namhuunam/key-access-package.git
```
```bash
composer require namhuunam/key-access-package
```
```bash
php artisan migrate
```
```bash
php artisan vendor:publish --tag=config --force
```
```bash
php artisan migrate:refresh --path=vendor/namhuunam/key-access-package/database/migrations
```

1 Mở file:__ `app/Http/Kernel.php` trong dự án của bạn.

2 Tìm đến mảng:__ `protected $middlewareGroups`.

3 Tìm đến group:__ `'web'`.

4 Thêm dòng sau__ vào cuối danh sách middleware của group `'web'`:
```bash
\NamHuuNam\KeyAccessPackage\Http\Middleware\KeyAccessMiddleware::class,
```
File của bạn sẽ trông giống như thế này:
```bash
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        
        // THÊM DÒNG NÀY VÀO ĐÂY
        \NamHuuNam\KeyAccessPackage\Http\Middleware\KeyAccessMiddleware::class,
    ],
    // ...
];
```
