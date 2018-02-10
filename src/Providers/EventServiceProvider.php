<?php

namespace LaravelShopifyPlugin\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'LaravelShopifyPlugin\Events\ShopInstalled' => [
            'LaravelShopifyPlugin\Listeners\InstallWebhooks',
            'LaravelShopifyPlugin\Listeners\InstallScriptTags'
        ],
    ];

    public function boot()
    {

    }

    public function register()
    {

    }
}
