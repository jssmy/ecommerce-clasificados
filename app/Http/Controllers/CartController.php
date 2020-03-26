<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Http\Requests\AddCartRequest;
class CartController extends Controller
{
    //
    public function addToCart(AddCartRequest $request,Product $product){
        $quantity  = $request->quantity;
        $cart = CartItem::where('product_id',$product->id)
                ->where('user_id',auth()->id())
                ->active()
                ->first();

        if($cart){
            $quantity = $quantity + $cart->quatity;
            $cart->quatity = $quantity;
            $cart->save();
            return view('layouts.cart.direct-access');

        }

        CartItem::create([
            'product_id'=>$product->id,
            'user_id'=>auth()->id(),
            'name'=>$product->name,
            'price'=>$product->price,
            'discount'=>$product->discount,
            'quatity'=>$quantity
        ]);

        return view('layouts.cart.direct-access');

    }

    public function detailCart(){
        return view('layouts.cart.direct-access');
    }
}
