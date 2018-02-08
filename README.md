## Laravel Shopify Plugin

This library integrates the Shopify API with your Laravel application.

### Installation

```
composer require robwittman/laravel-shopify-plugin
php artisan vendor:publish
```

### Usage

#### Authentication

By default, the package exposes `/shopify/install` for app installation, and `shopify/uninstall` to listen for the app uninstalled webhook.

#### Configuration

The config file for this library is located at `/config/shopify.php`. This must be filled out using the details from your app in the Shopify Partners dashboard.

##### api_key / api_secret

The credential Shopify gives your application for access

##### embedded

Wether or not your app is embedded. Embedded apps load inside Shopify's admin panel

##### force_redirect

If you initialize the embedded app, and are not in Shopify's admin panel IFrame, should
the app automatically redirect

##### redirect_uri

The URL Shopify should send stores to after they authenticate your application

##### scopes

The scopes we want to ask the store owner for

##### webhooks

An array of webhooks we should automatically install. If the array key is just the webhook, we automatically register `domain.com/shopify/<topic>` as the webhook destination. If the array is associative, we'll use the specified route. If you supply an array of routes, we'll install each one. **NOTE** Relative URLs will use the current app domain. Also, we recommend at least the `app/uninstalled` webhook being set, so the app is notified when someone uninstalls

```php
<?php
# domain = 'https://app.com';
'webhooks' => array(
    'shop/update',
    'app/uninstalled' => 'my/custom/webhook',
    'products/create' => array(
        'endpoint1',
        'https://custom-api.com/products/create'
    )
);
?>
```
This will install the following.

| Topic | Webhook Destination |
|--- | --- | --- |
| `shop/update` | `https://app.com/shopify/shop/update` |
| `app/uninstalled` | `https://app.com/my/custom/webhook` |
| `products/create` | `https://app.com/endpoint1` |
| `products/create` | `https://custom-api.com/products/create` |

##### script_tags

Script tags are URLs that Shopify should automatically load when an installed stores storefront is opened. These run on the customer facing store. **NOTE** Relative URLs will
use the current app domain.
```php
<?php
#domain => 'https://app.com';
'script_tags' => array(
    '/js/script.js',                # installs https://app.com/js/script.js
    'https://cdn.com/js/script2.js' # installs https://cdn.com/js/script2.js'
);
?>
```
