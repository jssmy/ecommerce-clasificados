<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class CartItem extends Model
{
    //
    protected $guarded=['id'];
    protected $table = 'cart_items';

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}

