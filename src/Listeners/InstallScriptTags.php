<?php

namespace LaravelShopifyPlugin\Listeners;

use Shopify\Api;
use Shopify\Service\ScriptTagService;
use Shopify\Resource\ScriptTag;
use Log;

class InstallScriptTags
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function handle(ShopInstalled $event)
    {
        Log::debug("Installing script_tags for {$event->shop->myshopify_domain}");
        $this->api->setMyshopifyDomain($event->shop->myshopify_domain);
        $this->api->setAccessToken($event->token);
        $service = new ScriptTagService($this->api);
        $script_tags = config('shopify.script_tags');
        foreach ($script_tags as $path) {
            $script_tag = new ScriptTag();
            $script_tag->event = 'onload';
            $script_tag->src = secure_url($value);
            $service->create($script_tag);
            Log::debug("ScriptTag {$script_tag->id} created");
        }
        Log::debug("ScriptTags successfully installed for {$event->shop->myshopify_domain}");
    }
}
