<?php

namespace LaravelShopifyPlugin\Listeners;

use Shopify\Api;
use Shopify\Service\WebhookService;
use Shopify\Resource\Webhook;
use Log;

class InstallWebhooks
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function handle(ShopInstalled $event)
    {
        Log::debug("Installing webhooks for {$event->shop->myshopify_domain}");
        $this->api->setMyshopifyDomain($event->shop->myshopify_domain);
        $this->api->setAccessToken($event->token);
        $service = new WebhookService($this->api);
        $webhooks = config('shopify.webhooks');
        foreach ($webhooks as $key => $value) {
            if (is_numeric($key)) {
                $key = $value;
            }
            $webhook = new Webhook();
            $webhook->topic = $value;
            $webhook->address = secure_url($value);
            $service->createWebhook($webhook);
            Log::debug("Webhook {$webhook->id} created");
        }
        Log::debug("Webhooks successfully installed for {$event->shop->myshopify_domain}");
    }
}
