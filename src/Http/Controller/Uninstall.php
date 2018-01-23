<?php

namespace LaravelShopifyPlugin\Http\Controller;

use Illuminate\Routing\BaseController;
use Illuminate\Http\Request;
use Shopify\Api;
use LaravelShopifyPlugin\Events\AppUninstalled;

class Uninstall extends BaseController
{
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __invoke(Request $request)
    {
        event(new AppUninstalled($request->getContent()));
    }
}
