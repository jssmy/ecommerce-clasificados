<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 14:43
 */

namespace App\Views;

use App\Models\Navigation;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view){
        $navigations = Navigation::active()->get(['name']);
        return $view->with('navigations',$navigations);
    }
}
