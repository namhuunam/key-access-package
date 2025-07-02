<?php

use Illuminate\Support\Facades\Route;
use NamHuuNam\KeyAccessPackage\Http\Controllers\AccessKeyController;
use NamHuuNam\KeyAccessPackage\Http\Controllers\KeyValidationController;
use NamHuuNam\KeyAccessPackage\Http\Controllers\SettingsController;

Route::middleware('web')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('keys', AccessKeyController::class);
        Route::get('key-access-settings', [SettingsController::class, 'index']);
        Route::put('key-access-settings', [SettingsController::class, 'update']);
    });

    Route::post('/validate-key', [KeyValidationController::class, 'validateKey'])->name('validate.key');
});
