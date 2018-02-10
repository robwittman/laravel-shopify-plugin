<?php

namespace LaravelShopifyPlugin\Listeners;

use Shopify\Api;
use Shopify\Service\WebhookService;
use Shopify\Object\Webhook;
use LaravelShopifyPlugin\Events\ShopInstalled;

class InstallWebhooks
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
        $service = new WebhookService($this->api);
        $webhooks = config('shopify.webhooks');
        foreach ($webhooks as $key => $value) {
            if (is_numeric($key)) {
                $key = $value;
            }
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                $value = secure_url($value);
            }

            $webhook = new Webhook();
            $webhook->topic = $value;
            $webhook->address = $value;
            $service->createWebhook($webhook);
        }
    }
}
