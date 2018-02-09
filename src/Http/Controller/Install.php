<?php

namespace LaravelShopifyPlugin\Http\Controller;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Shopify\Api;
use Shopify\Service\ShopService;
use LaravelShopifyPlugin\Events\ShopInstalled;

class Install extends BaseController
{
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __invoke(Request $request)
    {
        $this->api->setMyshopifyDomain($request->shop);
        if ($request->isMethod('post')) {
            $this->install($request->code);
        } else {
            return redirect($this->getRedirectUri());
        }
    }

    protected function install($code)
    {
        $helper = $this->api->getOAuthHelper();
        $token = $helper->getAccessToken($request->code);
        $this->api->setAccessToken($token->access_token);
        $service = new ShopService($this->api);
        $shop = $service->get();
        event(new ShopInstalled(array('shop' => $shop, 'access_token' => $access_token)));
        return redirect("https://{$request->shop}/admin/apps/{$this->api->getApiKey()}");
    }

    protected function getRedirectUri()
    {
        $scopes = implode(',', config('shopify.scopes'));
        $redirectUri = url(config('shopify.redirect_uri'));
        $helper = $this->api->getOAuthHelper();
        return $helper->getAuthorizationUrl($redirectUri, $scopes);
    }
}
