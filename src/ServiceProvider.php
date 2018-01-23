<?php

namespace LaravelShopifyPlugin;

use Illuminate\Support\ServiceProvider as ServiceProviderInterface;

class ServiceProvider extends ServiceProviderInterface
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/shopify.php' => config_path('shopify.php'),
        ]);
        $this->loadRoutesFrom(
            __DIR__.'/../routes.php'
        );
        $this->loadMigrationsFrom(
            __DIR__.'/../migrations'
        );
    }

    public function register()
    {

    }
}
