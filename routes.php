<?php

use LaravelShopifyPlugin\Http\Controller\Install;
use LaravelShopifyPlugin\Http\Controller\Uninstall;

Route::group(['prefix' => 'shopify'], function() {
    Route::match(['get', 'post'], '/install', Install::class);
    Route::post('uninstall', Uninstall::class);

});
