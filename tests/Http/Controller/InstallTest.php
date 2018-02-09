<?php

namespace LaravelShopifyPlugin\Tests\Http\Controller;

use Shopify\Api;
use Tests\TestCase;

class InstallTest extends TestCase
{
    public function testGetInstallRedirects()
    {
        
    }

    public function testPostInstallAuthorizesShop()
    {

    }

    protected function getMockApi(): Api
    {
        return $this->getMockBuilder(Api::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
