<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
class HttpsVerifyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
    }
}
