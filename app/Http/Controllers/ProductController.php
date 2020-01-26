<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 15:44
 */

namespace App\Http\Controllers;


use App\Models\Product;

class ProductController extends Controller
{
    public function productDetail(Product $product){
        return view('layouts.partials.product.product-detail')->with(compact('product'));
    }
}
