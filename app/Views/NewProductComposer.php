<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 12:15
 */

namespace App\Views;

use App\Services\CacheService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NewProductComposer
{
    public function compose(View $view){
        $products=collect();
        if( ! Auth::check()){
            $products = CacheService::notAuthNewProducts();
        }


        return $view->with('products',$products);
    }

}
