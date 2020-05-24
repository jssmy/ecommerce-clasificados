<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBuyItem extends Model
{
    //
    protected $guarded=['id'];
    protected $table='order_buy_items';
    public function scopeActive($query){
        return $query->where('active',1);
    }
    public function cartItem(){
        return $this->hasOne(CartItem::class,'cart_item_id','id');
    }
}
