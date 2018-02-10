<?php

namespace LaravelShopifyPlugin\Providers;

use Illuminate\Support\ServiceProvider as ServiceProviderInterface;
use LaravelShopifyPlugin\SessionBridge;

class ServiceProvider extends ServiceProviderInterface
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/shopify.php' => config_path('shopify.php'),
        ]);
        $this->loadRoutesFrom(
            __DIR__.'/../../routes.php'
        );
        $this->loadMigrationsFrom(
            __DIR__.'/../../migrations'
        );
    }

    public function register()
    {
        $this->app->bind('Shopify\Api', function($app) {
            $api = new \Shopify\Api([
                'api_key' => config('shopify.api_key'),
                'api_secret' => config('shopify.api_secret')
            ]);
            $api->setStorageInterface()
        });
    }
}
