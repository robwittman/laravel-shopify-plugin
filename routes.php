<?php

use LaravelShopifyPlugin\Http\Controllers\Auth;
use LaravelShopifyPlugin\Http\Controllers\Install;

Route::get(['prefix' => 'shopify'], function() {
    Route::match(['get', 'post'], '/install', Install::class);
    Route::match(['get', 'post'], '/auth', Auth::class]);
    Route::post('/app/uninstalled', Uninstall::class);
});
