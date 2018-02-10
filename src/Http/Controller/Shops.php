<?php

namespace LaravelShopifyPlugin\Http\Controller;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use LaravelShopifyPlugin\Models\Shop;

class Shops extends BaseController
{
    public function get()
    {
        dd(Shop::all());
    }
}
