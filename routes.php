Route::get(['prefix' => 'shopify'], function() {
    Route::match(['get', 'post'], '/install', 'LaravelShopifyPlugin\Http\Controller\Install');
    Route::match(['get', 'post'], '/auth', 'LaravelShopifyPlugin\Http\Controller\Auth']);
});
