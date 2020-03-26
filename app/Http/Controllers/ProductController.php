<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 15:44
 */

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(Request $request){
        if($request->ajax()){
            return view('home.partials.content');
        }
        return view('home.index');
    }

    public function productDetail(Request $request , Product $product){
        if($request->ajax()){
            return view('layouts.product.product-detail')->with(compact('product'));
        }
        return view('layouts.product.main-product-detail')->with(compact('product'));
    }

}
