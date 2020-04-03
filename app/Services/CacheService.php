<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 26/01/2020
 * Time: 21:03
 */

namespace App\Services;


use App\Models\Navigation;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use  App\Models\ProductInteraction;

class CacheService
{
    /**get new added products top most relevance*/
    public static function notAuthNewProducts(){
        return Product::where('active',1)
            ->orderBy('priority')
            ->take(10)
            ->get();
         return Cache::remember('not_auth_new_proucts',now()->endOfDay(),function (){
            return Product::where('active',1)
                ->orderByRaw('priority, rand()')
                ->take(20)
                ->get();
        });

    }
    /** get new added products from user profile**/
    public static function authNewProducts(){
        $products = Product::leftJoin(ProductInteraction::table().' as i',function ($q){
                return $q->on('i.product_id','=',Product::table().'.id')
                            ->where('user_id','=',auth()->id());
            })
            ->orderByRaw('i.created_at desc,2 desc, rand()')
            ->selectRaw(Product::table().".id as product,count(1) as cantidad,i.created_at")
            ->groupBy(Product::table().'.id')
            ->take(12)
            ->get();

        return Product::whereIn('id',$products->pluck('product'))->orderByRaw('rand()')->get();

    }

    public static function navigation(){
        return Cache::remember('navigation',now()->endOfDay(),function (){

            return Navigation::active()->get(['name']);
        });
    }
}
