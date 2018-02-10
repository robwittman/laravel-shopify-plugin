<?php

namespace LaravelShopifyPlugin;

use Session;
use Shopify\Storage\PersistentStorageInterface;

class SessionBridge implements PersistentStorageInterface
{
    public function get($key)
    {
        return Session::get($key);
    }

    public function set($key, $value)
    {
        return Session::set($key, $value);
    }
}
