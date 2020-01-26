<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 12:15
 */

namespace App\Views;


use App\Models\Product;
use Illuminate\View\View;

class NewProductComposer
{
    public function compose(View $view){
        $products = Product::where('active',1)
            ->take(20)
            ->get([
            'id',
            'name',
            'price',
            'discount',
            'img_url_1'
        ]);

        return $view->with('products',$products);
    }

}
