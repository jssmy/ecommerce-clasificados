<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class CartItem extends Model
{
    //
    protected $guarded=['id'];
    protected $table = 'cart_item';
    protected $appends=['price_with_discount'];

    public function scopeActive($query){
        return $query->where('active',1)
                    ->where('quatity','>',0);
    }

    public function scopeOwn($q){
        return $q->where('user_id',auth()->id());
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function getpriceWithDiscountAttribute()
    {
        return round($this->price - ($this->price*($this->discount/100)),2);
    }
}

