<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    //
    protected $guarded=['id'];
    protected $table='order_buy';

    public function  items(){
        return $this->hasMany(OrderBuyItem::class,'order_id','id');
    }

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public static  function code(){
        $lasId = SELF::selectRaw('max(id) as id')->first() ;
        $lasId = $lasId->id + 1;
        return strtolower(config('app.name')).'-'.str_pad($lasId, 10, "0", STR_PAD_LEFT).'-'.now()->year;
    }
}
