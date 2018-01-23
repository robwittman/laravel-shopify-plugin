<?php

namespace LaravelShopifyPlugin\Http\Controller;

use Illuminate\Routing\BaseController;
use Illuminate\Http\Request;
use Shopify\Api;

class Install extends BaseController
{
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {

        } else {

        }
    }
}
