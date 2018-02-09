<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Shopify App settings
    |--------------------------------------------------------------------------
    |
    | API Key and Secret for accessing Shopify's Admin API. To generate these
    | credentials, create a Shopify Partner's account as well as an application
    |
    */

    'api_key' => env("SHOPIFY_API_KEY", ''),
    'api_secret' => env("SHOPIFY_API_SECRET", ''),
    'embedded' => true,
    'force_redirect' => true,

   /*
   |--------------------------------------------------------------------------
   | Redirect URI
   |--------------------------------------------------------------------------
   |
   | The URL used for authentication. Users are redirected here after authorizing
   | your application
   |
   */

   'redirect_uri' => env("SHOPIFY_REDIRECT_URI", '/shopify/install'),

   /*
   |--------------------------------------------------------------------------
   |    Scopes
   |--------------------------------------------------------------------------
   |
   | Scopes required for your application, comma-separated
   |
   */

   'scopes' => [
     'read_products',
     'write_script_tags'
   ],

   /*
   |--------------------------------------------------------------------------
   |    Webhooks
   |--------------------------------------------------------------------------
   |
   | List of webhook topics this app ought to be listening to.
   | Keys represent the webhook topic to subscribe to, and the value
   | is the URL to register.
   |
   */

  'webhooks' => [
      'app/uninstalled' => '/shopify/uninstall'
  ],

  /*
  |--------------------------------------------------------------------------
  |    Script Tags
  |--------------------------------------------------------------------------
  |
  | Script Tags that need to be installed. Only supported event is onload,
  | so we just list all URL's to add. Relative URL's will use current App domain
  |
   */
  'script_tags' => [

  ]
];
