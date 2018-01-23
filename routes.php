<?php

use LaravelShopifyPlugin\Http\Controllers\Auth;
use LaravelShopifyPlugin\Http\Controllers\Install;

Route::get(['prefix' => 'shopify'], function() {
    Route::match(['get', 'post'], '/install', Install::class);
    Route::post('uninstall', Uninstall::class);
});
