<?php

namespace LaravelShopifyPlugin\Http\Controller;

use Illuminate\Routing\BaseController;
use Illuminate\Http\Request;

class Auth extends BaseController
{
    public function __construct()
    {

    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {

        } else {
            
        }
    }
}
