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

class CacheService
{
    /**get new added products top most relevance*/
    public static function notAuthNewProducts(){
         return Cache::remember('not_auth_new_proucts',now()->endOfDay(),function (){
            return Product::where('active',1)
                ->orderBy('priority')
                ->take(20)
                ->get([
                    'id',
                    'name',
                    'price',
                    'discount',
                    'img_url_1'
                ]);
        });

    }
    /** get new added products from user profile**/
    public static function authNewProducts(){

        return collect();
    }

    public static function navigation(){
        return Cache::remember('navigation',now()->endOfDay(),function (){

            return Navigation::active()->get(['name']);
        });
    }
}
