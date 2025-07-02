```bash
composer config repositories.key-access-package vcs https://github.com/namhuunam/key-access-package.git
```
```bash
composer require namhuunam/key-access-package
```
```bash
php artisan migrate
```
Nhập "yes"
```bash
php artisan vendor:publish --tag=config --force
```
```bash
php artisan migrate:refresh --path=vendor/namhuunam/key-access-package/database/migrations
```
Nhập "yes"
