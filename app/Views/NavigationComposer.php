<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 14:43
 */

namespace App\Views;

use App\Models\Navigation;
use App\Services\CacheService;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view){
        $navigations = CacheService::navigation();
        return $view->with('navigations',$navigations);
    }
}
