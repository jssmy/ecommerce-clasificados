<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 29/03/2020
 * Time: 16:43
 */

namespace App\Views;
use Illuminate\View\View;

use App\Models\CardOption;

class CardOpionComposer
{
    public function compose(View $view){
        //dd(in_array('cardOption',$view->getData()),array_keys($view->getData()));
        $cardOption = null;
        if(in_array('cardOption',array_keys($view->getData()))){
            $cardOption = $view->getData()['cardOption'];
        }
        $cardOption  = $cardOption ?: CardOption::with('items')->find(1);

        return $view->with('cardOption',$cardOption);
    }
}
