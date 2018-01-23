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

### Configuration

The config file for this library is located at `/config/shopify.php`. This must be filled out using the details from your app in the Shopify Partners dashboard.

#### 
