<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 25/03/2020
 * Time: 21:37
 */

namespace App\Views;

use Illuminate\View\View;
use App\Models\CartItem;
class CartAccessComposer
{
    public function compose(View $view){

        $items = CartItem::where('user_id',auth()->id())
            ->with('product')
            ->active()
            ->get();
        return $view->with('items',$items);
    }
}
