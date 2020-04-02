<?php

namespace App\Http\Middleware;

use Closure;

class ProductInteractionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
    public function terminate($request, $response)
    {
        // Store the session data...
        if($request->route()->hasParameter('product') && auth()->check()){
            $product = $request->route()->parameter('product');
            \App\Models\ProductInteraction::create([
                'user_id'=>auth()->id(),
                'product_id'=>$product->id,
                'category_id'=>$product->category_id ? : 1,
                'section'=>$request->route()->getName(),
            ]);
        }
    }
}
