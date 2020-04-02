<?php

namespace App\Providers;

use App\Views\NavigationComposer;
use App\Views\NewProductComposer;
use App\Views\CartAccessComposer;
use App\Views\CardOpionComposer;
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
            NewProductComposer::class   =>  'layouts.product.main-new-products',
            NavigationComposer::class   =>  'layouts.navigation.main-navigation',
            CartAccessComposer::class   =>  'layouts.cart.direct-access',
            CardOpionComposer::class    =>  'layouts.card-option.card-option'
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
