<?php

namespace LaravelShopifyPlugin\Events;

use Illuminate\Queue\SerializesModels;

class AppUninstalled
{
    use SerializesModels;

    public $payload;

    /**
     * Create a new event instance.
     *
     * @param  array  $payload Webhook payload
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
