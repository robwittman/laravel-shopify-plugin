<?php

namespace LaravelShopifyPlugin\Listeners;

use Shopify\Api;
use Shopify\Service\ScriptTagService;
use Shopify\Object\ScriptTag;
use LaravelShopifyPlugin\Events\ShopInstalled;

class InstallScriptTags
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function handle(ShopInstalled $event)
    {
        $this->api->setMyshopifyDomain($event->shop->myshopify_domain);
        $this->api->setAccessToken($event->token);
        $service = new ScriptTagService($this->api);
        $script_tags = config('shopify.script_tags');
        foreach ($script_tags as $path) {
            if (!filter_var($path, FILTER_VALIDATE_URL)) {
                $path = secure_url($path);
            }
            $script_tag = new ScriptTag();
            $script_tag->event = 'onload';
            $script_tag->src = $path;
            $service->create($script_tag);
        }
    }
}
