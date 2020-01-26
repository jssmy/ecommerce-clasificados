<?php

namespace App\Providers;

use App\Views\NavigationComposer;
use App\Views\NewProductComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composers([
            NewProductComposer::class=>'layouts.partials.product.main-new-products',
            NavigationComposer::class=>'layouts.partials.navigation.main-navigation'
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
