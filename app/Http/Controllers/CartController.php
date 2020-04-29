<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderBuy;
use App\Models\OrderBuyItem;
use App\Http\Requests\AddCartRequest;
class CartController extends Controller
{
    //
    public function addToCart(AddCartRequest $request,Product $product){
        $quantity  = $request->quantity ? : 1;
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

    public function deleteFromCart(CartItem $item){
        $item->active=0;
        $item->save();
        return view('layouts.cart.direct-access');
    }

	public function updateQuantity(Request $request, CartItem $item){
		if($request->action=='remove'){
			$item->quatity--;
		}else {
			$item->quatity++;
		}
		$item->save();
		return response()->json([
		'mesage'=>'updated'
	]);
	}

	public function generateOrder(Request $request){
        $order = null;
        \DB::transaction(function () use ($request, &$order){
            $items = CartItem::active()->own()->get();
            $order = OrderBuy::create([
                'code' => OrderBuy::code(),
                'address'=> $request->direction,
                'user_name'=>$request->name,
                'user_id'=>auth()->id(),
                'total'=>$items->sum('price_with_discount'),
            ]);
            $items->each(function ($item) use ($order){
                OrderBuyItem::create([
                    'order_id'=>$order->id,
                    'cart_item_id'=>$item->id
                ]);
            });
            CartItem::own()->active()->update([
                'active'=>0
            ]);
        });
        return response()->json($order);
    }
}
