<?php

namespace App\Events;

use Shopify\Resource\Shop;
use Illuminate\Queue\SerializesModels;

class ShopInstalled
{
    use SerializesModels;

    public $shop;

    public $token;

    /**
     * Create a new event instance.
     *
     * @param  Shop  $shop
     * @param  string $token The access token for API
     * @return void
     */
    public function __construct(Shop $shop, $token)
    {
        $this->shop = $shop;
        $this->token = $token;
    }
}
